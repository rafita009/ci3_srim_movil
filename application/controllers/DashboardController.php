<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('UsersModel'); // Cargar el modelo una vez
        $this->load->model('DashboardModel');
            
    
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
    $procesos_ultimo_mes = $this->UsersModel->contar_procesos_ultimo_mes();
    $procesos_mes_actual = $this->UsersModel->contar_procesos_mes_actual();
    $relacion_detencion_libertad = $this->UsersModel->obtener_relacion_detencion_libertad();
    $total_infractores = $this->UsersModel->contar_total_infractores();
     // Obtener el año actual
     $año_actual = date('Y');
    
     // Obtener datos de procesos por mes
     $datos_por_mes = $this->DashboardModel->obtener_procesos_por_mes($año_actual);
      // Obtener datos para el gráfico de distritos
    $procesos_por_distrito = $this->DashboardModel->obtener_procesos_por_distrito();
     // Obtener causas con porcentajes
     $causas_porcentajes = $this->DashboardModel->obtener_porcentajes_causas();
    
     // Obtener tipos de prueba con porcentajes
     $pruebas_porcentajes = $this->DashboardModel->obtener_porcentajes_pruebas();

    // Preparar los datos para la vista
    $data = [
        'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo
        'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png', // Foto del usuario o predeterminada
        'procesos_ultimo_mes' => $procesos_ultimo_mes,
        'procesos_mes_actual' => $procesos_mes_actual,
        'relacion_detencion_libertad' => $relacion_detencion_libertad,
        'total_infractores' => $total_infractores,
        'datos' => $datos_por_mes,
        'año' => $año_actual,
        'distritos' => $procesos_por_distrito,
        'causas_porcentajes' => $causas_porcentajes,
        'pruebas_porcentajes' => $pruebas_porcentajes

    ];
    

    // Cargar la vista y pasar los datos
    $this->load->view('admin/dashboard', $data);
          
        }
    

    
}