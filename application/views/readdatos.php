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
<div class="card-header bg-primary text-white">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Detalles del Infractor</h4>
        <a href="<?= site_url('PdfController/generarPDF/' . $proceso['ID_PROCESO']) ?>" class="btn btn-success">
            <i class="fas fa-file-pdf"></i> Descargar PDF
        </a>
    </div>
</div>
                    <div class="card-body">



                        <div class="row">
                        <div class="process-details">
                                <h3>Proceso #<?= $proceso['ID_PROCESO'] ?></h3>
                                <p><strong>Resolucion de Audiencia:</strong> <?= $proceso['RESOLUCION'] ?></p>
                            </div>
                            
                            <!-- Columna Izquierda: Foto del Infractor y Fotos de Pertenencias -->
                            <div class="col-md-4">
                                <!-- Foto del Infractor -->
                                <div class="mb-4">
                                    <h4>Foto del Infractor</h4>
                                    <?php if (!empty($ruta_foto)): ?>
                                    <!-- Imagen normal (hace clic para abrir el modal) -->
                                    <img src="<?php echo base_url($ruta_foto); ?>" alt="Foto del Infractor"
                                        class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imagenModal"
                                        style="cursor: pointer;">
                                    <?php else: ?>
                                    <p>No hay foto disponible para este infractor.</p>
                                    <?php endif; ?>
                                </div>

                                <!-- Fotos de Pertenencias -->
                                <div>
                                    <h4>Fotos de Pertenencias</h4>
                                    <div class="row" id="pertenenciasPreview">
                                        <?php if (!empty($fotos_pertenencias)): ?>
                                        <?php foreach ($fotos_pertenencias as $index => $foto): ?>
                                        <div class="col-4 mb-3">
                                            <img src="<?php echo base_url($foto['RUTA_PERTENENCIAS']); ?>"
                                                alt="Pertenencia <?php echo $index + 1; ?>" class="img-thumbnail"
                                                data-bs-toggle="modal"
                                                data-bs-target="#pertenenciaModal<?php echo $index; ?>"
                                                style="cursor: pointer;">
                                        </div>

                                        <!-- Modal para cada foto de pertenencia -->
                                        <div class="modal fade" id="pertenenciaModal<?php echo $index; ?>" tabindex="-1"
                                            aria-labelledby="pertenenciaModalLabel<?php echo $index; ?>"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="pertenenciaModalLabel<?php echo $index; ?>">Pertenencia
                                                            <?php echo $index + 1; ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Cerrar"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="<?php echo base_url($foto['RUTA_PERTENENCIAS']); ?>"
                                                            alt="Pertenencia <?php echo $index + 1; ?>"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <p>No hay fotos de pertenencias disponibles.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna Derecha: Información del Infractor, A.C.T, Procedimiento, Ubicación y Agente -->
                            <div class="col-md-8">
                                <!-- Datos del Infractor -->
                                <!-- Datos del Infractor -->
                                <div class="card shadow-lg border-0 rounded-lg mb-4 p-4">
                                    <h4 class="border-bottom pb-3 text-primary">Datos del Infractor</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Nombres:</strong> <?= $infractor['N_INFRACTOR']; ?></p>
                                            <p><strong>Cédula:</strong> <?= $infractor['C_INFRACTOR']; ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Apellidos:</strong> <?= $infractor['A_INFRACTOR']; ?></p>
                                            <p><strong>Teléfono:</strong> <?= $infractor['T_INFRACTOR']; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mb-4 p-4">
                                    <h5 class="border-bottom pb-3 text-primary">Datos del A.C.T que Procede</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Nombres A.C.T:</strong> <?= $act_procede['NOMBRES_ACT']; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Apellidos A.C.T:</strong> <?= $act_procede['APELLIDOS_ACT']; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Nro A.C.T:</strong> <?= $act_procede['NRO_ACT']; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mb-4 p-4">
                                    <h5 class="border-bottom pb-3 text-primary">Datos del Procedimiento</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Fecha:</strong>
                                                <?= $fecha_procedimiento[0]['FECHA_PROCEDIMIENTO'] ?? 'No disponible'; ?>
                                            </p>
                                            <p><strong>Tipo de Placa:</strong> <?= $tipo_placa; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Número de Placa:</strong>
                                                <?= $placas[0]['PLACA'] ?? 'No disponible'; ?></p>
                                            <p><strong>Causa:</strong>
                                                <?= $causas_distrito_infractor_canton['CAUSA'] ?? 'No disponible'; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Tipo de Prueba:</strong> <?= $pruebas['NOMBRE_PRUEBA']; ?></p>
                                            <p><strong>Valor Prueba:</strong> <?= $pruebas['VALOR_PRUEBA']; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mb-4 p-4">
                                    <h5 class="border-bottom pb-3 text-primary">Ubicación</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Distrito:</strong>
                                                <?= $causas_distrito_infractor_canton['NOMBRE_DISTRITO'] ?? 'No disponible'; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Cantón:</strong>
                                                <?= $causas_distrito_infractor_canton['NOMBRE_CANTON'] ?? 'No disponible'; ?>
                                            </p>
                                        </div>

                                    </div>
                                </div>



                                <div class="row">
                                <div class="card shadow-lg border-0 rounded-lg mb-4 p-4">
                                        <h5 class="border-bottom pb-3 text-primary">Datos de Valoración Médica</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>Fecha y Hora de Entrada:</strong>
                                                    <br>
                                                    <?= $fecha_hora_entrada_vm['FECHA_HORA_INGRESO_VM'] ?? 'No disponible'; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Fecha y Hora de Salida:</strong>
                                                    <br>
                                                    <?= $fecha_hora_salida_vm['FECHA_HORA_SALIDA_VM'] ?? 'No disponible'; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Agente Custodio:</strong> 
                                                    <br>
                                                    <?= !empty($fecha_hora_entrada_vm['NOMBRES_ACT']) 
                                                        ? $fecha_hora_entrada_vm['NOMBRES_ACT'] . ' ' . $fecha_hora_entrada_vm['APELLIDOS_ACT'] 
                                                        : 'No asignado'; 
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card shadow-lg border-0 rounded-lg mb-4 p-4">
                                        <h5 class="border-bottom pb-3 text-primary">Comentarios</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Observación:</strong>
                                                    <?= $comentarios['OBSERVACION'] ?? 'No disponible'; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Novedad:</strong>
                                                    <?= $comentarios['NOVEDAD'] ?? 'No disponible'; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card shadow-lg border-0 rounded-lg mb-4 p-4">
                                        <h5 class="border-bottom pb-3 text-primary">Archivos Libertad</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if (!empty($archivos_libertad)): ?>
                                                <ul class="list-unstyled">
                                                    <?php foreach ($archivos_libertad as $archivo): 
                                                            $extension = pathinfo($archivo['RUTA_ARCH_LIBERTAD'], PATHINFO_EXTENSION); // Obtener la extensión del archivo
                                                        ?>
                                                    <li>
                                                        <!-- Mostrar iconos según la extensión del archivo -->
                                                        <a href="#" data-toggle="modal" data-target="#archivoModal"
                                                            data-ruta="<?= base_url($archivo['RUTA_ARCH_LIBERTAD']); ?>">
                                                            <?php
                                                                    if ($extension === 'png' || $extension === 'jpg' || $extension === 'jpeg') {
                                                                        echo '<i class="fas fa-image"></i> '; // Icono para imagen
                                                                    } elseif ($extension === 'pdf') {
                                                                        echo '<i class="fas fa-file-pdf"></i> '; // Icono para PDF
                                                                    } elseif ($extension === 'docx' || $extension === 'doc') {
                                                                        echo '<i class="fas fa-file-word"></i> '; // Icono para Word
                                                                    } elseif ($extension === 'xls' || $extension === 'xlsx') {
                                                                        echo '<i class="fas fa-file-excel"></i> '; // Icono para Excel
                                                                    } else {
                                                                        echo '<i class="fas fa-file"></i> '; // Icono genérico
                                                                    }
                                                                ?>
                                                            Ver archivo
                                                        </a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <?php else: ?>
                                                <p>No hay archivos disponibles.</p>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card shadow-lg border-0 rounded-lg mb-4 p-4">
                                        <h5 class="border-bottom pb-3 text-primary">Detalles de la Detención</h5>
                                        <div class="row text-center">
                                            <div class="col-md-3">
                                                <p><strong>Años:</strong>
                                                    <?= $datos_cdit['ANIOS'] ?? 'No disponible'; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong>Meses:</strong>
                                                    <?= $datos_cdit['MESES'] ?? 'No disponible'; ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong>Días:</strong> <?= $datos_cdit['DIAS'] ?? 'No disponible'; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong>Horas:</strong>
                                                    <?= $datos_cdit['HORAS'] ?? 'No disponible'; ?></p>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>Centro de Detención:</strong>
                                                    <?= $datos_cdit['NOMBRE_CDIT'] ?? 'No disponible'; ?></p>
                                                <p><strong>Direccion:</strong>
                                                    <?= $datos_cdit['DIRECCION'] ?? 'No disponible'; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Fecha y Hora:</strong>
                                                    <?= $datos_cdit['FECHA_HORA_INGRESO_CDIT'] ?? 'No disponible'; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                            <p><strong>Agente que recibió en CDIT:</strong> 
                                                <?= !empty($datos_cdit['NOMBRES_ACT']) 
                                                    ? $datos_cdit['NOMBRES_ACT'] . ' ' . $datos_cdit['APELLIDOS_ACT'] 
                                                    : 'No asignado'; 
                                                ?>  
                                            </p>
                                            </div>
                                        </div>

                                        <hr>
                                        <h5 class="border-bottom pb-3 text-primary">Boleta de Encarcelamiento</h5>

                                        <div class="col-md-12">
                                            <?php if (!empty($archivos_detencion)): ?>
                                            <ul class="list-unstyled">
                                                <?php foreach ($archivos_detencion as $archivo): 
                                                $extension = pathinfo($archivo['RUTA_ARCH_DETENCION'], PATHINFO_EXTENSION); 
                                            ?>
                                                <li>
                                                    <!-- Mostrar iconos según la extensión del archivo -->
                                                    <a href="#" data-toggle="modal" data-target="#archivoModal"
                                                        data-ruta="<?= base_url($archivo['RUTA_ARCH_DETENCION']); ?>">
                                                        <?php
                                                    if ($extension === 'png' || $extension === 'jpg' || $extension === 'jpeg') {
                                                        echo '<i class="fas fa-image"></i> '; 
                                                    } elseif ($extension === 'pdf') {
                                                        echo '<i class="fas fa-file-pdf"></i> '; 
                                                    } elseif ($extension === 'docx' || $extension === 'doc') {
                                                        echo '<i class="fas fa-file-word"></i> '; 
                                                    } elseif ($extension === 'xls' || $extension === 'xlsx') {
                                                        echo '<i class="fas fa-file-excel"></i> '; 
                                                    } else {
                                                        echo '<i class="fas fa-file"></i> ';
                                                    }
                                                    ?>
                                                        Ver archivo
                                                    </a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php else: ?>
                                            <p>No hay archivos disponibles.</p>
                                            <?php endif; ?>
                                        </div>

                                    </div>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo site_url();?>/LoginController/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para la imagen ampliada -->
    <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagenModalLabel">Foto del Infractor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Imagen ampliada en el modal -->
                    <img src="<?php echo base_url($ruta_foto); ?>" alt="Foto del Infractor" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para visualizar archivos -->
    <!-- Modal -->
    <div class="modal fade" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="archivoModalLabel"
        aria-hidden="true">
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
                    <img id="archivoPreviewImg" class="d-none w-100" style="max-height: 500px; object-fit: contain;"
                        alt="Vista previa de imagen">

                    <!-- Contenedor para PDFs -->
                    <iframe id="archivoPreviewPdf" class="d-none w-100" style="height: 500px;" frameborder="0"></iframe>
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
            var extension = ruta.split('.').pop()
                .toLowerCase(); // Obtener la extensión del archivo

            // Limpiar vista previa
            $('#archivoPreviewImg').addClass('d-none');
            $('#archivoPreviewPdf').addClass('d-none');

            if (extension === 'png' || extension === 'jpg' || extension === 'jpeg') {
                // Mostrar imagen
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
    <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>