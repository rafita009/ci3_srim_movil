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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

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
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gestión de Respaldos</h1>
                        <a href="<?= site_url('BdController/generate') ?>"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generar Nuevo Respaldo
                        </a>
                    </div>

                    <!-- Mensaje de alerta para mostrar notificaciones -->
                    <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-<?= $this->session->flashdata('message_type') ?> alert-dismissible fade show"
                        role="alert">
                        <?= $this->session->flashdata('message') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <!-- Tabla de Respaldos -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Respaldos Disponibles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre del Archivo</th>
            <th>Tamaño</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($backups)): ?>
            <tr>
                <td colspan="4" class="text-center">No hay respaldos disponibles</td>
            </tr>
        <?php else: ?>
            <?php foreach ($backups as $backup): ?>
                <tr>
                    <td><?= $backup['name'] ?></td>
                    <td><?= round($backup['size'] / 1024, 2) ?> KB</td>
                    <td><?= $backup['date'] ?></td>
                    <td>
                        <a href="<?= site_url('BdController/download/' . $backup['name']) ?>" class="btn btn-sm btn-info">
                            <i class="fas fa-download"></i> Descargar
                        </a>
                        <a href="<?= site_url('BdController/delete/' . $backup['name']) ?>" class="btn btn-sm btn-danger delete-backup">
                            <i class="fas fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('admin/_partials/footer') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo site_url();?>/LoginController/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>
    <script>
// Esperar a que el documento esté completamente cargado
$(document).ready(function() {
    // 1. Deshabilitar todas las alertas y errores de DataTables
    $.fn.dataTable.ext.errMode = 'none';
    
    try {
        // 2. Verificar si la tabla existe y tiene la estructura adecuada
        var table = $('#dataTable');
        if (table.length === 0) {
            console.log('La tabla no existe en el DOM');
            return;
        }
        
        // 3. Verificar si ya hay una instancia de DataTable y destruirla
        if ($.fn.DataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().destroy();
            table.empty(); // Limpiar contenido antiguo si es necesario
        }
        
        // 4. Inicializar con una configuración muy básica primero
        var dataTable = table.DataTable({
            "paging": true,
            "info": true,
            "searching": true,
            "ordering": false, // Desactivar ordenamiento para evitar problemas
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            // Evitar validación estricta de columnas
            "columnDefs": [{
                "defaultContent": "",
                "targets": "_all"
            }]
        });
        
        // 5. Establecer un controlador de errores personalizado
        table.on('error.dt', function(e, settings, techNote, message) {
            console.log('Error en DataTables:', message);
        });
        
    } catch (error) {
        // 6. Capturar cualquier error que pueda ocurrir durante la inicialización
        console.log('Error al inicializar DataTables:', error);
        
        // 7. Como alternativa, usar una inicialización muy básica sin características avanzadas
        try {
            $('#dataTable').DataTable({
                "retrieve": true,
                "paging": true,
                "ordering": false,
                "searching": true
            });
        } catch (fallbackError) {
            console.log('Error en la inicialización de respaldo:', fallbackError);
        }
    }
});
</script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>