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

public function tiene_registros_asociados($id_usuario) 
{
    // Verificar en la tabla tab_datos_accidentes
    $this->db->where('ID_USUARIO', $id_usuario);
    $query = $this->db->get('procesos');
    
    return ($query->num_rows() > 0);
}
public function get_user_by_email($email)
{
    // Primero buscamos el usuario por email en la tabla datos_funcionarios
    $this->db->select('ID_PERSONA, NOMBRES, APELLIDOS, EMAIL');
    $this->db->from('PERSONAS');
    $this->db->where('EMAIL', $email);
    $query = $this->db->get();
    
    if ($query->num_rows() == 0) {
        return null; // No se encontró el email
    }
    
    $datos_persona = $query->row_array();
    
    // Ahora buscamos la información de usuario correspondiente
    $this->db->select('ID_USUARIO, USUARIO, PASSWORD');
    $this->db->from('usuarios');
    $this->db->where('ID_USUARIO', $datos_persona['ID_PERSONA']);
    $query_usuario = $this->db->get();
    
    if ($query_usuario->num_rows() == 0) {
        return null; // El funcionario no tiene cuenta de usuario
    }
    
    $datos_usuario = $query_usuario->row_array();
    
    // Combinamos los resultados
    return array_merge($datos_usuario, $datos_persona);
}
public function actualizar_contrasena_temporal($id_usuario, $contrasena_temporal)
{
    // Generar hash de la contraseña
    $hashed_password = password_hash($contrasena_temporal, PASSWORD_DEFAULT);
    
    // Actualizar la contraseña
    $this->db->where('ID_USUARIO', $id_usuario);
    $this->db->update('usuarios', [
        'PASSWORD' => $hashed_password, // Cambiar la contraseña temporal a la nueva
        'CAMBIO_PENDIENTE' => 1 // Indica que se debe cambiar la contraseña
    ]);
    
    return ($this->db->affected_rows() > 0);
}
    public function actualizar_contrasena_definitiva($id_usuario, $nueva_contrasena)
{
    // Generar hash de la contraseña
    $hashed_password = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
    
    // Actualizar la contraseña
    $this->db->where('ID_USUARIO', $id_usuario);
    $this->db->update('usuarios', [
        'PASSWORD' => $hashed_password, // Cambiar la contraseña a la nueva
        'CAMBIO_PENDIENTE' => 0 // Ya no se requiere cambio
    ]);
    
    return ($this->db->affected_rows() > 0);
}
public function contar_procesos_ultimo_mes() {
    // Fecha de inicio del mes anterior
    $inicio_mes_anterior = date('Y-m-d', strtotime('first day of last month'));
    // Fecha de fin del mes anterior
    $fin_mes_anterior = date('Y-m-d', strtotime('last day of last month'));
    
    $this->db->select('COUNT(*) as total');
    $this->db->from('procesos');
    $this->db->where('DATE(FECHA_REGISTRO) >=', $inicio_mes_anterior);
    $this->db->where('DATE(FECHA_REGISTRO) <=', $fin_mes_anterior);
    
    $resultado = $this->db->get()->row();
    return $resultado->total;
}
public function contar_procesos_mes_actual() {
    // Fecha de inicio del mes actual
    $inicio_mes = date('Y-m-01'); // Primer día del mes actual
    // Fecha actual (hoy)
    $hoy = date('Y-m-d');
    
    $this->db->select('COUNT(*) as total');
    $this->db->from('procesos');
    $this->db->where('DATE(FECHA_REGISTRO) >=', $inicio_mes);
    $this->db->where('DATE(FECHA_REGISTRO) <=', $hoy);
    
    $query = $this->db->get();
    $resultado = $query->row();
    
    // Depuración
    error_log("SQL Query: " . $this->db->last_query());
    error_log("Resultado: " . print_r($resultado, true));
    
    return $resultado ? $resultado->total : 0;
}
public function obtener_relacion_detencion_libertad() {
    // Total de procesos
    $this->db->select('COUNT(*) as total');
    $this->db->from('procesos');
    $this->db->where('RESOLUCION IS NOT NULL'); // Solo considerar procesos con resolución
    $total = $this->db->get()->row()->total;
    
    // Procesos con resolución "Libertad"
    $this->db->select('COUNT(*) as libertad');
    $this->db->from('procesos');
    $this->db->where('RESOLUCION', 'Libertad');
    $libertad = $this->db->get()->row()->libertad;
    
    // Procesos con resolución "Detención"
    $this->db->select('COUNT(*) as detencion');
    $this->db->from('procesos');
    $this->db->where('RESOLUCION', 'Detención');
    $detencion = $this->db->get()->row()->detencion;
    
    // Calcular porcentaje de libertad
    $porcentaje_libertad = ($total > 0) ? ($libertad / $total) * 100 : 0;
    
    return [
        'porcentaje_libertad' => round($porcentaje_libertad, 1),
        'total' => $total,
        'libertad' => $libertad,
        'detencion' => $detencion
    ];
}
public function contar_total_infractores() {
    $this->db->select('COUNT(*) as total');
    $this->db->from('infractores');
    return $this->db->get()->row()->total;
}
public function get_last_login($id_usuario) {
    $this->db->select('FECHA_LOGIN');
    $this->db->from('usuario_logins');
    $this->db->where('ID_USUARIO', $id_usuario);
    $this->db->order_by('FECHA_LOGIN', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        return $query->row_array();
    }
    
    return null;
}
public function register_login($id_usuario) {
    // Obtener datos de manera segura
    $ip_address = $this->input->ip_address();
    $user_agent = substr($this->input->user_agent(), 0, 255); // Cortar a 255 caracteres
    
    $data = array(
        'ID_USUARIO' => $id_usuario,
        'FECHA_LOGIN' => date('Y-m-d H:i:s'),
        'IP_ADDRESS' => $ip_address,
        'USER_AGENT' => $user_agent
    );
    
    
    
    // Insertar con manejo de errores
    try {
        $result = $this->db->insert('usuario_logins', $data);
        
        if ($result === FALSE) {
            // Obtener detalles del error
            $error = $this->db->error();
            log_message('error', 'Error al insertar login: ' . $error['message']);
        }
        
        return $result;
    } catch (Exception $e) {
        log_message('error', 'Excepción al insertar login: ' . $e->getMessage());
        return FALSE;
    }
}
public function get_usuarios_por_rol($rol_nombre) {
    // Primero obtener el ID del rol según su nombre
    $this->db->where('ROL', $rol_nombre); // Ajusta el nombre de la columna que contiene el nombre del rol
    $query_rol = $this->db->get('roles'); // Ajusta el nombre de la tabla de roles
    
    if ($query_rol->num_rows() == 0) {
        return array(); // No se encontró el rol
    }
    
    $rol_id = $query_rol->row()->ID_ROL;
    
    // Obtener los usuarios con ese rol usando la tabla de relación
    $this->db->select('u.*'); // Seleccionar todos los campos de la tabla usuarios
    $this->db->from('usuarios u'); // Ajusta el nombre de la tabla de usuarios
    $this->db->join('usuarios_roles ur', 'u.ID_USUARIO = ur.ID_USUARIO'); // Ajusta el nombre de la tabla de relación
    $this->db->where('ur.ID_ROL', $rol_id);
    $this->db->where('u.ESTADO', 'AC'); // Asumiendo que tienes un campo ESTADO para usuarios activos
    
    $query = $this->db->get();
    return $query->result();
}
public function get_logins_with_user_info() {
    $this->db->select('ul.*, u.USUARIO');
    $this->db->from('usuario_logins ul');
    $this->db->join('usuarios u', 'ul.ID_USUARIO = u.ID_USUARIO', 'left');
    $this->db->order_by('ul.FECHA_LOGIN', 'DESC');
    
    $query = $this->db->get();
    return $query->result_array();
}

public function eliminar_login($id_login) {
    return $this->db->delete('usuario_logins', array('ID_LOGIN' => $id_login));
}
public function eliminar_todos_logins() {
    // Opcional: Puedes añadir una condición para no eliminar los logins más recientes
    // Por ejemplo, mantener los logins de los últimos 30 días
    
    return $this->db->empty_table('usuario_logins');
}
}
?>