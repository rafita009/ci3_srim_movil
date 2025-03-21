<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_p_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->model('UsersModel');
        $this->load->helper('url');
        $this->load->helper('notificaciones');
        $this->load->model('RolesModel');
        $this->load->model('Tipo_p_Model');
        
        
        
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
        $eliminados = $this->Tipo_p_Model->getTiposPruebaEliminadas();

       
        $data = [
            'titulo' => 'Tipos de Pruebas',
            'datos' => $this->Tipo_p_Model->getTiposPruebaActivas(),
            'eliminados' => $eliminados,
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
        if(!$this->Tipo_p_Model->existeTipoPrueba($tipo_prueba)) {
            if($this->Tipo_p_Model->agregarTipoPrueba($tipo_prueba)) {
                $gestores = $this->UsersModel->get_usuarios_por_rol('gestor');

                // Enviar notificación a cada gestor
                foreach ($gestores as $gestor) {
                    crear_notificacion(
                        $gestor->ID_USUARIO,
                        'Nueva Prueba agregada',
                        'Se ha añadido la prueba: ' . $tipo_prueba,
                        'success',
                        null
                    );
                }
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
        $tipo_prueba = $this->Tipo_p_Model->getTipoPruebaById($id);
        
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
           
            if (!$this->Tipo_p_Model->existeTipoPrueba($tipo_prueba, $id)) {
                if ($this->Tipo_p_Model->actualizarTipoPrueba($id, $tipo_prueba)) {
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
        
   
    public function eliminar($id)
    {
        $this->Tipo_p_Model->eliminartipo_prueba($id);
        $this->session->set_flashdata('success', 'Tipo de Prueba eliminada correctamente');
        redirect('Tipo_p_Controller/index');
    }

    public function reactivar($id)
    {
        $this->Tipo_p_Model->reactivartipo_prueba($id);
        $this->session->set_flashdata('success', 'Tipo de Prueba reactivada correctamente');
        redirect('Tipo_p_Controller/index');
    }
}