<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase para convertir PDFs a imágenes
 * Requiere que ImageMagick y la extensión PHP Imagick estén instalados
 */
class Pdf_to_image {
    
    private $ci;
    private $quality = 90;
    private $resolution = 150;
    private $output_format = 'jpg';
    private $temp_folder = 'uploads/temp/';
    private $cache_folder = 'uploads/pdf_images/';
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->ci =& get_instance();
        
        // Crear carpetas si no existen
        if (!file_exists(FCPATH . $this->temp_folder)) {
            mkdir(FCPATH . $this->temp_folder, 0755, true);
        }
        
        if (!file_exists(FCPATH . $this->cache_folder)) {
            mkdir(FCPATH . $this->cache_folder, 0755, true);
        }
    }
    
    /**
     * Configurar la calidad de las imágenes
     * @param int $quality 1-100
     * @return $this
     */
    public function set_quality($quality) {
        $this->quality = max(1, min(100, intval($quality)));
        return $this;
    }
    
    /**
     * Configurar la resolución de las imágenes
     * @param int $resolution DPI
     * @return $this
     */
    public function set_resolution($resolution) {
        $this->resolution = max(72, min(300, intval($resolution)));
        return $this;
    }
    
    /**
     * Configurar el formato de salida
     * @param string $format jpg, png, etc.
     * @return $this
     */
    public function set_format($format) {
        $allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($format), $allowed_formats)) {
            $this->output_format = strtolower($format);
        }
        return $this;
    }
    
    /**
     * Convertir PDF a imágenes
     * @param string $pdf_path Ruta al archivo PDF
     * @return array Rutas a las imágenes generadas
     */
    public function convert($pdf_path) {
        // Verificar si existe el archivo PDF
        if (!file_exists($pdf_path)) {
            log_message('error', 'PdfToImage: PDF file not found: ' . $pdf_path);
            return false;
        }
        
        // Verificar si la extensión Imagick está disponible
        if (!extension_loaded('imagick')) {
            log_message('error', 'PdfToImage: Imagick extension not loaded');
            return false;
        }
        
        try {
            // Generar un hash único para este PDF
            $pdf_hash = md5_file($pdf_path);
            $cache_dir = FCPATH . $this->cache_folder . $pdf_hash . '/';
            
            // Verificar si ya existe en caché
            if (file_exists($cache_dir)) {
                // Obtener imágenes de caché
                $image_files = glob($cache_dir . '*.' . $this->output_format);
                if (!empty($image_files)) {
                    $result = [];
                    foreach ($image_files as $image) {
                        $result[] = str_replace(FCPATH, '', $image);
                    }
                    return $result;
                }
            } else {
                mkdir($cache_dir, 0755, true);
            }
            
            // Crear un nuevo objeto Imagick
            $imagick = new Imagick();
            
            // Configurar las opciones
            $imagick->setResolution($this->resolution, $this->resolution);
            
            // Leer el PDF
            $imagick->readImage($pdf_path);
            
            // Convertir a imágenes
            $num_pages = $imagick->getNumberImages();
            $image_paths = [];
            
            for ($i = 0; $i < $num_pages; $i++) {
                // Seleccionar la página
                $imagick->setIteratorIndex($i);
                
                // Convertir a imagen
                $imagick->setImageFormat($this->output_format);
                $imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
                $imagick->setImageCompressionQuality($this->quality);
                
                // Guardar la imagen
                $image_path = $cache_dir . 'page_' . sprintf('%03d', $i+1) . '.' . $this->output_format;
                $imagick->writeImage($image_path);
                
                // Añadir a la lista de rutas
                $image_paths[] = str_replace(FCPATH, '', $image_path);
            }
            
            // Liberar memoria
            $imagick->clear();
            $imagick->destroy();
            
            return $image_paths;
            
        } catch (Exception $e) {
            log_message('error', 'PdfToImage: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Convertir una URL de PDF a imágenes
     * @param string $pdf_url URL del PDF
     * @return array Rutas a las imágenes generadas
     */
    public function convert_from_url($pdf_url) {
        // Generar un nombre temporal para el archivo
        $temp_file = FCPATH . $this->temp_folder . md5($pdf_url) . '.pdf';
        
        // Descargar el archivo
        $pdf_content = @file_get_contents($pdf_url);
        if ($pdf_content === false) {
            log_message('error', 'PdfToImage: Could not download PDF from URL: ' . $pdf_url);
            return false;
        }
        
        // Guardar el archivo en disco
        file_put_contents($temp_file, $pdf_content);
        
        // Convertir el PDF a imágenes
        $result = $this->convert($temp_file);
        
        // Eliminar el archivo temporal
        @unlink($temp_file);
        
        return $result;
    }
    
    /**
     * Limpiar archivos temporales
     */
    public function clean_temp_files() {
        $files = glob(FCPATH . $this->temp_folder . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                @unlink($file);
            }
        }
    }
}