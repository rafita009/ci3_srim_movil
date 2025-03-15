<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo base_url();?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('admin/_partials/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('admin/_partials/navbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="card shadow-sm p-4 mb-4">
                    <!-- Agregar este código en la parte superior de la card-header en tu vista readdatos.php -->
                    <div class="card shadow border-0 rounded-lg mb-4">
                        <!-- Header con gradiente y acciones -->
                        <div class="card-header bg-gradient-primary text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0 font-weight-bold">
                                        <i class="fas fa-user-shield mr-2"></i>Detalles del Proceso
                                    </h4>
                                    <p class="mb-0">Proceso #<?= $proceso['ID_PROCESO'] ?></p>
                                </div>
                                <div>
                                    <a href="javascript:history.back()" class="btn btn-outline-light btn-sm mr-2">
                                        <i class="fas fa-arrow-left mr-1"></i> Volver
                                    </a>
                                    <a href="<?= site_url('PdfController/generarPDF/' . $proceso['ID_PROCESO']) ?>"
                                        class="btn btn-success btn-sm">
                                        <i class="fas fa-file-pdf mr-1"></i> Descargar PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">



                            <div class="row">


                                <div class="card-body p-4">
                                    <!-- Banner con estado del proceso -->
                                    <div
                                        class="alert alert-info mb-4 d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge badge-primary p-2 mr-2">Resolución de Audiencia:</span>
                                            <strong><?= $proceso['RESOLUCION'] ?></strong> 
                                        </div>
                                        <span class="badge badge-pill badge-dark">Fecha de Registro: 
                                         <i class="far fa-calendar-alt mr-1"></i>
                                            <?= $fecha_registro ?? 'No disponible'; ?>
                                        </span>
                                    </div>

                                    <div class="row">
                                        <!-- Columna Izquierda: Foto del Infractor y Fotos de Pertenencias -->
                                        <div class="col-md-4">
                                            <!-- Foto del Infractor con diseño mejorado -->
                                            <div class="card border-0 shadow-sm mb-4">
                                                <div class="card-header bg-gradient-secondary text-white py-2">
                                                    <h5 class="mb-0"><i class="fas fa-camera mr-2"></i>Foto del
                                                        Infractor</h5>
                                                </div>
                                                <div class="card-body text-center">
                                                    <?php if (!empty($ruta_foto)): ?>
                                                    <div class="position-relative overflow-hidden rounded my-2">
                                                        <img src="<?php echo base_url($ruta_foto); ?>"
                                                            alt="Foto del Infractor" class="img-fluid rounded shadow-sm"
                                                            data-bs-toggle="modal" data-bs-target="#imagenModal"
                                                            style="cursor: pointer; max-height: 300px;">
                                                        <div class="position-absolute bottom-0 end-0 p-2">
                                                            
                                                        </div>
                                                    </div>
                                                    <?php else: ?>
                                                    <div class="text-center p-5 bg-light rounded">
                                                        <i class="fas fa-user-circle fa-5x text-secondary mb-3"></i>
                                                        <p class="mb-0 text-muted">No hay foto disponible para este
                                                            infractor.</p>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Fotos de Pertenencias con diseño mejorado -->
                                            <div class="card border-0 shadow-sm mb-4">
                                                <div class="card-header bg-gradient-secondary text-white py-2">
                                                    <h5 class="mb-0"><i class="fas fa-box-open mr-2"></i>Pertenencias
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row" id="pertenenciasPreview">
                                                        <?php if (!empty($fotos_pertenencias)): ?>
                                                        <?php foreach ($fotos_pertenencias as $index => $foto): ?>
                                                        <div class="col-6 col-lg-4 mb-3">
                                                            <div class="pertenencia-thumbnail">
                                                                <img src="<?php echo base_url($foto['RUTA_PERTENENCIAS']); ?>"
                                                                    alt="Pertenencia <?php echo $index + 1; ?>"
                                                                    class="img-thumbnail shadow-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pertenenciaModal<?php echo $index; ?>"
                                                                    style="cursor: pointer; height: 100px; object-fit: cover;">
                                                                <div class="overlay">
                                                                    <i class="fas fa-search-plus text-white"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal para cada foto de pertenencia -->
                                                        <div class="modal fade"
                                                            id="pertenenciaModal<?php echo $index; ?>" tabindex="-1"
                                                            aria-labelledby="pertenenciaModalLabel<?php echo $index; ?>"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div
                                                                        class="modal-header bg-gradient-primary text-white">
                                                                        <h5 class="modal-title"
                                                                            id="pertenenciaModalLabel<?php echo $index; ?>">
                                                                            <i
                                                                                class="fas fa-box-open mr-2"></i>Pertenencia
                                                                            <?php echo $index + 1; ?>
                                                                        </h5>
                                                                        <button type="button" class="btn-close bg-white"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Cerrar"></button>
                                                                    </div>
                                                                    <div class="modal-body text-center p-0">
                                                                        <img src="<?php echo base_url($foto['RUTA_PERTENENCIAS']); ?>"
                                                                            alt="Pertenencia <?php echo $index + 1; ?>"
                                                                            class="img-fluid">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>
                                                        <?php else: ?>
                                                        <div class="col-12 text-center p-4 bg-light rounded">
                                                            <i class="fas fa-box-open fa-3x text-secondary mb-3"></i>
                                                            <p class="mb-0 text-muted">No hay fotos de pertenencias
                                                                disponibles.</p>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Columna Derecha: Información del Infractor, A.C.T, Procedimiento, Ubicación y Agente -->
                                        <div class="col-md-8">
                                           <!-- Datos del Infractor con tarjeta mejorada -->
                        <div class="card border-0 shadow-sm rounded-lg mb-4">
                            <div class="card-header bg-gradient-info text-white py-2">
                                <h5 class="mb-0"><i class="fas fa-user mr-2"></i>Datos del Infractor</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Nombres</label>
                                            <h6 class="font-weight-bold"><?= $infractor['N_INFRACTOR']; ?></h6>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Cédula</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-id-card text-primary mr-1"></i>
                                                <?= $infractor['C_INFRACTOR']; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Apellidos</label>
                                            <h6 class="font-weight-bold"><?= $infractor['A_INFRACTOR']; ?></h6>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Teléfono</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-phone text-primary mr-1"></i>
                                                <?= $infractor['T_INFRACTOR']; ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos del A.C.T que Procede -->
                        <div class="card border-0 shadow-sm rounded-lg mb-4">
                            <div class="card-header bg-gradient-secondary text-white py-2">
                                <h5 class="mb-0"><i class="fas fa-user-tie mr-2"></i>Datos del A.C.T que Procede</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Nombres A.C.T</label>
                                            <h6 class="font-weight-bold"><?= $act_procede['NOMBRES_ACT']; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Apellidos A.C.T</label>
                                            <h6 class="font-weight-bold"><?= $act_procede['APELLIDOS_ACT']; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Nro A.C.T</label>
                                            <h6 class="font-weight-bold">
                                                <span class="badge bg-dark"><?= $act_procede['NRO_ACT']; ?></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos del Procedimiento -->
                        <div class="card border-0 shadow-sm rounded-lg mb-4">
                            <div class="card-header bg-gradient-warning text-dark py-2">
                                <h5 class="mb-0"><i class="fas fa-clipboard-list mr-2"></i>Datos del Procedimiento</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="mb-3 p-2 bg-light rounded">
                                            <label class="text-secondary small d-block">Fecha</label>
                                            <h6 class="font-weight-bold">
                                                <i class="far fa-calendar-alt text-warning mr-1"></i>
                                                <?= $fecha_procedimiento[0]['FECHA_PROCEDIMIENTO'] ?? 'No disponible'; ?>
                                            </h6>
                                        </div>
                                        <div class="mb-3 p-2">
                                            <label class="text-secondary small d-block">Tipo de Placa</label>
                                            <h6 class="font-weight-bold"><?= $tipo_placa; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 p-2 bg-light rounded">
                                            <label class="text-secondary small d-block">Número de Placa</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-car text-warning mr-1"></i>
                                                <?= $placas[0]['PLACA'] ?? 'No disponible'; ?>
                                            </h6>
                                        </div>
                                        <div class="mb-3 p-2">
                                            <label class="text-secondary small d-block">Causa</label>
                                            <h6 class="font-weight-bold"><?= $causas_distrito_infractor_canton['CAUSA'] ?? 'No disponible'; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 p-2 bg-light rounded">
                                            <label class="text-secondary small d-block">Tipo de Prueba</label>
                                            <h6 class="font-weight-bold"><?= $pruebas['NOMBRE_PRUEBA']; ?></h6>
                                        </div>
                                        <div class="mb-3 p-2">
                                            <label class="text-secondary small d-block">Valor Prueba</label>
                                            <h6 class="font-weight-bold">
                                                <span class="badge bg-danger p-2"><?= $pruebas['VALOR_PRUEBA']; ?></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Ubicación -->
                        <div class="card border-0 shadow-sm rounded-lg mb-4">
                            <div class="card-header bg-gradient-success text-white py-2">
                                <h5 class="mb-0"><i class="fas fa-map-marker-alt mr-2"></i>Ubicación</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Distrito</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-map text-success mr-1"></i>
                                                <?= $causas_distrito_infractor_canton['NOMBRE_DISTRITO'] ?? 'No disponible'; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Cantón</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-city text-success mr-1"></i>
                                                <?= $causas_distrito_infractor_canton['NOMBRE_CANTON'] ?? 'No disponible'; ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Valoración Médica -->
                        <div class="card border-0 shadow-sm rounded-lg mb-4">
                            <div class="card-header bg-gradient-danger text-white py-2">
                                <h5 class="mb-0"><i class="fas fa-heartbeat mr-2"></i>Datos de Valoración Médica</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Fecha y Hora de Entrada</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-clock text-danger mr-1"></i>
                                                <?= $fecha_hora_entrada_vm['FECHA_HORA_INGRESO_VM'] ?? 'No disponible'; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Fecha y Hora de Salida</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-door-open text-danger mr-1"></i>
                                                <?= $fecha_hora_salida_vm['FECHA_HORA_SALIDA_VM'] ?? 'No disponible'; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Agente Custodio</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-user-shield text-danger mr-1"></i>
                                                <?= !empty($fecha_hora_entrada_vm['NOMBRES_ACT']) 
                                                    ? $fecha_hora_entrada_vm['NOMBRES_ACT'] . ' ' . $fecha_hora_entrada_vm['APELLIDOS_ACT'] 
                                                    : 'No asignado'; 
                                                ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comentarios -->
                        <div class="card border-0 shadow-sm rounded-lg mb-4">
                            <div class="card-header bg-gradient-dark text-white py-2">
                                <h5 class="mb-0"><i class="fas fa-comments mr-2"></i>Comentarios</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-3 bg-light rounded mb-3">
                                            <label class="text-secondary small d-block mb-1">Observación</label>
                                            <p class="mb-0"><?= $comentarios['OBSERVACION'] ?? 'No disponible'; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 bg-light rounded mb-3">
                                            <label class="text-secondary small d-block mb-1">Novedad</label>
                                            <p class="mb-0"><?= $comentarios['NOVEDAD'] ?? 'No disponible'; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                               <!-- Archivos Libertad (condicional) -->
                        <?php
                        // Verificamos si existen archivos de libertad para mostrar la card
                        $hay_archivos_libertad = !empty($archivos_libertad);

                        // Solo mostramos la card si hay archivos de libertad
                        if ($hay_archivos_libertad):
                        ?>
                        <div class="card border-0 shadow-sm rounded-lg mb-4">
                            <div class="card-header bg-gradient-primary text-white py-2">
                                <h5 class="mb-0"><i class="fas fa-file-alt mr-2"></i>Archivos Libertad</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-group">
                                            <?php foreach ($archivos_libertad as $index => $archivo): 
                                                $extension = pathinfo($archivo['RUTA_ARCH_LIBERTAD'], PATHINFO_EXTENSION);
                                                $icon_class = '';
                                                $bg_class = '';
                                                
                                                if ($extension === 'png' || $extension === 'jpg' || $extension === 'jpeg') {
                                                    $icon_class = 'fa-image';
                                                    $bg_class = 'bg-info';
                                                } elseif ($extension === 'pdf') {
                                                    $icon_class = 'fa-file-pdf';
                                                    $bg_class = 'bg-danger';
                                                } elseif ($extension === 'docx' || $extension === 'doc') {
                                                    $icon_class = 'fa-file-word';
                                                    $bg_class = 'bg-primary';
                                                } elseif ($extension === 'xls' || $extension === 'xlsx') {
                                                    $icon_class = 'fa-file-excel';
                                                    $bg_class = 'bg-success';
                                                } else {
                                                    $icon_class = 'fa-file';
                                                    $bg_class = 'bg-secondary';
                                                }
                                            ?>
                                            <li class="list-group-item d-flex align-items-center p-2 border-0 mb-2 rounded shadow-sm">
                                                <span class="mr-3 p-2 rounded-circle <?= $bg_class ?> text-white">
                                                    <i class="fas <?= $icon_class ?>"></i>
                                                </span>
                                                <span class="flex-grow-1">Archivo <?= $index + 1 ?></span>
                                                <a href="#" data-toggle="modal" data-target="#archivoModal"
                                                   data-ruta="<?= base_url($archivo['RUTA_ARCH_LIBERTAD']); ?>"
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye mr-1"></i> Ver archivo
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                                            <!-- Detalles de la Detención (condicional) -->
                        <?php
                        // Verificamos si existen datos relevantes de detención
                        $hay_datos_detencion = isset($datos_cdit) && (
                            !empty($datos_cdit['ANIOS']) || 
                            !empty($datos_cdit['MESES']) || 
                            !empty($datos_cdit['DIAS']) || 
                            !empty($datos_cdit['HORAS']) ||
                            !empty($datos_cdit['NOMBRE_CDIT']) ||
                            !empty($datos_cdit['DIRECCION']) ||
                            !empty($datos_cdit['FECHA_HORA_INGRESO_CDIT']) ||
                            (!empty($datos_cdit['NOMBRES_ACT']) && !empty($datos_cdit['APELLIDOS_ACT']))
                        );

                        $hay_archivos_detencion = !empty($archivos_detencion);

                        // Solo mostramos la card si hay datos de detención o hay archivos de detención
                        if ($hay_datos_detencion || $hay_archivos_detencion):
                        ?>
                        <div class="card border-0 shadow-sm rounded-lg mb-4">
                            <div class="card-header bg-gradient-danger text-white py-2">
                                <h5 class="mb-0"><i class="fas fa-gavel mr-2"></i>Detalles de la Detención</h5>
                            </div>
                            <div class="card-body">
                                <?php if ($hay_datos_detencion): ?>
                                <!-- Tiempo de detención con diseño de tarjetas -->
                                <div class="row text-center mb-4">
                                    <div class="col-md-3 col-6 mb-3">
                                        <div class="p-3 bg-danger text-white rounded shadow-sm">
                                            <h3 class="mb-0 font-weight-bold">
                                                <?= isset($datos_cdit['ANIOS']) ? $datos_cdit['ANIOS'] : '0'; ?>
                                            </h3>
                                            <p class="mb-0 small">Años</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 mb-3">
                                        <div class="p-3 bg-warning text-dark rounded shadow-sm">
                                            <h3 class="mb-0 font-weight-bold">
                                                <?= isset($datos_cdit['MESES']) ? $datos_cdit['MESES'] : '0'; ?>
                                            </h3>
                                            <p class="mb-0 small">Meses</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 mb-3">
                                        <div class="p-3 bg-info text-white rounded shadow-sm">
                                            <h3 class="mb-0 font-weight-bold">
                                                <?= isset($datos_cdit['DIAS']) ? $datos_cdit['DIAS'] : '0'; ?>
                                            </h3>
                                            <p class="mb-0 small">Días</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 mb-3">
                                        <div class="p-3 bg-success text-white rounded shadow-sm">
                                            <h3 class="mb-0 font-weight-bold">
                                                <?= isset($datos_cdit['HORAS']) ? $datos_cdit['HORAS'] : '0'; ?>
                                            </h3>
                                            <p class="mb-0 small">Horas</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Información adicional de detención -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <?php if (!empty($datos_cdit['NOMBRE_CDIT'])): ?>
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Centro de Detención</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-building text-danger mr-1"></i>
                                                <?= $datos_cdit['NOMBRE_CDIT']; ?>
                                            </h6>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($datos_cdit['DIRECCION'])): ?>
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Dirección</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-map-pin text-danger mr-1"></i>
                                                <?= $datos_cdit['DIRECCION']; ?>
                                            </h6>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if (!empty($datos_cdit['FECHA_HORA_INGRESO_CDIT'])): ?>
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Fecha y Hora de Ingreso</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-calendar-check text-danger mr-1"></i>
                                                <?= $datos_cdit['FECHA_HORA_INGRESO_CDIT']; ?>
                                            </h6>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if (!empty($datos_cdit['NOMBRES_ACT']) && !empty($datos_cdit['APELLIDOS_ACT'])): ?>
                                        <div class="mb-3">
                                            <label class="text-secondary small d-block">Agente que recibió en CDIT</label>
                                            <h6 class="font-weight-bold">
                                                <i class="fas fa-user-shield text-danger mr-1"></i>
                                                <?= $datos_cdit['NOMBRES_ACT'] . ' ' . $datos_cdit['APELLIDOS_ACT']; ?>
                                            </h6>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($hay_archivos_detencion): ?>
                                <?php if ($hay_datos_detencion): ?>
                                <hr class="my-4">
                                <?php endif; ?>
                                <h5 class="mb-3 text-danger font-weight-bold">
                                    <i class="fas fa-file-contract mr-2"></i>Boleta de Encarcelamiento
                                </h5>

                                <div class="row">
                                    <?php foreach ($archivos_detencion as $index => $archivo): 
                                        $extension = pathinfo($archivo['RUTA_ARCH_DETENCION'], PATHINFO_EXTENSION); 
                                        $icon_class = '';
                                        $bg_class = '';
                                        
                                        if ($extension === 'png' || $extension === 'jpg' || $extension === 'jpeg') {
                                            $icon_class = 'fa-image';
                                            $bg_class = 'bg-info';
                                        } elseif ($extension === 'pdf') {
                                            $icon_class = 'fa-file-pdf';
                                            $bg_class = 'bg-danger';
                                        } elseif ($extension === 'docx' || $extension === 'doc') {
                                            $icon_class = 'fa-file-word';
                                            $bg_class = 'bg-primary';
                                        } elseif ($extension === 'xls' || $extension === 'xlsx') {
                                            $icon_class = 'fa-file-excel';
                                            $bg_class = 'bg-success';
                                        } else {
                                            $icon_class = 'fa-file';
                                            $bg_class = 'bg-secondary';
                                        }
                                    ?>
                                    <div class="col-md-6 mb-3">
                                        <div class="card shadow-sm border-0 h-100">
                                            <div class="card-body p-0">
                                                <div class="d-flex align-items-center p-3">
                                                    <div class="mr-3 p-3 rounded-circle <?= $bg_class ?> text-white">
                                                        <i class="fas <?= $icon_class ?>"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">Documento <?= $index + 1 ?></h6>
                                                        <p class="mb-0 text-muted small">
                                                            <?= strtoupper($extension) ?>
                                                        </p>
                                                    </div>
                                                    <a href="#" data-toggle="modal" data-target="#archivoModal"
                                                       data-ruta="<?= base_url($archivo['RUTA_ARCH_DETENCION']); ?>"
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye mr-1"></i> Ver
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                                            </div>



                                        </div>
                                    </div>
                                    <!-- /.container-fluid -->

                                </div>
                                <!-- End of Main Content -->



                            </div>
                            <!-- End of Content Wrapper -->

                        </div>
                        <!-- Footer -->
                        <?php $this->load->view('admin/_partials/footer') ?>
                        <!-- End of Footer -->
                    </div>
                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                 <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres cerrar sesión?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Selecciona "Cerrar sesión" si estás seguro de que quieres cerrar tu sesión.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-primary" href="<?php echo site_url();?>/LoginController/logout">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Modal para la imagen ampliada -->
                <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imagenModalLabel">Foto del Infractor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body text-center">
                                <!-- Imagen ampliada en el modal -->
                                <img src="<?php echo base_url($ruta_foto); ?>" alt="Foto del Infractor"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal para visualizar archivos -->
                <!-- Modal -->
                <div class="modal fade" id="archivoModal" tabindex="-1" role="dialog"
                    aria-labelledby="archivoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document"
                        style="max-width: 80%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="archivoModalLabel">Vista previa del archivo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <!-- Contenedor para imágenes -->
                                <img id="archivoPreviewImg" class="d-none w-100"
                                    style="max-height: 500px; object-fit: contain;" alt="Vista previa de imagen">

                                <!-- Contenedor para PDFs -->
                                <iframe id="archivoPreviewPdf" class="d-none w-100" style="height: 500px;"
                                    frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

                <!-- Script para mostrar la imagen en el modal -->
                <script>
                $(document).ready(function() {
                    $('#archivoModal').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget);
                        var ruta = button.data('ruta'); // Obtener la ruta del archivo
                        var extension = ruta.split('.').pop().toLowerCase(); // Obtener la extensión del archivo

                        // Limpiar vista previa
                        $('#archivoPreviewImg').addClass('d-none');
                        $('#archivoPreviewPdf').addClass('d-none');

                        // Formatos de imagen compatibles
                        var formatosImagen = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg', 'avif'];
                        
                        if (formatosImagen.includes(extension)) {
                            // Mostrar imagen (todos los formatos de imagen)
                            $('#archivoPreviewImg').attr('src', ruta).removeClass('d-none');
                        } else if (extension === 'pdf') {
                            // Mostrar PDF en <iframe>
                            $('#archivoPreviewPdf').attr('src', ruta).removeClass('d-none');
                        } else {
                            alert('Formato no compatible');
                        }
                    });
                });
                </script>

                <!--bootstrap js-->
                <script src="<?php echo base_url();?>public/assets/js/bootstrap.bundle.min.js"></script>
                <!-- Bootstrap core JavaScript-->
                <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
                </script>

                <!-- Core plugin JavaScript-->
                <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>