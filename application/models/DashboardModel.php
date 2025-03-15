<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {
    

    public function __construct() {
        parent::__construct();
        $this->load->database();

    }

    public function getDashboard() {
        $query = $this->db->query("SELECT * FROM tab_dashboard");
        return $query->result();
    }

    public function getDashboardById($id_dashboard) {
        $this->db->where('ID_DASHBOARD', $id_dashboard);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    public function getDashboardByUser($id_user) {
        $this->db->where('ID_USER', $id_user);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    public function obtener_procesos_por_mes($año) {
        // Inicializar con ceros para todos los meses (array de 12 elementos)
        $datos = array_fill(0, 12, 0);
        
        // Consulta para obtener el conteo de procesos por mes
        $this->db->select('MONTH(FECHA_REGISTRO) as mes, COUNT(*) as total');
        $this->db->from('procesos');
        $this->db->where('YEAR(FECHA_REGISTRO)', $año);
        $this->db->group_by('MONTH(FECHA_REGISTRO)');
        $resultados = $this->db->get()->result();
        
        // Llenar el array con los datos obtenidos
        foreach ($resultados as $fila) {
            // Restamos 1 porque los índices de array en JS empiezan en 0
            $datos[$fila->mes - 1] = (int)$fila->total;
        }
        
        return $datos;
    }
    public function obtener_procesos_por_distrito() {
        $this->db->select('d.NOMBRE_DISTRITO as distrito, COUNT(DISTINCT p.ID_PROCESO) as total');
        $this->db->from('procesos p');
        $this->db->join('causa_distrito_infractor_canton cdic', 'p.ID_INFRACTOR = cdic.ID_INFRACTOR');
        $this->db->join('distritos d', 'cdic.ID_DISTRITO = d.ID_DISTRITO');
        $this->db->group_by('d.ID_DISTRITO');
        $this->db->order_by('total', 'DESC');
        
        return $this->db->get()->result();
    }
    // En tu modelo DashboardModel.php

public function obtener_porcentajes_causas() {
    // Colores para las barras de progreso
    $colores = ['bg-danger', 'bg-warning', '', 'bg-info', 'bg-success'];
    
    // Obtener el total de procesos
    $total_procesos = $this->db->count_all('procesos');
    
    // Obtener conteo por causa
    $this->db->select('c.ID_CAUSA, c.CAUSA as nombre, COUNT(DISTINCT p.ID_PROCESO) as total');
    $this->db->from('causas c');
    $this->db->join('causa_distrito_infractor_canton cdic', 'c.ID_CAUSA = cdic.ID_CAUSA');
    $this->db->join('infractores i', 'cdic.ID_INFRACTOR = i.ID_INFRACTOR');
    $this->db->join('procesos p', 'i.ID_INFRACTOR = p.ID_INFRACTOR');
    $this->db->group_by('c.ID_CAUSA');
    $this->db->order_by('total', 'DESC');
    $this->db->limit(5); // Mostrar solo las 5 causas más comunes
    
    $resultados = $this->db->get()->result();
    
    // Calcular porcentajes
    foreach ($resultados as $index => $causa) {
        $causa->porcentaje = ($total_procesos > 0) ? round(($causa->total / $total_procesos) * 100) : 0;
        $causa->color = $colores[$index % count($colores)];
    }
    
    return $resultados;
}

public function obtener_porcentajes_pruebas() {
    // Colores para las barras de progreso
    $colores = ['bg-success', 'bg-info', '', 'bg-warning', 'bg-danger'];
    
    // Obtener el total de pruebas
    $total_pruebas = $this->db->count_all('pruebas');
    
    // Obtener conteo por tipo de prueba
    $this->db->select('tp.ID_TIPO_PRUEBA, tp.NOMBRE_PRUEBA as nombre, COUNT(pr.ID_PRUEBA) as total');
    $this->db->from('tipo_pruebas tp');
    $this->db->join('pruebas pr', 'tp.ID_TIPO_PRUEBA = pr.ID_TIPO_PRUEBA');
    $this->db->group_by('tp.ID_TIPO_PRUEBA');
    $this->db->order_by('total', 'DESC');
    $this->db->limit(5); // Mostrar solo los 5 tipos de prueba más comunes
    
    $resultados = $this->db->get()->result();
    
    // Calcular porcentajes
    foreach ($resultados as $index => $prueba) {
        $prueba->porcentaje = ($total_pruebas > 0) ? round(($prueba->total / $total_pruebas) * 100) : 0;
        $prueba->color = $colores[$index % count($colores)];
    }
    
    return $resultados;
}
}