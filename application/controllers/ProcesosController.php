<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProcesosController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Cargar la librería de reglas
        $this->load->library('form_validation_rules');
        $this->load->library('form_validation'); // Carga la librería de validación de formularios
        $this->load->helper('url');
        $this->load->model('ProcesosModel'); // Carga el modelo de Procesos
        $this->load->model('UsersModel'); // Carga el modelo de Usuario
        $this->load->model('ValidatesModel');
        $this->load->model('RolesModel');
        $this->load->model('PersonasModel');
        $this->load->model('SearchModel');
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
    public function select_infractor()
{
    $id_usuario = $this->session->userdata('id_usuario');
    $user_details = $this->UsersModel->get_user_by_id($id_usuario);
    $infractores = $this->ProcesosModel->get_all_infractores();

    // Obtener procesos para cada infractor (incluyendo los que no tienen)
    $asociados = [];
    foreach ($infractores as $infractor) {
        $asociados[$infractor['ID_INFRACTOR']] = $this->ProcesosModel->obtenerProcesos_infractores($infractor['ID_INFRACTOR']) ?? []; // Si no tiene procesos, asignar un array vacío
    }

    $data = [
        'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
        'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png',
        'infractores' => $infractores,
        'asociados' => $asociados
    ];

    $this->load->view('register_proc_inf', $data);
}

    
        
public function search_acts()
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }
    
    $search = $this->input->post('search');
    $results = $this->ProcesosModel->search_acts($search);
    
    header('Content-Type: application/json');
    echo json_encode($results);
}
    public function get_cantones() 
    {
        // Obtiene los cantones según el distrito seleccionado
        $distrito_id = $this->input->get('distrito_id');
        $cantones = $this->ProcesosModel->get_cantones($distrito_id);
        echo json_encode($cantones);
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
    
    public function cargar_vista_modal($id_infractor) 
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        
          // Crear el array $data con todos los datos necesarios
        $data = array(
            'infractor' => $this->ProcesosModel->obtener_infractor($id_infractor),
            'distritos' => $this->ProcesosModel->get_distritos(),
            'causas' => $this->ProcesosModel->get_causas(),
            'tipo_placas' => $this->ProcesosModel->get_tipo_placas(),
            'tipo_pruebas' => $this->ProcesosModel->get_tipos_pruebas(),
            'cdit' => $this->ProcesosModel->get_cdit(),
            'agentes' => $this->ProcesosModel->get_all_agentes()
        );
        // Carga la vista que quieres mostrar en el modal
        $this->load->view('register_infractores', $data);
    }
    private function guardar_fotos_pertenencias($id_infractor, $id_proceso, $infractor, $archivos) 
{
    // Directorio de destino para las fotos
    $directorio_destino = './uploads/fotos_pertenencias/';
    
    // Verificar si el directorio existe, si no, crearlo
    if (!is_dir($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }
    
    // Verificar si hay fotos de pertenencias
    if (isset($archivos['foto_pertenencias']) && !empty($archivos['foto_pertenencias']['name'][0])) {
        $fotos = $archivos['foto_pertenencias'];
        $total_fotos = count($fotos['name']);
        
        // Recorrer las fotos para guardarlas individualmente
        for ($i = 0; $i < $total_fotos; $i++) {
            // Preparar cada archivo individual
            $_FILES['foto_pertenencia'] = [
                'name' => $fotos['name'][$i],
                'type' => $fotos['type'][$i],
                'tmp_name' => $fotos['tmp_name'][$i],
                'error' => $fotos['error'][$i],
                'size' => $fotos['size'][$i]
            ];

            // Crear el nombre del archivo basado en el nombre y apellido del infractor, el índice y un identificador único
            $nombre_archivo = preg_replace(
                '/[^a-zA-Z0-9_-]/', 
                '_', 
                $infractor['N_INFRACTOR'] . '_' . $infractor['A_INFRACTOR'] . '_' . ($i + 1) . '_' . uniqid()
            );
            
            // Configuración para la subida
            $config = [
                'upload_path' => $directorio_destino,
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => 2048,
                'file_name' => $nombre_archivo,
                'overwrite' => FALSE
            ];

            // Inicializar la librería de subida
            $this->load->library('upload');
            $this->upload->initialize($config);

            // Subir archivo
            if ($this->upload->do_upload('foto_pertenencia')) {
                $data = $this->upload->data();
                $ruta = $directorio_destino . $data['file_name'];
                
                // Insertar en la tabla fotos_pertenencias con ID_PROCESO
                $this->db->insert('fotos_pertenencias', [
                    'ID_INFRACTOR' => $id_infractor,
                    'ID_PROCESO' => $id_proceso,    // Agregamos el ID_PROCESO
                    'RUTA_PERTENENCIAS' => $ruta
                ]);
            } else {
                log_message('error', 'Error al subir foto de pertenencia: ' . $this->upload->display_errors());
            }
        }
    }
}
    
    private function guardar_foto_libertad($id_infractor, $id_proceso, $infractor, $archivos)
    {
        try {
            $directorio_destino = './uploads/fotos_libertad/';
    
            // Crear el directorio si no existe
            if (!is_dir($directorio_destino)) {
                mkdir($directorio_destino, 0777, true);
            }
    
            // Verificar si hay archivos válidos en el campo `foto_libertad`
            if (isset($archivos['foto_libertad']['name']) && count($archivos['foto_libertad']['name']) > 0) {
                // Comprobar si al menos un archivo tiene un tamaño mayor a 0
                $hay_archivo_valido = false;
                foreach ($archivos['foto_libertad']['size'] as $size) {
                    if ($size > 0) {
                        $hay_archivo_valido = true;
                        break;
                    }
                }
    
                if (!$hay_archivo_valido) {
                    return "No se subieron archivos válidos.";
                }
    
                $this->load->library('upload');
    
                foreach ($archivos['foto_libertad']['name'] as $index => $name) {
                    if ($archivos['foto_libertad']['size'][$index] > 0) {
                        // Generar un nombre único para el archivo utilizando uniqid
                        $nombre_archivo = preg_replace(
                            '/[^a-zA-Z0-9_-]/',
                            '_',
                            $infractor['N_INFRACTOR'] . ' ' . $infractor['A_INFRACTOR']
                        ) . '_' . uniqid(); // Usamos uniqid() para generar un ID único
    
                        $config = [
                            'upload_path' => $directorio_destino,
                            'allowed_types' => 'jpg|jpeg|png|pdf',
                            'max_size' => 2048,
                            'file_name' => $nombre_archivo,
                            'overwrite' => FALSE
                        ];
    
                        $_FILES['archivo_actual'] = [
                            'name' => $archivos['foto_libertad']['name'][$index],
                            'type' => $archivos['foto_libertad']['type'][$index],
                            'tmp_name' => $archivos['foto_libertad']['tmp_name'][$index],
                            'error' => $archivos['foto_libertad']['error'][$index],
                            'size' => $archivos['foto_libertad']['size'][$index],
                        ];
    
                        $this->upload->initialize($config);
    
                        if ($this->upload->do_upload('archivo_actual')) {
                            $data = $this->upload->data();
                            $ruta = $directorio_destino . $data['file_name'];
    
                            $this->db->insert('archivos_libertad', [
                                'ID_INFRACTOR' => $id_infractor,
                                'ID_PROCESO' => $id_proceso,
                                'RUTA_ARCH_LIBERTAD' => $ruta
                            ]);
                        } else {
                            log_message('error', 'Error al subir archivo ' . $name . ': ' . $this->upload->display_errors());
                            throw new Exception('Error al subir el archivo ' . $name . '. Intente nuevamente.');
                        }
                    }
                }
                return "Todos los archivos se subieron correctamente.";
            } else {
                return "No se subieron archivos, ya que no se seleccionó ninguno.";
            }
        } catch (Exception $e) {
            log_message('error', 'Error en guardar_foto_libertad: ' . $e->getMessage());
            return $e->getMessage();
        }
    }

    private function guardar_foto_detencion($id_infractor, $id_proceso, $infractor, $archivos)
    {
        try {
            $directorio_destino = './uploads/fotos_detencion/';
    
            if (!is_dir($directorio_destino)) {
                mkdir($directorio_destino, 0777, true);
            }
    
            if (isset($archivos['foto_detencion']['name']) && count($archivos['foto_detencion']['name']) > 0) {
                $hay_archivo_valido = false;
                foreach ($archivos['foto_detencion']['size'] as $size) {
                    if ($size > 0) {
                        $hay_archivo_valido = true;
                        break;
                    }
                }
    
                if (!$hay_archivo_valido) {
                    return "No se subieron archivos válidos.";
                }
    
                $this->load->library('upload');
    
                foreach ($archivos['foto_detencion']['name'] as $index => $name) {
                    if ($archivos['foto_detencion']['size'][$index] > 0) {
                        // Generar un nombre único para el archivo utilizando uniqid
                        $nombre_archivo = preg_replace(
                            '/[^a-zA-Z0-9_-]/',
                            '_',
                            $infractor['N_INFRACTOR'] . ' ' . $infractor['A_INFRACTOR']
                        ) . '_' . uniqid(); // Usamos uniqid() para generar un ID único
    
                        $config = [
                            'upload_path' => $directorio_destino,
                            'allowed_types' => 'jpg|jpeg|png|pdf',
                            'max_size' => 2048,
                            'file_name' => $nombre_archivo,
                            'overwrite' => FALSE
                        ];
    
                        $_FILES['archivo_actual'] = [
                            'name' => $archivos['foto_detencion']['name'][$index],
                            'type' => $archivos['foto_detencion']['type'][$index],
                            'tmp_name' => $archivos['foto_detencion']['tmp_name'][$index],
                            'error' => $archivos['foto_detencion']['error'][$index],
                            'size' => $archivos['foto_detencion']['size'][$index],
                        ];
    
                        $this->upload->initialize($config);
    
                        if ($this->upload->do_upload('archivo_actual')) {
                            $data = $this->upload->data();
                            $ruta = $directorio_destino . $data['file_name'];
    
                            $this->db->insert('archivos_detencion', [
                                'ID_INFRACTOR' => $id_infractor,
                                'ID_PROCESO' => $id_proceso,
                                'RUTA_ARCH_DETENCION' => $ruta
                            ]);
                        } else {
                            log_message('error', 'Error al subir archivo ' . $name . ': ' . $this->upload->display_errors());
                            throw new Exception('Error al subir el archivo ' . $name . '. Intente nuevamente.');
                        }
                    }
                }
                return "Todos los archivos se subieron correctamente.";
            } else {
                return "No se subieron archivos, ya que no se seleccionó ninguno.";
            }
        } catch (Exception $e) {
            log_message('error', 'Error en guardar_foto_detencion: ' . $e->getMessage());
            return $e->getMessage();
        }
    }
    
    public function guardar() 
    {
        $tipo = $this->input->post('resolucion_audiencia');
    
        // Obtener las reglas de validación
        $rules = $this->form_validation_rules->get_rules($tipo);
    
        // Establecer las reglas
        $this->form_validation->set_rules($rules);
    
        // Validar el formulario
        if ($this->form_validation->run() === FALSE) {  
            // Devolver errores en caso de solicitud AJAX
            if ($this->input->is_ajax_request()) {
                echo json_encode([
                    'status' => 'error',
                    'errors' => $this->form_validation->error_array()
                ]);
                return;
            }
    
            // Mensaje de error para solicitudes normales
            $this->session->set_flashdata('mensaje', [
                'status' => 'error',
                'message' => 'Por favor, corrige los errores en el formulario.'
            ]);
            redirect('ProcesosController/index');
            return;
        }   
    
        // Iniciar transacción
        $this->db->trans_start();
    
        try {
            // Agrupar y validar datos
            $datos = $this->agrupar_datos_por_tablas();
            if (empty($datos)) {
                throw new Exception('No se pudieron agrupar los datos del formulario.');
            }
    
            // Insertar datos secuencialmente
            $this->insertar_datos_secuencialmente($datos);
    
            // Completar transacción
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Error en la transacción de la base de datos.');
            }
    
            // Devolver éxito en caso de solicitud AJAX
            if ($this->input->is_ajax_request()) {
                echo json_encode([
                    'status' => 'success',
                    'message' => '¡Registro guardado exitosamente!'
                ]);
                return;
            }
    
            // Mensaje de éxito para solicitudes normales
            $this->session->set_flashdata('mensaje', [
                'status' => 'success',
                'message' => '¡Registro guardado exitosamente!'
            ]);
        } catch (Exception $e) {
            // Revertir transacción y devolver error
            $this->db->trans_rollback();
    
            if ($this->input->is_ajax_request()) {
                echo json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
                return;
            }
    
            $this->session->set_flashdata('mensaje', [
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    
        // Redirigir después del proceso (para solicitudes normales)
        redirect('ProcesosController/select_infractor');
    }
    
    // Método para cargar los datos en la vista de edición
public function editar($id_infractor) 
{

    
    // Obtener los detalles del usuario desde el modelo
    $id_usuario = $this->session->userdata('id_usuario');

    // Obtener los datos del infractor y sus procesos asociados por ID_INFRACTOR
    $data['infractor'] = $this->SearchModel->obtener_infractor($id_infractor);
    $data['act_procede'] = $this->SearchModel->obtener_act_procede($id_infractor);
    $data['placas'] = $this->SearchModel->obtener_placas($id_infractor);
    $data['tipo_placa'] = $this->SearchModel->obtener_tipo_placa($id_infractor);
    $data['ruta_foto'] = $this->SearchModel->obtener_foto_infractor($id_infractor);
    $data['causas_distrito_infractor_canton'] = $this->SearchModel->obtener_causa_distrito($id_infractor);
    $data['pruebas'] = $this->SearchModel->obtener_pruebas($id_infractor);
    $data['fecha_procedimiento'] = $this->SearchModel->obtener_fechas_procedimiento($id_infractor);
    $data['fecha_hora_entrada_vm'] = $this->SearchModel->obtener_fecha_hora_entrada($id_infractor);
    $data['fotos_pertenencias'] = $this->SearchModel->obtener_fotos_pertenencias($id_infractor);
    $data['fecha_hora_salida_vm'] = $this->SearchModel->obtener_fecha_hora_salida($id_infractor);
    $data['comentarios'] = $this->SearchModel->obtener_comentarios($id_infractor);
    $data['archivos_libertad'] = $this->SearchModel->obtener_archivos_libertad($id_infractor);
    $data['datos_cdit'] = $this->SearchModel->obtener_datos_cdit($id_infractor);
    $data['archivos_detencion'] = $this->SearchModel->obtener_archivos_detencion($id_infractor);

    // Obtener detalles del usuario (esto dependerá de cómo obtienes los datos del usuario)
    $user_details = $this->UsersModel->get_user_by_id($id_usuario);
    // Ejemplo de cómo obtener los datos del usuario

    // Agregar nombre completo y foto al array $data
    $data['usuario'] = $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS']; // Nombre completo
    $data['foto'] = !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png'; // Foto del usuario o predeterminada

    // Cargar la vista de edición y pasar los datos
    // Cargar la vista de edición y pasar los datos
    $this->load->view('admin/edit_proces', $data);
}

    
    private function agrupar_datos_por_tablas() 
    {
        
        
        $placas = [
            'ID_TIPO_PLACA' => $this->input->post('tipo_placa'),
            'PLACA' => $this->input->post('num_placa')
        ];
        $causas_distrito_infractor_canton = [
            'ID_CAUSA' => $this->input->post('causa'),
            'ID_DISTRITO' => $this->input->post('distrito'),
            'ID_CANTON' => $this->input->post('canton'),
            'ID_INFRACTOR' => null // Agregar el ID del infractor aquí
        ];
        $pruebas = [
            'ID_INFRACTOR' => null, // Se incluye el ID del infractor
            'ID_TIPO_PRUEBA' => $this->input->post('tipo_prueba'),
            'VALOR_PRUEBA' => $this->input->post('valor_prueba')
        ];
        $fecha_hora_entrada_vm = [
            'ID_INFRACTOR' => null, // Se incluye el ID del infractor
            'FECHA_HORA_INGRESO_VM' => $this->input->post('fecha_entrada_valoracion'),
            'ID_AGENTE' => $this->input->post('act_custodio')  // Esto recibirá el ID_AGENTE que seleccionaste
        ];
        $fecha_hora_salida_vm = [
            'ID_INFRACTOR' => null, // Se incluye el ID del infractor
            'FECHA_HORA_SALIDA_VM' => $this->input->post('fecha_salida_valoracion'),
            'ID_AGENTE' => $this->input->post('act_custodio') // Esto recibirá el ID_AGENTE que seleccionaste

        ];
        $comentarios = [
            'ID_INFRACTOR' => null,
            'OBSERVACION' => $this->input->post('observacion') ?: 'No registra',
            'NOVEDAD' => $this->input->post('novedad') ?: 'No registra'
        ];
        $fecha_procedimiento = [
            'ID_PROCESO' => null, // Incluye  el ID del proceso relacionado
            'FECHA_PROCEDIMIENTO' => $this->input->post('fecha_procedimiento') // Obtiene el valor desde el formulario
        ];
        $fecha_ingresos_cdit = [
            'ID_INFRACTOR' => null,
            'ID_CDIT' => $this->input->post('centro_detencion'),
            'FECHA_HORA_INGRESO_CDIT' => $this->input->post('fecha_hora_recibe'),
            'ACT_RECIBE_CDIT' => $this->input->post('act_cdit')     
        ];
        $cant_periodos = [
            'ID_INFRACTOR' => null, // Esto se asignará más adelante
            'ID_CDIT' => intval($this->input->post('centro_detencion')),
            'ANIOS' => intval($this->input->post('tiempo_detenido_anos')),
            'MESES' => intval($this->input->post('tiempo_detenido_meses')),
            'DIAS' => intval($this->input->post('tiempo_detenido_dias')),
            'HORAS' => intval($this->input->post('tiempo_detenido_horas'))
        ];
        
     
        // Agrupar archivos
        $archivos = [
            'foto_detencion' => $_FILES['foto_detencion'] ?? null,
            'foto_libertad' => $_FILES['foto_libertad'] ?? null,
            'foto_pertenencias' => $_FILES['foto_pertenencias'] ?? null
        ];
        
        
        return [
            'placas' => $placas,
            'causas_distrito_infractor_canton' => $causas_distrito_infractor_canton,
            'pruebas' => $pruebas,
            'comentarios' => $comentarios,
            'archivos' => $archivos,
            'fecha_hora_entrada_vm' => $fecha_hora_entrada_vm,
            'fecha_hora_salida_vm' => $fecha_hora_salida_vm,
            'fecha_procedimiento' => $fecha_procedimiento,
            'fecha_ingresos_cdit' => $fecha_ingresos_cdit,
            'cant_periodos' => $cant_periodos  // Agregar esta línea
        ];
    }
    
        private function insertar_datos_secuencialmente($datos) 
        {
            
            $id_infractor = $this->input->post('id_infractor');
            $infractor = $this->ProcesosModel->obtener_infractor($id_infractor);

            
            
            // 4. Insertar agente de procedimiento
            $id_agente_procede = $this->input->post('act_id');
           
            // 5. Insertar placa
            if (!$this->db->insert('placas', $datos['placas'])) {
                throw new Exception('Error al insertar infractor');
            }
            $id_placa = $this->db->insert_id();
            
            // 6. Insertar proceso (relaciona las entidades principales)
            // 6. Construir y registrar proceso
            $proceso_data = [
                'ID_USUARIO' => $this->session->userdata('id_usuario'),
                'ID_INFRACTOR' => $id_infractor,
                'ID_PLACA' => $id_placa,
                'ID_AGENTE' => $id_agente_procede,
                'NOMBRE_PROCESO' => 'Registro de Infractor',
                'FECHA_REGISTRO' => date('Y-m-d H:i:s')
            ];
        
            if (!$this->db->insert('procesos', $proceso_data)) {
                throw new Exception('Error al insertar proceso');
             }
            $id_proceso = $this->db->insert_id();
            

            $rutas_fotos_pertenencias = $this->guardar_fotos_pertenencias(
                $id_infractor, 
                $id_proceso,  // Agregamos el id_proceso aquí
                $infractor, 
                $datos['archivos']
            );
             // 7. Procesar fotos de libertad (ahora incluyendo id_proceso)
            $ruta_foto_libertad = $this->guardar_foto_libertad($id_infractor, $id_proceso, $infractor, $datos['archivos']);
    
            // 8. Procesar fotos de detención (ahora incluyendo id_proceso)
            $ruta_foto_detencion = $this->guardar_foto_detencion($id_infractor, $id_proceso, $infractor, $datos['archivos']);
             
            // 9. Insertar datos en fechas_procedimiento (dependen del ID del proceso)
            $datos['fecha_procedimiento']['ID_PROCESO'] = $id_proceso;
            if (!$this->db->insert('fechas_procedimiento', $datos['fecha_procedimiento'])) {
                throw new Exception('Error al insertar en fechas_procedimiento');
            }
            
            $datos['comentarios']['ID_INFRACTOR'] = $id_infractor;
            if (!$this->db->insert('comentarios', $datos['comentarios'])) {
                throw new Exception('Error al insertar en comentarios');
            }

            $datos['pruebas']['ID_INFRACTOR'] = $id_infractor;
            if (!$this->db->insert('pruebas', $datos['pruebas'])) {
                throw new Exception('Error al insertar en pruebas');
            }
            
            // 10. Insertar datos en causas_distrito_canton (dependen del ID del infractor)
             $datos['causas_distrito_infractor_canton']['ID_INFRACTOR'] = $id_infractor;
             if (!$this->db->insert('causa_distrito_infractor_canton', $datos['causas_distrito_infractor_canton'])) {
                throw new Exception('Error al insertar en causas_distrito_canton');
            }
             // 11. Insertar entrada valoración médica si existe
            if (!empty($datos['fecha_hora_entrada_vm']['FECHA_HORA_INGRESO_VM'])) {
                $datos['fecha_hora_entrada_vm']['ID_INFRACTOR'] = $id_infractor;
                if (!$this->db->insert('fecha_ingresos_vm', $datos['fecha_hora_entrada_vm'])) {
                    throw new Exception('Error al insertar entrada valoración médica');
                }
            }

            // 12. Insertar salida valoración médica si existe
             if (!empty($datos['fecha_hora_salida_vm']['FECHA_HORA_SALIDA_VM'])) {
                $datos['fecha_hora_salida_vm']['ID_INFRACTOR'] = $id_infractor;
                if (!$this->db->insert('fecha_salidas_vm', $datos['fecha_hora_salida_vm'])) {
                    throw new Exception('Error al insertar salida valoración médica');
                }
            }

                   // 12. Insertar Fecha Ingreso Cdit si existe
             
           // Verificar y hacer la inserción para fecha_ingresos_cdit
            if (
                !empty($datos['fecha_ingresos_cdit']['ID_CDIT']) && 
                !empty($datos['fecha_ingresos_cdit']['FECHA_HORA_INGRESO_CDIT']) && 
                !empty($datos['fecha_ingresos_cdit']['ACT_RECIBE_CDIT'])
            ) {
                $datos['fecha_ingresos_cdit']['ID_INFRACTOR'] = $id_infractor; // Asignar el ID_INFRACTOR
                if (!$this->db->insert('fecha_ingresos_cdit', $datos['fecha_ingresos_cdit'])) {
                    throw new Exception('Error al insertar en fecha_ingresos_cdit');
                }
            } else {
                log_message('error', 'Datos incompletos para fecha_ingresos_cdit: ' . json_encode($datos['fecha_ingresos_cdit']));
            }

            // Verificar y hacer la inserción para cant_periodos
            if (
                !empty($datos['cant_periodos']['ID_CDIT']) && // ID_CDIT debe ser un valor válido
                is_numeric($datos['cant_periodos']['ANIOS']) && 
                is_numeric($datos['cant_periodos']['MESES']) && 
                is_numeric($datos['cant_periodos']['DIAS']) && 
                is_numeric($datos['cant_periodos']['HORAS'])
            ) {
                $datos['cant_periodos']['ID_INFRACTOR'] = $id_infractor; // Asignar el ID_INFRACTOR
                if (!$this->db->insert('cant_periodos', $datos['cant_periodos'])) {
                    throw new Exception('Error al insertar en cant_periodos');
                }
            } else {
                log_message('error', 'Datos inválidos para cant_periodos: ' . json_encode($datos['cant_periodos']));
            }

            
}
            
     

    public function validar_cedula($cedula) 
    {

        // Usa la función del modelo para validar la cédula
        if (!$this->ValidatesModel->validarCedula($cedula)) {
            // Si la cédula no es válida, devuelve FALSE
            $this->form_validation->set_message('validar_cedula', 'La cédula ingresada no es válida.');
            return FALSE;
        }

        // Si es válida, devuelve TRUE
        return TRUE;
    }
    public function validar_fecha_rango($fecha)
    {
        // Convertir la fecha ingresada a formato de timestamp
        $fechaIngresada = strtotime($fecha);
        if ($fechaIngresada === false) {
            $this->form_validation->set_message('validar_fecha_rango', 'El campo %s tiene un formato de fecha y hora inválido.');
            return FALSE;
        }

        // Definir el rango de fechas permitido
        $fechaMinima = strtotime('2018-01-01 00:00:00'); // Desde el 1 de enero de 2018
        $fechaActual = time(); // Fecha y hora actual del sistema

        // Verificar si está dentro del rango permitido
        if ($fechaIngresada < $fechaMinima || $fechaIngresada > $fechaActual) {
            $this->form_validation->set_message('validar_fecha_rango', 'El campo %s debe estar entre el 1 de enero de 2018 y la fecha y hora actuales.');
            return FALSE;
        }

        return TRUE; // La fecha y hora son válidas
    }
    public function validar_imagen($str, $field_name) // $field_name es el nombre del campo en el formulario
{
    // Tipos de archivos permitidos (imágenes y PDF)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];

    // Verificar si el campo existe en $_FILES
    if (isset($_FILES[$field_name])) {
        // Recorrer los archivos cargados
        foreach ($_FILES[$field_name]['name'] as $key => $filename) {
            // Verificar si hubo errores en el archivo actual
            if ($_FILES[$field_name]['error'][$key] !== UPLOAD_ERR_OK) {
                $this->form_validation->set_message('validar_imagen', "Error al cargar el archivo {$filename}.");
                return false;
            }

            // Obtener el tipo del archivo actual
            $file_type = $_FILES[$field_name]['type'][$key];

            // Verificar si el tipo de archivo es válido
            if (!in_array($file_type, $allowed_types)) {
                $this->form_validation->set_message('validar_imagen', "El archivo {$filename} no es válido. Solo se permiten imágenes y PDF.");
                return false;
            }
        }

        // Si todos los archivos son válidos, retorna true
        return true;
    }

    // Si no se seleccionaron archivos
    $this->form_validation->set_message('validar_imagen', 'Debe seleccionar al menos un archivo.');
    return false;
}
}