<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Cambia esta línea para usar el autoloader de Composer
require_once FCPATH . 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {
    public function generate($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = 'portrait') {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', TRUE);
        $options->set('isRemoteEnabled', TRUE);
        $options->set('isFontSubsettingEnabled', TRUE);
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        
        if ($stream) {
            // 1 = descargar el archivo, 0 = verlo en el navegador
            $dompdf->stream($filename . ".pdf", array("Attachment" => 1));
        } else {
            return $dompdf->output();
        }
    }
}