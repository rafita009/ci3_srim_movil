<?php 
class RolesModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function obtener_roles() {
        $query = $this->db->get('roles'); // Reemplaza 'roles' con el nombre de tu tabla si es diferente
        return $query->result();
    }
    public function insertar_usuario_rol($data)
{
    // Insertar el rol en la tabla usuarios_roles
    return $this->db->insert('usuarios_roles', $data);
}
public function eliminar_roles_usuario($id_usuario)
{
    $this->db->where('ID_USUARIO', $id_usuario);
    return $this->db->delete('usuarios_roles');
}
public function get_rol_by_usuario_id($id_usuario)
{
    $this->db->select('r.ROL');
    $this->db->from('usuarios_roles ur');
    $this->db->join('roles r', 'ur.ID_ROL = r.ID_ROL');
    $this->db->where('ur.ID_USUARIO', $id_usuario);
    $query = $this->db->get();
    return $query->row_array(); // Devuelve un array o NULL
}

public function obtener_usuarios_con_roles() {
    $this->db->select('usuarios.ID_USUARIO, personas.NOMBRES, personas.APELLIDOS, usuarios.USUARIO, usuarios.ESTADO, roles.ROL');
    $this->db->from('usuarios');
    $this->db->join('personas', 'usuarios.ID_PERSONA = personas.ID_PERSONA', 'left');
    $this->db->join('usuarios_roles', 'usuarios.ID_USUARIO = usuarios_roles.ID_USUARIO', 'left');
    $this->db->join('roles', 'usuarios_roles.ID_ROL = roles.ID_ROL', 'left');
    $query = $this->db->get();
    return $query->result(); // Devuelve un array de objetos con los resultados
}

public function actualizar_rol($id_usuario, $rol) {
    // Primero convertimos el nombre del rol al id_rol correspondiente
    $id_rol = ($rol == 'administrador') ? 1 : 2;
    
    // Verificamos si ya existe un registro para este usuario
    $existe = $this->db->where('ID_USUARIO', $id_usuario)
                      ->get('usuarios_roles')
                      ->num_rows();
    
    if ($existe > 0) {
        // Si existe, actualizamos
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->update('usuarios_roles', ['ID_ROL' => $id_rol]);
    } else {
        // Si no existe, insertamos
        return $this->db->insert('usuarios_roles', [
            'ID_USUARIO' => $id_usuario,
            'ID_ROL' => $id_rol
        ]);
    }
}
public function cambiar_estado_usuario() {
    $id_usuario = $this->input->post('id_usuario');
    $nuevo_estado = $this->input->post('estado');

    $this->RolesModel->actualizar_estado_usuario($id_usuario, $nuevo_estado);
    redirect('RolesController/index'); // Redirige de vuelta a la lista de usuarios
}
public function actualizar_estado_usuario($id_usuario, $estado) {
    $this->db->where('ID_USUARIO', $id_usuario);
    $this->db->update('usuarios', ['ESTADO' => $estado]);
}



}
?>