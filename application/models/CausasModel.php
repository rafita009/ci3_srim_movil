<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CausasModel extends CI_Model {
   
    private $table = 'CAUSAS';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getCausasActivas() {
        $this->db->where('ACTIVO', 1);
        $this->db->order_by('CAUSA', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getCausasEliminadas() {
        $this->db->where('ACTIVO', 0);
        $this->db->order_by('CAUSA', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getCausaById($id_causa) {
        $this->db->where('ID_CAUSA', $id_causa);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    public function agregarCausa($causa) {
        $data = [
            'CAUSA' => $causa,
            'ACTIVO' => 1
        ];
        return $this->db->insert($this->table, $data);
    }

    public function actualizarCausa($id_causa, $causa) {
        $data = ['CAUSA' => $causa];
        $this->db->where('ID_CAUSA', $id_causa);
        return $this->db->update($this->table, $data);
    }

    public function eliminarCausa($id_causa) {
        $this->db->where('ID_CAUSA', $id_causa);
        return $this->db->update($this->table, ['ACTIVO' => 0]);
    }

    public function reactivarCausa($id_causa) {
        $this->db->where('ID_CAUSA', $id_causa);
        return $this->db->update($this->table, ['ACTIVO' => 1]);
    }

    public function existeCausa($causa, $id_causa = null) {
        $this->db->where('CAUSA', $causa);
        if ($id_causa) {
            $this->db->where('ID_CAUSA !=', $id_causa);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows() > 0;
    }

    public function buscarCausas($termino) {
        $this->db->like('CAUSA', $termino);
        $this->db->where('ACTIVO', 1);
        $this->db->order_by('CAUSA', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getTotalCausasActivas() {
        $this->db->where('ACTIVO', 1);
        return $this->db->count_all_results($this->table);
    }
}