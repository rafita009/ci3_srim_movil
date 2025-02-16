<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class RolesController extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
        $this->load->model('RolesModel'); // Carga el modelo de Roles
        $this->load->model('UsersModel'); // Carga el modelo de Usuarios
        
          // Verificar si el usuario está logueado
          if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('logincontroller'); // Redirige al login si no está autenticado
        }

        // Obtener los datos del usuario desde la sesión
        $this->usuario_id = $this->session->userdata('ID_USUARIO');
        $this->usuario = $this->session->userdata('USUARIO');
        $this->estado = $this->session->userdata('ESTADO');
        $this->rol = $this->session->userdata('ROL');
    }
    
     // Mostrar usuarios con sus roles
     public function index() {
   
        // Obtener los detalles del usuario desde el modelo
        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);

        
        $data = [
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo del usuario
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png', // Foto del usuario o predeterminada
            'usuarios' => $this->RolesModel->obtener_usuarios_con_roles(), // Lista de usuarios con sus roles
            'roles' => $this->RolesModel->obtener_roles(), // Lista de roles disponibles
        ];
        

        $this->load->view('admin/users/users_roles', $data);
    }

    // Actualizar rol de un usuario
    public function actualizar_rol() {
        $id_usuario = $this->input->post('id_usuario');
        $id_rol = $this->input->post('id_rol');

        // Eliminar roles anteriores
        $this->RolesModel->eliminar_roles_usuario($id_usuario);

        // Asignar nuevo rol
        $data = [
            'ID_USUARIO' => $id_usuario,
            'ID_ROL' => $id_rol
        ];
        if ($this->RolesModel->insertar_usuario_rol($data)) {
            $this->session->set_flashdata('success', 'Rol actualizado correctamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al actualizar el rol.');
        }

        redirect('RolesController/index');
    }
}