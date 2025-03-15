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
    

    <!-- Tabla de Agentes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Listado de Agentes</h4>
            <div>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalAgente">
                    <i class="fas fa-plus"></i> Agregar
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminados">
                    <i class="fas fa-trash"></i> Eliminados
                </button>
            </div>
        </div>
        <div class="card-body">
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
                <table id="tablaAgentes" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="d-none">ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Nro Agente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($agentes)): ?>
                        <?php foreach ($agentes as $agente): ?>
                        <tr>
                            <td class="d-none"><?php echo $agente['ID_AGENTE']; ?></td>
                            <td><?php echo isset($agente['NOMBRES_ACT']) ? $agente['NOMBRES_ACT'] : ''; ?></td>
                            <td><?php echo isset($agente['APELLIDOS_ACT']) ? $agente['APELLIDOS_ACT'] : ''; ?></td>
                            <td><?php echo isset($agente['NRO_ACT']) ? $agente['NRO_ACT'] : ''; ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success btn-editar" data-id="<?php echo $agente['ID_AGENTE']; ?>">
                                    <i class="fas fa-pencil-alt"></i> Editar
                                </button>
                                <a href="<?php echo site_url('AgentesController/eliminar/'.$agente['ID_AGENTE']); ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay agentes registrados</td>
                        </tr>
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
    <div class="modal fade" id="modalAgente" tabindex="-1" role="dialog" aria-labelledby="modalAgenteLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalagenteLabel">Agregar Nuevo Agente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formAgente" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="nombreagente">Nombres del Agente</label>
                            <input class="form-control" id="nombreagente" name="nombre_agente" type="text" required />
                        </div>
                        <div class="form-group">
                            <label for="apellidosagente">Apellidos del Agente</label>
                            <input class="form-control" id="apellidosagente" name="apellidos_agente" type="text"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="nroagente">Nro Agente</label>
                            <input class="form-control" id="nroagente" name="nro_agente" type="number" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-success" form="formAgente">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div class="modal fade" id="modalEditarAgente" tabindex="-1" role="dialog" aria-labelledby="modalEditarAgenteLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarAgenteLabel">Editar Agente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditarAgente" method="POST" autocomplete="off">
                        <input type="hidden" id="id_agente" name="id_agente">
                        <div class="form-group">
                            <label for="nombre_agente_editar">Nombres del Agente</label>
                            <input class="form-control" id="nombre_agente_editar" name="nombre_agente" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos_agente_editar">Apellidos del Agente</label>
                            <input class="form-control" id="apellidos_agente_editar" name="apellidos_agente" type="text"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="nro_agente_editar">Nro Agente</label>
                            <input class="form-control" id="nro_agente_editar" name="nro_agente" type="number" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-success" form="formEditarAgente">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Eliminados -->
    <div class="modal fade" id="modalEliminados" tabindex="-1" role="dialog" aria-labelledby="modalEliminadosLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminadosLabel">Agentes Eliminados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="tablaAgentesElim" class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Nro Agente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($eliminados)): ?>
                                <?php foreach($eliminados as $elim): ?>
                                <tr>
                                    <td><?php echo $elim['ID_AGENTE']; ?></td>
                                    <td><?php echo $elim['NOMBRES_ACT']; ?></td>
                                    <td><?php echo $elim['APELLIDOS_ACT']; ?></td>
                                    <td><?php echo $elim['NRO_ACT']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('AgentesController/reactivar/'.$elim['ID_AGENTE']); ?>"
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
// Script para manejo del formulario de inserción de agentes
$(document).ready(function() {
    $('#formAgente').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '<?php echo site_url('AgentesController/insertar'); ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Agente registrado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        $('#modalAgente').modal('hide');
                        $('#formAgente')[0].reset();
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'Error al registrar el Agente'
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
    $('#modalAgente').on('hidden.bs.modal', function () {
        $('#formAgente')[0].reset();
    });
});

// Script para manejo de la edición de agentes
$(document).ready(function() {
    // Cuando se hace clic en el botón de editar
    $('.btn-editar').on('click', function() {
        var id = $(this).data('id');
        
        // Cargar los datos del Agente
        $.ajax({
            url: '<?php echo site_url('AgentesController/obtener_agente/'); ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Asignar valores a los campos usando los IDs correctos del HTML
                    $('#id_agente').val(response.data.ID_AGENTE);
                    $('#nombre_agente_editar').val(response.data.NOMBRES_ACT);
                    $('#apellidos_agente_editar').val(response.data.APELLIDOS_ACT);
                    $('#nro_agente_editar').val(response.data.NRO_ACT);
                    
                    // Mostrar el modal
                    $('#modalEditarAgente').modal('show');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo cargar la información'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Para depuración
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al cargar los datos: ' + error
                });
            }
        });
    });

    // Manejar el envío del formulario de edición
    $('#formEditarAgente').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '<?php echo site_url('AgentesController/actualizar'); ?>',
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
                        $('#modalEditarAgente').modal('hide');
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
                console.log(xhr.responseText); // Para depuración
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en el servidor: ' + error
                });
            }
        });
    });

    
    // Manejar la eliminación de agentes
    $('.btn-eliminar').on('click', function() {
        var id = $(this).data('id');
        
        Swal.fire({
            title: '¿Está seguro?',
            text: "¡No podrá revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo site_url('AgentesController/eliminar/'); ?>' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Eliminado!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
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
            }
        });
    });
});
</script>



    <script>
    $(document).ready(function() {
        $('#tablaAgentes').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

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
    $('#tablaAgentesElim').DataTable({
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