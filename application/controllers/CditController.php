<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CditController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
        $this->load->model('CditModel');
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
        $eliminados = $this->CditModel->getCditEliminados();

       
        $data = [
            'titulo' => 'Centros de detencion',
            'datos' => $this->CditModel->getCdiTActivos(),
            'eliminados' => $eliminados,
            'id_usuario' => $id_usuario,
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png'
        ];
        
        $this->load->view('cdit/cdit', $data);
    }

   
    public function insertar()
    {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
       
        $cdit = $this->input->post('cdit');
        $cdit_direccion = $this->input->post('direccion');
       
         // Validar que los campos no estén vacíos
    if(empty($cdit) || empty($cdit_direccion)) {
        $message = '';
        if(empty($cdit)) {
            $message .= 'El campo Centro de Detención es obligatorio. ';
        }
        if(empty($cdit_direccion)) {
            $message .= 'El campo Dirección es obligatorio.';
        }
        
        $response = array(
            'success' => false,
            'message' => trim($message)
        );
        echo json_encode($response);
        return;
        }
       
        // Verificar si el cdit ya existe
        if(!$this->CditModel->existeCdit($cdit)) {
            if($this->CditModel->agregarCdit($cdit, $cdit_direccion)) {
                $response = array(
                    'success' => true,
                    'message' => 'Centro de detencion guardado correctamente'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error al guardar el centro de detencion'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'El Centro de detencion ya existe en la base de datos'
            );
        }
       
        echo json_encode($response);
    }

    public function obtener_cdit($id) {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
    
        // Obtener el cdit
        $cdit = $this->CditModel->getCditById($id);
        
        if ($cdit) {
            $response = array(
                'success' => true,
                'data' => $cdit
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'No se encontró el Centro de detencion'
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
           
            $id = $this->input->post('id_cdit');
            $cdit= $this->input->post('cdit');
            $cdit_direccion= $this->input->post('direccion');
           
            // Validar que los campos no estén vacíos
            if(empty($id) || empty($cdit) || empty($cdit_direccion)) {
                $message = '';
                if(empty($cdit)) {
                    $message .= 'El campo CDIT no puede estar vacío. ';
                }
                if(empty($cdit_direccion)) {
                    $message .= 'El campo Dirección no puede estar vacío.';
                }
                
                $response = array(
                    'success' => false,
                    'message' => trim($message) // trim para eliminar espacios extra
                );
                echo json_encode($response);
                return;
            }
           
            if (!$this->CditModel->existeCdit($cdit, $id)) {
                if ($this->CditModel->actualizarCdit($id, $cdit, $cdit_direccion)) {
                    $response = array(
                        'success' => true,
                        'message' => 'Centro de detención actualizado correctamente'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Error al actualizar el centro de detención'
                    );
                }
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'El centro de detención ya existe'
                );
            }
           
            echo json_encode($response);
        }

       
    public function eliminar($id)
    {
        $this->CditModel->eliminarCdit($id);
        $this->session->set_flashdata('success', 'Centro de detencion eliminado correctamente');
        redirect('CditController/index');
    }

    public function reactivar($id)
    {
        $this->CditModel->reactivarCdit($id);
        $this->session->set_flashdata('success', 'Centro de detencion reactivado correctamente');
        redirect('CditController/index');
    }
}