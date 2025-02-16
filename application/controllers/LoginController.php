<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('RolesModel'); // Carga el modelo de Usuario


    }

    public function index() {
        $this->load->view('login');
    }

    public function validar()
    {
        // Recibir datos del formulario
        $username = $this->input->post('user');
        $password = $this->input->post('contrasena');

        // Validar que los campos no estén vacíos
        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Debe ingresar usuario y contraseña.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Buscar el usuario en la base de datos
        $usuario_data = $this->UsersModel->get_user_by_username($username);

        if (!$usuario_data) {
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Verificar la contraseña
        if (!password_verify($password, $usuario_data['PASSWORD'])) {
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Verificar si el usuario está activo
        if ($usuario_data['ESTADO'] !== 'AC') {
            $this->session->set_flashdata('error', 'El usuario está inactivo.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Obtener el rol del usuario
        $rol_data = $this->RolesModel->get_rol_by_usuario_id($usuario_data['ID_USUARIO']);

        if (!$rol_data || !isset($rol_data['ROL'])) {
            $this->session->set_flashdata('error', 'Rol no asignado. Comuníquese con soporte.');
            redirect('logincontroller'); // Redirigir al formulario de login
            return;
        }

        // Guardar los datos del usuario en la sesión
        $rol = $rol_data['ROL']; // Ejemplo: "administrador"
        $estado = $usuario_data['ESTADO']; // Obtener el estado del usuario

        $this->session->set_userdata([
            'logged_in' => TRUE, // Indica que el usuario está logueado 
            'id_usuario' => $usuario_data['ID_USUARIO'],
            'usuario' => $usuario_data['USUARIO'],
            'rol' => $rol, // Aquí almacenamos el nombre del rol
            'estado' => $estado // Aquí almacenamos el estado del usuario
        ]);

        // Redirigir según el rol del usuario
        switch ($rol) {
            case 'administrador':
                redirect('dashboardcontroller/admin');
                break;
            case 'usuario':
                redirect('dashboardcontroller/usuario');
                break;
            default:
                $this->session->set_flashdata('error', 'Rol no asignado. Comuníquese con soporte.');
                redirect('logincontroller');
                break;
        }

            }
            


    public function logout() {
        $this->session->sess_destroy();
        redirect('logincontroller');
    }
}