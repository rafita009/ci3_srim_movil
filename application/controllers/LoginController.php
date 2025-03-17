<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('RolesModel'); // Carga el modelo de Usuario
        $this->load->library('form_validation');
        $this->load->library('email');


    }

    public function index() {
        $this->load->view('login');
    }

    public function validar()
    {
        // Recibir datos del formulario
        $username = $this->input->post('user');
        $password = $this->input->post('contrasena');

        // Validar que los campos no estén vacíos
        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Debe ingresar usuario y contraseña.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Buscar el usuario en la base de datos
        $usuario_data = $this->UsersModel->get_user_by_username($username);

        if (!$usuario_data) {
            $this->session->set_flashdata('error', 'Usuario incorrectos.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Verificar la contraseña
        if (!password_verify($password, $usuario_data['PASSWORD'])) {
            $this->session->set_flashdata('error', 'contraseña incorrecta.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Verificar si el usuario está activo
        if ($usuario_data['ESTADO'] !== 'AC') {
            $this->session->set_flashdata('error', 'El usuario está inactivo.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }
         // IMPORTANTE: Verificar si hay cambio de contraseña pendiente
        // Esta verificación debe ocurrir ANTES de configurar la sesión completa
        if (isset($usuario_data['CAMBIO_PENDIENTE']) && $usuario_data['CAMBIO_PENDIENTE'] == 1) {
            // Solo guardar el ID para el cambio obligatorio
            $this->session->set_userdata('id_cambio_pendiente', $usuario_data['ID_USUARIO']);
            
            // Redireccionar al cambio de contraseña obligatorio
            redirect('LoginController/cambio_obligatorio');
            return; // Importante: detener la ejecución aquí
        }
        // Obtener el rol del usuario
        $rol_data = $this->RolesModel->get_rol_by_usuario_id($usuario_data['ID_USUARIO']);

        if (!$rol_data || !isset($rol_data['ROL'])) {
            $this->session->set_flashdata('error', 'Rol no asignado. Comuníquese con soporte.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Guardar los datos del usuario en la sesión
        $rol = $rol_data['ROL']; // Ejemplo: "administrador"
        $estado = $usuario_data['ESTADO']; // Obtener el estado del usuario
             // Obtener el último login del usuario (si tienes esta tabla en tu BD)
             $ultimo_acceso = $this->UsersModel->get_last_login($usuario_data['ID_USUARIO']);
             // Configurar la zona horaria para Ecuador 
             date_default_timezone_set('America/Guayaquil');
         // Obtener la fecha del último acceso (si existe)
             if ($ultimo_acceso) {
                 // Convertir al formato deseado
                 $fecha_acceso = new DateTime($ultimo_acceso['FECHA_LOGIN']);
                 $ultimo_acceso_fecha = $fecha_acceso->format('d/m/Y H:i');
             } else {
                 // Si no hay último acceso, usar la fecha actual
                 $ultimo_acceso_fecha = date('d/m/Y H:i');
             }
             // Registrar este login (opcional)
             $this->UsersModel->register_login($usuario_data['ID_USUARIO']);

        $this->session->set_userdata([
            'logged_in' => TRUE, // Indica que el usuario está logueado 
            'id_usuario' => $usuario_data['ID_USUARIO'],
            'usuario' => $usuario_data['USUARIO'],
            'rol' => $rol, // Aquí almacenamos el nombre del rol
            'estado' => $estado // Aquí almacenamos el estado del usuario
        ]);

                // Redirigir a todos los roles al mismo lugar
            if ($rol === 'administrador' || $rol === 'gestor') {
                redirect('dashboardcontroller/all'); 
            } else {
                $this->session->set_flashdata('error', 'Rol no asignado. Comuníquese con soporte.');
                redirect('logincontroller');
            }
            
            }
            


    public function logout() {
        $this->session->sess_destroy();
        redirect('logincontroller');
    }
    public function forgot_password() {
        $this->load->view('forgot_password');
    }
    public function enviar_recuperacion()
{
    // Validar el correo electrónico
    $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email');
    
    if ($this->form_validation->run() === FALSE) {
        $this->session->set_flashdata('error', 'Por favor, ingresa un correo electrónico válido.');
        redirect('LoginController/forgot_password');
        return;
    }
    
    $email = $this->input->post('email');
    
    
    // Verificar si el correo existe en la base de datos
    $usuario = $this->UsersModel->get_user_by_email($email);
    
    if (!$usuario) {
        // No revelamos si el correo existe o no por seguridad
        $this->session->set_flashdata('success', 'Si el correo existe en nuestra base de datos, recibirás instrucciones para restablecer tu contraseña.');
        redirect('LoginController/forgot_password');
        return;
    }
    
    // Generar contraseña temporal aleatoria
    $contrasena_temporal = $this->generar_contrasena_temporal();
    
    // Actualizar la contraseña del usuario en la base de datos
    $actualizado = $this->UsersModel->actualizar_contrasena_temporal($usuario['ID_USUARIO'], $contrasena_temporal);
    
    if (!$actualizado) {
        $this->session->set_flashdata('error', 'Ocurrió un error al procesar tu solicitud. Por favor, intenta nuevamente.');
        redirect('LoginController/forgot_password');
        return;
    }
    
    // Enviar correo con la contraseña temporal
    $enviado = $this->enviar_correo_recuperacion($usuario, $contrasena_temporal);
    
    if ($enviado) {
        $this->session->set_flashdata('success', 'Se ha enviado un correo con las instrucciones para restablecer tu contraseña.');
    } else {
        $this->session->set_flashdata('error', 'Ocurrió un error al enviar el correo. Por favor, intenta nuevamente.');
    }
    
    redirect('LoginController/forgot_password');
}


private function generar_contrasena_temporal($longitud = 10)
{
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()-_=+';
    $contrasena = '';
    $max = strlen($caracteres) - 1;
    
    for ($i = 0; $i < $longitud; $i++) {
        $contrasena .= $caracteres[random_int(0, $max)];
    }
    
    return $contrasena;
}


private function enviar_correo_recuperacion($usuario, $contrasena_temporal)
{

    
    // Configuración del email
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.gmail.com'; // Ajusta según tu proveedor
    $config['smtp_port'] = 587;
    $config['smtp_user'] = 'yamirdh@gmail.com'; // Tu correo
    $config['smtp_pass'] = 'chtb zizp ihca epzo'; // Tu contraseña de aplicación
    $config['smtp_crypto'] = 'tls';
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    
    $this->email->initialize($config);
    
    // Preparar el correo
    $this->email->from('yamirdh@gmail.com', 'SCRIM');
    $this->email->to($usuario['EMAIL']);
    $this->email->subject('Recuperación de Contraseña');
    
    // Cuerpo del mensaje
    $mensaje = '
    <html>
    <head>
        <title>Recuperación de Contraseña</title>
    </head>
    <body>
        <h2>Recuperación de Contraseña</h2>
        <p>Hola ' . $usuario['NOMBRES'] . ',</p>
        <p>Has solicitado restablecer tu contraseña. A continuación, encontrarás una contraseña temporal:</p>
        <p style="background-color: #f0f0f0; padding: 10px; font-family: monospace; font-size: 16px;">' . $contrasena_temporal . '</p>
        <p>Por favor, ingresa con esta contraseña temporal y cámbiala inmediatamente por una nueva.</p>
        <p>Si no solicitaste este cambio, por favor ignora este correo.</p>
        <p>Saludos,<br>El Equipo de Tu Sistema</p>
    </body>
    </html>
    ';
    
    $this->email->message($mensaje);
    
    // Enviar el correo
    return $this->email->send();
}

// Controlador:
public function cambio_obligatorio()
{
    // Verificar si hay un ID de cambio pendiente
    if (!$this->session->userdata('id_cambio_pendiente')) {
        redirect('LoginController/index');
    }
    
    $data['title'] = 'Cambio de Contraseña Obligatorio';
    $this->load->view('required_change');
   
}

// Procesar el cambio obligatorio
public function procesar_cambio_obligatorio()
{
    // Verificar si hay un ID de cambio pendiente
    if (!$this->session->userdata('id_cambio_pendiente')) {
        redirect('LoginController/index');
    }
    
    // Validar el formulario
    $this->form_validation->set_rules('nueva_contrasena', 'Nueva contraseña', 'required|min_length[6]');
    $this->form_validation->set_rules('confirmar_contrasena', 'Confirmar contraseña', 'required|matches[nueva_contrasena]');
    
    if ($this->form_validation->run() === FALSE) {
        $this->load->view('required_change');
        return;
    }
    
    // Obtener datos
    $id_usuario = $this->session->userdata('id_cambio_pendiente');
    $nueva_contrasena = $this->input->post('nueva_contrasena');
    
    
    $actualizado = $this->UsersModel->actualizar_contrasena_definitiva($id_usuario, $nueva_contrasena);
    
    if ($actualizado) {
        // Eliminar marca de cambio pendiente
        $this->session->unset_userdata('id_cambio_pendiente');
        
        // Mensaje de éxito
        $this->session->set_flashdata('success', 'Contraseña actualizada correctamente. Ahora puedes iniciar sesión.');
        redirect('LoginController/index');
    } else {
        // Mensaje de error
        $this->session->set_flashdata('error', 'No se pudo actualizar la contraseña. Por favor, intenta nuevamente.');
        redirect('LoginController/cambio_obligatorio');
    }
}
   

}