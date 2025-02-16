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
    
    // Método para mostrar los detalles de un proceso
    public function detalle($id_infractor) {
        // Obtener los datos del infractor y sus procesos asociados
        $data['infractor'] = $this->SearchModel->obtener_infractor($id_infractor);
        $data['act_procede'] = $this->SearchModel->obtener_act_procede($id_infractor);
        $data['placas'] = $this->SearchModel->obtener_placas($id_infractor);
        $data['tipo_placa'] = $this->SearchModel->obtener_tipo_placa($id_infractor);
        $data['ruta_foto'] = $this->SearchModel->obtener_foto_infractor($id_infractor);
        $data['causas_distrito_infractor_canton'] = $this->SearchModel->obtener_causa_distrito($id_infractor);
        $data['pruebas'] = $this->SearchModel->obtener_pruebas($id_infractor);
        $data['fecha_procedimiento'] = $this->SearchModel->obtener_fechas_procedimiento($id_infractor);
        $data['fecha_hora_entrada_vm'] = $this->SearchModel->obtener_fecha_hora_entrada($id_infractor);
        $data['fotos_pertenencias'] = $this->SearchModel->obtener_fotos_pertenencias($id_infractor);
        $data['fecha_hora_salida_vm'] = $this->SearchModel->obtener_fecha_hora_salida($id_infractor);
        $data['comentarios'] = $this->SearchModel->obtener_comentarios($id_infractor);
        $data['archivos_libertad'] = $this->SearchModel->obtener_archivos_libertad($id_infractor);
        $data['datos_cdit'] = $this->SearchModel->obtener_datos_cdit($id_infractor);
        $data['archivos_detencion'] = $this->SearchModel->obtener_archivos_detencion($id_infractor);

        // Guardar los datos en la sesión para pasarlos al otro controlador (opcional)
        $this->session->set_userdata('detalle_infractor', $data);
    
        // Redirigir a otro controlador y método    
        redirect('ReadController/index');
    }
    public function procesos_tabla() {
         // Obtener el ID del usuario desde la sesión
    $id_usuario = $this->session->userdata('id_usuario');

    // Obtener detalles del usuario desde el modelo
    $user_details = $this->UsersModel->get_user_by_id($id_usuario);

    // Obtener los resultados de la tabla de procesos desde el modelo
    $resultados = $this->SearchModel->procesos_tabla();

    // Preparar los datos para la vista
    $data = [
        'usuario' => isset($user_details['NOMBRES']) ? $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'] : 'Usuario desconocido', // Nombre completo
        'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png', // Foto del usuario o predeterminada
        'resultados' => $resultados // Resultados de la tabla de procesos
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