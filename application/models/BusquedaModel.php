<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busquedamodel extends CI_Model {
    
    
    
    public function buscar($buscar_por, $valor, $filtrar_fecha, $fecha_inicio, $fecha_fin, $filtrar_resolucion = '') {
        // Consulta base
        $this->db->select('p.ID_PROCESO, i.N_INFRACTOR, i.A_INFRACTOR, i.C_INFRACTOR, 
                          pl.PLACA, c.CAUSA, i.ID_INFRACTOR, p.RESOLUCION');
        $this->db->from('procesos p');
        $this->db->join('infractores i', 'p.ID_INFRACTOR = i.ID_INFRACTOR');
        
        // JOINs básicos que casi siempre necesitamos
        $this->db->join('placas pl', 'p.ID_PLACA = pl.ID_PLACA', 'left');
        
        // Aplicar filtro de resolución primero (importante, ya que esto es un criterio base)
        if (!empty($filtrar_resolucion)) {
            $this->db->where('p.RESOLUCION', $filtrar_resolucion);
        }
        
        // Manejar búsqueda según el tipo
        if (!empty($buscar_por)) {
            switch($buscar_por) {
                case 'distrito':
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR');
                    $this->db->join('distritos d', 'cdic.ID_DISTRITO = d.ID_DISTRITO');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                    if (!empty($valor)) {
                        $this->db->where('d.ID_DISTRITO', $valor);
                    }
                    break;
                
                case 'canton':
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR');
                    $this->db->join('cantones c2', 'cdic.ID_CANTON = c2.ID_CANTON');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                    if (!empty($valor)) {
                        $this->db->where('c2.ID_CANTON', $valor);
                    }
                    break;
                
                case 'causa':
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA');
                    if (!empty($valor)) {
                        $this->db->where('c.ID_CAUSA', $valor);
                    }
                    break;
                
                case 'tipo_prueba':
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                    $this->db->join('pruebas pr', 'p.ID_INFRACTOR = pr.ID_INFRACTOR');
                    $this->db->join('tipo_pruebas tp', 'pr.ID_TIPO_PRUEBA = tp.ID_TIPO_PRUEBA');
                    if (!empty($valor)) {
                        $this->db->where('tp.ID_TIPO_PRUEBA', $valor);
                    }
                    break;
                
                case 'nombre_apellido':
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                    if (!empty($valor)) {
                        $this->db->like('CONCAT(i.N_INFRACTOR, " ", i.A_INFRACTOR)', $valor);
                    }
                    break;
                
                case 'placa':
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                    if (!empty($valor)) {
                        $this->db->where('pl.PLACA', $valor);
                    }
                    break;
                
                case 'cedula':
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                    if (!empty($valor)) {
                        $this->db->where('i.C_INFRACTOR', $valor);
                    }
                    break;
                
                case 'telefono':
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                    
                    if (!empty($valor)) {
                        // Búsqueda flexible para teléfono
                        $this->db->group_start();
                        $this->db->like('i.T_INFRACTOR', $valor);
                        $this->db->group_end();
                    }
                    break;
                
                    case 'centro_detencion':
                        $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
                        $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                        $this->db->join('fecha_ingresos_cdit fic', 'p.ID_PROCESO = fic.ID_PROCESO'); // Cambiado a ID_PROCESO
                        $this->db->join('cdit cd', 'fic.ID_CDIT = cd.ID_CDIT');
                        
                        if (!empty($valor)) {
                            // Usamos where estricto para el ID del centro
                            $this->db->where('cd.ID_CDIT', $valor);
                            // Debug
                            error_log("Filtrando por centro_detencion, ID: " . $valor);
                        }
                        break;
                    
                default:
                    // Si no es ninguno de los tipos específicos, asegurar que la causa esté disponible
                    $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
                    $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
                    break;
            }
        } else {
            // Si no hay buscar_por específico, aún necesitamos estos joins para mostrar la causa
            $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
            $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
        }
        
        // Aplicar filtros de fecha
        if (!empty($fecha_inicio) && !empty($fecha_fin)) {
            if ($filtrar_fecha == 'registro') {
                $this->db->where('DATE(p.FECHA_REGISTRO) >=', $fecha_inicio);
                $this->db->where('DATE(p.FECHA_REGISTRO) <=', $fecha_fin);
                $this->db->order_by('p.FECHA_REGISTRO', 'DESC');
            } else {
                $this->db->join('fechas_procedimiento fp', 'p.ID_PROCESO = fp.ID_PROCESO', 'left');
                $this->db->where('DATE(fp.FECHA_PROCEDIMIENTO) >=', $fecha_inicio);
                $this->db->where('DATE(fp.FECHA_PROCEDIMIENTO) <=', $fecha_fin);
                $this->db->order_by('fp.FECHA_PROCEDIMIENTO', 'DESC');
            }
        } else {
            // Si no hay fechas, ordenar según el tipo de filtro seleccionado
            if ($filtrar_fecha == 'registro') {
                $this->db->order_by('p.FECHA_REGISTRO', 'DESC');
            } else {
                $this->db->join('fechas_procedimiento fp', 'p.ID_PROCESO = fp.ID_PROCESO', 'left');
                $this->db->order_by('fp.FECHA_PROCEDIMIENTO', 'DESC');
            }
        }
        
        // Evitar duplicados
        $this->db->group_by('p.ID_PROCESO');
        
        // Debug
        $query = $this->db->get();
        error_log("SQL Query: " . $this->db->last_query());
        
        return $query->result();
    }
    public function obtener_todos_procesos($filtrar_fecha, $fecha_inicio, $fecha_fin, $filtrar_resolucion = '') {
        // Consulta base
        $this->db->select('p.ID_PROCESO, i.N_INFRACTOR, i.A_INFRACTOR, i.C_INFRACTOR, 
                          pl.PLACA, c.CAUSA, i.ID_INFRACTOR, p.RESOLUCION');
        $this->db->from('procesos p');
        $this->db->join('infractores i', 'p.ID_INFRACTOR = i.ID_INFRACTOR');
        $this->db->join('placas pl', 'p.ID_PLACA = pl.ID_PLACA', 'left');
        $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR', 'left');
        $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA', 'left');
        
        // Aplicar filtro de resolución si existe
        if (!empty($filtrar_resolucion)) {
            $this->db->where('p.RESOLUCION', $filtrar_resolucion);
        }
        
        // Aplicar filtros de fecha si existen
        if (!empty($fecha_inicio) && !empty($fecha_fin)) {
            if ($filtrar_fecha == 'registro') {
                $this->db->where('DATE(p.FECHA_REGISTRO) >=', $fecha_inicio);
                $this->db->where('DATE(p.FECHA_REGISTRO) <=', $fecha_fin);
            } else {
                $this->db->join('fechas_procedimiento fp', 'p.ID_PROCESO = fp.ID_PROCESO', 'left');
                $this->db->where('DATE(fp.FECHA_PROCEDIMIENTO) >=', $fecha_inicio);
                $this->db->where('DATE(fp.FECHA_PROCEDIMIENTO) <=', $fecha_fin);
            }
        }
        
        // Ordenar por fecha
        if ($filtrar_fecha == 'registro') {
            $this->db->order_by('p.FECHA_REGISTRO', 'DESC');
        } else {
            $this->db->join('fechas_procedimiento fp', 'p.ID_PROCESO = fp.ID_PROCESO', 'left');
            $this->db->order_by('fp.FECHA_PROCEDIMIENTO', 'DESC');
        }
        
        // Limitar el número de resultados para evitar sobrecarga
        $this->db->limit(500);
        
        // Evitar duplicados
        $this->db->group_by('p.ID_PROCESO');
        
        // Ejecutar la consulta
        $query = $this->db->get();
        
        // Debug
        error_log("SQL Query para todos los procesos: " . $this->db->last_query());
        
        return $query->result();
    }
    public function obtener_por_id($tabla, $campo_id, $id, $campo_nombre) {
        $query = $this->db->select("$campo_nombre as nombre")
                          ->from($tabla)
                          ->where($campo_id, $id)
                          ->get();
        return $query->row();
    }
}