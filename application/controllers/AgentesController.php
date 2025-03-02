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

           
            $data = [
                'titulo' => 'Agentes',
                'datos' => $this->AgentesModel->getAgentes(),
                'id_usuario' => $id_usuario,
                'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
                'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png'
            ];
            
            $this->load->view('admin/agentes_register', $data);
        }

       
        
    }               