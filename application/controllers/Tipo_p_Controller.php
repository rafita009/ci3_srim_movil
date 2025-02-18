<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_p_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
        $this->load->model('UsersModel');
        $this->load->model('RolesModel');
        $this->load->model('tipo_p_Model');
        
        
        
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('logincontroller/index');
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
            'titulo' => 'Tipos de Pruebas',
            'datos' => $this->tipo_p_Model->getTiposPruebaActivas(),
            'id_usuario' => $id_usuario,
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png'
        ];
        
        $this->load->view('tipo_prueba/tipo_prueba', $data);
    }

   
    public function insertar()
    {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
    
        $tipo_prueba = $this->input->post('tipo_prueba');
    
        // Validar que el campo no esté vacío
        if(empty($tipo_prueba)) {
            $response = array(
                'success' => false,
                'message' => 'El campo tipo de prueba es obligatorio'
            );
            echo json_encode($response);
            return;
        }
    
        // Verificar si el tipo de prueba ya existe
        if(!$this->tipo_p_Model->existeTipoPrueba($tipo_prueba)) {
            if($this->tipo_p_Model->agregarTipoPrueba($tipo_prueba)) {
                $response = array(
                    'success' => true,
                    'message' => 'Tipo de prueba guardado correctamente'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error al guardar el tipo de prueba'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'El tipo de prueba ya existe en la base de datos'
            );
        }
    
        echo json_encode($response);
    }

    public function obtener_tipo_prueba($id) 
    {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
    
        // Obtener el tipo de prueba
        $tipo_prueba = $this->tipo_p_Model->getTipoPruebaById($id);
        
        if ($tipo_prueba) {
            $response = array(
                'success' => true,
                'data' => $tipo_prueba
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'No se encontró el tipo de prueba'
            );
        }
    
        echo json_encode($response);
    }

        // Función para procesar la actualización
    public function actualizar()
    {
            // Validar que sea una petición AJAX
            if (!$this->input->is_ajax_request()) {
                show_404();
            }
           
            $id = $this->input->post('id_tipo_prueba');
            $tipo_prueba = $this->input->post('tipo_prueba');
           
            // Validar que los campos no estén vacíos
            if(empty($id) || empty($tipo_prueba)) {
                $response = array(
                    'success' => false,
                    'message' => 'El campo Tipo de Prueba no puede estar vacío'
                );
                echo json_encode($response);
                return;
            }
           
            if (!$this->tipo_p_Model->existeTipoPrueba($tipo_prueba, $id)) {
                if ($this->tipo_p_Model->actualizarTipoPrueba($id, $tipo_prueba)) {
                    $response = array(
                        'success' => true,
                        'message' => 'Tipo de Prueba actualizado correctamente'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Error al actualizar el Tipo de Prueba'
                    );
                }
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'El Tipo de Prueba ya existe'
                );
            }
           
            echo json_encode($response);
    }
        
    public function eliminados()
    {
   

        // Obtener los detalles del usuario desde el modelo
        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);
        
        $data = [
            'titulo' => 'Causas eliminadas',
            'datos' => $this->CausasModel->getCausasEliminadas(),
            'id_usuario' => $id_usuario,
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png'
        ];
        
        $this->load->view('causas/eliminados', $data);
    }
    public function eliminar($id)
    {
        $this->CausasModel->eliminarCausa($id);
        $this->session->set_flashdata('success', 'Causa eliminada correctamente');
        redirect('CausasController/index');
    }

    public function reactivar($id)
    {
        $this->CausasModel->reactivarCausa($id);
        $this->session->set_flashdata('success', 'Causa reactivada correctamente');
        redirect('CausasController/index');
    }
}