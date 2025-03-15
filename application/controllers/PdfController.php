<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {
    
    // Instanciar modelos
    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('SearchModel');
        $this->load->helper('url');
       
    }
    
    // Constructor y métodos existentes...
    
    /**
     * Método para generar PDF de detalles del infractor
     * 
     * @param int $id_infractor ID del infractor
     * @return void
     */
    public function generarPDF($id_proceso) {
        // Verificar si el usuario está logueado
        if (!$this->session->userdata('id_usuario')) {
            redirect('login');
            return;
        }
    
        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);
    
        // Obtener el proceso
        $proceso = $this->SearchModel->obtener_proceso($id_proceso);
        
        if (!$proceso) {
            show_error('Proceso no encontrado');
            return;
        }
    
        // Preparar array de datos usando id_proceso en lugar de id_infractor
        $data = [
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png',
            
            // Datos del proceso
            'proceso' => $proceso,
            
            // Datos del infractor (este sí usa ID_INFRACTOR del proceso)
            'infractor' => $this->SearchModel->obtener_infractor($proceso['ID_INFRACTOR']),
            
            // El resto de consultas deberían usar id_proceso
            'act_procede' => $this->SearchModel->obtener_act_procede($id_proceso),
            'placas' => $this->SearchModel->obtener_placas($id_proceso),
            'tipo_placa' => $this->SearchModel->obtener_tipo_placa($id_proceso),
            'ruta_foto' => $this->SearchModel->obtener_foto_infractor($proceso['ID_INFRACTOR']),
            'causas_distrito_infractor_canton' => $this->SearchModel->obtener_causa_distrito($id_proceso),
            'pruebas' => $this->SearchModel->obtener_pruebas($id_proceso),
            'fecha_procedimiento' => $this->SearchModel->obtener_fechas_procedimiento($id_proceso),
            'fecha_hora_entrada_vm' => $this->SearchModel->obtener_fecha_hora_entrada($id_proceso),
            'fotos_pertenencias' => $this->SearchModel->obtener_fotos_pertenencias($id_proceso),
            'fecha_hora_salida_vm' => $this->SearchModel->obtener_fecha_hora_salida($id_proceso),
            'comentarios' => $this->SearchModel->obtener_comentarios($id_proceso),
            'archivos_libertad' => $this->SearchModel->obtener_archivos_libertad($id_proceso),
            'datos_cdit' => $this->SearchModel->obtener_datos_cdit($id_proceso),
            'archivos_detencion' => $this->SearchModel->obtener_archivos_detencion($id_proceso),
            'fecha_registro' => $this->SearchModel->obtener_fecha_registro($id_proceso)
        ];
    
        if (!$data['infractor']) {
            show_error('Infractor no encontrado');
            return;
        }
    
        // Cargar la biblioteca DOMPDF
        $this->load->library('Pdf');
        
        // Cargar la vista para el PDF (template_pdf.php)
        $html = $this->load->view('template_pdf', $data, true);
        
        // Generar el PDF
        $filename = "Infractor_" . $data['infractor']['C_INFRACTOR'] . "_" . date('Y-m-d');
        $this->pdf->generate($html, $filename);
    }
    
   
    public function mostrarPDF($id_proceso) {
        // Cargar datos como lo haces en tu función 'detalle'
        $proceso = $this->SearchModel->obtener_proceso($id_proceso);
        
        if (!$proceso) {
            show_error('Proceso no encontrado');
            return;
        }
        
        // Obtener documentos relacionados
        $archivos_libertad = $this->SearchModel->obtener_archivos_libertad($id_proceso);
        $archivos_detencion = $this->SearchModel->obtener_archivos_detencion($id_proceso);
        
        // Cargar biblioteca de conversión de PDF
        $this->load->library('pdf_to_image');
        
        // Contenedor para almacenar las imágenes de los documentos
        $data['imagenes_documentos'] = [];
        
        // Procesar documentos de libertad
        if (!empty($archivos_libertad)) {
            foreach ($archivos_libertad as $archivo) {
                $ruta_archivo = $archivo['RUTA_ARCH_LIBERTAD'];
                $extension = pathinfo($ruta_archivo, PATHINFO_EXTENSION);
                
                // Solo procesar PDFs
                if (strtolower($extension) === 'pdf') {
                    $ruta_completa = FCPATH . $ruta_archivo;
                    
                    // Convertir PDF a imágenes
                    $imagenes = $this->pdf_to_image
                        ->set_resolution(150)  // Ajusta según necesites
                        ->set_quality(85)      // Ajusta según necesites
                        ->convert($ruta_completa);
                    
                    if ($imagenes) {
                        $data['imagenes_documentos'][] = [
                            'nombre' => basename($ruta_archivo),
                            'tipo' => 'libertad',
                            'imagenes' => $imagenes
                        ];
                    }
                }
            }
        }
        
        // Procesar documentos de detención
        if (!empty($archivos_detencion)) {
            foreach ($archivos_detencion as $archivo) {
                $ruta_archivo = $archivo['RUTA_ARCH_DETENCION'];
                $extension = pathinfo($ruta_archivo, PATHINFO_EXTENSION);
                
                // Solo procesar PDFs
                if (strtolower($extension) === 'pdf') {
                    $ruta_completa = FCPATH . $ruta_archivo;
                    
                    // Convertir PDF a imágenes
                    $imagenes = $this->pdf_to_image
                        ->set_resolution(150)
                        ->set_quality(85)
                        ->convert($ruta_completa);
                    
                    if ($imagenes) {
                        $data['imagenes_documentos'][] = [
                            'nombre' => basename($ruta_archivo),
                            'tipo' => 'detencion',
                            'imagenes' => $imagenes
                        ];
                    }
                }
            }
        }
        
        // Cargar la vista
        $this->load->view('vista_documentos_pdf', $data);
    }
    public function vistaPDF($id_proceso) {
        // Obtener todos los datos como antes
        $id_usuario = $this->session->userdata('id_usuario');
        $user_details = $this->UsersModel->get_user_by_id($id_usuario);
    
        // Obtener el proceso
        $proceso = $this->SearchModel->obtener_proceso($id_proceso);
        
        if (!$proceso) {
            show_error('Proceso no encontrado');
            return;
        }
    
        // Preparar array de datos
        $data = [
            'usuario' => $user_details['NOMBRES'] . ' ' . $user_details['APELLIDOS'],
            'foto' => !empty($user_details['FOTO']) ? $user_details['FOTO'] : 'default_profile.png',
            
            // Datos del proceso
            'proceso' => $proceso,
            
            // Datos del infractor (este sí usa ID_INFRACTOR del proceso)
            'infractor' => $this->SearchModel->obtener_infractor($proceso['ID_INFRACTOR']),
            
            // El resto de consultas deberían usar id_proceso
            'act_procede' => $this->SearchModel->obtener_act_procede($id_proceso),
            'placas' => $this->SearchModel->obtener_placas($id_proceso),
            'tipo_placa' => $this->SearchModel->obtener_tipo_placa($id_proceso),
            'ruta_foto' => $this->SearchModel->obtener_foto_infractor($proceso['ID_INFRACTOR']),
            'causas_distrito_infractor_canton' => $this->SearchModel->obtener_causa_distrito($id_proceso),
            'pruebas' => $this->SearchModel->obtener_pruebas($id_proceso),
            'fecha_procedimiento' => $this->SearchModel->obtener_fechas_procedimiento($id_proceso),
            'fecha_hora_entrada_vm' => $this->SearchModel->obtener_fecha_hora_entrada($id_proceso),
            'fotos_pertenencias' => $this->SearchModel->obtener_fotos_pertenencias($id_proceso),
            'fecha_hora_salida_vm' => $this->SearchModel->obtener_fecha_hora_salida($id_proceso),
            'comentarios' => $this->SearchModel->obtener_comentarios($id_proceso),
            'archivos_libertad' => $this->SearchModel->obtener_archivos_libertad($id_proceso),
            'datos_cdit' => $this->SearchModel->obtener_datos_cdit($id_proceso),
            'archivos_detencion' => $this->SearchModel->obtener_archivos_detencion($id_proceso),
            
            // Variables para controlar el modo de impresión
            'print_mode' => true
        ];
    
        // Cargar la biblioteca de conversión de PDF a imagen
        $this->load->library('pdf_to_image');
        
        // Procesar documentos PDFs de libertad
        $data['imagenes_documentos_libertad'] = [];
        if (!empty($data['archivos_libertad'])) {
            foreach ($data['archivos_libertad'] as $archivo) {
                $ruta_archivo = $archivo['RUTA_ARCH_LIBERTAD'];
                $extension = pathinfo($ruta_archivo, PATHINFO_EXTENSION);
                
                // Solo procesar PDFs
                if (strtolower($extension) === 'pdf') {
                    $ruta_completa = FCPATH . $ruta_archivo;
                    
                    // Verificar si el archivo existe
                    if (file_exists($ruta_completa)) {
                        // Convertir PDF a imágenes
                        $imagenes = $this->pdf_to_image
                            ->set_resolution(150)
                            ->set_quality(85)
                            ->convert($ruta_completa);
                        
                        if ($imagenes) {
                            $data['imagenes_documentos_libertad'][] = [
                                'nombre' => basename($ruta_archivo),
                                'imagenes' => $imagenes
                            ];
                        }
                    }
                }
            }
        }
        
        // Procesar documentos PDFs de detención
        $data['imagenes_documentos_detencion'] = [];
        if (!empty($data['archivos_detencion'])) {
            foreach ($data['archivos_detencion'] as $archivo) {
                $ruta_archivo = $archivo['RUTA_ARCH_DETENCION'];
                $extension = pathinfo($ruta_archivo, PATHINFO_EXTENSION);
                
                // Solo procesar PDFs
                if (strtolower($extension) === 'pdf') {
                    $ruta_completa = FCPATH . $ruta_archivo;
                    
                    // Verificar si el archivo existe
                    if (file_exists($ruta_completa)) {
                        // Convertir PDF a imágenes
                        $imagenes = $this->pdf_to_image
                            ->set_resolution(150)
                            ->set_quality(85)
                            ->convert($ruta_completa);
                        
                        if ($imagenes) {
                            $data['imagenes_documentos_detencion'][] = [
                                'nombre' => basename($ruta_archivo),
                                'imagenes' => $imagenes
                            ];
                        }
                    }
                }
            }
        }
    
        if (!$data['infractor']) {
            show_error('Infractor no encontrado');
            return;
        }
    
        // Cargar la vista optimizada para impresión
        $this->load->view('template_pdf', $data);
    }
}