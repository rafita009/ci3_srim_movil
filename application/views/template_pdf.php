<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Infractor</title>
     <!-- PDF.js biblioteca -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        // Configura la ruta al worker de PDF.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';
    </script>
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    
    <style>
        /* Estilos para los contenedores de PDF */
        .pdf-container {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        
        .pdf-container canvas {
            display: block;
            margin: 0 auto;
            max-width: 100%;
        }
        
        /* Estilos para impresión */
        @media print {
            .no-print {
                display: none !important;
            }
            
            .document-item {
                page-break-before: always;
            }
            
            .pdf-container {
                border: none;
                background-color: transparent;
            }
        }
    </style>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 20px;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3366cc;
        }
        .header h1 {
            color: #3366cc;
            margin: 0;
            font-size: 24px;
        }
        .proceso-info {
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .section h2 {
            margin-top: 0;
            color: #3366cc;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            font-size: 18px;
        }
        .row {
            display: flex;
            margin-bottom: 10px;
        }
        .col {
            flex: 1;
            padding-right: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .photo-box {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            margin-bottom: 15px;
            background-color: #f5f5f5;
        }
        .photo-box img {
            max-width: 150px;
            max-height: 150px;
        }
        .info-block {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Proceso #<?= $proceso['ID_PROCESO'] ?></h1>
        <p><strong>Resolución de Audiencia:</strong> <?= $proceso['RESOLUCION'] ?></p>
    </div>

    <div class="row">
        <!-- Columna Izquierda -->
        <div class="col" style="width: 30%;">
            <div class="section">
                <h2>Foto del Infractor</h2>
                <div class="photo-box">
                    <?php if (!empty($ruta_foto)): ?>
                    <img src="<?php echo base_url($ruta_foto); ?>" alt="Foto del Infractor">
                    <?php else: ?>
                    <p>No hay foto disponible para este infractor.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="section">
                <h2>Fotos de Pertenencias</h2>
                <?php if (!empty($fotos_pertenencias)): ?>
                    <?php foreach ($fotos_pertenencias as $index => $foto): ?>
                        <div class="photo-box">
                            <img src="<?php echo base_url($foto['RUTA_PERTENENCIAS']); ?>" 
                                 alt="Pertenencia <?php echo $index + 1; ?>">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay fotos de pertenencias disponibles.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="col" style="width: 70%;">
            <div class="section">
                <h2>Datos del Infractor</h2>
                <div class="info-block">
                    <div class="row">
                        <div class="col">
                            <p><span class="label">Nombres:</span> <?= $infractor['N_INFRACTOR']; ?></p>
                            <p><span class="label">Cédula:</span> <?= $infractor['C_INFRACTOR']; ?></p>
                        </div>
                        <div class="col">
                            <p><span class="label">Apellidos:</span> <?= $infractor['A_INFRACTOR']; ?></p>
                            <p><span class="label">Teléfono:</span> <?= $infractor['T_INFRACTOR']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Datos del A.C.T que Procede</h2>
                <div class="info-block">
                    <div class="row">
                        <div class="col">
                            <p><span class="label">Nombres A.C.T:</span> <?= $act_procede['NOMBRES_ACT']; ?></p>
                        </div>
                        <div class="col">
                            <p><span class="label">Apellidos A.C.T:</span> <?= $act_procede['APELLIDOS_ACT']; ?></p>
                        </div>
                        <div class="col">
                            <p><span class="label">Nro A.C.T:</span> <?= $act_procede['NRO_ACT']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Datos del Procedimiento</h2>
                <div class="info-block">
                    <div class="row">
                        <div class="col">
                            <p><span class="label">Fecha:</span> 
                                <?= $fecha_procedimiento[0]['FECHA_PROCEDIMIENTO'] ?? 'No disponible'; ?>
                            </p>
                            <p><span class="label">Tipo de Placa:</span> <?= $tipo_placa; ?></p>
                        </div>
                        <div class="col">
                            <p><span class="label">Número de Placa:</span> 
                                <?= $placas[0]['PLACA'] ?? 'No disponible'; ?>
                            </p>
                            <p><span class="label">Causa:</span> 
                                <?= $causas_distrito_infractor_canton['CAUSA'] ?? 'No disponible'; ?>
                            </p>
                        </div>
                        <div class="col">
                            <p><span class="label">Tipo de Prueba:</span> <?= $pruebas['NOMBRE_PRUEBA']; ?></p>
                            <p><span class="label">Valor Prueba:</span> <?= $pruebas['VALOR_PRUEBA']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Ubicación y Responsable</h2>
                <div class="info-block">
                    <div class="row">
                        <div class="col">
                            <p><span class="label">Distrito:</span> 
                                <?= $causas_distrito_infractor_canton['NOMBRE_DISTRITO'] ?? 'No disponible'; ?>
                            </p>
                        </div>
                        <div class="col">
                            <p><span class="label">Cantón:</span> 
                                <?= $causas_distrito_infractor_canton['NOMBRE_CANTON'] ?? 'No disponible'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Datos de Valoración Médica</h2>
                <div class="info-block">
                    <div class="row">
                        <div class="col">
                            <p><span class="label">Fecha y Hora de Entrada:</span><br>
                                <?= $fecha_hora_entrada_vm['FECHA_HORA_INGRESO_VM'] ?? 'No disponible'; ?>
                            </p>
                        </div>
                        <div class="col">
                            <p><span class="label">Fecha y Hora de Salida:</span><br>
                                <?= $fecha_hora_salida_vm['FECHA_HORA_SALIDA_VM'] ?? 'No disponible'; ?>
                            </p>
                        </div>
                        <div class="col">
                            <p><span class="label">Agente Custodio:</span><br>
                                <?= !empty($fecha_hora_entrada_vm['NOMBRES_ACT']) 
                                    ? $fecha_hora_entrada_vm['NOMBRES_ACT'] . ' ' . $fecha_hora_entrada_vm['APELLIDOS_ACT'] 
                                    : 'No asignado'; 
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Comentarios</h2>
                <div class="info-block">
                    <div class="row">
                        <div class="col">
                            <p><span class="label">Observación:</span> 
                                <?= $comentarios['OBSERVACION'] ?? 'No disponible'; ?>
                            </p>
                        </div>
                        <div class="col">
                            <p><span class="label">Novedad:</span> 
                                <?= $comentarios['NOVEDAD'] ?? 'No disponible'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Detalles de la Detención</h2>
                <table>
                    <tr>
                        <th>Años</th>
                        <th>Meses</th>
                        <th>Días</th>
                        <th>Horas</th>
                    </tr>
                    <tr>
                        <td><?= $datos_cdit['ANIOS'] ?? 'No disponible'; ?></td>
                        <td><?= $datos_cdit['MESES'] ?? 'No disponible'; ?></td>
                        <td><?= $datos_cdit['DIAS'] ?? 'No disponible'; ?></td>
                        <td><?= $datos_cdit['HORAS'] ?? 'No disponible'; ?></td>
                    </tr>
                </table>
                
                <div class="info-block">
                    <div class="row">
                        <div class="col">
                            <p><span class="label">Centro de Detención:</span> 
                                <?= $datos_cdit['NOMBRE_CDIT'] ?? 'No disponible'; ?>
                            </p>
                            <p><span class="label">Dirección:</span> 
                                <?= $datos_cdit['DIRECCION'] ?? 'No disponible'; ?>
                            </p>
                        </div>
                        <div class="col">
                            <p><span class="label">Fecha y Hora:</span> 
                                <?= $datos_cdit['FECHA_HORA_INGRESO_CDIT'] ?? 'No disponible'; ?>
                            </p>
                            <p><span class="label">Agente que recibió en CDIT:</span> 
                                <?= !empty($datos_cdit['NOMBRES_ACT']) 
                                    ? $datos_cdit['NOMBRES_ACT'] . ' ' . $datos_cdit['APELLIDOS_ACT'] 
                                    : 'No asignado'; 
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Documento generado el <?= date('d/m/Y H:i:s') ?></p>
        <p>Este documento es de carácter oficial y confidencial</p>
    </div>
    <!-- Sección para documentos con cada documento en una página separada -->



<!-- Sección para los documentos -->
<div style="page-break-before: always;">
    <h2 style="color: #3366cc; border-bottom: 2px solid #3366cc; padding-bottom: 10px; margin-top: 20px;">
        Documentos Anexos
    </h2>
    
    <!-- Documentos de Libertad -->
    <h3 style="color: #4CAF50; border-bottom: 1px solid #eee; padding-bottom: 5px;">
        Documentos de Libertad
    </h3>
    
    <?php if (!empty($archivos_libertad)): ?>
        <?php foreach ($archivos_libertad as $index => $archivo): 
            $extension = pathinfo($archivo['RUTA_ARCH_LIBERTAD'], PATHINFO_EXTENSION);
            $ruta_completa = base_url($archivo['RUTA_ARCH_LIBERTAD']);
            $nombre_archivo = basename($archivo['RUTA_ARCH_LIBERTAD']);
            $es_pdf = strtolower($extension) === 'pdf';
            $es_imagen = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
        ?>
            <div class="document-item" <?php if ($index > 0) echo 'style="page-break-before: always;"'; ?>>
                <h4><?= htmlspecialchars($nombre_archivo) ?></h4>
                
                <?php if ($es_pdf): ?>
                    <!-- Mostrar PDF usando object -->
                    <div style="text-align: center; width: 100%; height: 600px;">
                        <object data="<?= $ruta_completa ?>" type="application/pdf" width="100%" height="100%">
                            <p>Tu navegador no puede visualizar PDFs directamente.
                               <a href="<?= $ruta_completa ?>" target="_blank">Abrir PDF</a>
                            </p>
                        </object>
                    </div>
                <?php elseif ($es_imagen): ?>
                    <!-- Mostrar imagen directamente -->
                    <div style="text-align: center;">
                        <img src="<?= $ruta_completa ?>" alt="Documento" style="max-width: 100%; max-height: 600px;">
                    </div>
                <?php else: ?>
                    <!-- Para otros tipos de archivo -->
                    <div style="text-align: center; border: 1px solid #ddd; padding: 30px;">
                        <i class="fas fa-file" style="font-size: 50px; color: #757575;"></i>
                        <p>Tipo de documento no visualizable: <?= strtoupper($extension) ?></p>
                        <a href="<?= $ruta_completa ?>" download class="btn btn-secondary no-print">Descargar archivo</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay documentos de libertad disponibles.</p>
    <?php endif; ?>
    
    <!-- Documentos de Detención -->
    <h3 style="color: #F57C00; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-top: 20px;">
        Documentos de Detención
    </h3>
    
    <?php if (!empty($archivos_detencion)): ?>
        <?php foreach ($archivos_detencion as $index => $archivo): 
            $extension = pathinfo($archivo['RUTA_ARCH_DETENCION'], PATHINFO_EXTENSION);
            $ruta_completa = base_url($archivo['RUTA_ARCH_DETENCION']);
            $nombre_archivo = basename($archivo['RUTA_ARCH_DETENCION']);
            $es_pdf = strtolower($extension) === 'pdf';
            $es_imagen = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
        ?>
            <div class="document-item" <?php if ($index > 0) echo 'style="page-break-before: always;"'; ?>>
                <h4><?= htmlspecialchars($nombre_archivo) ?></h4>
                
                <?php if ($es_pdf): ?>
                    <!-- Mostrar PDF usando object -->
                    <div style="text-align: center; width: 100%; height: 600px;">
                        <object data="<?= $ruta_completa ?>" type="application/pdf" width="100%" height="100%">
                            <p>Tu navegador no puede visualizar PDFs directamente.
                               <a href="<?= $ruta_completa ?>" target="_blank">Abrir PDF</a>
                            </p>
                        </object>
                    </div>
                <?php elseif ($es_imagen): ?>
                    <!-- Mostrar imagen directamente -->
                    <div style="text-align: center;">
                        <img src="<?= $ruta_completa ?>" alt="Documento" style="max-width: 100%; max-height: 600px;">
                    </div>
                <?php else: ?>
                    <!-- Para otros tipos de archivo -->
                    <div style="text-align: center; border: 1px solid #ddd; padding: 30px;">
                        <i class="fas fa-file" style="font-size: 50px; color: #757575;"></i>
                        <p>Tipo de documento no visualizable: <?= strtoupper($extension) ?></p>
                        <a href="<?= $ruta_completa ?>" download class="btn btn-secondary no-print">Descargar archivo</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay documentos de detención disponibles.</p>
    <?php endif; ?>
</div>

<style>
@media print {
    .no-print {
        display: none !important;
    }
    
    .document-item {
        page-break-before: always;
    }
    
    /* Esto fuerza a que el navegador imprima bien los documentos */
    object[type="application/pdf"] {
        /* Esta es una técnica para que los PDF se impriman en la vista de impresión */
        position: absolute;
        left: -9999px;
        visibility: hidden;
    }
    
    /* Aquí puedes agregar más estilos para impresión */
}
</style>
</div>
</body>
</html>