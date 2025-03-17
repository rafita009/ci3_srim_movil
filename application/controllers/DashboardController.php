<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('UsersModel'); // Cargar el modelo una vez
        $this->load->model('DashboardModel');
            
    
          // Verificar si el usuario está logueado
          if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('loginController'); // Redirige al login si no está autenticado
        }

        // Obtener los datos del usuario desde la sesión
        $this->usuario_id = $this->session->userdata('ID_USUARIO');
        $this->usuario = $this->session->userdata('USUARIO');
        $this->estado = $this->session->userdata('ESTADO');
        $this->rol = $this->session->userdata('ROL');
       
    }
    
        public function all() {
             // Verificar el rol del usuario desde la sesión
    $rol = $this->session->userdata('rol');
    
    // Comprobar si el usuario es un administrador o gestor
    if ($rol !== 'administrador' && $rol !== 'gestor') {
        show_error('No tienes permiso para acceder a esta página.', 403);
    }

    // Obtener los detalles del usuario desde el modelo
    $id_usuario = $this->session->userdata('id_usuario');
    $user_details = $this->UsersModel->get_user_by_id($id_usuario);
    $procesos_ultimo_mes = $this->UsersModel->contar_procesos_ultimo_mes();
    $procesos_mes_actual = $this->UsersModel->contar_procesos_mes_actual();
    $relacion_detencion_libertad = $this->UsersModel->obtener_relacion_detencion_libertad();
    $total_infractores = $this->UsersModel->contar_total_infractores();
     // Obtener el año actual
     $año_actual = date('Y');
    
     // Obtener datos de procesos por mes
     $datos_por_mes = $this->DashboardModel->obtener_procesos_por_mes($año_actual);
      // Obtener datos para el gráfico de distritos
    $procesos_por_distrito = $this->DashboardModel->obtener_procesos_por_distrito();
     // Obtener causas con porcentajes
     $causas_porcentajes = $this->DashboardModel->obtener_porcentajes_causas();
    
     // Obtener tipos de prueba con porcentajes
     $pruebas_porcentajes = $this->DashboardModel->obtener_porcentajes_pruebas();

    // Preparar los datos para la vista
    $data = [
        'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo
        'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png', // Foto del usuario o predeterminada
        'procesos_ultimo_mes' => $procesos_ultimo_mes,
        'procesos_mes_actual' => $procesos_mes_actual,
        'relacion_detencion_libertad' => $relacion_detencion_libertad,
        'total_infractores' => $total_infractores,
        'datos' => $datos_por_mes,
        'año' => $año_actual,
        'distritos' => $procesos_por_distrito,
        'causas_porcentajes' => $causas_porcentajes,
        'pruebas_porcentajes' => $pruebas_porcentajes

    ];
    

    // Cargar la vista y pasar los datos
    $this->load->view('admin/dashboard', $data);
          
        }
        
    
     public function reports() {
         // Obtener los detalles del usuario desde el modelo
    $id_usuario = $this->session->userdata('id_usuario');
    $user_details = $this->UsersModel->get_user_by_id($id_usuario);
     // Obtener datos para la visualización inicial
     $datos = $this->obtener_estadisticas_procedimientos(true); 
     $total_procedimientos = $this->DashboardModel->obtener_total_procedimientos();
        $data = [
        'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo
        'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png',
        'datos' => $datos,
        'total_procedimientos' => $total_procedimientos
    ];
        $this->load->view('reports', $data);
     }
    
  /**
 * Obtiene estadísticas de procedimientos para mostrar en gráficos
 * 
 * @param bool $return_data Si es true, devuelve los datos en lugar de enviar respuesta JSON
 * @return array|void Datos de estadísticas si $return_data es true
 */
public function obtener_estadisticas_procedimientos($return_data = false) {
    // Por defecto, usar datos para el año actual y vista mensual
    $tipo_vista = 'meses';
    $anio = date('Y');
    $mes = date('m');
    
    if (!$return_data) {
        // Si se llama vía AJAX, obtener parámetros de la solicitud
        $tipo_vista = $this->input->get('tipo') ?: 'meses';
        $anio = $this->input->get('anio') ?: date('Y');
        $mes = $this->input->get('mes') ?: date('m');
    }
    
    $resultado = [];
    
    // Intentar obtener datos reales de la base de datos
    try {
        if ($tipo_vista == 'meses') {
            // Consulta para datos mensuales
            $this->db->select("
                MONTH(fp.FECHA_PROCEDIMIENTO) as mes, 
                COUNT(fp.ID_FECHA_PROCEDIMIENTO) as total,
                SUM(CASE WHEN p.RESOLUCION = 'Libertad' THEN 1 ELSE 0 END) as libertad,
                SUM(CASE WHEN p.RESOLUCION = 'Detencion' THEN 1 ELSE 0 END) as detencion", 
                false);
            $this->db->from('fechas_procedimiento fp');
            $this->db->join('procesos p', 'fp.ID_PROCESO = p.ID_PROCESO', 'left');
            $this->db->where('YEAR(fp.FECHA_PROCEDIMIENTO)', $anio);
            $this->db->group_by('MONTH(fp.FECHA_PROCEDIMIENTO)');
            $this->db->order_by('MONTH(fp.FECHA_PROCEDIMIENTO)', 'ASC');
            
            $query = $this->db->get();
            $datos = $query->result_array();
            
            // Formatear los datos para el gráfico
            foreach ($datos as $dato) {
                $mes_num = $dato['mes'];
                $nombre_mes = $this->obtener_nombre_mes($mes_num);
                
                $resultado[] = [
                    'periodo' => $nombre_mes,
                    'total' => (int)$dato['total'],
                    'libertad' => (int)$dato['libertad'],
                    'detencion' => (int)$dato['detencion']
                ];
            }
        } else {
            // Consulta para datos diarios
            $this->db->select("
                DAY(fp.FECHA_PROCEDIMIENTO) as dia, 
                COUNT(fp.ID_FECHA_PROCEDIMIENTO) as total,
                SUM(CASE WHEN p.RESOLUCION = '1' THEN 1 ELSE 0 END) as libertad,
                SUM(CASE WHEN p.RESOLUCION = '2' THEN 1 ELSE 0 END) as detencion", 
                false);
            $this->db->from('fechas_procedimiento fp');
            $this->db->join('procesos p', 'fp.ID_PROCESO = p.ID_PROCESO');
            $this->db->where('YEAR(fp.FECHA_PROCEDIMIENTO)', $anio);
            $this->db->where('MONTH(fp.FECHA_PROCEDIMIENTO)', $mes);
            $this->db->group_by('DAY(fp.FECHA_PROCEDIMIENTO)');
            $this->db->order_by('DAY(fp.FECHA_PROCEDIMIENTO)', 'ASC');
            
            $query = $this->db->get();
            $datos = $query->result_array();
            
            // Formatear los datos para el gráfico
            foreach ($datos as $dato) {
                $resultado[] = [
                    'periodo' => 'Día ' . $dato['dia'],
                    'total' => (int)$dato['total'],
                    'libertad' => (int)$dato['libertad'],
                    'detencion' => (int)$dato['detencion']
                ];
            }
        }
    } catch (Exception $e) {
        log_message('error', 'Error al consultar estadísticas: ' . $e->getMessage());
        // Usar datos vacíos en caso de error
        $resultado = [];
    }
    
    // Si no hay resultados, usar datos de ejemplo
    if (empty($resultado)) {
        if ($tipo_vista == 'meses') {
            $resultado = [
                ['periodo' => 'Enero', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Febrero', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Marzo', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Abril', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Mayo', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Junio', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Julio', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Agosto', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Septiembre', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Octubre', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Noviembre', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Diciembre', 'total' => 0, 'libertad' => 0, 'detencion' => 0]
            ];
        } else {
            // Datos diarios de ejemplo
            $resultado = [
                ['periodo' => 'Día 1', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Día 2', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                ['periodo' => 'Día 3', 'total' => 0, 'libertad' => 0, 'detencion' => 0],
                // Puedes añadir más días según sea necesario
            ];
        }
    }
    
    // Si se pidió retornar los datos, devolver el array
    if ($return_data) {
        return $resultado;
    }
    
    // De lo contrario, enviar como respuesta JSON (para AJAX)
    header('Content-Type: application/json');
    echo json_encode($resultado);
}

/**
 * Convierte un número de mes en su nombre correspondiente
 *
 * @param int $numero_mes Número del mes (1-12)
 * @return string Nombre del mes
 */
private function obtener_nombre_mes($numero_mes) {
    $meses = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];
    
    return isset($meses[$numero_mes]) ? $meses[$numero_mes] : '';
}
}