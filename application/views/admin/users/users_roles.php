<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SRIM EMP</title>

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
    <script src="<?php echo base_url();?>public/assets/js/sweetalert211.js"></script>


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
                    <div class="row">
                        <div class="col-12">
                            <div class="card rounded shadow">
                                <div class="card-header">
                                    <h3 class="card-title" style="color: black ">Gestión de Roles</h3>
                                </div>
                                <div class="card-body p-3">
                                    
                                    <div class="d-flex align-items-center mb-3">

                                        <div class="table-responsive">
                                            <table id="tablaRoles" class="table table-bordered table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Nombre de Usuario</th>
                                                        <th>Rol</th>
                                                        <th>Acciones/Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($usuarios as $usuario): ?>
                                                        <tr>
                                                            <td><?= $usuario->NOMBRES ?></td>
                                                            <td><?= $usuario->APELLIDOS ?></td>
                                                            <td><?= $usuario->USUARIO ?></td>
                                                            <td><?= $usuario->ROL ?: 'Sin rol' ?></td>
                                                            <td class="ailgn-middle">
                                                                <!-- Botón para abrir el modal -->
                                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                                    data-target="#modalCambiarRol<?= $usuario->ID_USUARIO ?>">
                                                                    Cambiar Rol
                                                                </button>

                                                                <!-- Modal para cada usuario -->
                                                                <div class="modal fade" id="modalCambiarRol<?= $usuario->ID_USUARIO ?>"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="modalLabel<?= $usuario->ID_USUARIO ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="modalLabel<?= $usuario->ID_USUARIO ?>">
                                                                                    Cambiar Rol - <?= $usuario->NOMBRES ?>
                                                                                    <?= $usuario->APELLIDOS ?>
                                                                                </h5>
                                                                                <button type="button" class="close" data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form
                                                                                action="<?php echo site_url('UsersController/cambiar_rol'); ?>"
                                                                                method="POST">
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" name="id_usuario"
                                                                                        value="<?= $usuario->ID_USUARIO ?>">

                                                                                    <div class="form-group">
                                                                                        <label for="rol<?= $usuario->ID_USUARIO ?>">Seleccionar
                                                                                            Rol</label>
                                                                                        <select class="form-control"
                                                                                            id="rol<?= $usuario->ID_USUARIO ?>" name="rol"
                                                                                            required>
                                                                                            <option value="">Seleccione un rol</option>
                                                                                            <option value="administrador"
                                                                                                <?= ($usuario->ROL == 'administrador') ? 'selected' : '' ?>>
                                                                                                Administrador</option>
                                                                                            <option value="gestor"
                                                                                                <?= ($usuario->ROL == 'gestor') ? 'selected' : '' ?>>
                                                                                                Gestor</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary"
                                                                                        data-dismiss="modal">Cancelar</button>
                                                                                    <button type="submit" class="btn btn-primary">Guardar
                                                                                        Cambios</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- estado botones -->
                                                                <form action="<?= site_url('UsersController/cambiar_estado') ?>" method="POST"
                                                                    style="display:inline;">
                                                                    <input type="hidden" name="id_usuario" value="<?= $usuario->ID_USUARIO ?>">
                                                                    <input type="hidden" name="estado_actual" value="<?= $usuario->ESTADO ?>">
                                                                    <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

                                                                    <?php if ($usuario->ESTADO == 'AC'): ?>
                                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                            title="Desactivar Usuario">
                                                                            Desactivar
                                                                        </button>
                                                                    <?php else: ?>
                                                                        <button type="submit" class="btn btn-success btn-sm"
                                                                            title="Activar Usuario">
                                                                            Activar
                                                                        </button>
                                                                    <?php endif; ?>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
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
                <div class="modal-body">Selecciona "Cerrar sesión" si estás seguro de que quieres cerrar tu sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="<?php echo site_url();?>/LoginController/logout">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url(); ?>public/assets/vendor/jquery/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                // Para verificar si los modales están funcionando
                $('.modal').on('show.bs.modal', function(e) {
                    console.log('Modal abierto');
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Para verificar que los modales funcionen
                var modals = document.querySelectorAll('.modal');
                modals.forEach(function(modal) {
                    modal.addEventListener('show.bs.modal', function() {
                        console.log('Modal abierto:', modal.id);
                    });
                });

                // Para verificar envío del formulario
                var forms = document.querySelectorAll('.modal form');
                forms.forEach(function(form) {
                    form.addEventListener('submit', function(e) {
                        console.log('Formulario enviado');
                    });
                });
            });
        </script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tablaRoles').DataTable({
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

        <script src="<?php echo base_url(); ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>