<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe del Proceso #<?= $proceso['ID_PROCESO'] ?></title>
    <style>
    /* Estilos generales para el PDF */
    body {
        font-family: 'Helvetica', 'Arial', sans-serif;
        line-height: 1.5;
        color: #333;
        margin: 0;
        padding: 0;
        background-color: #fff;
        font-size: 12px;
    }

    /* Encabezado del documento */
    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 2px solid #1e5180;
        background: linear-gradient(to right, #f9f9f9, #e0ecf5);
        margin-bottom: 15px;
    }

    .logo-title {
        display: flex;
        align-items: center;
    }

    .logo {
        height: 60px;
        margin-right: 20px;
    }

    .header-title {
        flex-grow: 1;
    }

    .header-title h1 {
        color: #1e5180;
        margin: 0 0 5px 0;
        font-size: 22px;
    }

    .header-title p {
        margin: 0;
        font-size: 14px;
        color: #555;
    }

    /* Contenedor principal con disposición vertical */
    .container {
        padding: 0 20px;
        box-sizing: border-box;
    }

    /* Secciones y encabezados */
    .section {
        margin-bottom: 20px;
        page-break-inside: avoid;
    }

    .section-title {
        color: #1e5180;
        font-size: 16px;
        border-bottom: 2px solid #1e5180;
        padding-bottom: 5px;
        margin-top: 0;
        margin-bottom: 10px;
        position: relative;
        display: flex;
        align-items: center;
    }

    .section-title::before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 16px;
        background-color: #1e5180;
        margin-right: 8px;
    }

    /* Cajas de información */
    .info-block {
        background-color: #f9f9f9;
        border-radius: 4px;
        padding: 10px 15px;
        margin-bottom: 15px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .info-row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .info-col {
        padding: 0 10px;
        box-sizing: border-box;
    }

    .info-col-half {
        width: 50%;
    }

    .info-col-third {
        width: 33.33%;
    }

    .info-item {
        margin: 8px 0;
        font-size: 13px;
    }

    .info-label {
        font-weight: bold;
        color: #1e5180;
        display: block;
        margin-bottom: 2px;
    }

    .info-value {
        display: block;
    }

    /* Sección de fotos */
    .photos-section {
        margin-bottom: 20px;
    }

    .photos-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Manejo de fotos */
    .photo-container {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        text-align: center;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .infractor-photo img {
        max-width: 100%;
        max-height: 200px;
        display: block;
        margin: 0 auto;
        border-radius: 2px;
    }

    .pertenencias-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
        justify-content: flex-start;
    }

    .pertenencia-item {
        width: calc(25% - 8px);
        /* 4 fotos por fila con espaciado */
        max-width: 120px;
        min-width: 80px;
        margin-bottom: 10px;
        box-sizing: border-box;
        text-align: center;
    }

    .pertenencia-item img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        display: block;
        border-radius: 3px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* Estado del proceso */
    .status-block {
        margin-bottom: 20px;
        padding: 10px 15px;
        border-radius: 4px;
        font-weight: bold;
        font-size: 14px;
    }

    .status-libertad {
        background-color: #e8f5e9;
        color: #2e7d32;
        border-left: 4px solid #2e7d32;
    }

    .status-detencion {
        background-color: #ffebee;
        color: #c62828;
        border-left: 4px solid #c62828;
    }

    .status-pendiente {
        background-color: #fff8e1;
        color: #f57f17;
        border-left: 4px solid #f57f17;
    }

    .status-otro {
        background-color: #e3f2fd;
        color: #1565c0;
        border-left: 4px solid #1565c0;
    }

    /* Tablas */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 15px;
    }

    .data-table th,
    .data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        font-size: 12px;
    }

    .data-table th {
        background-color: #1e5180;
        color: white;
        font-weight: bold;
    }

    .data-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Tarjetas para tiempo de detención */
    .time-cards {
        display: flex;
        justify-content: space-between;
        margin: 10px 0 20px;
        gap: 10px;
    }

    .time-card {
        flex: 1;
        text-align: center;
        padding: 8px 5px;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .time-card.years {
        background-color: #ffebee;
        border-left: 4px solid #c62828;
    }

    .time-card.months {
        background-color: #fff8e1;
        border-left: 4px solid #f57f17;
    }

    .time-card.days {
        background-color: #e8f5e9;
        border-left: 4px solid #2e7d32;
    }

    .time-card.hours {
        background-color: #e3f2fd;
        border-left: 4px solid #1565c0;
    }

    .time-card-value {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .time-card-label {
        margin: 5px 0 0;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: bold;
    }

    /* Documentos anexos (siguiente página) */
    .page-break {
        page-break-before: always;
    }

    .document-header {
        color: #1e5180;
        font-size: 18px;
        border-bottom: 3px solid #1e5180;
        padding-bottom: 10px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .document-section {
        margin-bottom: 30px;
    }

    .document-section-title {
        color: #1e5180;
        font-size: 16px;
        border-bottom: 2px solid #1e5180;
        padding-bottom: 5px;
        margin-bottom: 15px;
    }

    .document-item {
        margin-bottom: 30px;
    }

    .document-name {
        color: #333;
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: center;
    }

    .document-name::before {
        content: '';
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #1e5180;
        margin-right: 8px;
    }

    .document-preview {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    /* Pie de página */
    .footer {
        text-align: center;
        margin-top: 30px;
        padding-top: 10px;
        border-top: 1px solid #ddd;
        font-size: 11px;
        color: #777;
    }

    /* Mensajes cuando no hay datos */
    .no-data-message {
        padding: 15px;
        color: #999;
        font-style: italic;
        text-align: center;
        border: 1px dashed #ddd;
        border-radius: 4px;
        margin: 10px 0;
    }

    /* Tablas de datos en formato de 2 columnas */
    .data-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 15px;
    }

    /* Media de impresión */
    @media print {
        body {
            font-size: 11pt;
        }

        .no-print {
            display: none !important;
        }

        .container {
            width: 100%;
            max-width: none;
        }
    }
    </style>
</head>

<body>
    <!-- Encabezado del documento -->
    <div class="header-container">
    <div style="width: 100%; text-align: center; margin-bottom: 15px;">
        <img src="<?= base_url() ?>public/assets/img/logo.png" alt="logo" class="logo" style="margin: 0 auto;">
    </div>
    <div class="header-title" style="text-align: center;">
        <h1>INFORME DEL PROCESO #<?= $proceso['ID_PROCESO'] ?></h1>
        <p>Sistema de Consulta Y Registro de Infractores</p>
        <p>Fecha de Registro: <?= isset($fecha_registro) ? date('d/m/Y H:i:s', strtotime($fecha_registro)) : 'No disponible'; ?></p>
    </div>
</div>

   <!-- Estado del proceso -->
<?php
// Normalizar la cadena para manejar tildes
function normalizar_texto($texto) {
    $no_permitidas = array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ");
    $permitidas = array("a","e","i","o","u","A","E","I","O","U","n","N");
    return str_replace($no_permitidas, $permitidas, $texto);
}

// Convertir a minúsculas y también crear versión normalizada
$resolucion = strtolower($proceso['RESOLUCION']);
$resolucion_normalizada = strtolower(normalizar_texto($proceso['RESOLUCION']));

$clase_estado = "status-otro";

if (strpos($resolucion, 'libertad') !== false) {
    $clase_estado = "status-libertad";
} elseif (
    strpos($resolucion, 'detención') !== false || 
    strpos($resolucion, 'detencion') !== false || 
    strpos($resolucion_normalizada, 'detencion') !== false
) {
    $clase_estado = "status-detencion";
} elseif (strpos($resolucion, 'pendiente') !== false) {
    $clase_estado = "status-pendiente";
}
?>
<div style="padding: 0 20px">
    <div class="status-block <?= $clase_estado ?>">
        Resolucion de Audiencia: <?= $proceso['RESOLUCION'] ?>
    </div>
</div>

    <!-- Contenedor principal con orientación vertical -->
    <div class="container">
        <!-- Sección de Fotos en disposición vertical -->
        <div class="photos-section">
            <div class="photos-container">
                <!-- Foto del Infractor -->
                <div class="section">
                    <h3 class="section-title">Foto del Infractor</h3>
                    <div class="photo-container infractor-photo">
                        <?php if (!empty($ruta_foto)): ?>
                        <img src="<?php echo base_url($ruta_foto); ?>" alt="Foto del Infractor">
                        <?php else: ?>
                        <div class="no-data-message">
                            No hay foto disponible para este infractor.
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Fotos de Pertenencias -->
                <!-- Fotos de Pertenencias -->
                <div class="section">
                    <h3 class="section-title">Pertenencias</h3>
                    <div class="photo-container">
                        <?php if (!empty($fotos_pertenencias)): ?>
                        <table class="pertenencias-table" width="100%" cellspacing="10" cellpadding="0">
                            <tr>
                                <?php 
            foreach ($fotos_pertenencias as $index => $foto):
                // Iniciar nueva fila cada 4 elementos
                if ($index > 0 && $index % 4 == 0) echo '</tr><tr>';
            ?>
                                <td width="25%" style="padding: 8px; text-align: center;">
                                    <img src="<?php echo base_url($foto['RUTA_PERTENENCIAS']); ?>"
                                        alt="Pertenencia <?php echo $index + 1; ?>"
                                        style="width: 100%; max-width: 120px; height: 120px; object-fit: cover; border: 1px solid #ddd; border-radius: 3px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                </td>
                                <?php endforeach; ?>

                                <?php 
            // Rellenar celdas vacías para mantener la estructura
            $items_count = count($fotos_pertenencias);
            $empty_cells = $items_count % 4 == 0 ? 0 : 4 - ($items_count % 4);
            
            for ($i = 0; $i < $empty_cells; $i++): 
            ?>
                                <td width="25%" style="padding: 8px;"></td>
                                <?php endfor; ?>
                            </tr>
                        </table>
                        <?php else: ?>
                        <div class="no-data-message">
                            No hay fotos de pertenencias disponibles.
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Datos del Infractor -->
        <div class="section" style="margin-bottom: 20px;">
            <h3
                style="background-color: #304878; color: white; padding: 10px 15px; border-radius: 5px 5px 0 0; margin: 0; font-size: 16px;">
                Datos del Infractor
            </h3>

            <div
                style="border: 1px solid #ddd; border-top: none; border-radius: 0 0 5px 5px; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <tr>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Nombres:</td>
                        <td width="30%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $infractor['N_INFRACTOR']; ?></td>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Apellidos:</td>
                        <td width="30%" style="padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 13px;">
                            <?= $infractor['A_INFRACTOR']; ?></td>
                    </tr>
                    <tr style="background-color: #f9f9f9;">
                        <td style="padding: 12px 15px; color: #555; font-weight: bold; font-size: 13px;">Cédula:</td>
                        <td style="padding: 12px 15px; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $infractor['C_INFRACTOR']; ?></td>
                        <td style="padding: 12px 15px; color: #555; font-weight: bold; font-size: 13px;">Teléfono:</td>
                        <td style="padding: 12px 15px; font-size: 13px;"><?= $infractor['T_INFRACTOR']; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Datos del A.C.T que Procede -->
        <div class="section" style="margin-bottom: 20px;">
            <h3
                style="background-color: #304878; color: white; padding: 10px 15px; border-radius: 5px 5px 0 0; margin: 0; font-size: 16px;">
                Datos del A.C.T que Procede
            </h3>

            <div
                style="border: 1px solid #ddd; border-top: none; border-radius: 0 0 5px 5px; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <tr>
                        <td width="33.33%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; vertical-align: top;">
                            <div style="color: #555; font-weight: bold; font-size: 13px; margin-bottom: 5px;">Nombres
                                A.C.T:</div>
                            <div style="font-size: 13px;"><?= $act_procede['NOMBRES_ACT']; ?></div>
                        </td>
                        <td width="33.33%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; vertical-align: top;">
                            <div style="color: #555; font-weight: bold; font-size: 13px; margin-bottom: 5px;">Apellidos
                                A.C.T:</div>
                            <div style="font-size: 13px;"><?= $act_procede['APELLIDOS_ACT']; ?></div>
                        </td>
                        <td width="33.33%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; vertical-align: top;">
                            <div style="color: #555; font-weight: bold; font-size: 13px; margin-bottom: 5px;">Nro A.C.T:
                            </div>
                            <div style="font-size: 13px; font-weight: 600; color: #304878;">
                                <?= $act_procede['NRO_ACT']; ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Datos del Procedimiento -->
        <!-- Datos del Procedimiento -->
        <!-- Datos del Procedimiento -->
        <div class="section" style="margin-bottom: 20px;">
            <h3
                style="background-color: #304878; color: white; padding: 10px 15px; border-radius: 5px 5px 0 0; margin: 0; font-size: 16px;">
                Datos del Procedimiento
            </h3>

            <div
                style="border: 1px solid #ddd; border-top: none; border-radius: 0 0 5px 5px; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <tr>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Fecha:</td>
                        <td width="30%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $fecha_procedimiento[0]['FECHA_PROCEDIMIENTO'] ?? 'No disponible'; ?></td>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Número de Placa:</td>
                        <td width="30%" style="padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 13px;">
                            <?= $placas[0]['PLACA'] ?? 'No disponible'; ?></td>
                    </tr>
                    <tr style="background-color: #f9f9f9;">
                        <td style="padding: 12px 15px; color: #555; font-weight: bold; font-size: 13px;">Tipo de Placa:
                        </td>
                        <td style="padding: 12px 15px; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $tipo_placa; ?></td>
                        <td style="padding: 12px 15px; color: #555; font-weight: bold; font-size: 13px;">Causa:</td>
                        <td style="padding: 12px 15px; font-size: 13px;">
                            <?= $causas_distrito_infractor_canton['CAUSA'] ?? 'No disponible'; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 15px; color: #555; font-weight: bold; font-size: 13px;">Tipo de Prueba:
                        </td>
                        <td style="padding: 12px 15px; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $pruebas['NOMBRE_PRUEBA']; ?></td>
                        <td style="padding: 12px 15px; color: #555; font-weight: bold; font-size: 13px;">Valor Prueba:
                        </td>
                        <td style="padding: 12px 15px; font-size: 13px; 
                    <?php
                    $valor_prueba = floatval($pruebas['VALOR_PRUEBA']);
                    if ($valor_prueba > 0.8) echo "color: #d32f2f; font-weight: bold;";
                    elseif ($valor_prueba > 0.5) echo "color: #f57f17; font-weight: bold;";
                    else echo "color: #2e7d32; font-weight: bold;";
                    ?>
                "><?= $pruebas['VALOR_PRUEBA']; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Ubicación -->
        <div class="section" style="margin-bottom: 20px;">
            <h3
                style="background-color: #304878; color: white; padding: 10px 15px; border-radius: 5px 5px 0 0; margin: 0; font-size: 16px;">
                Ubicación
            </h3>

            <div
                style="border: 1px solid #ddd; border-top: none; border-radius: 0 0 5px 5px; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <tr>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Distrito:</td>
                        <td width="30%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $causas_distrito_infractor_canton['NOMBRE_DISTRITO'] ?? 'No disponible'; ?></td>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Cantón:</td>
                        <td width="30%" style="padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 13px;">
                            <?= $causas_distrito_infractor_canton['NOMBRE_CANTON'] ?? 'No disponible'; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Valoración Médica -->
        <div class="section" style="margin-bottom: 20px;">
            <h3
                style="background-color: #304878; color: white; padding: 10px 15px; border-radius: 5px 5px 0 0; margin: 0; font-size: 16px;">
                Datos de Valoración Médica
            </h3>

            <div
                style="border: 1px solid #ddd; border-top: none; border-radius: 0 0 5px 5px; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <tr>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Fecha y Hora de Entrada:</td>
                        <td width="30%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $fecha_hora_entrada_vm['FECHA_HORA_INGRESO_VM'] ?? 'No disponible'; ?></td>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Fecha y Hora de Salida:</td>
                        <td width="30%" style="padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 13px;">
                            <?= $fecha_hora_salida_vm['FECHA_HORA_SALIDA_VM'] ?? 'No disponible'; ?></td>
                    </tr>
                    <tr style="background-color: #f9f9f9;">
                        <td colspan="2" style="padding: 12px 15px; color: #555; font-weight: bold; font-size: 13px;">
                            Agente Custodio:</td>
                        <td colspan="2" style="padding: 12px 15px; font-size: 13px;">
                            <?= !empty($fecha_hora_entrada_vm['NOMBRES_ACT']) 
                        ? $fecha_hora_entrada_vm['NOMBRES_ACT'] . ' ' . $fecha_hora_entrada_vm['APELLIDOS_ACT'] 
                        : 'No asignado'; 
                    ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- Comentarios -->
        <div class="section" style="margin-bottom: 20px;">
            <h3
                style="background-color: #304878; color: white; padding: 10px 15px; border-radius: 5px 5px 0 0; margin: 0; font-size: 16px;">
                Comentarios
            </h3>

            <div
                style="border: 1px solid #ddd; border-top: none; border-radius: 0 0 5px 5px; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <tr>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Observación:</td>
                        <td width="30%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $comentarios['OBSERVACION'] ?? 'No disponible'; ?></td>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Novedad:</td>
                        <td width="30%" style="padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 13px;">
                            <?= $comentarios['NOVEDAD'] ?? 'No disponible'; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Detalles de la Detención (condicional) -->
        <?php
            // Verificamos si existen datos de detención
            $tiene_datos_detencion = 
                (isset($datos_cdit) && !empty($datos_cdit)) && 
                (
                    !empty($datos_cdit['ANIOS']) || 
                    !empty($datos_cdit['MESES']) || 
                    !empty($datos_cdit['DIAS']) || 
                    !empty($datos_cdit['HORAS']) ||
                    !empty($datos_cdit['NOMBRE_CDIT']) ||
                    !empty($datos_cdit['DIRECCION']) ||
                    !empty($datos_cdit['FECHA_HORA_INGRESO_CDIT']) ||
                    (!empty($datos_cdit['NOMBRES_ACT']) && !empty($datos_cdit['APELLIDOS_ACT']))
                );

            // Solo mostramos la sección si hay datos
            if ($tiene_datos_detencion): 
            ?>
        <div class="section" style="margin-bottom: 20px;">
            <h3
                style="background-color: #304878; color: white; padding: 10px 15px; border-radius: 5px 5px 0 0; margin: 0; font-size: 16px;">
                Detalles de la Detención
            </h3>

            <div
                style="border: 1px solid #ddd; border-top: none; border-radius: 0 0 5px 5px; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <?php 
                // Verificamos si hay datos de tiempo para mostrar las tarjetas
                $tiene_datos_tiempo = 
                    !empty($datos_cdit['ANIOS']) || 
                    !empty($datos_cdit['MESES']) || 
                    !empty($datos_cdit['DIAS']) || 
                    !empty($datos_cdit['HORAS']);
                
                if ($tiene_datos_tiempo):
                ?>
                <!-- Tarjetas para tiempos de detención -->
                <table width="100%" cellspacing="0" cellpadding="0"
                    style="border-collapse: collapse; margin-bottom: 0;">
                    <tr>
                        <td width="25%"
                            style="padding: 15px; text-align: center; border-bottom: 1px solid #eee; border-right: 1px solid #eee; background-color: #ffebee;">
                            <p style="margin: 0; font-size: 24px; font-weight: bold; color: #c62828;">
                                <?= $datos_cdit['ANIOS'] ?? '0'; ?></p>
                            <p
                                style="margin: 5px 0 0; font-size: 12px; text-transform: uppercase; color: #c62828; font-weight: bold;">
                                Años</p>
                        </td>
                        <td width="25%"
                            style="padding: 15px; text-align: center; border-bottom: 1px solid #eee; border-right: 1px solid #eee; background-color: #fff8e1;">
                            <p style="margin: 0; font-size: 24px; font-weight: bold; color: #f57f17;">
                                <?= $datos_cdit['MESES'] ?? '0'; ?></p>
                            <p
                                style="margin: 5px 0 0; font-size: 12px; text-transform: uppercase; color: #f57f17; font-weight: bold;">
                                Meses</p>
                        </td>
                        <td width="25%"
                            style="padding: 15px; text-align: center; border-bottom: 1px solid #eee; border-right: 1px solid #eee; background-color: #e8f5e9;">
                            <p style="margin: 0; font-size: 24px; font-weight: bold; color: #2e7d32;">
                                <?= $datos_cdit['DIAS'] ?? '0'; ?></p>
                            <p
                                style="margin: 5px 0 0; font-size: 12px; text-transform: uppercase; color: #2e7d32; font-weight: bold;">
                                Días</p>
                        </td>
                        <td width="25%"
                            style="padding: 15px; text-align: center; border-bottom: 1px solid #eee; background-color: #e3f2fd;">
                            <p style="margin: 0; font-size: 24px; font-weight: bold; color: #1565c0;">
                                <?= $datos_cdit['HORAS'] ?? '0'; ?></p>
                            <p
                                style="margin: 5px 0 0; font-size: 12px; text-transform: uppercase; color: #1565c0; font-weight: bold;">
                                Horas</p>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>

                <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <?php if (!empty($datos_cdit['NOMBRE_CDIT']) || !empty($datos_cdit['DIRECCION'])): ?>
                    <tr<?= $tiene_datos_tiempo ? ' style="background-color: #f9f9f9;"' : ''; ?>>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Centro de Detención:</td>
                        <td width="30%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; font-size: 13px;">
                            <?= $datos_cdit['NOMBRE_CDIT'] ?? 'No especificado'; ?></td>
                        <td width="20%"
                            style="padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; font-weight: bold; font-size: 13px;">
                            Dirección:</td>
                        <td width="30%" style="padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 13px;">
                            <?= $datos_cdit['DIRECCION'] ?? 'No especificado'; ?></td>
                        </tr>
                        <?php endif; ?>

                        <?php if (!empty($datos_cdit['FECHA_HORA_INGRESO_CDIT']) || (!empty($datos_cdit['NOMBRES_ACT']) && !empty($datos_cdit['APELLIDOS_ACT']))): ?>
                        <tr<?= (!$tiene_datos_tiempo && empty($datos_cdit['NOMBRE_CDIT']) && empty($datos_cdit['DIRECCION'])) ? '' : ' style="background-color: ' . ($tiene_datos_tiempo && empty($datos_cdit['NOMBRE_CDIT']) && empty($datos_cdit['DIRECCION']) ? '#f9f9f9' : '#fff') . ';"'; ?>>
                            <td width="20%"
                                style="padding: 12px 15px; <?= (!empty($datos_cdit['NOMBRE_CDIT']) || !empty($datos_cdit['DIRECCION'])) ? '' : 'border-bottom: 1px solid #eee;'; ?> color: #555; font-weight: bold; font-size: 13px;">
                                Fecha y Hora de Ingreso:</td>
                            <td width="30%"
                                style="padding: 12px 15px; <?= (!empty($datos_cdit['NOMBRE_CDIT']) || !empty($datos_cdit['DIRECCION'])) ? '' : 'border-bottom: 1px solid #eee;'; ?> border-right: 1px solid #eee; font-size: 13px;">
                                <?= $datos_cdit['FECHA_HORA_INGRESO_CDIT'] ?? 'No especificado'; ?></td>
                            <td width="20%"
                                style="padding: 12px 15px; <?= (!empty($datos_cdit['NOMBRE_CDIT']) || !empty($datos_cdit['DIRECCION'])) ? '' : 'border-bottom: 1px solid #eee;'; ?> color: #555; font-weight: bold; font-size: 13px;">
                                Agente que recibió en CDIT:</td>
                            <td width="30%"
                                style="padding: 12px 15px; <?= (!empty($datos_cdit['NOMBRE_CDIT']) || !empty($datos_cdit['DIRECCION'])) ? '' : 'border-bottom: 1px solid #eee;'; ?> font-size: 13px;">
                                <?= !empty($datos_cdit['NOMBRES_ACT']) && !empty($datos_cdit['APELLIDOS_ACT'])
                        ? $datos_cdit['NOMBRES_ACT'] . ' ' . $datos_cdit['APELLIDOS_ACT']
                        : 'No especificado'; 
                    ?>
                            </td>
                            </tr>
                            <?php endif; ?>
                </table>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <?php
        // Verificamos primero si hay documentos en alguna de las categorías
        $hay_documentos = (!empty($archivos_libertad) || !empty($archivos_detencion));

        // Solo mostramos la sección de documentos si hay al menos uno disponible
        if ($hay_documentos):
        ?>
    <!-- Sección para los documentos -->
    <div class="page-break">
        <h2
            style="color: #1e5180; font-size: 20px; border-bottom: 3px solid #1e5180; padding-bottom: 10px; margin-top: 20px;">
            Documentos Anexos
        </h2>

        <?php
            // Solo mostramos la sección de documentos de libertad si hay documentos disponibles
            if (!empty($archivos_libertad)):
            ?>
        <!-- Documentos de Libertad -->
        <h3 style="color: #388e3c; border-bottom: 2px solid #388e3c; padding-bottom: 5px; margin: 20px 0 15px;">
            Documentos de Libertad
        </h3>

        <?php foreach ($archivos_libertad as $index => $archivo): 
                $extension = pathinfo($archivo['RUTA_ARCH_LIBERTAD'], PATHINFO_EXTENSION);
                $ruta_completa = base_url($archivo['RUTA_ARCH_LIBERTAD']);
                $nombre_archivo = basename($archivo['RUTA_ARCH_LIBERTAD']);
                $es_pdf = strtolower($extension) === 'pdf';
                $es_imagen = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
            ?>
        <div class="document-item" <?php if ($index > 0) echo 'style="page-break-before: always;"'; ?>>
            <h4 style="color: #388e3c;">
                <span
                    style="display: inline-block; width: 20px; height: 20px; background-color: #388e3c; margin-right: 8px; vertical-align: middle;"></span>
                <?= htmlspecialchars($nombre_archivo) ?>
            </h4>

            <?php if ($es_pdf): ?>
            <!-- Mostrar PDF usando object -->
            <div class="document-preview" style="border: 2px solid #388e3c; border-radius: 5px;">
                <object data="<?= $ruta_completa ?>" type="application/pdf" width="100%" height="600px">
                    <p>Tu navegador no puede visualizar PDFs directamente.
                        <a href="<?= $ruta_completa ?>" target="_blank">Abrir PDF</a>
                    </p>
                </object>
            </div>
            <?php elseif ($es_imagen): ?>
            <!-- Mostrar imagen directamente -->
            <div class="document-preview" style="border: 2px solid #388e3c; border-radius: 5px;">
                <img src="<?= $ruta_completa ?>" alt="Documento" style="max-width: 100%; max-height: 600px;">
            </div>
            <?php else: ?>
            <!-- Para otros tipos de archivo -->
            <div class="document-preview" style="border: 2px solid #388e3c; border-radius: 5px; padding: 30px;">
                <div class="document-icon">
                    <?php
                        if (in_array(strtolower($extension), ['doc', 'docx'])) {
                            echo '<span style="color: #4285f4;">&#128196;</span>'; // Icono de documento
                        } elseif (in_array(strtolower($extension), ['xls', 'xlsx'])) {
                            echo '<span style="color: #0f9d58;">&#128195;</span>'; // Icono de hoja de cálculo
                        } else {
                            echo '<span style="color: #757575;">&#128196;</span>'; // Icono genérico
                        }
                        ?>
                </div>
                <p style="font-size: 16px; margin-bottom: 15px;">Tipo de documento:
                    <strong><?= strtoupper($extension) ?></strong>
                </p>
                <a href="<?= $ruta_completa ?>" download class="btn btn-secondary no-print"
                    style="background-color: #388e3c; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; display: inline-block;">
                    Descargar archivo
                </a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php
    // Solo mostramos la sección de documentos de detención si hay documentos disponibles
    if (!empty($archivos_detencion)):
    ?>
        <!-- Documentos de Detención -->
        <h3 style="color: #F57C00; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-top: 20px;">
            Documentos de Detención
        </h3>

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
        <?php endif; ?>
    </div>
    <?php endif; ?>
    </div>
    <div class="footer">
        <p>Documento generado el <?= date('d/m/Y H:i:s') ?></p>
        <p>Este documento es de carácter oficial</p>
        <img src="<?= base_url() ?>public/assets/img/logo.png" alt="logo" class="logo">

        
    </div>
    <!-- Sección para documentos con cada documento en una página separada -->
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