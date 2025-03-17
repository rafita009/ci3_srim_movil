<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InfractoresModel extends CI_Model
{
    private $table = 'infractores';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getInfractores()
    {
        $query = $this->db->query("SELECT * FROM infractores");
        return $query->result_array(); // Cambiado a result_array()
    }
    public function existe_cedula($cedula, $id_excluir = null) {
        $this->db->where('C_INFRACTOR', $cedula);
        
        // Si se proporciona un ID para excluir, añadir esa condición
        if ($id_excluir !== null) {
            $this->db->where('ID_INFRACTOR !=', $id_excluir); // Asegúrate de que esta condición se está aplicando
        }
        
        $query = $this->db->get($this->table);
        
        
        
        return $query->num_rows() > 0;
    }
    public function existe_nombre_apellido($nombre, $apellido, $id_excluir = null) {
        $this->db->where('N_INFRACTOR', $nombre);
        $this->db->where('A_INFRACTOR', $apellido);
        
        // Si se proporciona un ID, excluirlo de la búsqueda
        if ($id_excluir !== null) {
            $this->db->where('ID_INFRACTOR !=', $id_excluir);
        }
        
        $query = $this->db->get('infractores');
        return $query->num_rows() > 0;
    }

   

    public function getInfractorById($id_infractor) {
        $this->db->where('ID_INFRACTOR', $id_infractor);
        $query = $this->db->get($this->table);
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
    public function actualizarInfractor($id, $datos) {
        $this->db->where('ID_INFRACTOR', $id);
        return $this->db->update($this->table, $datos);
    }
    public function eliminarCdit($id_cdit) {
        $this->db->where('ID_CDIT', $id_cdit);
        return $this->db->update($this->table, ['ACTIVO' => 0]);
    }

    public function reactivarCdit($id_cdit) {
        $this->db->where('ID_CDIT', $id_cdit);
        return $this->db->update($this->table, ['ACTIVO' => 1]);
    }

    public function existeInfractor($n_infractor, $a_infractor, $t_infractor, $cedula, $id = null) {
        if ($id) {
            $this->db->where('ID_INFRACTOR !=', $id);
        }
        $this->db->where('N_INFRACTOR', $n_infractor);
        $this->db->where('A_INFRACTOR', $a_infractor);
        $this->db->where('T_INFRACTOR', $t_infractor);
        $this->db->where('C_INFRACTOR', $cedula);
        $this->db->order_by('N_INFRACTOR', 'ASC');
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

public function tiene_procesos_asociados($id_infractor) {
    $this->db->where('ID_INFRACTOR', $id_infractor);
    $cantidad = $this->db->count_all_results('procesos');
    
    return $cantidad > 0;
}
public function eliminar($id_infractor) {
    $this->db->where('ID_INFRACTOR', $id_infractor);
    return $this->db->delete('infractores');
}
public function obtener_infractor_por_id($id_infractor) {
    $this->db->where('ID_INFRACTOR', $id_infractor);
    $query = $this->db->get('infractores');
    return $query->row_array();
}
}

?>