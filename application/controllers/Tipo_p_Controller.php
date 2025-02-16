<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CausasController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
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
       
        $data = [
            'titulo' => 'Causas',
            'datos' => $this->CausasModel->getCausasActivas(),
            'id_usuario' => $id_usuario,
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png'
        ];
        
        $this->load->view('causas/causas', $data);
    }

    public function nuevo()
    {

        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);

        if ($this->input->post()) {
            $causa = $this->input->post('causa');
            
            if (!$this->CausasModel->existeCausa($causa)) {
                $this->CausasModel->agregarCausa($causa);
                $this->session->set_flashdata('success', 'Causa agregada correctamente');
                redirect('causas');
            } else {
                $this->session->set_flashdata('error', 'La causa ya existe');
            }
        }
        
        $data = [
            'titulo' => 'Agregar Causa',
            'id_usuario' => $id_usuario,
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png'
    ];
        $this->load->view('causas/nuevo', $data);
    }
    public function insertar()
{
    

    $causa = $this->input->post('causa');
    
    // Validar que el campo no esté vacío
    if(empty($causa)) {
        $this->session->set_flashdata('error', 'El campo causa es obligatorio');
        redirect('CausasController/nuevo');
        return;
    }
    
    // Verificar si la causa ya existe
    if(!$this->CausasModel->existeCausa($causa)) {
        if($this->CausasModel->agregarCausa($causa)) {
            $this->session->set_flashdata('success', 'Causa guardada correctamente');
        } else {
            $this->session->set_flashdata('error', 'Error al guardar la causa');
        }
    } else {
        $this->session->set_flashdata('error', 'La causa ya existe en la base de datos');
        redirect('CausasController/nuevo');
        return;
    }
    
    redirect('CausasController/index');
}

   // Función para mostrar el formulario de edición
        public function editar($id)
        {
            $id_usuario = $this->session->userdata('id_usuario');
            $user_details = $this->UsersModel->get_user_by_id($id_usuario);
            

            $data = [
                'titulo' => 'Editar Causa',
                'id_usuario' => $id_usuario,
                'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
                'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'uploads/fotos_usuario/default_profile.png',
                'datos' => $this->CausasModel->getCausaById($id)
            ];
            $this->load->view('causas/editar', $data);
        }

        // Función para procesar la actualización
        public function actualizar()
        {
           
            $id = $this->input->post('id_causa');
            $causa = $this->input->post('causa');
            
            if (!$this->CausasModel->existeCausa($causa, $id)) {
                if ($this->CausasModel->actualizarCausa($id, $causa)) {
                    $this->session->set_flashdata('success', 'Causa actualizada correctamente');
                } else {
                    $this->session->set_flashdata('error', 'Error al actualizar la causa');
                }
            } else {
                $this->session->set_flashdata('error', 'La causa ya existe');
            }
            
            redirect('CausasController/index');
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