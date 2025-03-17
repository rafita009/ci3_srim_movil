<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->helper(array('form', 'url'));

        
    // Verificar si el usuario está logueado
    if ($this->session->userdata('logged_in') !== TRUE) {
        redirect('logincontroller'); // Redirige al login si no está autenticado
    }

    // Obtener los datos del usuario desde la sesión
    $this->usuario_id = $this->session->userdata('id_usuario');  // Accede con 'id_usuario' en minúsculas
    $this->usuario = $this->session->userdata('usuario');
    $this->estado = $this->session->userdata('estado');
    $this->rol = $this->session->userdata('rol');
    }

    // Mostrar los detalles de la cuenta
    
    public function index()
    {
        // Obtener el ID del usuario desde la sesión
        $userId = $this->session->userdata('id_usuario');  // Usa 'id_usuario' en minúsculas
    
        if (!$userId) {
            show_error('No se ha encontrado el ID del usuario en la sesión.');
        }
    
        // Obtener los detalles del usuario usando el modelo
        $user = $this->UsersModel->get_user_by_id($userId);  // Asegúrate de que este método esté funcionando correctamente
        
        // Si el usuario tiene foto, obtenemos la ruta de la foto
        $foto_ruta = !empty($user['FOTO']) ? $user['FOTO'] : '';  // Aquí suponemos que el campo FOTO es 'FOTO'
    
        // Pasar los detalles a la vista
        $this->load->view('profile', ['user' => $user, 
                                      'foto_ruta' => $foto_ruta,
                                      'foto' => !empty($user['FOTO']) ? $user['FOTO'] : 'default_profile.png', // Foto del usuario o predeterminada
                                      'usuario' => $user['NOMBRES'] . ' ' . $user['APELLIDOS']
                                     ]);
    }
    
    

    public function cambiar_contrasena() {
        $contrasena_actual = $this->input->post('contrasena_actual');
        $nueva_contrasena = $this->input->post('nueva_contrasena');
        $user_id = $this->session->userdata('id_usuario');
    
        // Verificar si la contraseña actual es correcta
        if ($this->UsersModel->verificar_contrasena($user_id, $contrasena_actual)) {
            
            // Validar que la nueva contraseña tenga al menos 6 caracteres
            if (strlen($nueva_contrasena) < 6) {
                $this->session->set_flashdata('error', 'La nueva contraseña debe tener al menos 6 letras');
                redirect('profilecontroller/index');
                return;
            }
    
            // Validar que la nueva contraseña no sea igual a la actual
            if ($contrasena_actual === $nueva_contrasena) {
                $this->session->set_flashdata('error', 'La nueva contraseña no puede ser igual a la contraseña actual');
                redirect('profilecontroller/index');
                return;
            }
    
            // Actualizar la contraseña si pasa las validaciones
            if ($this->UsersModel->actualizar_contrasena($user_id, $nueva_contrasena)) {
                $this->session->set_flashdata('success', 'Contraseña actualizada correctamente');
            } else {
                $this->session->set_flashdata('error', 'Error al actualizar la contraseña');
            }
        } else {
            $this->session->set_flashdata('error', 'Contraseña actual incorrecta');
        }
        
        redirect('profilecontroller/index');
    }
    public function subir_foto() {
        $this->load->library('upload');
    
        $config['upload_path'] = './uploads/fotos_usuario/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
        $config['max_size'] = 2048;
    
        // Obtener el ID y el nombre del usuario
        $user_id = $this->session->userdata('id_usuario');
        $user_name = $this->session->userdata('usuario'); // Asegúrate de que este dato esté en la sesión
    
        // Construir el nombre del archivo usando el nombre del usuario
        $file_name = 'foto_' . strtolower(str_replace(' ', '_', $user_name)) . '_' . time();
        $config['file_name'] = $file_name;
    
        $this->upload->initialize($config);
    
        if (!$this->upload->do_upload('foto')) {
            // Registrar el error en el log
            log_message('error', $this->upload->display_errors());
            
            echo json_encode([
                'success' => false,
                'error' => $this->upload->display_errors('', '')
            ]);
            return;
        }
    
        // Obtener la información del archivo cargado
        $file_data = $this->upload->data();
        $foto_ruta = 'uploads/fotos_usuario/' . $file_data['file_name'];
    
        // Obtener la foto anterior del usuario
        $foto_anterior = $this->UsersModel->obtener_foto($user_id);
    
        // Verificar si la foto anterior no es la predeterminada y existe en el servidor
        if ($foto_anterior && $foto_anterior !== 'uploads/fotos_usuario/default_profile.png') {
            $ruta_completa = FCPATH . $foto_anterior; // Ruta completa del archivo
            if (file_exists($ruta_completa)) {
                unlink($ruta_completa); // Eliminar la foto anterior
            }
        }
    
        // Actualizar la ruta de la foto en la base de datos
        if ($this->UsersModel->actualizar_foto($user_id, $foto_ruta)) {
            echo json_encode([
                'success' => true,
                'new_photo_path' => base_url($foto_ruta)
            ]);
        } else {
            // Registrar el error al guardar en la base de datos
            log_message('error', 'Error al guardar la ruta en la base de datos.');
            
            echo json_encode([
                'success' => false,
                'error' => 'Error al guardar la ruta en la base de datos.'
            ]);
        }
    }
    public function eliminar_foto()
{
    // Para solicitudes AJAX
    $is_ajax = $this->input->is_ajax_request();
    
    // Obtener el ID del usuario desde la sesión
    $userId = $this->session->userdata('id_usuario');

    if (!$userId) {
        if ($is_ajax) {
            echo json_encode(['success' => false, 'error' => 'No se ha encontrado el ID del usuario en la sesión.']);
            return;
        } else {
            show_error('No se ha encontrado el ID del usuario en la sesión.');
        }
    }

    // Obtener los detalles del usuario
    $user = $this->UsersModel->get_user_by_id($userId);

    // Verificamos si el usuario tiene una foto personalizada y no es la predeterminada
    if (!empty($user['FOTO']) && $user['FOTO'] !== 'uploads/fotos_usuario/default_profile.png') {
        // Eliminar la foto del servidor
        if (file_exists($user['FOTO'])) {
            unlink($user['FOTO']);  // Eliminar el archivo de la carpeta de fotos
        }

        // Actualizar la base de datos para que el usuario no tenga foto
        $resultado = $this->UsersModel->eliminar_foto($userId);

        if ($resultado) {
            if ($is_ajax) {
                echo json_encode([
                    'success' => true, 
                    'message' => 'Foto eliminada correctamente.',
                    'default_photo' => base_url('uploads/fotos_usuario/default_profile.png')
                ]);
                return;
            } else {
                $this->session->set_flashdata('success', 'Foto eliminada correctamente.');
            }
        } else {
            if ($is_ajax) {
                echo json_encode(['success' => false, 'error' => 'Error al eliminar la foto de la base de datos.']);
                return;
            } else {
                $this->session->set_flashdata('error', 'Error al eliminar la foto de la base de datos.');
            }
        }
    } else {
        // Si no hay foto o es la foto predeterminada
        if ($is_ajax) {
            echo json_encode(['success' => false, 'error' => 'No se puede eliminar la foto predeterminada.']);
            return;
        } else {
            $this->session->set_flashdata('error', 'No se puede eliminar la foto predeterminada.');
        }
    }

    // Si no es una solicitud AJAX, redirigimos
    if (!$is_ajax) {
        redirect('ProfileController/index');
    }
}

    
    }
    
    
    