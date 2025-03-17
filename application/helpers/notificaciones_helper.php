<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('crear_notificacion')) {
    /**
     * Función para crear una notificación
     * 
     * @param int $id_usuario ID del usuario destinatario
     * @param string $titulo Título de la notificación
     * @param string $mensaje Mensaje de la notificación
     * @param string $tipo Tipo de notificación (primary, success, warning, danger)
     * @param string $url URL opcional para redirigir al hacer clic
     * @return bool Resultado de la operación
     */
    function crear_notificacion($id_usuario, $titulo, $mensaje, $tipo = 'primary', $url = null) {
        $CI =& get_instance();
        $CI->load->model('NotificacionesModel');
        
        $data = [
            'id_usuario' => $id_usuario,
            'titulo' => $titulo,
            'mensaje' => $mensaje,
            'tipo' => $tipo,
            'url' => $url
        ];
        
        return $CI->NotificacionesModel->crear_notificacion($data);
    }
}