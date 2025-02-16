<?php
class ProcesosModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
    public function get_distritos() {
        $query = $this->db->get('distritos'); // Obtiene todos los distritos
        return $query->result_array();
    }
    public function get_cantones($distrito_id) {
        $this->db->where('ID_DISTRITO', $distrito_id);
        $query = $this->db->get('cantones'); // Obtiene los cantones según el distrito
        return $query->result_array();
    }
    public function get_causas() {
        $this->db->where('ACTIVO', 1);
        $this->db->order_by('CAUSA', 'ASC');
        $query = $this->db->get('CAUSAS');
        return $query->result_array();
    }
    public function buscar_por_cedula($cedula)
{
    $query = $this->db->get_where('infractores', array('C_INFRACTOR' => $cedula));
    return $query->row_array(); // Devuelve un arreglo si encuentra datos o null si no existe
}
public function get_tipo_placas()
{
    $query = $this->db->get('tipos_placas'); // Obtiene los tipos de placas
    return $query->result_array();
}
public function get_tipos_pruebas()
{
    $query = $this->db->get('tipo_pruebas'); // Obtiene los tipos de placas
    return $query->result_array();
}
public function get_cdit(){
    $query = $this->db->get('cdit'); // Obtiene los cdit
    return $query->result_array();
}
public function get_proceso($id_infractor)
{
    $query = $this->db->get_where('procesos', array('ID_PROCESO' => $id_proceso));
    return $query->row_array();
}
public function search_acts($search) {
    $this->db->select('ID_AGENTE, NRO_ACT, NOMBRES_ACT, APELLIDOS_ACT');
    $this->db->from('tab_agentes');
    $this->db->group_start();
    $this->db->like('NOMBRES_ACT', $search);
    $this->db->or_like('APELLIDOS_ACT', $search);
    $this->db->or_like('NRO_ACT', $search);
    $this->db->group_end();
    $this->db->limit(10);
    
    $query = $this->db->get();
    return $query->result_array();
}
public function get_all_agentes() {
    $this->db->select('ID_AGENTE, NRO_ACT, NOMBRES_ACT, APELLIDOS_ACT');
    $this->db->from('tab_agentes');
    $this->db->order_by('APELLIDOS_ACT, NOMBRES_ACT');
    return $this->db->get()->result_array();
}
public function get_all_infractores()
{
    return $this->db->get('infractores')->result_array();
}
}