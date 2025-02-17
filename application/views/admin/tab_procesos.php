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

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">

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
                <h4>PROCESOS DE INFRACTORES</h4>
                <!-- Topbar -->
                <?php $this->load->view('admin/_partials/navbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Procesos de Infractores</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($resultados)): ?>
                                    <div class="table-responsive">
                                        <table id="tablaProcesos" class="table table-bordered table-hover datatable">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Cédula</th>
                                                    <th>Placa</th>
                                                    <th>Causa</th>
                                                    <th>Acción</th> <!-- Nueva columna -->
                                                    <th>Acción</th> <!-- Nueva columna -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($resultados as $proceso): ?>
                                                <tr>
                                                    <td><?php echo $proceso['ID_PROCESO']; ?></td>
                                                    <td><?php echo $proceso['N_INFRACTOR']; ?></td>
                                                    <td><?php echo $proceso['A_INFRACTOR']; ?></td>
                                                    <td><?php echo $proceso['C_INFRACTOR']; ?></td>
                                                    <td><?php echo $proceso['PLACA']; ?></td>
                                                    <td><?php echo $proceso['CAUSA']; ?></td>
                                                    
                                                    <td class="text-center">
                                                        <a href="<?php echo site_url('SearchController/detalle/' . $proceso['ID_INFRACTOR']); ?>"
                                                            class="btn btn-info btn-sm">
                                                            <i class="bx bx-show"></i> Ver Detalle
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo site_url('ProcesosController/editar/' . $proceso['ID_INFRACTOR']); ?>"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="bx bx-edit"></i> Editar
                                                        </a>
                                                    </td>
                                                </tr>
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
$(document).ready(function() {
    $('#tablaProcesos').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
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