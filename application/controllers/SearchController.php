<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SearchController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
        $this->load->model('ProcesosModel'); // Carga el modelo de Procesos
        $this->load->model('UsersModel'); // Carga el modelo de Usuario
        $this->load->model('ValidatesModel');
        $this->load->model('RolesModel');
        $this->load->model('PersonasModel');
        $this->load->model('SearchModel');
        $this->load->model('BusquedaModel');
         // Verificar si el usuario está logueado
         if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('logincontroller'); // Redirige al login si no está autenticado
        }

        // Obtener los datos del usuario desde la sesión
        $this->usuario_id = $this->session->userdata('ID_USUARIO');
        $this->usuario = $this->session->userdata('USUARIO');
        $this->estado = $this->session->userdata('ESTADO');
        $this->rol = $this->session->userdata('ROL');
        
    }
    public function index()
    {
        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);
        
        $data = [
            'usuario' => isset($user_details['NOMBRES']) ? $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'] : 'Usuario desconocido',
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png',
            'resultados' => []
        ];
    
       // Si hay parámetros de búsqueda
     if($this->input->get('buscar_por')) {
        // Validar y obtener parámetros
        $buscar_por = $this->input->get('buscar_por');
        $valor = $this->input->get('seleccion_db') ?: $this->input->get('valor_busqueda');
        $filtrar_fecha = $this->input->get('filtrar_fecha');
        $fecha_inicio = $this->input->get('fecha_inicio');
        $fecha_fin = $this->input->get('fecha_fin');

        // Validaciones básicas
        if(!empty($buscar_por) && (!empty($valor) || ($fecha_inicio && $fecha_fin))) {
            $data['resultados'] = $this->BusquedaModel->buscar(
                $buscar_por,
                $valor,
                $filtrar_fecha,
                $fecha_inicio,
                $fecha_fin
            );
        }
    }

    // Determinar qué vista cargar
    if($this->input->is_ajax_request()) {
        // Para peticiones AJAX, solo devolver la tabla
        $this->load->view('admin/_partials/tab_results', $data);
    } else {
        // Para peticiones normales, cargar la vista completa
        $this->load->view('search', $data);
    }
    }
    
    public function detalle($id_proceso) {
        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);
    
        // Obtener el proceso
        $proceso = $this->SearchModel->obtener_proceso($id_proceso);
        
        if (!$proceso) {
            show_error('Proceso no encontrado');
            return;
        }
    
        // Preparar array de datos usando id_proceso en lugar de id_infractor
        $data = [
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png',
            
            // Datos del proceso
            'proceso' => $proceso,
            
            // Datos del infractor (este sí usa ID_INFRACTOR del proceso)
            'infractor' => $this->SearchModel->obtener_infractor($proceso['ID_INFRACTOR']),
            
            // El resto de consultas deberían usar id_proceso
            'act_procede' => $this->SearchModel->obtener_act_procede($id_proceso),
            'placas' => $this->SearchModel->obtener_placas($id_proceso),
            'tipo_placa' => $this->SearchModel->obtener_tipo_placa($id_proceso),
            'ruta_foto' => $this->SearchModel->obtener_foto_infractor($proceso['ID_INFRACTOR']),
            'causas_distrito_infractor_canton' => $this->SearchModel->obtener_causa_distrito($id_proceso),
            'pruebas' => $this->SearchModel->obtener_pruebas($id_proceso),
            'fecha_procedimiento' => $this->SearchModel->obtener_fechas_procedimiento($id_proceso),
            'fecha_hora_entrada_vm' => $this->SearchModel->obtener_fecha_hora_entrada($id_proceso),
            'fotos_pertenencias' => $this->SearchModel->obtener_fotos_pertenencias($id_proceso),
            'fecha_hora_salida_vm' => $this->SearchModel->obtener_fecha_hora_salida($id_proceso),
            'comentarios' => $this->SearchModel->obtener_comentarios($id_proceso),
            'archivos_libertad' => $this->SearchModel->obtener_archivos_libertad($id_proceso),
            'datos_cdit' => $this->SearchModel->obtener_datos_cdit($id_proceso),
            'archivos_detencion' => $this->SearchModel->obtener_archivos_detencion($id_proceso)
        ];
    
        if (!$data['infractor']) {
            show_error('Infractor no encontrado');
            return;
        }
    
        $this->load->view('readdatos', $data);
    }
    public function procesos_tabla() 
    {

         // Obtener el ID del usuario desde la sesión
    $id_usuario = $this->session->userdata('id_usuario');

    // Obtener detalles del usuario desde el modelo
    $user_details = $this->UsersModel->get_user_by_id($id_usuario);
    $infractores = $this->ProcesosModel->get_all_infractores();

    // Obtener los resultados de la tabla de procesos desde el modelo
   // $resultados = $this->SearchModel->procesos_tabla();
     // Obtener procesos para cada infractor (incluyendo los que no tienen)
     $asociados = [];
     foreach ($infractores as $infractor) {
         $asociados[$infractor['ID_INFRACTOR']] = $this->ProcesosModel->obtenerProcesoscompletos($infractor['ID_INFRACTOR']) ?? []; // Si no tiene procesos, asignar un array vacío
     }

    // Preparar los datos para la vista
    $data = [
        'usuario' => isset($user_details['NOMBRES']) ? $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'] : 'Usuario desconocido', // Nombre completo
        'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png', // Foto del usuario o predeterminada
        'infractores' => $infractores, // Lista de infractores
        'asociados' => $asociados // Procesos asociados a cada infractor
        ];

    // Cargar la vista con los datos
    $this->load->view('admin/tab_procesos', $data); // Vista con la tabla de procesos
       
    }
    
    public function get_opciones() {
        header('Content-Type: application/json');
        
        $tipo = $this->input->get('tipo');
        $opciones = [];
        
        try {
            switch($tipo) {
                case 'distrito':
                    $opciones = $this->db->select('ID_DISTRITO as id, NOMBRE_DISTRITO as nombre')
                                       ->from('distritos')
                                       ->get()
                                       ->result();
                    break;
                case 'canton':
                    $opciones = $this->db->select('ID_CANTON as id, NOMBRE_CANTON as nombre')
                                       ->from('cantones')
                                       ->get()
                                       ->result();
                    break;
                case 'causa':
                    $opciones = $this->db->select('ID_CAUSA as id, CAUSA as nombre')
                                       ->from('causas')
                                       ->get()
                                       ->result();
                    break;
                case 'tipo_prueba':
                    $opciones = $this->db->select('ID_TIPO_PRUEBA as id, NOMBRE_PRUEBA as nombre')
                                       ->from('tipo_pruebas ')
                                       ->get()
                                       ->result();
                    break;
                case 'centro_detencion':
                    $opciones = $this->db->select('ID_CDIT as id, NOMBRE_CDIT as nombre')
                                       ->from('cdit')
                                       ->get()
                                       ->result();
                    break;
                default:
                    $opciones = [];
            }
            
            echo json_encode(['status' => 'success', 'data' => $opciones]);
            
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Error al cargar las opciones']);
        }
    }
    
    
}