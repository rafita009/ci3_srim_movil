<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReadController extends CI_Controller
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

       
            // Obtener ID del usuario desde la sesión
            $id_usuario = $this->session->userdata('id_usuario');
            $user_details = $this->UsersModel->get_user_by_id($id_usuario);
        
            // Obtener los datos del infractor almacenados en la sesión
            $detalle_infractor = $this->session->userdata('detalle_infractor');
        
            // Preparar los datos para la vista
            $data = [
                'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo
                'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png', // Foto del usuario o predeterminada
                'infractor' => isset($detalle_infractor['infractor']) ? $detalle_infractor['infractor'] : null,
                'act_procede' => isset($detalle_infractor['act_procede']) ? $detalle_infractor['act_procede'] : null,
                'placas' => isset($detalle_infractor['placas']) ? $detalle_infractor['placas'] : null,
                'tipo_placa' => isset($detalle_infractor['tipo_placa']) ? $detalle_infractor['tipo_placa'] : null,
                'causas_distrito_infractor_canton' => isset($detalle_infractor['causas_distrito_infractor_canton']) ? $detalle_infractor['causas_distrito_infractor_canton'] : null,
                'pruebas' => isset($detalle_infractor['pruebas']) ? $detalle_infractor['pruebas'] : null,
                'fecha_procedimiento' => isset($detalle_infractor['fecha_procedimiento']) ? $detalle_infractor['fecha_procedimiento'] : null,
                'fecha_hora_entrada_vm' => isset($detalle_infractor['fecha_hora_entrada_vm']) ? $detalle_infractor['fecha_hora_entrada_vm'] : null,
                'ruta_foto' => isset($detalle_infractor['ruta_foto']) ? $detalle_infractor['ruta_foto'] : null,
                'fotos_pertenencias' => isset($detalle_infractor['fotos_pertenencias']) ? $detalle_infractor['fotos_pertenencias'] : null,
                'fecha_hora_salida_vm' => isset($detalle_infractor['fecha_hora_salida_vm']) ? $detalle_infractor['fecha_hora_salida_vm'] : null,
                'comentarios' => isset($detalle_infractor['comentarios']) ? $detalle_infractor['comentarios'] : null,
                'archivos_libertad' => isset($detalle_infractor['archivos_libertad']) ? $detalle_infractor['archivos_libertad'] : null,
                'datos_cdit' => isset($detalle_infractor['datos_cdit']) ? $detalle_infractor['datos_cdit'] : null,
                'archivos_detencion' => isset($detalle_infractor['archivos_detencion']) ? $detalle_infractor['archivos_detencion'] : null
            ];
        
            // Cargar la vista y enviar los datos
            $this->load->view('readdatos', $data);
        }

    }