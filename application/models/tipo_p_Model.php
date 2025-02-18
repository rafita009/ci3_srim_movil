<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_p_Model extends CI_Model {
   
    private $table = 'tipo_pruebas';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTiposPruebaActivas() {
        $this->db->where('ACTIVO', 1);
        $this->db->order_by('NOMBRE_PRUEBA', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    public function getTiposPruebaEliminadas() {
        $this->db->where('ACTIVO', 0);
        $this->db->order_by('NOMBRE_PRUEBA', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    public function getTipoPruebaById($id) {
        $this->db->where('ID_TIPO_PRUEBA', $id);
        $query = $this->db->get('tipo_pruebas'); // Asegúrate que este sea el nombre correcto de tu tabla
        return $query->row_array();
    }
    public function existeTipoPrueba($nombre_prueba, $id = null) {
        $this->db->where('NOMBRE_PRUEBA', $nombre_prueba);
        
        // Solo aplicar el where adicional si se proporciona un ID
        if ($id !== null) {
            $this->db->where('ID_TIPO_PRUEBA !=', $id);
        }
        
        $query = $this->db->get($this->table); // Usar la variable de tabla
        return $query->num_rows() > 0;
    }
    public function agregarTipoPrueba($nombre_prueba) {
        $data = [
            'NOMBRE_PRUEBA' => $nombre_prueba,
            'ACTIVO' => 1
        ];
        return $this->db->insert($this->table, $data);
    }
    public function actualizarTipoPrueba($id, $nombre_prueba) {
        $this->db->where('ID_TIPO_PRUEBA', $id);
        return $this->db->update('tipo_pruebas', ['NOMBRE_PRUEBA' => $nombre_prueba]);
    }
    public function eliminartipo_prueba($id_tipo_prueba) {
        $this->db->where('ID_TIPO_PRUEBA', $id_tipo_prueba);
        return $this->db->update($this->table, ['ACTIVO' => 0]);
    }
    public function reactivartipo_prueba($id_tipo_prueba) {
        $this->db->where('ID_TIPO_PRUEBA', $id_tipo_prueba);
        return $this->db->update($this->table, ['ACTIVO' => 1]);
    }
}