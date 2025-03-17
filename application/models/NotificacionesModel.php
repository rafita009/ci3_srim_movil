<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificacionesModel extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();
    }
    
    // Obtener notificaciones no leídas del usuario actual
    public function get_notificaciones_no_leidas($id_usuario, $limit = 5) {
        $this->db->where('ID_USUARIO', $id_usuario);
        $this->db->where('LEIDA', 0);
        $this->db->order_by('FECHA_CREACION', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('notificaciones');
        return $query->result();
    }
    
    // Contar notificaciones no leídas
    public function contar_no_leidas($id_usuario) {
        $this->db->where('ID_USUARIO', $id_usuario);
        $this->db->where('LEIDA', 0);
        return $this->db->count_all_results('notificaciones');
    }
    
    // Marcar notificación como leída
    public function marcar_como_leida($id_notificacion) {
        $this->db->where('ID_NOTIFI', $id_notificacion);
        return $this->db->update('notificaciones', ['LEIDA' => 1]);
    }
    
    // Marcar todas las notificaciones como leídas
    public function marcar_todas_como_leidas($id_usuario) {
        $this->db->where('ID_USUARIO', $id_usuario);
        return $this->db->update('notificaciones', ['LEIDA' => 1]);
    }
    
    // Crear una nueva notificación
    public function crear_notificacion($data) {
        return $this->db->insert('notificaciones', $data);
    }
    public function eliminar_notificacion($id_notificacion) {
        $this->db->where('ID_NOTIFI', $id_notificacion);
        return $this->db->delete('notificaciones');
    }
    
    // Eliminar todas las notificaciones de un usuario
    public function eliminar_todas_notificaciones($id_usuario) {
        $this->db->where('ID_USUARIO', $id_usuario);
        return $this->db->delete('notificaciones');
    }
    // Obtener todas las notificaciones del usuario (leídas y no leídas)
public function get_todas_notificaciones($id_usuario, $limit = 10) {
    $this->db->where('ID_USUARIO', $id_usuario);
    $this->db->order_by('FECHA_CREACION', 'DESC'); // Ordenar por fecha, más recientes primero
    $this->db->limit($limit);
    $query = $this->db->get('notificaciones');
    return $query->result();
}

}