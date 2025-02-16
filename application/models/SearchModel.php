<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class SearchModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

  // Método para buscar procesos asociados
  public function buscar_procesos($nombre = null, $apellido = null, $cedula = null, $placa = null) 
  {
      $this->db->select('i.*, p.PLACA, c.CAUSA, pr.ID_PROCESO');
      $this->db->from('infractores i');
  
      // Se une la tabla procesos para conectar infractores con placas
      $this->db->join('procesos pr', 'i.ID_INFRACTOR = pr.ID_INFRACTOR', 'left');
      $this->db->join('placas p', 'pr.ID_PLACA = p.ID_PLACA', 'left');
  
      // Se une la tabla intermedia para obtener la causa
      $this->db->join('causa_distrito_infractor_canton cdic', 'i.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
      $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
  
      // Aplicar filtros según los parámetros proporcionados
      if (!empty($nombre)) {
          $this->db->like('i.N_INFRACTOR', $nombre);
      }
      if (!empty($apellido)) {
          $this->db->like('i.A_INFRACTOR', $apellido);
      }
      if (!empty($cedula)) {
          $this->db->where('i.C_INFRACTOR', $cedula);
      }
      if (!empty($placa)) {
          $this->db->like('p.PLACA', $placa);
      }
  
      return $this->db->get()->result_array();
  }
// Método para obtener detalles del infractor
public function procesos_tabla() {
    $this->db->select('i.*, p.PLACA, c.CAUSA, pr.ID_PROCESO, pr.ID_INFRACTOR');
    $this->db->from('infractores i');

    // Se une la tabla procesos para conectar infractores con placas
    $this->db->join('procesos pr', 'i.ID_INFRACTOR = pr.ID_INFRACTOR', 'left');
    $this->db->join('placas p', 'pr.ID_PLACA = p.ID_PLACA', 'left');

    // Se une la tabla intermedia para obtener la causa
    $this->db->join('causa_distrito_infractor_canton cdic', 'i.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
  
    // No se aplican filtros, se obtienen todos los procesos disponibles
    return $this->db->get()->result_array();
}

public function obtener_infractor($id_infractor) 
{
    return $this->db->get_where('infractores', ['ID_INFRACTOR' => $id_infractor])->row_array();
}
public function obtener_foto_infractor($id_infractor) 
{
    $this->db->select('RUTA_INFRACTOR'); // Selecciona el campo de la ruta de la foto
    $this->db->from('fotos_infractores'); // Especifica la tabla
    $this->db->where('ID_INFRACTOR', $id_infractor); // Filtra por el ID del infractor
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->row_array(); // Obtiene la primera fila
        return $result['RUTA_INFRACTOR']; // Devuelve la ruta de la foto
    } else {
        return null; // Si no se encuentra la foto, devuelve null
    }
}
public function obtener_fotos_pertenencias($id_infractor) {
    $this->db->select('RUTA_PERTENENCIAS'); // Selecciona solo la ruta de la foto
    $this->db->from('fotos_pertenencias'); // Especifica la tabla
    $this->db->where('ID_INFRACTOR', $id_infractor); // Filtra por el ID del infractor
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array(); // Devuelve un array con las rutas de las fotos
    } else {
        return []; // Si no hay fotos, devuelve un array vacío
    }
}
public function obtener_act_procede($id_infractor) 
{
    $this->db->select('act_procede.*');
    $this->db->from('act_procede');
    $this->db->join('procesos', 'procesos.ID_ACT_PROCEDE = act_procede.ID_ACT_PROCEDE');
    $this->db->where('procesos.ID_INFRACTOR', $id_infractor);
    return $this->db->get()->row_array();
}
// Método para obtener datos de las placas
public function obtener_placas($id_infractor) 
{
    // Seleccionar la información de la tabla 'placas'
    $this->db->select('placas.PLACA'); // Seleccionamos el campo PLACA
    $this->db->from('placas');
    // Hacemos el JOIN con la tabla 'procesos' usando la clave foránea ID_PLACA
    $this->db->join('procesos', 'placas.ID_PLACA = procesos.ID_PLACA');
    // Filtramos por el ID_INFRACTOR
    $this->db->where('procesos.ID_INFRACTOR', $id_infractor);
    // Ejecutamos la consulta
    $query = $this->db->get();
    // Devolvemos el resultado de la consulta
    return $query->result_array(); // Retorna un array de resultados
}
public function obtener_tipo_placa($id_infractor) 
{
    $this->db->select('tp.TIPO_PLACA');
    $this->db->from('placas p');
    $this->db->join('procesos pr', 'p.ID_PLACA = pr.ID_PLACA', 'left');
    $this->db->join('tipos_placas tp', 'p.ID_TIPO_PLACA = tp.ID_TIPO_PLACA', 'left');
    $this->db->where('pr.ID_INFRACTOR', $id_infractor);
    $query = $this->db->get();

    $result = $query->row_array();

    // Log para depuración
    log_message('debug', 'Resultado de obtener_tipo_placa: ' . print_r($result, true));

    // Devolver el tipo de placa o un mensaje por defecto
    return !empty($result['TIPO_PLACA']) ? $result['TIPO_PLACA'] : 'No disponible';
}

// Método para obtener causas, distrito y cantón
public function obtener_causa_distrito($id_infractor) {
    $this->db->select('d.NOMBRE_DISTRITO, c.NOMBRE_CANTON, ca.CAUSA');
    $this->db->from('causa_distrito_infractor_canton cdic');
    $this->db->join('distritos d', 'cdic.ID_DISTRITO = d.ID_DISTRITO', 'left'); 
    $this->db->join('cantones c', 'cdic.ID_CANTON = c.ID_CANTON', 'left');
    $this->db->join('causas ca', 'cdic.ID_CAUSA = ca.ID_CAUSA', 'left');
    $this->db->where('cdic.ID_INFRACTOR', $id_infractor);
    
    return $this->db->get()->row_array();
}

// Método para obtener pruebas
public function obtener_pruebas($id_infractor) 
{
    $this->db->select('p.VALOR_PRUEBA, tp.NOMBRE_PRUEBA'); 
    $this->db->from('pruebas p');
    $this->db->join('tipo_pruebas tp', 'p.ID_TIPO_PRUEBA = tp.ID_TIPO_PRUEBA', 'left');
    $this->db->where('p.ID_INFRACTOR', $id_infractor);
    $query = $this->db->get();

    return $query->row_array(); 
}

// Método para obtener fecha de procedimiento
public function obtener_fechas_procedimiento($id_infractor) {
    $this->db->select('fechas_procedimiento.*');
    $this->db->from('fechas_procedimiento');
    $this->db->join('procesos', 'fechas_procedimiento.ID_PROCESO = procesos.ID_PROCESO'); // Relacionamos con procesos
    $this->db->where('procesos.ID_INFRACTOR', $id_infractor); // Filtramos por el ID_INFRACTOR en procesos
    $query = $this->db->get();
    $results = $query->result_array();
    print_r($results); // Para depurar, ver qué devuelve la consulta.
    return $results;
}


// Método para obtener fecha y hora de entrada
public function obtener_fecha_hora_entrada($id_infractor) {
    $query = $this->db->get_where('fecha_ingresos_vm', ['ID_INFRACTOR' => $id_infractor]);

    // Verificar si la consulta devuelve datos
    if ($query->num_rows() > 0) {
        $resultado = $query->row_array(); // Obtener el primer resultado
        return $resultado;
    } else {
     return null;
    }
}
// Método para obtener fecha y hora de salida
public function obtener_fecha_hora_salida($id_infractor) {
    $query = $this->db->get_where('fecha_salidas_vm', ['ID_INFRACTOR' => $id_infractor]);

    // Verificar si la consulta devuelve datos
    if ($query->num_rows() > 0) {
        $resultado = $query->row_array(); // Obtener el primer resultado
        return $resultado;
    } else {
        return null;
    }
}
// Método para obtener el último comentario de un infractor
public function obtener_comentarios($id_infractor) {
    $query = $this->db->get_where('comentarios', ['ID_INFRACTOR' => $id_infractor]);

    if ($query->num_rows() > 0) {
        return $query->row_array(); // Retorna solo el primer comentario como un array asociativo
    } else {
        return null; // Retorna null si no hay comentarios
    }
}
// Método para obtener los archivos de libertad asociados a un infractor
public function obtener_archivos_libertad($id_infractor) {
    $query = $this->db->get_where('archivos_libertad', ['ID_INFRACTOR' => $id_infractor]);

    if ($query->num_rows() > 0) {
        return $query->result_array(); // Devuelve todos los archivos asociados en un array
    } else {
        return []; // Devuelve un array vacío si no hay archivos
    }
}
public function obtener_datos_cdit($id_infractor) {
    // Agregar log para ver qué ID de infractor estamos utilizando
    log_message('debug', 'Consultando datos para el infractor con ID: ' . $id_infractor);

    // Construir la consulta
    $this->db->select('
        p.ID_CANT_PERIODO, p.ANIOS, p.MESES, p.DIAS, p.HORAS, 
        f.ID_FECHA_HORA_INGRESO, f.FECHA_HORA_INGRESO_CDIT, f.ACT_RECIBE_CDIT,
        c.NOMBRE_CDIT, c.DIRECCION
    ');
    $this->db->from('cant_periodos p');
    $this->db->join('fecha_ingresos_cdit f', 'p.ID_INFRACTOR = f.ID_INFRACTOR', 'left');
    $this->db->join('cdit c', 'p.ID_CDIT = c.ID_CDIT', 'left');
    $this->db->where('p.ID_INFRACTOR', $id_infractor);
    
    // Ejecutar la consulta
    $query = $this->db->get();

    // Log para la consulta SQL ejecutada
    log_message('debug', 'Consulta SQL ejecutada: ' . $this->db->last_query());

    // Verificar si la consulta devuelve resultados
    if ($query->num_rows() > 0) {
        // Log para cuando se encuentran resultados
        log_message('debug', 'Datos encontrados para el infractor con ID: ' . $id_infractor);
        return $query->row_array(); // Devolver los resultados como un array
    } else {
        // Log cuando no se encuentran resultados
        log_message('debug', 'No se encontraron datos para el infractor con ID: ' . $id_infractor);
        return null; // Si no hay resultados, devolver null
    }
}

public function obtener_archivos_detencion($id_infractor) {
    $this->db->select('
        a.ID_ARCH_DETENCION, a.RUTA_ARCH_DETENCION
    ');
    $this->db->from('archivos_detencion a');
    $this->db->where('a.ID_INFRACTOR', $id_infractor);
    
    // Ejecutar la consulta
    $query = $this->db->get();

    // Verificar si la consulta devuelve resultados
    if ($query->num_rows() > 0) {
        return $query->result_array(); // Devolver los resultados como un array
    } else {
        return null; // Si no hay resultados, devolver null
    }
}

}