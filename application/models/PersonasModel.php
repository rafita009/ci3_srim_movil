<?php

class PersonasModel extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}
    public function insertar_persona($data) {
        $this->db->insert('personas', $data);
        return $this->db->insert_id(); // Devuelve el ID generado por la inserción
    }
    public function get_persona_by_id($id_persona)
{
    $this->db->where('ID_PERSONA', $id_persona);
    $query = $this->db->get('PERSONAS'); // Asegúrate de que 'PERSONAS' es el nombre correcto de la tabla
    return $query->row_array(); // Devuelve los datos de la persona
}
public function obtener_todas_personas()
{
    $query = $this->db->get('PERSONAS'); // Reemplaza 'PERSONAS' con el nombre real de tu tabla
    return $query->result_array();
}
public function buscar_por_cedula($cedula)
{
    $query = $this->db->get_where('PERSONAS', array('CEDULA' => $cedula));
    return $query->row_array(); // Devuelve un arreglo si encuentra datos o null si no existe
}
public function actualizar_persona($id_persona, $persona_data)
{
    // Realizar la actualización en la tabla de personas
    $this->db->where('ID_PERSONA', $id_persona);
    $this->db->update('personas', $persona_data);
    
    // Retornar true si la actualización fue exitosa
    return $this->db->affected_rows() > 0;
}
public function cedula_existe($cedula, $id_persona)
{
    $this->db->where('CEDULA', $cedula);
    $this->db->where('ID_PERSONA !=', $id_persona); // Excluir el registro actual
    $query = $this->db->get('personas');

    return $query->num_rows() > 0; // Retorna true si ya existe
}



}