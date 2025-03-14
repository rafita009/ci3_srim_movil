<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersController extends CI_Controller
{
    

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
        $this->load->model('PersonasModel'); // Carga el modelo de Persona
        $this->load->model('UsersModel'); // Carga el modelo de Usuario
        $this->load->model('ValidatesModel');
        $this->load->model('RolesModel');
        $this->load->library('email');

    }
    public function index()
    {
        
        // Obtén los roles desde la base de datos
        $data['roles'] = $this->RolesModel->obtener_roles();
        // Cargar el formulario
        $this->load->view('admin/users/register_person', $data);
    }

    public function generar_usuario()
{
    $id_persona = $this->input->post('id_persona');

    if (empty($id_persona)) {
        echo json_encode(['status' => 'error', 'message' => 'ID de persona no válido.']);
        return;
    }

    // Verificar si ya existe un usuario asociado a esta persona
    $usuario_existente = $this->UsersModel->get_user_by_persona_id($id_persona);

    if ($usuario_existente) {
        // Obtener el rol asociado al usuario existente
        $rol_existente = $this->RolesModel->get_rol_by_usuario_id($usuario_existente['ID_USUARIO']);

        echo json_encode([
            'status' => 'exists',
            'message' => 'El usuario y rol ya fueron generados previamente.',
            'usuario' => $usuario_existente['USUARIO'],
            'rol' => $rol_existente['ROL'] ?? 'Sin rol asignado' // Asegurar un valor predeterminado
        ]);
        return;
    }

    // Obtener datos de la persona
    $persona_data = $this->PersonasModel->get_persona_by_id($id_persona);

    if (!$persona_data) {
        echo json_encode(['status' => 'error', 'message' => 'No se encontró la información de la persona.']);
        return;
    }

    // Generar usuario y contraseña
    $primer_apellido = explode(' ', trim($persona_data['APELLIDOS']))[0];
    $usuario_generado = strtolower(substr($persona_data['NOMBRES'], 0, 1) . $primer_apellido);
    $password_plano = strtolower(substr($persona_data['NOMBRES'], 0, 1) . $persona_data['CEDULA']);

    // Crear el hash de la contraseña
    $password_hash = password_hash($password_plano, PASSWORD_DEFAULT);

    // Preparar datos para la tabla USUARIOS
    $usuario_data = [
        'ID_USUARIO' => $id_persona,
        'ID_PERSONA' => $id_persona,
        'USUARIO' => $usuario_generado,
        'PASSWORD' => $password_hash,
        'ESTADO' => 'AC'
    ];

    // Insertar usuario en la tabla USUARIOS
    $usuario_insertado = $this->UsersModel->insertar_usuario($usuario_data);

    if ($usuario_insertado) {
        // Preparar datos para la tabla usuarios_roles
        $rol_data = [
            'ID_USUARIO' => $id_persona,
            'ID_ROL' => 2 // Rol predeterminado (Empleado)
        ];

        // Insertar rol en la tabla usuarios_roles
        $rol_insertado = $this->RolesModel->insertar_usuario_rol($rol_data);

        if ($rol_insertado) {
            // Obtener el nombre del rol recién asignado
            $rol_generado = $this->RolesModel->get_rol_by_usuario_id($id_persona);

          // Enviar email con las credenciales
        $email_enviado = $this->enviar_email_credenciales(
            $persona_data['EMAIL'],
            $usuario_generado,
            $password_plano,
            $persona_data['NOMBRES'] . ' ' . $persona_data['APELLIDOS']
        );

            // Retornar datos al frontend
            echo json_encode([
                'status' => 'success',
                'message' => 'Usuario y rol generados exitosamente.',
                'usuario' => $usuario_generado,
                'password' => $password_plano,
                'rol' => $rol_generado['ROL'] ?? 'Sin rol asignado'
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al asignar el rol al usuario.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al crear el usuario.']);
    }
}

    
    public function eliminar_usuario_persona()
    {
        // Obtener el ID de la persona desde el formulario
        $id_persona = $this->input->post('id_persona');
    
        // Cargar el modelo
        $this->load->model('UsersModel');
        
        // Obtener el ID del usuario asociado con la persona
        $id_usuario = $this->UsersModel->obtener_id_usuario_por_persona($id_persona);
    
        if ($id_usuario) {
            $tiene_registros = $this->UsersModel->tiene_registros_asociados($id_usuario);
        
            if ($tiene_registros) {
                // El usuario tiene registros asociados, no se puede eliminar
                $this->session->set_flashdata('error', 'No se puede eliminar este usuario porque tiene procesos asociados en el sistema.');
                redirect('PersonasController/index'); // Ajusta esta ruta según tus necesidades
                return;
            }
            // Eliminar los roles asociados al usuario
            $roles_eliminados = $this->RolesModel->eliminar_roles_usuario($id_usuario);
            if (!$roles_eliminados) {
                echo "Error al eliminar los roles asociados al usuario.";
                return;
            }
    
            // Eliminar el usuario
            $usuario_eliminado = $this->UsersModel->eliminar_usuario($id_usuario);
            if (!$usuario_eliminado) {
                echo "Error al eliminar el usuario.";
                return;
            }
        }
    
        // Eliminar la persona
        $persona_eliminada = $this->UsersModel->eliminar_persona($id_persona);
        if ($persona_eliminada) {
            // Redirigir o mostrar mensaje de éxito
            $this->session->set_flashdata('success', 'Usuario, roles y persona eliminados correctamente.');
            redirect('PersonasController/index'); // Ajusta esta ruta según tus necesidades
        } else {
            echo "Error al eliminar la persona.";
        }
    }
    public function cambiar_rol() {
        // Obtener datos del POST
        $id_usuario = $this->input->post('id_usuario');
        $rol = $this->input->post('rol');

        // Validación básica
        if (empty($id_usuario) || empty($rol)) {
            $this->session->set_flashdata('error', 'Selecciona un rol ');
            redirect('RolesController/index');
            return;
        }

        // Verificar que el rol sea válido
        if (!in_array($rol, ['administrador', 'gestor'])) {
            $this->session->set_flashdata('error', 'Rol no válido');
            redirect('RolesController/index');
            return;
        }

        // Intentar actualizar el rol
        $resultado = $this->RolesModel->actualizar_rol($id_usuario, $rol);

        if ($resultado) {
            $this->session->set_flashdata('success', 'Rol actualizado correctamente');
        } else {
            $this->session->set_flashdata('error', 'Error al actualizar el rol');
        }

        redirect('RolesController/index');
    }
    public function cambiar_estado()
{
    // Validar la solicitud (asegurarse de que se recibió el id del usuario y el estado actual)
    $id_usuario = $this->input->post('id_usuario');
    $estado_actual = $this->input->post('estado_actual');

    // Verificar si el id_usuario y estado_actual son válidos
    if ($id_usuario && $estado_actual) {
        // Determinar el nuevo estado
        $nuevo_estado = ($estado_actual == 'AC') ? 'IN' : 'AC'; // Si está activo, se pone inactivo y viceversa

        // Actualizar el estado en la base de datos
        $data = array('ESTADO' => $nuevo_estado);
        $this->db->where('ID_USUARIO', $id_usuario);
        $this->db->update('usuarios', $data);  // Cambia 'tab_usuarios' por el nombre de la tabla de usuarios en tu base de datos

        // Verificar si la actualización fue exitosa
        if ($this->db->affected_rows() > 0) {
            // Establecer mensaje de éxito y redirigir
            $this->session->set_flashdata('success', 'El estado del usuario ha sido actualizado correctamente.');
        } else {
            // Establecer mensaje de error si no hubo cambios
            $this->session->set_flashdata('error', 'No se pudo actualizar el estado del usuario.');
        }
    } else {
        // Establecer mensaje de error si falta información
        $this->session->set_flashdata('error', 'Información incompleta.');
    }

    // Redirigir a la página de administración de usuarios
    redirect('RolesController/index');
}
private function enviar_email_credenciales($email, $usuario, $password, $nombre) {
    // Limpiar cualquier dato previo
    $this->email->clear();
    
    // Configurar el email
    $this->email->from('yamirdh@gmail.com', 'Sistema de Usuarios');
    $this->email->to($email);
    $this->email->subject('Credenciales de acceso al sistema');
   
    $mensaje = "
    <html>
    <head>
        <title>Sus credenciales de acceso</title>
    </head>
    <body>
        <h2>Bienvenido/a {$nombre}</h2>
        <p>Se ha creado su cuenta de usuario en el sistema. Sus credenciales de acceso son:</p>
        <p><strong>Usuario:</strong> {$usuario}</p>
        <p><strong>Contraseña:</strong> {$password}</p>
        <p>Por seguridad, le recomendamos cambiar su contraseña en su primer inicio de sesión.</p>
        <p>Saludos cordiales.</p>
    </body>
    </html>
    ";
   
    $this->email->message($mensaje);
   
    // Para debug, podemos ver si hay errores
    try {
        if (!$this->email->send()) {
            log_message('error', 'Email error: ' . $this->email->print_debugger());
            return false;
        }
        return true;
    } catch (Exception $e) {
        log_message('error', 'Exception: ' . $e->getMessage());
        return false;
    }
}
}

   



