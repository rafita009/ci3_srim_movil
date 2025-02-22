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

       
        }

    }