<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('UsersModel'); // Cargar el modelo una vez
            
    
          // Verificar si el usuario está logueado
          if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('loginController'); // Redirige al login si no está autenticado
        }

        // Obtener los datos del usuario desde la sesión
        $this->usuario_id = $this->session->userdata('ID_USUARIO');
        $this->usuario = $this->session->userdata('USUARIO');
        $this->estado = $this->session->userdata('ESTADO');
        $this->rol = $this->session->userdata('ROL');
       
    }
    
        public function all() {
             // Verificar el rol del usuario desde la sesión
    $rol = $this->session->userdata('rol');
    
    // Comprobar si el usuario es un administrador o gestor
    if ($rol !== 'administrador' && $rol !== 'gestor') {
        show_error('No tienes permiso para acceder a esta página.', 403);
    }

    // Obtener los detalles del usuario desde el modelo
    $id_usuario = $this->session->userdata('id_usuario');
    $user_details = $this->UsersModel->get_user_by_id($id_usuario);
    
    $data['año'] = date('Y'); // Año actual 

    // Preparar los datos para la vista
    $data = [
        'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo
        'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png' // Foto del usuario o predeterminada
    ];
    

    // Cargar la vista y pasar los datos
    $this->load->view('admin/dashboard', $data);
          
        }
    

    
}