<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busquedamodel extends CI_Model {
    
    
    
    public function buscar($buscar_por, $valor, $filtrar_fecha, $fecha_inicio, $fecha_fin) {
        if ($filtrar_fecha == 'registro') {
            // Búsqueda por fecha de registro
            $this->db->select('p.ID_PROCESO,
                              i.N_INFRACTOR,
                              i.A_INFRACTOR,
                              i.C_INFRACTOR,
                              pl.PLACA,
                              c.CAUSA,
                              i.ID_INFRACTOR');
            $this->db->from('procesos p');
            $this->db->join('infractores i', 'p.ID_INFRACTOR = i.ID_INFRACTOR');
            $this->db->join('placas pl', 'p.ID_PLACA = pl.ID_PLACA');
            $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR');
            $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA');
            
            if (!empty($fecha_inicio) && !empty($fecha_fin)) {
                $this->db->where('DATE(p.FECHA_REGISTRO) >=', $fecha_inicio);
                $this->db->where('DATE(p.FECHA_REGISTRO) <=', $fecha_fin);
            }
        } else {
            // Búsqueda por fecha de procedimiento
            $this->db->select('p.ID_PROCESO,
                              i.N_INFRACTOR,
                              i.A_INFRACTOR,
                              i.C_INFRACTOR,
                              pl.PLACA,
                              c.CAUSA,
                              i.ID_INFRACTOR');
            $this->db->from('procesos p');
            $this->db->join('infractores i', 'p.ID_INFRACTOR = i.ID_INFRACTOR');
            $this->db->join('placas pl', 'p.ID_PLACA = pl.ID_PLACA');
            $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR');
            $this->db->join('causas c', 'cdic.ID_CAUSA = c.ID_CAUSA');
            $this->db->join('fechas_procedimiento fp', 'p.ID_PROCESO = fp.ID_PROCESO');
            
            if (!empty($fecha_inicio) && !empty($fecha_fin)) {
                $this->db->where('DATE(fp.FECHA_PROCEDIMIENTO) >=', $fecha_inicio);
                $this->db->where('DATE(fp.FECHA_PROCEDIMIENTO) <=', $fecha_fin);
            }
        }
        
        // Aplicar filtros adicionales según el criterio de búsqueda
            switch($buscar_por) {
                case 'distrito':
                    // No necesitas volver a hacer JOIN con causa_distrito_infractor_canton
                    $this->db->join('distritos d', 'cdic.ID_DISTRITO = d.ID_DISTRITO');
                    $this->db->where('d.ID_DISTRITO', $valor);
                    break;
                
                case 'canton':
                    // No necesitas volver a hacer JOIN con causa_distrito_infractor_canton
                    $this->db->join('cantones c2', 'cdic.ID_CANTON = c2.ID_CANTON');
                    $this->db->where('c2.ID_CANTON', $valor);
                    break;
                
                case 'causa':
                    // No necesitas estos JOINs porque ya están en la consulta base
                    $this->db->where('c.ID_CAUSA', $valor);
                    break;
                
                case 'tipo_prueba':
                    $this->db->join('pruebas pr', 'p.ID_INFRACTOR = pr.ID_INFRACTOR');
                    $this->db->join('tipo_pruebas tp', 'pr.ID_TIPO_PRUEBA = tp.ID_TIPO_PRUEBA');
                    $this->db->where('tp.ID_TIPO_PRUEBA', $valor);
                    break;
                
                case 'nombre_apellido':
                    // No necesitas este JOIN porque ya está en la consulta base
                    $this->db->like('CONCAT(i.N_INFRACTOR, " ", i.A_INFRACTOR)', $valor);
                    break;
                
                case 'placa':
                    // No necesitas este JOIN porque ya está en la consulta base
                    $this->db->where('pl.PLACA', $valor);
                    break;
                
                case 'cedula':
                    // No necesitas este JOIN porque ya está en la consulta base
                    $this->db->where('i.C_INFRACTOR', $valor);
                    break;
                
                case 'telefono':
                    // No necesitas este JOIN porque ya está en la consulta base
                    $this->db->where('i.T_INFRACTOR', $valor);
                    break;
                
                case 'centro_detencion':
                    $this->db->join('fecha_ingresos_cdit fic', 'p.ID_INFRACTOR = fic.ID_INFRACTOR');
                    $this->db->join('cdit cd', 'fic.ID_CDIT = cd.ID_CDIT');
                    $this->db->like('cd.NOMBRE_CDIT', $valor);
                    break;
            }
        
        // Ordenar por fecha según el tipo de filtro
        if ($filtrar_fecha == 'registro') {
            $this->db->order_by('p.FECHA_REGISTRO', 'DESC');
        } else {
            $this->db->order_by('fp.FECHA_PROCEDIMIENTO', 'DESC');
        }
        
        return $this->db->get()->result();
    }
}