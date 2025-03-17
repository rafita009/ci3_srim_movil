<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CausasController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
        $this->load->helper('notificaciones');
        $this->load->model('CausasModel');
        $this->load->model('UsersModel');
        $this->load->model('RolesModel');
        
        
        
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
        $eliminados = $this->CausasModel->getCausasEliminadas();

       
        $data = [
            'titulo' => 'Causas',
            'datos' => $this->CausasModel->getCausasActivas(),
            'eliminados' => $eliminados,
            'id_usuario' => $id_usuario,
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png'
        ];
        
        $this->load->view('causas/causas', $data);
    }

   
    public function insertar()
    {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
       
        $causa = $this->input->post('causa');
       
        // Validar que el campo no esté vacío
        if(empty($causa)) {
            $response = array(
                'success' => false,
                'message' => 'El campo causa es obligatorio'
            );
            echo json_encode($response);
            return;
        }
       
        // Verificar si la causa ya existe
        if(!$this->CausasModel->existeCausa($causa)) {
            if($this->CausasModel->agregarCausa($causa)) {
                $gestores = $this->UsersModel->get_usuarios_por_rol('gestor');

                // Enviar notificación a cada gestor
                foreach ($gestores as $gestor) {
                    crear_notificacion(
                        $gestor->ID_USUARIO,
                        'Nuevo Causa Registrada',
                        'Se ha añadido un nueva Causa: ' . $causa,
                        'success',
                        null
                    );
                }
                $response = array(
                    'success' => true,
                    'message' => 'Causa guardada correctamente'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error al guardar la causa'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'La causa ya existe en la base de datos'
            );
        }
       
        echo json_encode($response);
    }

    public function obtener_causa($id) {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
    
        // Obtener la causa
        $causa = $this->CausasModel->getCausaById($id);
        
        if ($causa) {
            $response = array(
                'success' => true,
                'data' => $causa
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'No se encontró la causa'
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
           
            $id = $this->input->post('id_causa');
            $causa = $this->input->post('causa');
           
            // Validar que los campos no estén vacíos
            if(empty($id) || empty($causa)) {
                $response = array(
                    'success' => false,
                    'message' => 'El campo Causa no puede estar vacío'
                );
                echo json_encode($response);
                return;
            }
           
            if (!$this->CausasModel->existeCausa($causa, $id)) {
                if ($this->CausasModel->actualizarCausa($id, $causa)) {
                    $response = array(
                        'success' => true,
                        'message' => 'Causa actualizada correctamente'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Error al actualizar la causa'
                    );
                }
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'La causa ya existe'
                );
            }
           
            echo json_encode($response);
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