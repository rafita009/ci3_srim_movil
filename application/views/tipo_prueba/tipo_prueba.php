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
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#modalTipoPrueba">
                                <i class="fas fa-plus"></i> Agregar
                            </button>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalTipoPruebaEliminados">
                                Eliminados
                            </a>
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
                        <table id="tablaTipoP" class="table table-bordered table-hover datatable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nro</th>
                                    <th>Tipo de Prueba</th>
                                    <th>Acciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($datos)): ?>
                                <?php foreach($datos as $dato): ?>
                                <tr>
                                    <td><?php echo $dato['ID_TIPO_PRUEBA']; ?></td>
                                    <td><?php echo $dato['NOMBRE_PRUEBA']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-editar"
                                            data-id="<?php echo $dato['ID_TIPO_PRUEBA']; ?>">
                                            <i class="fas fa-pencil-alt"></i> Editar
                                        </button>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('Tipo_p_Controller/eliminar/'.$dato['ID_TIPO_PRUEBA']); ?>"
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
    <div class="modal fade" id="modalTipoPrueba" tabindex="-1" role="dialog" aria-labelledby="modalTipoPruebaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTipoPruebaLabel">Agregar Nuevo Tipo de Prueba</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTipoPrueba" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="tipo_prueba">Tipo de Prueba</label>
                            <input class="form-control" id="tipo_prueba" name="tipo_prueba" type="text" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-success" form="formTipoPrueba">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Tipo de Prueba -->
    <div class="modal fade" id="modalEditarTipoPrueba" tabindex="-1" role="dialog"
        aria-labelledby="modalEditarTipoPruebaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarTipoPruebaLabel">Editar Tipo de Prueba</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditarTipoPrueba" method="POST" autocomplete="off">
                        <input type="hidden" id="id_tipo_prueba" name="id_tipo_prueba">
                        <div class="form-group">
                            <label for="tipo_prueba_editar">Tipo de Prueba</label>
                            <input class="form-control" id="tipo_prueba_editar" name="tipo_prueba" type="text" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-success" form="formEditarTipoPrueba">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal de Tipos de Prueba Eliminados -->
<div class="modal fade" id="modalTipoPruebaEliminados" tabindex="-1" role="dialog" aria-labelledby="modalTipoPruebaEliminadosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTipoPruebaEliminadosLabel">Tipos de Prueba Eliminados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tablaTipoPruebaElim" class="table table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo de Prueba</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($eliminados)): ?>
                            <?php foreach($eliminados as $elim): ?>
                            <tr>
                                <td><?php echo $elim['ID_TIPO_PRUEBA']; ?></td>
                                <td><?php echo $elim['NOMBRE_PRUEBA']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('Tipo_p_Controller/reactivar/'.$elim['ID_TIPO_PRUEBA']); ?>"
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
        $('#tablaTipoP').DataTable({
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
    <!-- Script para manejar los modales -->
    <script>
    $(document).ready(function() {
        // Manejar el envío del formulario de agregar
        $('#formTipoPrueba').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo site_url('Tipo_p_Controller/insertar'); ?>',
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
                            $('#modalTipoPrueba').modal('hide');
                            $('#formTipoPrueba')[0].reset();
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

        // Cambiar la forma de asignar el evento click para editar
    $(document).on('click', '.btn-editar', function() {
        var id = $(this).data('id');
        
        $.ajax({
            url: '<?php echo site_url('Tipo_p_Controller/obtener_tipo_prueba/'); ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#id_tipo_prueba').val(response.data.ID_TIPO_PRUEBA);
                    $('#tipo_prueba_editar').val(response.data.NOMBRE_PRUEBA);
                    $('#modalEditarTipoPrueba').modal('show');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo cargar la información'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(error); // Para debugging
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al cargar los datos: ' + error
                });
            }
        });
    });
        // Manejar el envío del formulario de edición
        $('#formEditarTipoPrueba').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo site_url('Tipo_p_Controller/actualizar'); ?>',
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
                            $('#modalEditarTipoPrueba').modal('hide');
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
    $('#tablaTipoPruebaElim').DataTable({
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