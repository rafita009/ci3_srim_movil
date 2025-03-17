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
    <script src="<?php echo base_url();?>public/assets/js/sweetalert211.js"></script>
<!-- JavaScript de SweetAlert2 -->

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
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalCdit">
                            <i class="fas fa-plus"></i> Agregar
                        </button> 
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminados">
                            <i class="fas fa-trash"></i> Eliminados

                        </button>
                        </p>
                    </div>
                   
                    <div class="table-responsive">
                    <table id="tablaCdit" class="table table-bordered table-hover datatable">
                    <thead class="thead-dark">
                                <tr>
                                    <th>Nro</th>
                                    <th>CDIT</th>
                                    <th>Direccion</th>
                                    <th>Acciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($datos)): ?>
                                <?php foreach($datos as $dato): ?>
                                <tr>
                                    <td><?php echo $dato['ID_CDIT']; ?></td>
                                    <td><?php echo $dato['NOMBRE_CDIT']; ?></td>
                                    <td><?php echo $dato['DIRECCION']; ?></td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-editar" data-id="<?php echo $dato['ID_CDIT']; ?>">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </button>

                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('CditController/eliminar/'.$dato['ID_CDIT']); ?>"
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
     
     <!-- Modal de Agregar -->
<div class="modal fade" id="modalCdit" tabindex="-1" role="dialog" aria-labelledby="modalCditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCditLabel">Agregar Nuevo Centro de Detencion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCdit" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="cdit">Centro de Detencion</label>
                        <input class="form-control" id="cdit" name="cdit" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input class="form-control" id="direccion" name="direccion" type="text" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="submit" class="btn btn-success" form="formCdit">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Edición -->
<div class="modal fade" id="modalEditarCdit" tabindex="-1" role="dialog" aria-labelledby="modalEditarCditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarCditLabel">Editar CDIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarCdit" method="POST" autocomplete="off">
                    <input type="hidden" id="id_cdit" name="id_cdit">
                    <div class="form-group">
                        <label for="cdit_editar">CDIT</label>
                        <input class="form-control" id="cdit_editar" name="cdit" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion_editar">Dirección</label>
                        <input class="form-control" id="direccion_editar" name="direccion" type="text" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="submit" class="btn btn-success" form="formEditarCdit">
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
                <h5 class="modal-title" id="modalEliminadosLabel">CDITs Eliminados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tablaCditElim" class="table table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>CDIT</th>
                                <th>Direccion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($eliminados)): ?>
                            <?php foreach($eliminados as $elim): ?>
                            <tr>
                                <td><?php echo $elim['ID_CDIT']; ?></td>
                                <td><?php echo $elim['NOMBRE_CDIT']; ?></td>
                                <td><?php echo $elim['DIRECCION']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('CditController/reactivar/'.$elim['ID_CDIT']); ?>"
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

      

<!-- Script para manejar la edición -->
<script>
 // Script para manejo del formulario de inserción
$(document).ready(function() {
    $('#formCdit').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '<?php echo site_url('CditController/insertar'); ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'CDIT registrado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        $('#modalCdit').modal('hide');
                        $('#formCdit')[0].reset();
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'Error al registrar el CDIT'
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
    $('#modalCdit').on('hidden.bs.modal', function () {
        $('#formCdit')[0].reset();
    });
});

// Script para manejo de la edición
$(document).ready(function() {
    // Cuando se hace clic en el botón de editar
    $('.btn-editar').on('click', function() {
        var id = $(this).data('id');
        
        // Cargar los datos del CDIT
        $.ajax({
            url: '<?php echo site_url('CditController/obtener_cdit/'); ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#id_cdit').val(response.data.ID_CDIT);
                    $('#cdit_editar').val(response.data.CDIT);
                    $('#modalEditarCdit').modal('show');
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
    $('#formEditarCdit').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '<?php echo site_url('CditController/actualizar'); ?>',
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
                        $('#modalEditarCdit').modal('hide');
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
    $('#tablaCdit').DataTable({
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
     <script>
        $(document).ready(function() {
    $('#tablaCditElim').DataTable({
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Comprobar si hay mensajes de éxito en el flashdata
    <?php if($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '<?= $this->session->flashdata('success'); ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            showCloseButton: true,
            timer: 2000,
            timerProgressBar: true
        });
    <?php endif; ?>

    // Comprobar si hay mensajes de error en el flashdata
    <?php if($this->session->flashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $this->session->flashdata('error'); ?>',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Cerrar',
            showCloseButton: true,
            timer: 2000,
            timerProgressBar: true
        });
    <?php endif; ?>
    
    // Comprobar si hay mensajes de información en el flashdata
    <?php if($this->session->flashdata('info')): ?>
        Swal.fire({
            icon: 'info',
            title: 'Información',
            text: '<?= $this->session->flashdata('info'); ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Entendido',
            showCloseButton: true,
            timer: 2000,
            timerProgressBar: true
        });
    <?php endif; ?>
    
    // Comprobar si hay mensajes de advertencia en el flashdata
    <?php if($this->session->flashdata('warning')): ?>
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: '<?= $this->session->flashdata('warning'); ?>',
            confirmButtonColor: '#f8bb86',
            confirmButtonText: 'Entendido',
            showCloseButton: true,
            timer: 2000,
            timerProgressBar: true
        });
    <?php endif; ?>
    
    // Para la compatibilidad retroactiva con el nombre 'mensaje'
    <?php if($this->session->flashdata('mensaje')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Mensaje',
            text: '<?= $this->session->flashdata('mensaje'); ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            showCloseButton: true,
            timer: 2000,
            timerProgressBar: true
        });
    <?php endif; ?>
    
    // Para la compatibilidad con mensajes tipo array
    <?php 
    $mensaje_flash = $this->session->flashdata('mensaje_array');
    if (isset($mensaje_flash) && is_array($mensaje_flash)):
        $icon = isset($mensaje_flash['status']) ? $mensaje_flash['status'] : 'info';
        $title = ($icon === 'success') ? '¡Éxito!' : (($icon === 'error') ? 'Error' : 'Mensaje');
        $buttonColor = ($icon === 'success') ? '#3085d6' : (($icon === 'error') ? '#d33' : '#3085d6');
        $buttonText = ($icon === 'error') ? 'Cerrar' : 'Aceptar';
    ?>
        Swal.fire({
            icon: '<?= $icon ?>',
            title: '<?= $title ?>',
            text: '<?= addslashes($mensaje_flash['message']) ?>',
            confirmButtonColor: '<?= $buttonColor ?>',
            confirmButtonText: '<?= $buttonText ?>',
            showCloseButton: true,
            timer: 2000,
            timerProgressBar: true
        });
    <?php endif; ?>
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