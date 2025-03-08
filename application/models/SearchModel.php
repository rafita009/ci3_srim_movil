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
public function procesos_tabla() {
    $this->db->select('i.*, p.PLACA, c.CAUSA, pr.ID_PROCESO, pr.ID_INFRACTOR');
    $this->db->from('infractores i');

    // Cambiamos de LEFT JOIN a INNER JOIN para la tabla procesos
    $this->db->join('procesos pr', 'i.ID_INFRACTOR = pr.ID_INFRACTOR', 'inner');
    $this->db->join('placas p', 'pr.ID_PLACA = p.ID_PLACA', 'left');

    // Mantenemos LEFT JOIN para las tablas de causas
    $this->db->join('causa_distrito_infractor_canton cdic', 'i.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
  
    return $this->db->get()->result_array();
}

public function obtener_infractor($id_infractor) 
{
    return $this->db->get_where('infractores', ['ID_INFRACTOR' => $id_infractor])->row_array();
}
// Obtener foto del infractor (mantiene ID_INFRACTOR ya que es dato personal)
public function obtener_foto_infractor($id_infractor) {
    $this->db->select('F_INFRACTOR_RUTA')
             ->from('infractores')
             ->where('ID_INFRACTOR', $id_infractor);
             
    $result = $this->db->get()->row_array();
    return $result['F_INFRACTOR_RUTA'];
}

public function obtener_fotos_pertenencias($id_proceso) {
    $this->db->select('fp.RUTA_PERTENENCIAS')
             ->from('fotos_pertenencias fp')
             ->where('fp.ID_PROCESO', $id_proceso);
    return $this->db->get()->result_array() ?: [];
}
public function obtener_act_procede($id_proceso) {
    $sql = "SELECT a.NOMBRES_ACT, a.APELLIDOS_ACT, a.NRO_ACT 
            FROM tab_agentes a 
            INNER JOIN procesos p ON a.ID_AGENTE = p.ID_AGENTE 
            WHERE p.ID_PROCESO = ?";
            
    $query = $this->db->query($sql, array($id_proceso));
    
    return $query->num_rows() > 0 ? $query->row_array() : null;
}

// Obtener placas
public function obtener_placas($id_proceso) {
    $this->db->select('placas.PLACA')
             ->from('placas')
             ->join('procesos', 'placas.ID_PLACA = procesos.ID_PLACA')
             ->where('procesos.ID_PROCESO', $id_proceso);
    return $this->db->get()->result_array();
}

// Obtener tipo de placa
public function obtener_tipo_placa($id_proceso) {
    $this->db->select('tp.TIPO_PLACA')
             ->from('placas p')
             ->join('procesos pr', 'p.ID_PLACA = pr.ID_PLACA')
             ->join('tipos_placas tp', 'p.ID_TIPO_PLACA = tp.ID_TIPO_PLACA')
             ->where('pr.ID_PROCESO', $id_proceso);
    $result = $this->db->get()->row_array();
    return !empty($result['TIPO_PLACA']) ? $result['TIPO_PLACA'] : 'No disponible';
}

// Obtener causa y distrito
public function obtener_causa_distrito($id_proceso) {
    $this->db->select('d.NOMBRE_DISTRITO, c.NOMBRE_CANTON, ca.CAUSA')
             ->from('causa_distrito_infractor_canton cdic')
             ->join('procesos p', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR')
             ->join('distritos d', 'cdic.ID_DISTRITO = d.ID_DISTRITO', 'left')
             ->join('cantones c', 'cdic.ID_CANTON = c.ID_CANTON', 'left')
             ->join('causas ca', 'cdic.ID_CAUSA = ca.ID_CAUSA', 'left')
             ->where('p.ID_PROCESO', $id_proceso);
    return $this->db->get()->row_array();
}

// Obtener pruebas
public function obtener_pruebas($id_proceso) {
    $this->db->select('p.VALOR_PRUEBA, tp.NOMBRE_PRUEBA')
             ->from('pruebas p')
             ->join('procesos pr', 'pr.ID_INFRACTOR = p.ID_INFRACTOR')
             ->join('tipo_pruebas tp', 'p.ID_TIPO_PRUEBA = tp.ID_TIPO_PRUEBA', 'left')
             ->where('pr.ID_PROCESO', $id_proceso);
    return $this->db->get()->row_array();
}

// Obtener fechas de procedimiento
public function obtener_fechas_procedimiento($id_proceso) {
    return $this->db->get_where('fechas_procedimiento', ['ID_PROCESO' => $id_proceso])->result_array();
}

public function obtener_fecha_hora_entrada($id_proceso) {
    $this->db->select('fvm.*, a.NOMBRES_ACT, a.APELLIDOS_ACT')
             ->from('fecha_ingresos_vm fvm')
             ->join('procesos p', 'p.ID_INFRACTOR = fvm.ID_INFRACTOR', 'inner')
             ->join('tab_agentes a', 'a.ID_AGENTE = fvm.ID_AGENTE', 'left')
             ->where('p.ID_PROCESO', $id_proceso)
             ->limit(1);

    $query = $this->db->get();
    
    // Depuración: Verificar si la consulta tiene resultados
    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return null; // O devuelve un array vacío []
    }
}




// Obtener fecha y hora de salida
public function obtener_fecha_hora_salida($id_proceso) {
    $this->db->select('fsvm.*')
             ->from('fecha_salidas_vm fsvm')
             ->join('procesos p', 'p.ID_INFRACTOR = fsvm.ID_INFRACTOR')
             ->where('p.ID_PROCESO', $id_proceso);
    return $this->db->get()->row_array();
}

// Obtener comentarios
public function obtener_comentarios($id_proceso) {
    $this->db->select('c.*')
             ->from('comentarios c')
             ->join('procesos p', 'p.ID_INFRACTOR = c.ID_INFRACTOR')
             ->where('p.ID_PROCESO', $id_proceso);
    return $this->db->get()->row_array();
}

// Obtener archivos de libertad
public function obtener_archivos_libertad($id_proceso) {
    $this->db->select('ID_ARCH_LIBERTAD, RUTA_ARCH_LIBERTAD')
             ->from('archivos_libertad')
             ->where('ID_PROCESO', $id_proceso);
    return $this->db->get()->result_array() ?: null;
}

// Obtener datos CDIT
public function obtener_datos_cdit($id_proceso) {
    $this->db->select('
        p.ID_CANT_PERIODO, p.ANIOS, p.MESES, p.DIAS, p.HORAS, 
        f.ID_FECHA_HORA_INGRESO, f.FECHA_HORA_INGRESO_CDIT, f.ACT_RECIBE_CDIT, 
        c.NOMBRE_CDIT, c.DIRECCION,
        a.NOMBRES_ACT, a.APELLIDOS_ACT
    ')
    ->from('cant_periodos p')
    ->join('fecha_ingresos_cdit f', 'f.ID_PROCESO = p.ID_PROCESO', 'left')
    ->join('cdit c', 'p.ID_CDIT = c.ID_CDIT', 'left')
    ->join('tab_agentes a', 'f.ACT_RECIBE_CDIT = a.ID_AGENTE', 'left')
    ->where('p.ID_PROCESO', $id_proceso);

    return $this->db->get()->row_array();
}




public function obtener_archivos_detencion($id_proceso) {
    $this->db->select('ID_ARCH_DETENCION, RUTA_ARCH_DETENCION')
             ->from('archivos_detencion')
             ->where('ID_PROCESO', $id_proceso);
    return $this->db->get()->result_array() ?: null;
}
public function obtener_proceso($id_proceso) {
    $query = $this->db->select('*')
                      ->from('procesos')
                      ->where('ID_PROCESO', $id_proceso)
                      ->get();
    
    return $query->row_array();
}
}