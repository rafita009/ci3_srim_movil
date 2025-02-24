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
    $this->db->select('i.*, COUNT(p.ID_PROCESO) as total_procesos')
             ->from('infractores i')
             ->join('procesos p', 'i.ID_INFRACTOR = p.ID_INFRACTOR', 'left') // Cambio INNER JOIN → LEFT JOIN
             ->group_by('i.ID_INFRACTOR')
             ->order_by('i.ID_INFRACTOR', 'DESC');
    
    $query = $this->db->get();
    return $query->result_array();
}


public function find($id_infractor)
{
    return $this->db->where('ID_INFRACTOR', $id_infractor)
                    ->get('infractores  ')
                    ->row_array();
}
public function insertar_infractor($datos) {
    $this->db->insert('infractores', $datos);
    if ($this->db->affected_rows() > 0) {
        return $this->db->insert_id(); // Retorna el ID del infractor insertado
    }
    return false;
}
public function existe_cedula($cedula) {
    $this->db->where('C_INFRACTOR', $cedula);
    $query = $this->db->get('infractores');
    return $query->num_rows() > 0;
}
public function obtener_infractor($id_infractor)
{
    $this->db->select('*');  // Asegúrate de incluir todos los campos, incluyendo la foto
    $this->db->from('infractores');
    $this->db->where('ID_INFRACTOR', $id_infractor);
    $query = $this->db->get();
    return $query->row_array(); // Devuelve un array asociativo
}

public function obtenerProcesos_infractores($id_infractor) {
    $this->db->select('p.ID_PROCESO, p.NOMBRE_PROCESO, p.FECHA_REGISTRO')
             ->from('procesos p')
             ->where('p.ID_INFRACTOR', $id_infractor)
             ->group_by('p.ID_PROCESO, p.NOMBRE_PROCESO')  // Agregar agrupación por nombre también
             ->order_by('p.ID_PROCESO', 'ASC');  // Ordenar por ID_PROCESO

    $query = $this->db->get();
    return $query->result_array();
}
public function obtenerProcesoscompletos($id_infractor) {
    $this->db->distinct()
             ->select('p.ID_PROCESO, p.NOMBRE_PROCESO, p.FECHA_REGISTRO, pl.PLACA, c.CAUSA')
             ->from('procesos p')
             ->join('placas pl', 'p.ID_PLACA = pl.ID_PLACA', 'left')
             ->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left')
             ->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left')
             ->where('p.ID_INFRACTOR', $id_infractor)
             ->where('p.ID_PROCESO IS NOT NULL')
             ->group_by('p.ID_PROCESO')  // Simplificamos el GROUP BY
             ->order_by('p.ID_PROCESO', 'ASC');

    $result = $this->db->get()->result_array();
    return !empty($result) ? $result : null;
}
}