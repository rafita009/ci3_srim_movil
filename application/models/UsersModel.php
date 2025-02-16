<?php
class UsersModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function insertar_usuario($data) {
        return $this->db->insert('usuarios', $data);
    }
    public function get_user_by_id($id_usuario)
    {
        // Realizamos un JOIN entre las tablas USUARIOS, PERSONAS, USUARIOS_ROLES y ROLES
        $this->db->select('USUARIOS.ID_USUARIO, usuarios.ESTADO, PERSONAS.NOMBRES, PERSONAS.APELLIDOS, PERSONAS.EMAIL, PERSONAS.TELEFONO, PERSONAS.CEDULA, ROLES.ROL, USUARIOS.FOTO');
        $this->db->from('USUARIOS');
        $this->db->join('PERSONAS', 'USUARIOS.ID_PERSONA = PERSONAS.ID_PERSONA', 'left');  // JOIN con PERSONAS usando la clave foránea
        $this->db->join('USUARIOS_ROLES', 'USUARIOS.ID_USUARIO = USUARIOS_ROLES.ID_USUARIO', 'left');  // JOIN con USUARIOS_ROLES
        $this->db->join('ROLES', 'USUARIOS_ROLES.ID_ROL = ROLES.ID_ROL', 'left');  // JOIN con la tabla ROLES para obtener el nombre del rol
        $this->db->where('USUARIOS.ID_USUARIO', $id_usuario);  // Condición para obtener solo el usuario con el ID pasado
        $query = $this->db->get();  // Ejecutamos la consulta
    
        // Si encontramos el usuario, retornamos los datos como un array
        if ($query->num_rows() > 0) {
            return $query->row_array();  // Devuelve un array con los datos del usuario
        } else {
            return null;  // Si no se encuentra el usuario, retornamos null
        }
    }
    
public function get_user_by_persona_id($id_persona)
{   
    $this->db->where('ID_PERSONA', $id_persona);
    $query = $this->db->get('usuarios');

    if ($query->num_rows() > 0) {
        return $query->row_array();
    }

    return null;
}
public function get_user_by_username($username)
{
    $this->db->where('USUARIO', $username);
    $query = $this->db->get('usuarios');
    return $query->row_array(); // Devuelve un array o NULL
}

public function obtener_id_usuario_por_persona($id_persona)
{
    // Consulta para obtener el ID del usuario asociado con la persona
    $this->db->select('ID_USUARIO');
    $this->db->from('usuarios');
    $this->db->where('ID_PERSONA', $id_persona);
    $query = $this->db->get();

    // Si se encuentra el usuario, devolver su ID
    if ($query->num_rows() > 0) {
        return $query->row()->ID_USUARIO;
    }

    return null; // Retornar null si no se encuentra el usuario
}
public function eliminar_usuario($id_usuario)
{
    // Eliminar el usuario de la tabla de usuarios
    $this->db->where('ID_USUARIO', $id_usuario);
    return $this->db->delete('usuarios');
}
public function eliminar_persona($id_persona)
{
    // Eliminar la persona de la tabla de personas
    $this->db->where('ID_PERSONA', $id_persona);
    return $this->db->delete('personas');
}
public function validate_user($username, $password) {
    $this->db->select('u.ID_USUARIO, u.PASSWORD, u.ESTADO, ur.ID_ROL, u.USUARIO');
    $this->db->from('usuarios u');
    $this->db->join('usuarios_roles ur', 'u.ID_USUARIO = ur.ID_USUARIO');
    $this->db->where('u.USUARIO', $username);
    $this->db->where('u.ESTADO', 'AC'); // Solo usuarios activos
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
        $user = $query->row();
        if (password_verify($password, $user->PASSWORD)) {
            return $user; // Devuelve el objeto usuario con todos los datos
        }
    }
    return false;
}
   
public function obtener_usuarios_con_roles() {
    $this->db->select('u.ID_USUARIO, u.NOMBRES, u.APELLIDOS, u.USUARIO, u.ESTADO, r.ROL');
    $this->db->from('usuarios u');
    $this->db->join('usuarios_roles ur', 'u.ID_USUARIO = ur.ID_USUARIO', 'left');
    $this->db->join('roles r', 'ur.ID_ROL = r.ID_ROL', 'left');
    $query = $this->db->get();
    
    return $query->result(); // Devuelve un array de objetos
}
public function verificar_contrasena($user_id, $contrasena) {
    $this->db->where('ID_USUARIO', $user_id);
    $usuario = $this->db->get('usuarios')->row();
    return password_verify($contrasena, $usuario->PASSWORD);
}

public function actualizar_contrasena($user_id, $nueva_contrasena) {
    $this->db->where('ID_USUARIO', $user_id);
    return $this->db->update('usuarios', ['PASSWORD' => password_hash($nueva_contrasena, PASSWORD_DEFAULT)]);
}
public function actualizar_foto($id_usuario, $ruta_foto) {
    $this->db->set('foto', $ruta_foto);
    $this->db->where('id_usuario', $id_usuario);
    return $this->db->update('usuarios'); // Cambia 'usuarios' por el nombre correcto de tu tabla
}

public function obtener_foto($user_id) {
    $this->db->select('foto');
    $this->db->from('usuarios');
    $this->db->where('id_usuario', $user_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->foto;
    }

    return 'uploads/fotos_usuario/default_profile.png'; // Retorna la ruta predeterminada si no hay foto
}
public function eliminar_foto($id_usuario)
{
    // Actualizar la base de datos para eliminar la foto del usuario
    $data = [
        'FOTO' => 'uploads/fotos_usuario/default_profile.png',  // O también podrías poner NULL
    ];

    $this->db->where('ID_USUARIO', $id_usuario);
    return $this->db->update('USUARIOS', $data);
}




}
?>