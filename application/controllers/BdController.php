<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BdController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar las librerías necesarias
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UsersModel'); // Carga el modelo de Usuario

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

    public function index() {
        // Obtener los detalles del usuario desde el modelo
        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);
        
        // Cargar la vista con la lista de respaldos disponibles
        $data['title'] = 'Gestión de Respaldos';
        
        // Obtener la lista de archivos de respaldo
        $data['backups'] = $this->get_backup_files();
        
        // Obtener el nombre del último respaldo generado
        $data['ultimo_respaldo'] = $this->get_latest_backup();
        
        // Datos del usuario para la vista
        $data['usuario'] = $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS']; 
        $data['foto'] = !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png';
        
        // Cargar las vistas
        $this->load->view('admin/respaldos', $data);
    }

    private function get_backup_files() {
        $backup_path = FCPATH . 'backups/';
        $backup_files = array();
        
        if (is_dir($backup_path)) {
            $files = scandir($backup_path);
            
            foreach ($files as $file) {
                // Ahora buscamos archivos .sql en lugar de .zip
                if ($file != '.' && $file != '..' && strpos($file, '.sql') !== false) {
                    $backup_files[] = array(
                        'name' => $file,
                        'size' => filesize($backup_path . $file),
                        'date' => date('Y-m-d H:i:s', filemtime($backup_path . $file))
                    );
                }
            }
            
            // Ordenar por fecha de modificación (más reciente primero)
            usort($backup_files, function($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            });
        }
        
        // Asegúrate de que siempre se devuelva un array, incluso si está vacío
        return $backup_files;
    }
    
    // Obtener el último respaldo generado
    private function get_latest_backup() {
        $backups = $this->get_backup_files();
        return !empty($backups) ? $backups[0]['name'] : null;
    }
    
    public function generate() {
        // Configuración del respaldo
        $config = array(
            'format'      => 'txt',              // Formato cambiado a texto plano
            'filename'    => 'backup-' . date('Y-m-d-H-i-s') . '.sql',  // Nombre del archivo SQL
            'add_drop'    => TRUE,               // Agregar sentencias DROP TABLE
            'add_insert'  => TRUE,               // Agregar sentencias INSERT
            'newline'     => "\n",               // Carácter de nueva línea
            'foreign_key_checks' => FALSE        // Desactivar verificación de claves foráneas
        );

        // Crear el respaldo
        $backup = $this->dbutil->backup($config);

        // Nombre del archivo SQL
        $backup_name = 'backup-' . date('Y-m-d-H-i-s') . '.sql';
        
        // Guardar el archivo en el servidor
        $save_path = FCPATH . 'backups/';
        
        // Crear la carpeta si no existe
        if (!is_dir($save_path)) {
            mkdir($save_path, 0777, TRUE);
        }
        
        // Guardar el archivo
        write_file($save_path . $backup_name, $backup);
        
        // Forzar la descarga del archivo
        force_download($backup_name, $backup);
    }
    
    public function scheduled_backup() {
        // Esta función puede ser llamada mediante CRON para respaldos automáticos
        // Configuración del respaldo
        $config = array(
            'format'      => 'txt',              // Formato cambiado a texto plano
            'filename'    => 'auto-backup-' . date('Y-m-d-H-i-s') . '.sql',
            'add_drop'    => TRUE,
            'add_insert'  => TRUE,
            'newline'     => "\n",
            'foreign_key_checks' => FALSE
        );

        // Crear el respaldo
        $backup = $this->dbutil->backup($config);

        // Nombre del archivo SQL
        $backup_name = 'auto-backup-' . date('Y-m-d-H-i-s') . '.sql';
        
        // Guardar el archivo en el servidor
        $save_path = FCPATH . 'backups/';
        
        // Crear la carpeta si no existe
        if (!is_dir($save_path)) {
            mkdir($save_path, 0777, TRUE);
        }
        
        // Guardar el archivo
        if (write_file($save_path . $backup_name, $backup)) {
            log_message('info', 'Backup automático creado exitosamente: ' . $backup_name);
            return TRUE;
        } else {
            log_message('error', 'Error al crear backup automático');
            return FALSE;
        }
    }
    
    public function download($filename = NULL) {
        if ($filename === NULL) {
            $this->session->set_flashdata('message', 'No se especificó el archivo a descargar');
            $this->session->set_flashdata('message_type', 'danger');
            redirect('BdController');
        }
        
        $file_path = FCPATH . 'backups/' . $filename;
        
        if (file_exists($file_path)) {
            // Forzar la descarga del archivo
            $this->load->helper('download');
            $data = file_get_contents($file_path);
            force_download($filename, $data);
        } else {
            $this->session->set_flashdata('message', 'El archivo no existe');
            $this->session->set_flashdata('message_type', 'danger');
            redirect('BdController');
        }
    }
    
    public function delete($filename = NULL) {
        if ($filename === NULL) {
            $this->session->set_flashdata('message', 'No se especificó el archivo a eliminar');
            $this->session->set_flashdata('message_type', 'danger');
            redirect('BdController');
        }
        
        $file_path = FCPATH . 'backups/' . $filename;
        
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                $this->session->set_flashdata('message', 'Respaldo eliminado correctamente');
                $this->session->set_flashdata('message_type', 'success');
            } else {
                $this->session->set_flashdata('message', 'Error al eliminar el respaldo');
                $this->session->set_flashdata('message_type', 'danger');
            }
        } else {
            $this->session->set_flashdata('message', 'El archivo no existe');
            $this->session->set_flashdata('message_type', 'danger');
        }
        
        redirect('BdController');
    }
    
    // Nueva función para restaurar el último respaldo
    public function restore($filename = NULL) {
        // Verificar permisos (solo administradores deberían poder hacer esto)
       
        
        if ($filename === NULL) {
            $this->session->set_flashdata('message', 'No se especificó el archivo a restaurar');
            $this->session->set_flashdata('message_type', 'danger');
            redirect('BdController');
        }
        
        $file_path = FCPATH . 'backups/' . $filename;
        
        if (!file_exists($file_path)) {
            $this->session->set_flashdata('message', 'El archivo de respaldo no existe');
            $this->session->set_flashdata('message_type', 'danger');
            redirect('BdController');
        }
        
        // Leer el contenido del archivo SQL
        $sql = file_get_contents($file_path);
        
        // Dividir las consultas SQL
        $queries = explode(';', $sql);
        
        // Conectar directamente a la base de datos para ejecutar las consultas
        $this->load->database();
        
        // Deshabilitar las verificaciones de claves foráneas
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        
        // Contador de consultas exitosas
        $success_count = 0;
        $error_count = 0;
        
        // Ejecutar cada consulta
        foreach ($queries as $query) {
            $query = trim($query);
            if ($query) {
                try {
                    $this->db->query($query);
                    $success_count++;
                } catch (Exception $e) {
                    $error_count++;
                    log_message('error', 'Error al restaurar la base de datos: ' . $e->getMessage());
                }
            }
        }
        
        // Habilitar nuevamente las verificaciones de claves foráneas
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
        
        if ($error_count == 0) {
            $this->session->set_flashdata('message', 'Base de datos restaurada correctamente. Se ejecutaron ' . $success_count . ' consultas.');
            $this->session->set_flashdata('message_type', 'success');
        } else {
            $this->session->set_flashdata('message', 'La restauración completó con ' . $error_count . ' errores. Consulta el log para más detalles.');
            $this->session->set_flashdata('message_type', 'warning');
        }
        
        redirect('BdController');
    }
}