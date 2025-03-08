<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {
    

    public function __construct() {
        parent::__construct();
        $this->load->database();

    }

    public function getDashboard() {
        $query = $this->db->query("SELECT * FROM tab_dashboard");
        return $query->result();
    }

    public function getDashboardById($id_dashboard) {
        $this->db->where('ID_DASHBOARD', $id_dashboard);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    public function getDashboardByUser($id_user) {
        $this->db->where('ID_USER', $id_user);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    public function obtenerProcesosPorMes($año = null) {
        // Si no se proporciona un año, usar el año actual
        if ($año === null) {
            $año = date('Y');
        }
        
        // Consulta para contar procesos por mes
        $this->db->select('MONTH(FECHA_PROCEDIMIENTO) as mes, COUNT(*) as total');
        $this->db->from('fechas_procedimiento');
        $this->db->where('YEAR(FECHA_PROCEDIMIENTO)', $año);
        $this->db->group_by('MONTH(FECHA_PROCEDIMIENTO)');
        $this->db->order_by('mes', 'ASC');
        
        $query = $this->db->get();
        
        // Preparar un array con todos los meses (incluso los que no tienen datos)
        $meses = array_fill(1, 12, 0);
        
        // Llenar el array con los datos obtenidos
        foreach ($query->result() as $row) {
            $meses[$row->mes] = (int)$row->total;
        }
        
        return $meses;
    }
}