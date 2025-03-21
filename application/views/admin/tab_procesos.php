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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- CSS de SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <!-- JavaScript de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>


</head>

<body id="page-top">

    <!-- Page W rapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <!-- Sidebar -->
        <?php $this->load->view('admin/_partials/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <!-- Topbar -->
                <?php $this->load->view('admin/_partials/navbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-dark">Procesos Asociados a Infractores</h3>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        $hasProcesses = false;
                                        foreach ($asociados as $procesos) {
                                            if (!empty($procesos)) {
                                                $hasProcesses = true;
                                                break;
                                            }
                                        }
                                        ?>

                                    <?php if ($hasProcesses): ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="tablaProcesos">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>Nombres</th>
                                                    <th>Cédula</th>
                                                    <th>Placa</th>
                                                    <th>Causa</th>
                                                    <th>Procesos Asociados</th>
                                                    <th>Fecha Procedimiento</th>
                                                    <th>Fecha Registro</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($infractores as $infractor): ?>
                                                <?php if (!empty($asociados[$infractor['ID_INFRACTOR']])): ?>
                                                <tr>
                                                <td><?= htmlspecialchars($infractor['N_INFRACTOR'] . ' ' . $infractor['A_INFRACTOR']) ?></td>
                                                    <td><?= htmlspecialchars($infractor['C_INFRACTOR']) ?></td>

                                                    <!-- Columna PLACA -->
                                                    <td>
                                                        <div class="process-list">
                                                            <?php foreach($asociados[$infractor['ID_INFRACTOR']] as $index => $proceso): ?>
                                                            <div class="process-item p-2"
                                                                style="border-bottom: 1px solid #eee; height: 60px; display: flex; align-items: center;">
                                                                <?= htmlspecialchars($proceso['PLACA'] ?? 'No asignada') ?>
                                                            </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </td>

                                                    <!-- Columna CAUSA -->
                                                    <td>
                                                        <div class="process-list">
                                                            <?php foreach($asociados[$infractor['ID_INFRACTOR']] as $index => $proceso): ?>
                                                            <div class="process-item p-2"
                                                                style="border-bottom: 1px solid #eee; height: 60px; display: flex; align-items: center;">
                                                                <?= htmlspecialchars($proceso['CAUSA'] ?? 'No asignada') ?>
                                                            </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </td>

                                                    <!-- Columna PROCESO/RESOLUCIÓN -->
                                                    <td>
                                                        <div class="process-list">
                                                            <?php foreach($asociados[$infractor['ID_INFRACTOR']] as $index => $proceso): ?>
                                                            <div class="process-item d-flex align-items-center justify-content-between p-2"
                                                                style="border-bottom: 1px solid #eee; height: 60px;">
                                                                <div>
                                                                    <span>Proceso
                                                                        #<?= htmlspecialchars($proceso['ID_PROCESO']) ?>
                                                                        -
                                                                        <?= htmlspecialchars($proceso['RESOLUCION']) ?></span>
                                                                </div>
                                                                <div>
                                                                    <a href="<?= site_url('SearchController/detalle/' . $proceso['ID_PROCESO']) ?>"
                                                                        class="btn btn-info btn-sm">
                                                                        <i class="bx bx-show"></i> Ver Proceso
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </td>

                                                    <!-- Columna FECHA DE PROCEDIMIENTO -->
                                                    <td>
                                                        <div class="process-list">
                                                            <?php foreach($asociados[$infractor['ID_INFRACTOR']] as $index => $proceso): ?>
                                                            <div class="process-item p-2"
                                                                style="border-bottom: 1px solid #eee; height: 60px; display: flex; align-items: center;">
                                                                <?= htmlspecialchars($proceso['FECHA_PROCEDIMIENTO'] ?? 'No disponible') ?>
                                                            </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </td>

                                                    <!-- Columna FECHA DE REGISTRO -->
                                                    <td>
                                                        <div class="process-list">
                                                            <?php foreach($asociados[$infractor['ID_INFRACTOR']] as $index => $proceso): ?>
                                                            <div class="process-item p-2"
                                                                style="border-bottom: 1px solid #eee; height: 60px; display: flex; align-items: center;">
                                                                <?= htmlspecialchars($proceso['FECHA_REGISTRO'] ?? 'No disponible') ?>
                                                            </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php else: ?>
                                    <p class="text-center text-muted">No se encontraron procesos asociados.</p>
                                    <?php endif; ?>
                                </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres cerrar sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar sesión" si estás seguro de que quieres cerrar tu sesión.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="<?php echo site_url();?>/LoginController/logout">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#tablaProcesos').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_ (Total: _TOTAL_ registros)",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
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