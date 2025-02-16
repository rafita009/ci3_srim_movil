<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonasController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
        $this->load->model('PersonasModel'); // Carga el modelo de Persona
        $this->load->model('UsersModel'); // Carga el modelo de Usuario
        $this->load->model('ValidatesModel');
        $this->load->model('RolesModel');

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

    // Obtener los detalles del usuario desde el modelo
    $id_usuario = $this->session->userdata('id_usuario');
    $user_details = $this->UsersModel->get_user_by_id($id_usuario);

    // Obtener la lista de personas desde el modelo
    $personas = $this->PersonasModel->obtener_todas_personas();

      // Obtener los mensajes de la sesión
      $mensaje_error = $this->session->flashdata('error');
      $mensaje_success = $this->session->flashdata('success');
    
    $data = [
        'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo
        'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png', // Foto del usuario o predeterminada
        'personas' => $personas,
        'error' => $mensaje_error, // Mensaje de error
        'success' => $mensaje_success, // Mensaje de éxito

    ];
    
        // Cargar el formulario
        $this->load->view('admin/users/register_person', $data);

    }
    public function listar_personas()
{
    // Obtener la lista de personas desde el modelo
    $personas = $this->PersonasModel->obtener_todas_personas();

    // Pasar los datos a la vista
    $data['personas'] = $personas;
    $this->load->view('admin/personas/list_personas', $data);
}
public function guardar_persona()
{
    // Configuración de reglas de validación
    $config = array(
        array(
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'required',
            'errors' => array('required' => 'El campo %s es obligatorio.')
        ),
        array(
            'field' => 'apellidos',
            'label' => 'Apellidos',
            'rules' => 'required',
            'errors' => array('required' => 'El campo %s es obligatorio.')
        ),
        array(
            'field' => 'email',
            'label' => 'Correo Electrónico',
            'rules' => 'required|valid_email',
            'errors' => array(
                'required' => 'El campo %s es obligatorio.',
                'valid_email' => 'El campo %s debe ser un correo electrónico válido.'
            )
        ),
        array(
            'field' => 'telefono',
            'label' => 'Teléfono',
            'rules' => 'required',
            'errors' => array('required' => 'El campo %s es obligatorio.')
        ),
        array(
            'field' => 'cedula',
            'label' => 'Cédula',
            'rules' => 'required',
            'errors' => array('required' => 'El campo %s es obligatorio.')
        )
    );

    $this->form_validation->set_rules($config);

    // Validar los datos del formulario
    if ($this->form_validation->run() == FALSE) {
        echo json_encode([
            'status' => 'error',
            'errors' => $this->form_validation->error_array()
        ]);
        return;
    }

    // Capturar los datos del formulario
    $persona_data = array(
        'NOMBRES' => $this->input->post('nombre'),
        'APELLIDOS' => $this->input->post('apellidos'),
        'EMAIL' => $this->input->post('email'),
        'TELEFONO' => $this->input->post('telefono'),
        'CEDULA' => $this->input->post('cedula')
    );

    // Validar la cédula
    if (!$this->ValidatesModel->validarCedula($persona_data['CEDULA'])) {
        echo json_encode([
            'status' => 'error',
            'errors' => ['cedula' => 'La cédula ingresada no es válida.']
        ]);
        return;
    }
    // Verificar si la cédula ya existe en la base de datos
    $persona_existente = $this->PersonasModel->buscar_por_cedula($persona_data['CEDULA']);
    if ($persona_existente) {
        echo json_encode([
            'status' => 'error',
            'errors' => ['cedula' => 'Ya existe una persona registrada con esta cédula.']
        ]);
        return;
    }


    // Insertar en la tabla PERSONAS
    $id_persona = $this->PersonasModel->insertar_persona($persona_data);

    if ($id_persona) {
        echo json_encode([
            'status' => 'success',
            'message' => 'La persona ha sido agregada correctamente.',
            'nombre' => $persona_data['NOMBRES'],
            'apellidos' => $persona_data['APELLIDOS'],
            'email' => $persona_data['EMAIL'],
            'telefono' => $persona_data['TELEFONO'],
            'cedula' => $persona_data['CEDULA']
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al crear el usuario.']);
    }
}
public function editar_persona()
{
    $config = array(
        array(
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'required',
            'errors' => array('required' => 'El campo %s es obligatorio.')
        ),
        array(
            'field' => 'apellido',
            'label' => 'Apellidos',
            'rules' => 'required',
            'errors' => array('required' => 'El campo %s es obligatorio.')
        ),
        array(
            'field' => 'correo',
            'label' => 'Correo Electrónico',
            'rules' => 'required|valid_email',
            'errors' => array(
                'required' => 'El campo %s es obligatorio.',
                'valid_email' => 'El campo %s debe ser un correo electrónico válido.'
            )
        ),
        array(
            'field' => 'telefono',
            'label' => 'Teléfono',
            'rules' => 'required',
            'errors' => array('required' => 'El campo %s es obligatorio.')
        ),
        array(
            'field' => 'cedula',
            'label' => 'Cédula',
            'rules' => 'required',
            'errors' => array('required' => 'El campo %s es obligatorio.')
        )
    );

    $this->form_validation->set_rules($config);

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('PersonasController/index');
        return;
    }

    $id_persona = $this->input->post('id_persona'); // ID oculto en el formulario

    $persona_data = array(
        'NOMBRES' => $this->input->post('nombre'),
        'APELLIDOS' => $this->input->post('apellido'),
        'EMAIL' => $this->input->post('correo'),
        'TELEFONO' => $this->input->post('telefono'),
        'CEDULA' => $this->input->post('cedula')
    );
    
    // Validar la cédula
    if (!$this->ValidatesModel->validarCedula($persona_data['CEDULA'])) {
        $this->session->set_flashdata('error', 'La cédula ingresada no es válida.');
        redirect('PersonasController/index');
        return;
    }

    // Verificar si la cédula ya existe (excluyendo el registro actual)
    if ($this->PersonasModel->cedula_existe($persona_data['CEDULA'], $id_persona)) {
        $this->session->set_flashdata('error', 'Ya existe una persona registrada con esta cédula.');
        redirect('PersonasController/index');
        return;
    }

    // Actualizar la persona
    $resultado = $this->PersonasModel->actualizar_persona($id_persona, $persona_data);

    if ($resultado) {
        $this->session->set_flashdata('success', 'La persona ha sido actualizada correctamente.');
    } else {
        $this->session->set_flashdata('error', 'Error al actualizar la persona.');
    }
    redirect('PersonasController/index');
}

}
