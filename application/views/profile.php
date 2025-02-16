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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <div class="position-relative d-inline-block mb-4">
                                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center border"
                                                    style="width: 250px; height: 250px; overflow: hidden;">
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
                                                        style="bottom: -5px; right: -5px;">
                                                        <i class="fas fa-camera"></i> <!-- Font Awesome -->
                                                        <input type="file" name="foto" id="foto" class="d-none"
                                                            accept="image/*">
                                                    </label>
                                                </form>
                                                <!-- Botón para eliminar la foto, solo si no es la foto por defecto -->
                                                <?php if ($foto_ruta && $foto_ruta !== 'uploads/fotos_usuario/default_profile.png'): ?>
                                                <form action="<?= site_url('ProfileController/eliminar_foto') ?>"
                                                    method="POST">
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2">Eliminar
                                                        Foto</button>
                                                </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>


                                        <div class="col-md-9">
    <h5 class="mb-4 text-primary fw-bold border-bottom pb-3" style="font-size: 2rem;">Detalles de mi cuenta</h5>
    <div class="row mb-4">
        <!-- Nombres -->
        <div class="col-md-6">
            <label class="form-label small fw-bold fs-5 text-primary">Nombres</label>
            <p class="mb-3 fs-4 fw-bold text-dark">
                <?= isset($user['NOMBRES']) ? $user['NOMBRES'] : 'No disponible' ?>
            </p>
        </div>
        <!-- Apellidos -->
        <div class="col-md-6">
            <label class="form-label small fw-bold fs-5 text-primary">Apellidos</label>
            <p class="mb-3 fs-4 fw-bold text-dark">
                <?= isset($user['APELLIDOS']) ? $user['APELLIDOS'] : 'No disponible' ?>
            </p>
        </div>
        <!-- Cédula -->
        <div class="col-md-6">
            <label class="form-label small fw-bold fs-5 text-primary">Cédula</label>
            <p class="mb-3 fs-4 fw-bold text-dark">
                <?= isset($user['CEDULA']) ? $user['CEDULA'] : 'No disponible' ?>
            </p>
        </div>
        <!-- Correo Electrónico -->
        <div class="col-md-6">
            <label class="form-label small fw-bold fs-5 text-primary">Correo Electrónico</label>
            <p class="mb-3 fs-4 fw-bold text-dark">
                <?= isset($user['EMAIL']) ? $user['EMAIL'] : 'No disponible' ?>
            </p>
        </div>
        <!-- Estado -->
        <div class="col-md-6">
            <label class="form-label small fw-bold fs-5 text-primary">Estado</label>
            <div class="mb-3">
                <span class="badge <?= isset($user['ESTADO']) && $user['ESTADO'] == 'AC' ? 'bg-success' : 'bg-danger' ?> fs-5 px-3 py-2 rounded-pill">
                    <?= isset($user['ESTADO']) && $user['ESTADO'] == 'AC' ? 'Activo' : 'Inactivo' ?>
                </span>
            </div>
        </div>
        <!-- Rol -->
        <div class="col-md-6">
            <label class="form-label small fw-bold fs-5 text-primary">Rol</label>
            <p class="mb-3 fs-4 fw-bold text-dark">
                <?= isset($user['ROL']) ? $user['ROL'] : 'No disponible' ?>
            </p>
        </div>
    </div>

    <div class="border-top pt-4">
        <h6 class="mb-4 text-primary fw-bold" style="font-size: 1.8rem;">Cambiar Contraseña</h6>
        <form action="<?= site_url('ProfileController/cambiar_contrasena') ?>" method="POST">
            <div class="row">
                <!-- Contraseña Actual -->
                <div class="col-md-6">
                    <div class="mb-3 position-relative">
                        <label class="form-label text-primary fw-bold fs-5">Contraseña Actual</label>
                        <div class="input-group">
                            <input type="password" class="form-control fs-5" name="contrasena_actual" id="contrasena_actual" required>
                            <button type="button" class="btn btn-outline-secondary fs-5" id="togglePasswordActual">
                                <i class="fas fa-eye" id="icono-ojo-actual"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Nueva Contraseña -->
                <div class="col-md-6">
                    <div class="mb-3 position-relative">
                        <label class="form-label text-primary fw-bold fs-5">Nueva Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control fs-5" name="nueva_contrasena" id="nueva_contrasena" required>
                            <button type="button" class="btn btn-outline-secondary fs-5" id="togglePasswordNueva">
                                <i class="fas fa-eye" id="icono-ojo-nueva"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-4 py-3 rounded-pill mt-3 fs-5">
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
    $(document).ready(function() {
        $('#foto').change(function() {
            // Crear un objeto FormData con los datos del formulario
            var formData = new FormData($('#foto-form')[0]);

            $.ajax({
                url: $('#foto-form').attr('action'), // URL del controlador
                type: 'POST',
                data: formData,
                processData: false, // No procesar los datos
                contentType: false, // No establecer content-type
                success: function(response) {
                    console.log('Respuesta recibida:',
                        response); // Verificar la respuesta en la consola
                    try {
                        response = JSON.parse(
                            response); // Intenta convertirlo a un objeto JSON
                        if (response.success) {
                            $('#foto-perfil').attr('src', response
                                .new_photo_path); // Actualiza la imagen
                            alert('Foto actualizada correctamente.');

                            // Recargar la página después de la actualización exitosa
                            location.reload(); // Recarga la página
                        } else {
                            alert(response.error || 'Hubo un error al actualizar la foto.');
                        }
                    } catch (e) {
                        alert('Error al procesar la respuesta del servidor.');
                        console.error('Respuesta del servidor no válida:', response, e);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error en la conexión con el servidor.');
                    console.error('Detalles del error:', status, error);
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