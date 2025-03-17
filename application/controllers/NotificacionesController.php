<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificacionesController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('notificaciones');


        // Verificar si el usuario ha iniciado sesión
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('logincontroller'); // Redirige al login si no está autenticado
        }
         // Obtener los datos del usuario desde la sesión
         $this->usuario_id = $this->session->userdata('ID_USUARIO');
         $this->usuario = $this->session->userdata('USUARIO');
         $this->estado = $this->session->userdata('ESTADO');
         $this->rol = $this->session->userdata('ROL');
        
        $this->load->model('NotificacionesModel');
    }
    
    // Obtener notificaciones para mostrar en el dropdown (AJAX)
    // Obtener notificaciones para mostrar en el dropdown (AJAX)
public function obtener_notificaciones() {
    $id_usuario = $this->session->userdata('id_usuario');
    
    // Obtener todas las notificaciones, tanto leídas como no leídas
    $notificaciones = $this->NotificacionesModel->get_todas_notificaciones($id_usuario, 10); // Limitar a 10 para el dropdown
    
    // Solo contar las no leídas para el contador
    $count = $this->NotificacionesModel->contar_no_leidas($id_usuario);
    
    $response = [
        'count' => $count,
        'notificaciones' => $notificaciones
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
    
    // Marcar notificación como leída (AJAX)
    public function marcar_leida($id_notificacion) {
        $result = $this->NotificacionesModel->marcar_como_leida($id_notificacion);
        
        $response = [
            'success' => $result
        ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    // Marcar todas como leídas (AJAX)
    public function marcar_todas_leidas() {
        $id_usuario = $this->session->userdata('id_usuario');
        $result = $this->NotificacionesModel->marcar_todas_como_leidas($id_usuario);
        
        $response = [
            'success' => $result
        ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
  // Eliminar notificación
public function eliminar_notificacion($id_notificacion) {
    $result = $this->NotificacionesModel->eliminar_notificacion($id_notificacion);
    
    $response = [
        'success' => $result
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Eliminar todas las notificaciones
public function eliminar_todas_notificaciones() {
    $id_usuario = $this->session->userdata('id_usuario');
    $result = $this->NotificacionesModel->eliminar_todas_notificaciones($id_usuario);
    
    $response = [
        'success' => $result
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
}