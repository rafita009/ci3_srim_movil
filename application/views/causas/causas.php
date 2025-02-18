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
                
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
                    <div>
                        <p>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalCausa">
                            <i class="fas fa-plus"></i> Agregar
                        </button> 
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminados">
                            <i class="fas fa-trash"></i> Eliminados

                        </button>
                        </p>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php elseif ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                    <table id="tablaCausas" class="table table-bordered table-hover datatable">
                    <thead class="thead-dark">
                                <tr>
                                    <th>Nro</th>
                                    <th>Causa</th>
                                    <th>Acciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($datos)): ?>
                                <?php foreach($datos as $dato): ?>
                                <tr>
                                    <td><?php echo $dato['ID_CAUSA']; ?></td>
                                    <td><?php echo $dato['CAUSA']; ?></td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-editar" data-id="<?php echo $dato['ID_CAUSA']; ?>">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </button>

                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('CausasController/eliminar/'.$dato['ID_CAUSA']); ?>"
                                            class="btn btn-danger">
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
     
            <!-- Modal -->
        <div class="modal fade" id="modalCausa" tabindex="-1" role="dialog" aria-labelledby="modalCausaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCausaLabel">Agregar Nueva Causa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formCausa" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="causa">Causa</label>
                                <input class="form-control" id="causa" name="causa" type="text" required />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-success" form="formCausa">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Edición -->
<div class="modal fade" id="modalEditarCausa" tabindex="-1" role="dialog" aria-labelledby="modalEditarCausaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarCausaLabel">Editar Causa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarCausa" method="POST" autocomplete="off">
                    <input type="hidden" id="id_causa" name="id_causa">
                    <div class="form-group">
                        <label for="causa_editar">Causa</label>
                        <input class="form-control" id="causa_editar" name="causa" type="text" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="submit" class="btn btn-success" form="formEditarCausa">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Eliminados -->
<div class="modal fade" id="modalEliminados" tabindex="-1" role="dialog" aria-labelledby="modalEliminadosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminadosLabel">Causas Eliminadas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tablaCausasElim" class="table table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Causa</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($eliminados)): ?>
                            <?php foreach($eliminados as $elim): ?>
                            <tr>
                                <td><?php echo $elim['ID_CAUSA']; ?></td>
                                <td><?php echo $elim['CAUSA']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('CausasController/reactivar/'.$elim['ID_CAUSA']); ?>"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-arrow-alt-circle-up"></i> Reingresar
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

    <script>
$(document).ready(function() {
    $('#tablaCausas').DataTable({
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
<script>
$(document).ready(function() {
    $('#formCausa').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '<?php echo site_url('CausasController/insertar'); ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Mostrar mensaje de éxito
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Causa registrada correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Cerrar el modal
                        $('#modalCausa').modal('hide');
                        // Limpiar el formulario
                        $('#formCausa')[0].reset();
                        // Recargar la tabla o sección donde se muestran las causas
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'Error al registrar la causa'
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en el servidor: ' + error
                });
            }
        });
    });

    // Limpiar el formulario cuando se cierra el modal
    $('#modalCausa').on('hidden.bs.modal', function () {
        $('#formCausa')[0].reset();
    });
});
</script>
<!-- Script para manejar la edición -->
<script>
$(document).ready(function() {
    // Cuando se hace clic en el botón de editar
    $('.btn-editar').on('click', function() {
        var id = $(this).data('id');
        
        // Cargar los datos de la causa
        $.ajax({
            url: '<?php echo site_url('CausasController/obtener_causa/'); ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#id_causa').val(response.data.ID_CAUSA);
                    $('#causa_editar').val(response.data.CAUSA);
                    $('#modalEditarCausa').modal('show');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo cargar la información'
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al cargar los datos: ' + error
                });
            }
        });
    });

    // Manejar el envío del formulario de edición
    $('#formEditarCausa').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '<?php echo site_url('CausasController/actualizar'); ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        $('#modalEditarCausa').modal('hide');
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en el servidor: ' + error
                });
            }
        });
    });
});
</script>
    <script>
        $(document).ready(function() {
    $('#tablaCausasElim').DataTable({
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            infoPostFix: "",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último"
            },
            aria: {
                sortAscending: ": Activar para ordenar la columna de manera ascendente",
                sortDescending: ": Activar para ordenar la columna de manera descendente"
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