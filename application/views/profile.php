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
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <div class="position-relative d-inline-block mb-4">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center border"
                                    style="width: 180px; height: 180px; overflow: hidden; margin: 0 auto;">
                                    <img id="foto-perfil"
                                        src="<?= base_url(!empty($foto_ruta) ? $foto_ruta : 'uploads/fotos_usuario/default_profile.png') ?>"
                                        alt="Foto de perfil" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <form id="foto-form"
                                    action="<?= site_url('ProfileController/subir_foto') ?>"
                                    method="POST" enctype="multipart/form-data">
                                    <label for="foto"
                                        class="position-absolute btn btn-primary btn-sm rounded-circle"
                                        style="bottom: 5px; right: calc(50% - 90px);">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" name="foto" id="foto" class="d-none"
                                            accept="image/*">
                                    </label>
                                </form>
                                
                                <!-- Botón para eliminar la foto, solo si no es la foto por defecto -->
                                <?php if ($foto_ruta && $foto_ruta !== 'uploads/fotos_usuario/default_profile.png'): ?>
                                <form action="<?= site_url('ProfileController/eliminar_foto') ?>"
                                    method="POST" class="mt-2">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash mr-1"></i> Eliminar Foto
                                    </button>
                                </form>
                                <?php endif; ?>
                                            </div>
                                        </div>


                                        <div class="col-md-9">
                                            <h5 class="mb-4 text-primary fw-bold border-bottom pb-3"
                                                style="font-size: 2rem;">Detalles de mi cuenta</h5>
                                            <div class="row mb-4">
                                                <!-- Nombres -->
                                                <div class="col-md-6">
                                                    <label
                                                        class="form-label small fw-bold fs-5 text-primary">Nombres</label>
                                                    <p class="mb-3 fs-4 fw-bold text-dark">
                                                        <?= isset($user['NOMBRES']) ? $user['NOMBRES'] : 'No disponible' ?>
                                                    </p>
                                                </div>
                                                <!-- Apellidos -->
                                                <div class="col-md-6">
                                                    <label
                                                        class="form-label small fw-bold fs-5 text-primary">Apellidos</label>
                                                    <p class="mb-3 fs-4 fw-bold text-dark">
                                                        <?= isset($user['APELLIDOS']) ? $user['APELLIDOS'] : 'No disponible' ?>
                                                    </p>
                                                </div>
                                                <!-- Cédula -->
                                                <div class="col-md-6">
                                                    <label
                                                        class="form-label small fw-bold fs-5 text-primary">Cédula</label>
                                                    <p class="mb-3 fs-4 fw-bold text-dark">
                                                        <?= isset($user['CEDULA']) ? $user['CEDULA'] : 'No disponible' ?>
                                                    </p>
                                                </div>
                                                <!-- Correo Electrónico -->
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-bold fs-5 text-primary">Correo
                                                        Electrónico</label>
                                                    <p class="mb-3 fs-4 fw-bold text-dark">
                                                        <?= isset($user['EMAIL']) ? $user['EMAIL'] : 'No disponible' ?>
                                                    </p>
                                                </div>
                                                <!-- Estado -->
                                                <div class="col-md-6">
                                                    <label
                                                        class="form-label small fw-bold fs-5 text-primary">Estado</label>
                                                    <div class="mb-3">
                                                        <span
                                                            class="badge <?= isset($user['ESTADO']) && $user['ESTADO'] == 'AC' ? 'bg-success' : 'bg-danger' ?> fs-5 px-3 py-2 rounded-pill">
                                                            <?= isset($user['ESTADO']) && $user['ESTADO'] == 'AC' ? 'Activo' : 'Inactivo' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- Rol -->
                                                <div class="col-md-6">
                                                    <label
                                                        class="form-label small fw-bold fs-5 text-primary">Rol</label>
                                                    <p class="mb-3 fs-4 fw-bold text-dark">
                                                        <?= isset($user['ROL']) ? $user['ROL'] : 'No disponible' ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="border-top pt-4">
                                                <h6 class="mb-4 text-primary fw-bold" style="font-size: 1.8rem;">Cambiar
                                                    Contraseña</h6>
                                                <form action="<?= site_url('ProfileController/cambiar_contrasena') ?>"
                                                    method="POST">
                                                    <div class="row">
                                                        <!-- Contraseña Actual -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3 position-relative">
                                                                <label
                                                                    class="form-label text-primary fw-bold fs-5">Contraseña
                                                                    Actual</label>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control fs-5"
                                                                        name="contrasena_actual" id="contrasena_actual"
                                                                        required>
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary fs-5"
                                                                        id="togglePasswordActual">
                                                                        <i class="fas fa-eye" id="icono-ojo-actual"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Nueva Contraseña -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3 position-relative">
                                                                <label
                                                                    class="form-label text-primary fw-bold fs-5">Nueva
                                                                    Contraseña</label>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control fs-5"
                                                                        name="nueva_contrasena" id="nueva_contrasena"
                                                                        required>
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary fs-5"
                                                                        id="togglePasswordNueva">
                                                                        <i class="fas fa-eye" id="icono-ojo-nueva"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary px-4 py-3 rounded-pill mt-3 fs-5">
                                                                Cambiar Contraseña
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
    document.addEventListener("DOMContentLoaded", function() {
        function togglePassword(inputId, buttonId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleButton = document.getElementById(buttonId);
            const icon = document.getElementById(iconId);

            toggleButton.addEventListener("click", () => {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
        }

        // Aplicar la funcionalidad a ambos campos de contraseña
        togglePassword("contrasena_actual", "togglePasswordActual", "icono-ojo-actual");
        togglePassword("nueva_contrasena", "togglePasswordNueva", "icono-ojo-nueva");
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
<script>
$(document).ready(function() {
    $('#foto').change(function() {
        // Mostrar indicador de carga
        Swal.fire({
            title: 'Subiendo foto...',
            text: 'Por favor espera mientras actualizamos tu foto de perfil',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Crear un objeto FormData con los datos del formulario
        var formData = new FormData($('#foto-form')[0]);

        $.ajax({
            url: $('#foto-form').attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Respuesta recibida:', response);
                try {
                    response = JSON.parse(response);
                    if (response.success) {
                        $('#foto-perfil').attr('src', response.new_photo_path);
                        
                        // Notificación elegante de éxito
                        Swal.fire({
                            icon: 'success',
                            title: '¡Perfecto!',
                            text: 'Tu foto de perfil ha sido actualizada correctamente',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        // Notificación elegante de error
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.error || 'Hubo un error al actualizar la foto',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Intentar de nuevo'
                        });
                    }
                } catch (e) {
                    // Error en formato de respuesta
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al procesar la respuesta del servidor',
                        footer: 'Intenta nuevamente más tarde',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Cerrar'
                    });
                    console.error('Respuesta del servidor no válida:', response, e);
                }
            },
            error: function(xhr, status, error) {
                // Error de conexión
                Swal.fire({
                    icon: 'error',
                    title: 'Error de conexión',
                    text: 'No se pudo conectar con el servidor',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'
                });
                console.error('Detalles del error:', status, error);
            }
        });
    });
});
</script>
<!-- Script para manejar la eliminación de la foto -->
<script>
$(document).ready(function() {
    // Interceptar el envío del formulario de eliminación de foto
    $('form[action*="eliminar_foto"]').on('submit', function(e) {
        e.preventDefault(); // Prevenir el envío normal del formulario
        
        // Confirmar si realmente quiere eliminar la foto
        Swal.fire({
            title: '¿Estás seguro?',
            text: "La foto se eliminará permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mostrar cargando
                Swal.fire({
                    title: 'Eliminando...',
                    text: 'Por favor espera mientras eliminamos tu foto',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Realizar petición AJAX
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Cambiar la foto por la predeterminada
                            $('#foto-perfil').attr('src', response.default_photo);
                            
                            // Mostrar mensaje de éxito
                            Swal.fire({
                                icon: 'success',
                                title: '¡Listo!',
                                text: response.message,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                            });
                            
                            // Ocultar el botón de eliminar, ya que ahora tiene la foto predeterminada
                            $('form[action*="eliminar_foto"]').hide();
                        } else {
                            // Mostrar mensaje de error
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.error,
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'Cerrar'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Error de conexión
                        Swal.fire({
                            icon: 'error',
                            title: 'Error de conexión',
                            text: 'No se pudo conectar con el servidor',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Cerrar'
                        });
                        console.error('Detalles del error:', status, error);
                    }
                });
            }
        });
    });
});
</script>



    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>