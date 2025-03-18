<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CditModel extends CI_Model {
   
    private $table = 'CDIT';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getCditActivos() {
        $this->db->where('ACTIVO', 1);
        $this->db->order_by('NOMBRE_CDIT', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getCditEliminados() {
        $this->db->where('ACTIVO', 0);
        $this->db->order_by('NOMBRE_CDIT', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getCditById($id_cdit) {
        $this->db->select('ID_CDIT, NOMBRE_CDIT, DIRECCION'); // Especificar explícitamente los campos
        $this->db->where('ID_CDIT', $id_cdit);
        $query = $this->db->get('cdit');
        
        return $query->row_array();
    }
    
    


    public function agregarCdit($cdit, $direccion) {
        $data = [
            'NOMBRE_CDIT' => $cdit,
            'DIRECCION' => $direccion,
            'ACTIVO' => 1
        ];
        return $this->db->insert($this->table, $data);
    }

    public function actualizarCdit($id_cdit, $cdit, $direccion) {
        $data = [
            'NOMBRE_CDIT' => $cdit,
            'DIRECCION' => $direccion
        ];
        $this->db->where('ID_CDIT', $id_cdit);
        return $this->db->update($this->table, $data);
    }
    public function eliminarCdit($id_cdit) {
        $this->db->where('ID_CDIT', $id_cdit);
        return $this->db->update($this->table, ['ACTIVO' => 0]);
    }

    public function reactivarCdit($id_cdit) {
        $this->db->where('ID_CDIT', $id_cdit);
        return $this->db->update($this->table, ['ACTIVO' => 1]);
    }

    public function existeCdit($cdit, $id_cdit = null) {
        $this->db->where('NOMBRE_CDIT', $cdit);
        if ($id_cdit) {
            $this->db->where('ID_CDIT !=', $id_cdit);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows() > 0;
    }

    public function buscarCdit($termino) {
        $this->db->like('NOMBRE_CDIT', $termino);
        $this->db->where('ACTIVO', 1);
        $this->db->order_by('NOMBRE_CDIT', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getTotalCditActivos() {
        $this->db->where('ACTIVO', 1);
        return $this->db->count_all_results($this->table);
    }
}