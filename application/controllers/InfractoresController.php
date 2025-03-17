<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InfractoresController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('notificaciones');
        $this->load->helper('form');
        $this->load->model('InfractoresModel');
        $this->load->model('UsersModel');
        $this->load->model('ProcesosModel');
        $this->load->library('form_validation'); 
        $this->load->library('form_validation_rules');
        $this->load->model('ValidatesModel');

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
            $datos = $this->InfractoresModel->getInfractores();
            $total_infractores = count($datos);

            // Preparar los datos para la vista
            $data = [
                'titulo' => 'Infractores',

                'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'], // Nombre completo
                'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png', // Foto del usuario o predeterminada
                'datos' => $datos,
                'total_infractores' => $total_infractores
            ];  




            $this->load->view('infractores', $data);
        }
    public function registrar_infractor() {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // Obtener las reglas 
        $this->form_validation->set_rules('n_infractor', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('a_infractor', 'Apellidos', 'required|trim');
        $this->form_validation->set_rules('cedula_inf', 'Cédula', 'required|trim|exact_length[10]');
        // Agregar regla de validación de cédula
        $cedula = $this->input->post('cedula_inf');
        $nombre = $this->input->post('n_infractor');
        $apellido = $this->input->post('a_infractor');
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
                // Obtener la información del infractor existente
                $infractor_existente = $this->ProcesosModel->obtener_infractor_por_cedula($cedula);
                
                if ($infractor_existente) {
                    $id_infractor = $infractor_existente->ID_INFRACTOR; // Asumiendo que este es el nombre del campo
                    
                    $response = array(
                        'success' => false,
                        'message' => 'La cédula ya está registrada en el sistema.',
                        'infractor_existe' => true,
                        'id_infractor' => $id_infractor,
                        'modal_url' => site_url('ProcesosController/cargar_vista_modal/' . $id_infractor)
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'La cédula ya está registrada en el sistema, pero no se pudo cargar la información.'
                    );
                }
                
                echo json_encode($response);
                return;
            }

        if ($this->ProcesosModel->existe_nombre_apellido($nombre, $apellido)) {
            $response = array(
                'success' => false,
                'message' => 'Ya existe un infractor con el mismo nombre y apellido.'
            );
            echo json_encode($response);
            return;
        }

        try {
            // Preparar datos del infractor
            $datos = array(
                'N_INFRACTOR' => $this->input->post('n_infractor'),
                'A_INFRACTOR' => $this->input->post('a_infractor'),
                'C_INFRACTOR' => $cedula,
                'T_INFRACTOR' => $this->input->post('t_infractor')
            );

            
             // Procesar la foto si existe
                if (!empty($_FILES['foto_inf']['name']) && !empty($this->input->post('foto_inf'))) {
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
    public function obtener_infractor($id) {
        // Validar que sea una petición AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
    
        // Obtener el cdit
        $infractor = $this->InfractoresModel->getInfractorById($id);
        
        if ($infractor) {
            $response = array(
                'success' => true,
                'data' => $infractor
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'No se encontró el Infractor'
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
       
        $id = $this->input->post('id_infractor');
        $n_infractor = $this->input->post('n_infractor');
        $a_infractor = $this->input->post('a_infractor');
        $t_infractor = $this->input->post('t_infractor');
        $cedula = $this->input->post('cedula_inf');
       
        // Validar que los campos no estén vacíos
        if(empty($id) || empty($n_infractor) || empty($a_infractor) || empty($cedula)) {
            $message = '';
            if(empty($n_infractor)) {
                $message .= 'El campo Nombre no puede estar vacío. ';
            }
            if(empty($a_infractor)) {
                $message .= 'El campo Apellido no puede estar vacío. ';  
            }
            if(empty($cedula)) {
                $message .= 'El campo Cédula no puede estar vacío. ';
            }
            
            $response = array(
                'success' => false,
                'message' => trim($message)
            );
            echo json_encode($response);
            return;
        }
        
        // Agregar regla de validación de cédula
        if (!$this->ValidatesModel->validarCedula($cedula)) {
            $response = array(
                'success' => false,
                'message' => 'La cédula ingresada no es válida.'
            );
            echo json_encode($response);
            return;
        }
        
        // Verificar si la cédula ya existe (excluyendo el infractor actual)
        if ($this->InfractoresModel->existe_cedula($cedula, $id)) {
            $response = array(
                'success' => false,
                'message' => 'La cédula ya está registrada en el sistema.'
            );
            echo json_encode($response);
            return;
        }
         // Verificar si ya existe un infractor con el mismo nombre y apellido (excluyendo el actual)
            if ($this->InfractoresModel->existe_nombre_apellido($n_infractor, $a_infractor, $id)) {
                $response = array(
                    'success' => false,
                    'message' => 'Ya existe un infractor con el mismo nombre y apellido.'
                );
                echo json_encode($response);
                return;
            }
                
                try {
                    // Preparar datos del infractor
                    $datos = array(
                        'N_INFRACTOR' => $n_infractor,
                        'A_INFRACTOR' => $a_infractor,
                        'C_INFRACTOR' => $cedula,
                        'T_INFRACTOR' => $t_infractor
                    );
                    
                    // Verificar si se ha subido un archivo nuevo
                    if (isset($_FILES['foto_inf']) && !empty($_FILES['foto_inf']['name'])) {
                        // Primero, obtener la información de la foto actual
                        $infractor_actual = $this->InfractoresModel->getInfractorById($id);
                        $foto_actual_ruta = isset($infractor_actual['F_INFRACTOR_RUTA']) ? $infractor_actual['F_INFRACTOR_RUTA'] : '';
                        
                        // Si existe una foto actual, moverla a la carpeta de eliminados
                        if (!empty($foto_actual_ruta) && file_exists('./'.$foto_actual_ruta)) {
                            // Crear la carpeta eliminados si no existe
                            if (!is_dir('./eliminados')) {
                                mkdir('./eliminados', 0777, true);
                            }
                            
                            // Obtener el nombre del archivo para reutilizarlo
                            $foto_name = basename($foto_actual_ruta);
                            
                            // Mover archivo a la carpeta eliminados
                            rename('./'.$foto_actual_ruta, './eliminados/'.$foto_name);
                        }
                        
                        // Directorio de destino para la foto
                        $directorio_destino = './uploads/fotos_infractores/';
            
                        // Verificar si el directorio existe, si no, crearlo
                        if (!is_dir($directorio_destino)) {
                            mkdir($directorio_destino, 0777, true);
                        }
            
                        // Generar nombre de archivo
                        if (!empty($foto_actual_ruta)) {
                            // Reutilizar el nombre pero respetando la extensión original
                            $nombre_base = pathinfo(basename($foto_actual_ruta), PATHINFO_FILENAME);
                            $extension_nueva = pathinfo($_FILES['foto_inf']['name'], PATHINFO_EXTENSION);
                            $nombre_archivo = $nombre_base . '.' . $extension_nueva;
                        } else {
                            // Generar nuevo nombre
                            $nombre_archivo = preg_replace(
                                '/[^a-zA-Z0-9_-]/',
                                '_',
                                $datos['N_INFRACTOR'] . '_' . $datos['A_INFRACTOR'] . '_' . uniqid()
                            ) . '.' . pathinfo($_FILES['foto_inf']['name'], PATHINFO_EXTENSION);
                        }
            
                        // Configuración para la subida
                        $config = [
                            'upload_path' => $directorio_destino,
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size' => 2048,
                            'file_name' => pathinfo($nombre_archivo, PATHINFO_FILENAME), // Nombre sin extensión
                            'overwrite' => TRUE
                        ];
            
                        $this->load->library('upload');
                        $this->upload->initialize($config);
            
                        if ($this->upload->do_upload('foto_inf')) {
                            $data = $this->upload->data();
                            
                            // Guardar la ruta completa del archivo en la base de datos
                            $datos['F_INFRACTOR_RUTA'] = 'uploads/fotos_infractores/' . $data['file_name']; // Ruta para la base de datos
                        } else {
                            log_message('error', 'Error al subir foto infractor: ' . $this->upload->display_errors());
                            $response = array(
                                'success' => false,
                                'message' => 'Error al subir la foto: ' . $this->upload->display_errors('', '')
                            );
                            echo json_encode($response);
                            return;
                        }
                    }
                    
                    if ($this->InfractoresModel->actualizarInfractor($id, $datos)) {
                        $response = array(
                            'success' => true,
                            'message' => 'Infractor actualizado correctamente'
                        );
                    } else {
                        $response = array(
                            'success' => false,
                            'message' => 'Error al actualizar el infractor'
                        );
                    }
                } catch (Exception $e) {
                    log_message('error', 'Error en actualizar_infractor: ' . $e->getMessage());
                    $response = array(
                        'success' => false,
                        'message' => 'Error en el servidor al procesar la solicitud'
                    );
                }
            
                echo json_encode($response);
    }

    public function eliminar_infractor($id_infractor) {
        // Obtener información del infractor antes de eliminarlo
        $infractor = $this->InfractoresModel->obtener_infractor_por_id($id_infractor);
        
        // Verificar nuevamente que no tenga procesos
        if (!$this->InfractoresModel->tiene_procesos_asociados($id_infractor)) {
            $resultado = $this->InfractoresModel->eliminar($id_infractor);
            
            if ($resultado) {
                // Obtener usuarios con rol de gestor
                $gestores = $this->UsersModel->get_usuarios_por_rol('gestor');
    
                // Enviar notificación a cada gestor
                foreach ($gestores as $gestor) {
                    crear_notificacion(
                        $gestor->ID_USUARIO,
                        'Infractor sin procesos asociados eliminado',
                        'Se ha eliminado el infractor: ' . $infractor['N_INFRACTOR'] . ' ' . $infractor['A_INFRACTOR'],
                        'danger',
                        null
                    );
                }
    
                $this->session->set_flashdata('mensaje', 'Infractor eliminado correctamente');
                $this->session->set_flashdata('tipo_mensaje', 'success');
            } else {
                $this->session->set_flashdata('mensaje', 'No se pudo eliminar el infractor');
                $this->session->set_flashdata('tipo_mensaje', 'error');
            }
        } else {
            $this->session->set_flashdata('mensaje', 'No se puede eliminar. El infractor tiene procesos asociados.');
            $this->session->set_flashdata('tipo_mensaje', 'warning');
        }
        
        redirect('InfractoresController/index');
    }
}
?>