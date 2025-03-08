<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InfractoresController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('InfractoresModel');
        $this->load->model('UsersModel');
        $this->load->model('ProcesosModel');

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
    public function index (){
        // Obtener los detalles del usuario desde el modelo
        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);

        // Preparar los datos para la vista
        $data = [
            'titulo' => 'Infractores',

            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png' // Foto del usuario o predeterminada
        ];  



        $this->load->view('infractores', $data);
    }
    public function registrar_infractor() {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // Obtener las reglas base desde la librería
        $this->form_validation->set_rules($this->form_validation_rules->get_base_rules_infractor());

        // Agregar regla de validación de cédula
        $cedula = $this->input->post('cedula_inf');
        if (!$this->ValidatesModel->validarCedula($cedula)) {
            $response = array(
                'success' => false,
                'message' => 'La cédula ingresada no es válida.'
            );
            echo json_encode($response);
            return;
        }

        // Verificar si la cédula ya existe
        if ($this->ProcesosModel->existe_cedula($cedula)) {
            $response = array(
                'success' => false,
                'message' => 'La cédula ya está registrada en el sistema.'
            );
            echo json_encode($response);
            return;
        }

        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'success' => false,
                'message' => validation_errors()
            );
            echo json_encode($response);
            return;
        }

        try {
            // Preparar datos del infractor
            $datos = array(
                'N_INFRACTOR' => $this->input->post('nombre_inf'),
                'A_INFRACTOR' => $this->input->post('apellidos_inf'),
                'C_INFRACTOR' => $cedula,
                'T_INFRACTOR' => $this->input->post('telefono_inf')
            );

            
             // Procesar la foto si existe
                if (!empty($_FILES['foto_inf']['name'])) {
                    // Directorio de destino para la foto
                    $directorio_destino = './uploads/fotos_infractores/';

                    // Verificar si el directorio existe, si no, crearlo
                    if (!is_dir($directorio_destino)) {
                        mkdir($directorio_destino, 0777, true);
                    }

                    // Corregir el error en pregreplace -> preg_replace y los nombres de las variables
                    $nombre_archivo = preg_replace(
                        '/[^a-zA-Z0-9_-]/',
                        '_',
                        $datos['N_INFRACTOR'] . '_' . $datos['A_INFRACTOR'] . '_' . uniqid()
                    );

                    // Configuración para la subida
                    $config = [
                        'upload_path' => $directorio_destino,
                        'allowed_types' => 'jpg|jpeg|png',
                        'max_size' => 2048,
                        'file_name' => $nombre_archivo,
                        'overwrite' => FALSE
                    ];

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto_inf')) {
                        $data = $this->upload->data();
                        
                        // Guardar la ruta completa del archivo en la base de datos
                        $datos['F_INFRACTOR_RUTA'] = $directorio_destino . $data['file_name']; // Ruta completa
                    } else {
                        log_message('error', 'Error al subir foto infractor: ' . $this->upload->display_errors());
                    }
            }

            if ($id_infractor = $this->ProcesosModel->insertar_infractor($datos)) {
                $response = array(
                    'success' => true,
                    'message' => 'Infractor registrado correctamente',
                    'id_infractor' => $id_infractor, // Enviamos el ID del infractor
                    'modal_url' => site_url('ProcesosController/cargar_vista_modal/' . $id_infractor) // URL para cargar el contenido del modal
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error al registrar el infractor'
                );
            }

        } catch (Exception $e) {
            log_message('error', 'Error en registrar_infractor: ' . $e->getMessage());
            $response = array(
                'success' => false,
                'message' => 'Error en el servidor al procesar la solicitud'
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
?>