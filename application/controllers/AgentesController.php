    <?php 
    defined('BASEPATH') or exit('No direct script access allowed');   
     class AgentesController extends CI_Controller {        
        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->helper('url');
            $this->load->model('UsersModel');
            $this->load->model('AgentesModel');
            
            // Verificar si el usuario está logueado            
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
            $eliminados = $this->AgentesModel->getAgentesEliminados();
           
            $data = [
                'titulo' => 'Agentes',
                'agentes' => $this->AgentesModel->getAgentesActivos(),
                'id_usuario' => $id_usuario,
                'eliminados' => $eliminados,
                'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
                'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png'
            ];
            
            $this->load->view('admin/agentes_register', $data);
        }
        public function insertar()
        {
            // Validar que sea una petición AJAX
            if (!$this->input->is_ajax_request()) {
                show_404();
            }
           
            $nombreagente = $this->input->post('nombre_agente');
            $apellidosagente = $this->input->post('apellidos_agente');
            $nroagente = $this->input->post('nro_agente');
           
             // Validar que los campos no estén vacíos
        if(empty($nombreagente) || empty($apellidosagente) || empty($nroagente)) {
            $message = '';
            if(empty($nombreagente)) {
                $message .= 'El campo Nombres del Agente es obligatorio. ';
            }
            if(empty($apellidosagente)) {
                $message .= 'El campo Apellidos del Agente es obligatorio.';
            }
            
            if(empty($nroagente)) {
                $message .= 'El campo Nro Agente es obligatorio.';
            }
            
            $response = array(
                'success' => false,
                'message' => trim($message)
            );
            echo json_encode($response);
            return;
            }
           
            // Verificar si el número de agente ya existe
            if($this->AgentesModel->existeNumeroAgente($nroagente)) {
                $response = array(
                    'success' => false,
                    'message' => 'El número de agente ya existe en la base de datos'
                );
                echo json_encode($response);
                return;
            }

           // Verificar si el agente ya existe (con el mismo nombre y apellido)
            if($this->AgentesModel->existeAgente($nombreagente, $apellidosagente)) {
                $response = array(
                    'success' => false,
                    'message' => 'Ya existe un agente con este nombre y apellidos'
                );
                echo json_encode($response);
                return;
            }

            // Si llegamos aquí, podemos agregar el agente
            if($this->AgentesModel->agregarAgente($nombreagente, $apellidosagente, $nroagente)) {        
                $response = array(
                    'success' => true,
                    'message' => 'Agente guardado correctamente'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error al guardar el agente'
                );
            }
           
            echo json_encode($response);
        }
    
        public function obtener_agente($id) {
            // Validar que sea una petición AJAX
            if (!$this->input->is_ajax_request()) {
                show_404();
            }
        
            // Obtener el cdit
            $agente = $this->AgentesModel->getAgenteById($id);
            
            if ($agente) {
                $response = array(
                    'success' => true,
                    'data' => $agente
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'No se encontró el agente'
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
        
            $id = $this->input->post('id_agente');
            $nombre_agente = $this->input->post('nombre_agente');
            $apellidos_agente = $this->input->post('apellidos_agente');
            $nro_agente = $this->input->post('nro_agente');
        
            // Validar que los campos no estén vacíos
            if(empty($id) || empty($nombre_agente) || empty($apellidos_agente) || empty($nro_agente)) {
                $message = '';
                if(empty($nombre_agente)) {
                    $message .= 'El campo Nombres del Agente es obligatorio. ';
                }
                if(empty($apellidos_agente)) {
                    $message .= 'El campo Apellidos del Agente es obligatorio. ';
                }
                if(empty($nro_agente)) {
                    $message .= 'El campo Nro Agente es obligatorio.';
                }
                $response = array(
                    'success' => false,
                    'message' => trim($message)
                );
                echo json_encode($response);
                return;
            }
        
            // Verificar si el número de agente ya existe en otro registro
            if($this->AgentesModel->existeNumeroAgenteEnOtro($nro_agente, $id)) {
                $response = array(
                    'success' => false,
                    'message' => 'El número de agente ya está asignado a otro agente'
                );
                echo json_encode($response);
                return;
            }
        
            // Verificar si ya existe otro agente con el mismo nombre y apellido
            if($this->AgentesModel->existeAgente($nombre_agente, $apellidos_agente, $id)) {
                $response = array(
                    'success' => false,
                    'message' => 'Ya existe otro agente con este nombre y apellidos'
                );
                echo json_encode($response);
                return;
            }
        
            // Si llegamos aquí, podemos actualizar el agente
            if ($this->AgentesModel->actualizarAgente($id, $nombre_agente, $apellidos_agente, $nro_agente)) {
                $response = array(
                    'success' => true,
                    'message' => 'Agente actualizado correctamente'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error al actualizar el agente'
                );
            }
        
            echo json_encode($response);
        }
        public function eliminar($id)
        {
            $this->AgentesModel->eliminarAgente($id);
            $this->session->set_flashdata('success', 'Agente eliminado correctamente');
            redirect('AgentesController/index');
        }
    
        public function reactivar($id)
        {
            $this->AgentesModel->reactivarAgente($id);
            $this->session->set_flashdata('success', 'Agente reactivado correctamente');
            redirect('AgentesController/index');
        }
       
        
    }               