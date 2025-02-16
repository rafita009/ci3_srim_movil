<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Personas</title>

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

                    <!-- Sección de Registro de Persona -->
                    <div class="mb-3">
                        <div class="col-12">
                            <div class="card rounded shadow w-100">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-user-plus text-primary mr-2 fa-lg"></i>
                                        <h3 class="mb-0 ">Registro de Persona</h3>
                                    </div>
                                    <form id="formPersona"
                                        action="<?= site_url('PersonasController/guardar_persona') ?>">
                                        <input type="hidden" name="id_persona" value="">

                                        <!-- Nombre y Apellidos -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nombre" class="font-weight-bold small">Nombres <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group input-group-lg shadow-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-primary text-white"><i
                                                                class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="Ingrese su nombre" maxlength="30" required>
                                                </div>
                                                <small id="nombreError" class="error-message text-danger"></small>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="apellidos" class="font-weight-bold small">Apellidos <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group input-group-lg shadow-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-primary text-white"><i
                                                                class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="apellidos"
                                                        name="apellidos" placeholder="Ingrese sus apellidos"
                                                        maxlength="30" required>
                                                </div>
                                                <small id="apellidosError" class="error-message text-danger"></small>
                                            </div>
                                        </div>

                                        <!-- Email y Teléfono -->
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label for="email" class="font-weight-bold small">Correo Electrónico
                                                    <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-lg shadow-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-primary text-white"><i
                                                                class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="correo@ejemplo.com" maxlength="50" required>
                                                </div>
                                                <small id="emailError" class="error-message text-danger"></small>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="telefono" class="font-weight-bold small">Teléfono <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group input-group-lg shadow-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-primary text-white"><i
                                                                class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="telefono"
                                                        name="telefono" placeholder="0987654321" maxlength="20"
                                                        required>
                                                </div>
                                                <small id="telefonoError" class="error-message text-danger"></small>

                                            </div>
                                        </div>

                                        <!-- Cédula -->
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label for="cedula" class="font-weight-bold small">Cédula <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group input-group-lg shadow-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-primary text-white"><i
                                                                class="fas fa-id-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="cedula" name="cedula"
                                                        placeholder="1234567890" maxlength="10" required>
                                                </div>
                                                <small id="cedulaError" class="error-message text-danger"></small>

                                            </div>
                                        </div>

                                        <!-- Botón de Enviar -->
                                        <div class="mt-3 text-center">
                                            <button type="submit" class="btn btn-success btn-lg rounded-pill px-4">
                                                <i class="fas fa-save"></i> Guardar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Tabla de Personas -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card rounded shadow w-100">
                                <div class="card-body p-3">
                                    <h5>Listado de Personas</h5>
                                    <div class="table-responsive">
                                    <table id="tablaPersonas" class="table table-bordered table-hover datatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Email</th>
                                                <th>Teléfono</th>
                                                <th>Cédula</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($personas as $persona): ?>
                                            <tr>
                                                <td><?= $persona['ID_PERSONA']; ?></td>
                                                <td><?= $persona['NOMBRES']; ?></td>
                                                <td><?= $persona['APELLIDOS']; ?></td>
                                                <td><?= $persona['EMAIL']; ?></td>
                                                <td><?= $persona['TELEFONO']; ?></td>
                                                <td><?= $persona['CEDULA']; ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-editar-usuario"
                                                        data-id_persona="<?= $persona['ID_PERSONA']; ?>"
                                                        data-nombre="<?= htmlspecialchars($persona['NOMBRES'], ENT_QUOTES, 'UTF-8'); ?>"
                                                        data-apellido="<?= htmlspecialchars($persona['APELLIDOS'], ENT_QUOTES, 'UTF-8'); ?>"
                                                        data-cedula="<?= htmlspecialchars($persona['CEDULA'], ENT_QUOTES, 'UTF-8'); ?>"
                                                        data-correo="<?= htmlspecialchars($persona['EMAIL'], ENT_QUOTES, 'UTF-8'); ?>"
                                                        data-telefono="<?= htmlspecialchars($persona['TELEFONO'], ENT_QUOTES, 'UTF-8'); ?>">
                                                        <i class="fas fa-edit"></i> Editar
                                                    </button>
                                                    <form method="POST"
                                                        action="<?= site_url('UsersController/generar_usuario') ?>"
                                                        class="d-inline">
                                                        <input type="hidden" name="id_persona"
                                                            value="<?= $persona['ID_PERSONA']; ?>">
                                                        <button class="btn btn-primary btn-generar-usuario"
                                                            data-id="<?= $persona['ID_PERSONA']; ?>">
                                                            <i class="fas fa-user-plus"></i> Generar Usuario
                                                        </button>
                                                    </form>
                                                    <form method="POST"
                                                        action="<?= site_url('UsersController/eliminar_usuario_persona') ?>"
                                                        class="d-inline" style="display:inline;"
                                                        onsubmit="return confirmarEliminacion();">
                                                        <input type="hidden" name="id_persona"
                                                            value="<?= $persona['ID_PERSONA']; ?>">
                                                        <button type="submit"
                                                            class="btn btn-danger btn-eliminar-usuario"
                                                            data-id="<?= $persona['ID_PERSONA']; ?>">
                                                            <i class="fas fa-trash-alt"></i> Eliminar
                                                        </button>
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

    <!-- Modal para editar persona -->
    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog"
        aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content shadow-lg border-0 rounded-4">
                <!-- Modal Header con diseño mejorado -->
                <div class="modal-header bg-primary bg-gradient text-white rounded-top-4 py-3">
                    <h5 class="modal-title fw-bold text-white ms-2" id="editarUsuarioModalLabel">
                        <i class="fas fa-edit align-middle me-2"></i> Editar Información de Persona
                    </h5>
                    <button type="button" class="close text-white shadow-none" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="formEditarUsuario" method="POST"
                    action="<?= site_url('PersonasController/editar_persona') ?>">
                    <div class="modal-body bg-light p-4">
                        <input type="hidden" name="id_persona" id="modal_id_persona">

                        <!-- Primera fila de campos -->
                        <div class="row g-4">
                            <!-- Campo para nombre -->
                            <div class="col-md-6">
                                <label for="modal_nombre" class="form-label fw-bold mb-2">
                                    Nombres <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg shadow-sm">
                                    <span class="input-group-text bg-primary bg-gradient text-white">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control border-0 shadow-none" id="modal_nombre"
                                        name="nombre" placeholder="Ingrese el nombre" required>
                                </div>
                            </div>
                            <!-- Campo para apellido -->
                            <div class="col-md-6">
                                <label for="modal_apellido" class="form-label fw-bold mb-2">
                                    Apellidos <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg shadow-sm">
                                    <span class="input-group-text bg-primary bg-gradient text-white">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control border-0 shadow-none" id="modal_apellido"
                                        name="apellido" placeholder="Ingrese el apellido" required>
                                </div>
                            </div>
                        </div>

                        <!-- Segunda fila de campos -->
                        <div class="row g-4 mt-2">
                            <!-- Campo para cédula -->
                            <div class="col-md-6">
                                <label for="modal_cedula" class="form-label fw-bold mb-2">
                                    Cédula <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg shadow-sm">
                                    <span class="input-group-text bg-primary bg-gradient text-white">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                    <input type="text" class="form-control border-0 shadow-none" id="modal_cedula"
                                        name="cedula" pattern="[0-9]{10}" maxlength="10" placeholder="1234567890"
                                        title="Ingrese una cédula válida de 10 dígitos" required>
                                </div>
                            </div>
                            <!-- Campo para correo -->
                            <div class="col-md-6">
                                <label for="modal_correo" class="form-label fw-bold mb-2">
                                    Correo Electrónico <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg shadow-sm">
                                    <span class="input-group-text bg-primary bg-gradient text-white">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control border-0 shadow-none" id="modal_correo"
                                        name="correo" placeholder="correo@ejemplo.com" required>
                                </div>
                            </div>
                        </div>

                        <!-- Tercera fila de campos -->
                        <div class="row g-4 mt-2">
                            <!-- Campo para teléfono -->
                            <div class="col-md-12">
                                <label for="modal_telefono" class="form-label fw-bold mb-2">
                                    Teléfono <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg shadow-sm">
                                    <span class="input-group-text bg-primary bg-gradient text-white">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <input type="text" class="form-control border-0 shadow-none" id="modal_telefono"
                                        name="telefono" pattern="[0-9]{7,15}" maxlength="15" placeholder="0987654321"
                                        title="Ingrese un teléfono válido de 7 a 10 dígitos" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer del modal mejorado -->
                    <div class="modal-footer bg-light border-0 p-4">
                        <button type="button" class="btn btn-light btn-lg rounded-pill px-4 me-2" data-dismiss="modal">
                            <i class="fas fa-times align-middle me-2"></i> Cancelar
                        </button>

                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4">
                            <i class="fas fa-save align-middle me-2"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Bootstrap 4 -->
    <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg border-0 rounded">
                <!-- Encabezado -->
                <div class="modal-header bg-primary text-white rounded-top py-3">
                    <h5 class="modal-title font-weight-bold d-flex align-items-center text-white"
                        id="modalUsuarioLabel">
                        <i class="fas fa-user mr-3"></i> <!-- Margen derecho con mr-3 -->
                        Información del Usuario
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Cuerpo -->
                <div class="modal-body bg-light p-4">
                    <p class="h5 text-center mb-4" id="modalMensaje"></p>

                    <div id="modalDetalles" class="mt-4">
                        <!-- Sección Usuario -->
                        <div
                            class="d-flex justify-content-between align-items-center p-3 mb-3 bg-white rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user text-primary mr-3"></i> <!-- Margen derecho con mr-3 -->
                                <strong>Usuario:</strong>
                            </div>
                            <span id="modalUsuarioGenerado" class="text-muted font-weight-bold"></span>
                        </div>

                        <!-- Sección Contraseña -->
                        <div
                            class="d-flex justify-content-between align-items-center p-3 mb-3 bg-white rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-lock text-primary mr-3"></i> <!-- Margen derecho con mr-3 -->
                                <strong>Contraseña:</strong>
                            </div>
                            <span id="modalPasswordGenerado" class="text-muted font-weight-bold"></span>
                        </div>

                        <!-- Sección Rol -->
                        <div class="d-flex justify-content-between align-items-center p-3 bg-white rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-id-badge text-primary mr-3"></i> <!-- Margen derecho con mr-3 -->
                                <strong>Rol Asignado:</strong>
                            </div>
                            <span id="modalRolAsignado" class="text-muted font-weight-bold"></span>
                        </div>
                    </div>
                </div>

                <!-- Pie de página -->
                <div class="modal-footer bg-light border-0 p-4">
                    <button type="button" class="btn btn-light btn-lg rounded-pill px-5 shadow-sm" data-dismiss="modal">
                        <i class="fas fa-times align-middle mr-2"></i> <!-- Margen derecho con mr-2 -->
                        <span class="font-weight-bold">Cerrar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalPersona" tabindex="-1" role="dialog" aria-labelledby="modalPersonaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg border-0 rounded">
                <!-- Encabezado -->
                <div class="modal-header bg-success bg-gradient text-white rounded-top py-3">
                    <h5 class="modal-title font-weight-bold d-flex align-items-center" id="modalPersonaLabel">
                        <i class="fas fa-user-plus mr-2"></i> <!-- Ícono de FontAwesome -->
                        Persona Agregada
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Cuerpo -->
                <div class="modal-body bg-light p-4">
                    <p class="h5 text-center mb-4">Detalles de la persona registrada:</p>

                    <div id="modalDetalles" class="mt-4">
                        <!-- Sección Nombre -->
                        <div
                            class="d-flex justify-content-between align-items-center p-3 mb-3 bg-white rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-id-badge text-success mr-3"></i> <!-- Ícono de FontAwesome -->
                                <strong>Nombre:</strong>
                            </div>
                            <span id="modalNombre" class="text-muted font-weight-bold"></span>
                        </div>

                        <!-- Sección Apellidos -->
                        <div
                            class="d-flex justify-content-between align-items-center p-3 mb-3 bg-white rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-id-badge text-success mr-3"></i> <!-- Ícono de FontAwesome -->
                                <strong>Apellidos:</strong>
                            </div>
                            <span id="modalApellidos" class="text-muted font-weight-bold"></span>
                        </div>

                        <!-- Sección Email -->
                        <div
                            class="d-flex justify-content-between align-items-center p-3 mb-3 bg-white rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope text-success mr-3"></i> <!-- Ícono de FontAwesome -->
                                <strong>Email:</strong>
                            </div>
                            <span id="modalEmail" class="text-muted font-weight-bold"></span>
                        </div>

                        <!-- Sección Teléfono -->
                        <div
                            class="d-flex justify-content-between align-items-center p-3 mb-3 bg-white rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone text-success mr-3"></i> <!-- Ícono de FontAwesome -->
                                <strong>Teléfono:</strong>
                            </div>
                            <span id="modalTelefono" class="text-muted font-weight-bold"></span>
                        </div>

                        <!-- Sección Cédula -->
                        <div class="d-flex justify-content-between align-items-center p-3 bg-white rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-id-card text-success mr-3"></i> <!-- Ícono de FontAwesome -->
                                <strong>Cédula:</strong>
                            </div>
                            <span id="modalCedula" class="text-muted font-weight-bold"></span>
                        </div>
                    </div>
                </div>

                <!-- Pie de página -->
                <div class="modal-footer bg-light border-0 p-4">
                    <button type="button" class="btn btn-light btn-lg rounded-pill px-5 shadow-sm" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i> <!-- Ícono de FontAwesome -->
                        <span class="font-weight-bold">Cerrar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

    <script>
    function confirmarEliminacion() {
        return confirm("¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.");
    }
    </script>
    <script>
    $(document).on('click', '.btn-editar-usuario', function() {
        const id = $(this).data('id_persona');
        const nombre = $(this).data('nombre');
        const apellido = $(this).data('apellido');
        const cedula = $(this).data('cedula');
        const correo = $(this).data('correo');
        const telefono = $(this).data('telefono');

        // Usamos los IDs únicos del modal
        $('#modal_id_persona').val(id);
        $('#modal_nombre').val(nombre);
        $('#modal_apellido').val(apellido);
        $('#modal_cedula').val(cedula);
        $('#modal_correo').val(correo);
        $('#modal_telefono').val(telefono);

        $('#editarUsuarioModal').modal('show');
    });
    </script>
    <script>
    $(document).ready(function() {
        // Evento para generar usuario
        $(".btn-generar-usuario").click(function(e) {
            e.preventDefault();

            // Obtener el ID de la persona del botón
            var id_persona = $(this).data("id");

            // Solicitud AJAX al servidor
            $.ajax({
                url: "<?= base_url('index.php/UsersController/generar_usuario'); ?>", // Ajusta según tu ruta
                type: "POST",
                data: {
                    id_persona: id_persona
                },
                dataType: "json",
                success: function(response) {
                    // Mostrar el modal
                    $("#modalUsuario").modal("show");

                    // Manejar la respuesta del servidor
                    if (response.status === "success") {
                        // Usuario creado
                        $("#modalMensaje").text(response.message);
                        $("#modalDetalles").show();
                        $("#modalUsuarioGenerado").text(response.usuario);
                        $("#modalPasswordGenerado").text(response.password);
                        $("#modalRolAsignado").text(response
                            .rol); // Mostrar el rol asignado
                    } else if (response.status === "exists") {
                        // Usuario ya existe
                        $("#modalMensaje").text(response.message);
                        $("#modalDetalles").show();
                        $("#modalUsuarioGenerado").text(response.usuario);
                        $("#modalPasswordGenerado").text("No disponible.");
                        $("#modalRolAsignado").text(response
                            .rol); // Mostrar el rol asignado
                    } else {
                        // Error general
                        $("#modalMensaje").text(response.message);
                        $("#modalDetalles").hide();
                    }
                },
                error: function() {
                    alert("Ocurrió un error al procesar la solicitud.");
                }
            });
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        // Ocultar los mensajes de error al inicio
        $(".error-message").hide();

        // Manejar el envío del formulario
        $("#formPersona").submit(function(e) {
            e.preventDefault(); // Prevenir el envío predeterminado del formulario

            // Limpiar mensajes de error anteriores
            $(".error-message").text("").hide();

            // Realizar la solicitud AJAX
            $.ajax({
                url: "<?= base_url('index.php/PersonasController/guardar_persona'); ?>", // URL del controlador
                type: "POST",
                data: $(this).serialize(), // Serializar los datos del formulario
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        // Mostrar datos en el modal
                        $("#modalNombre").text(response.nombre);
                        $("#modalApellidos").text(response.apellidos);
                        $("#modalEmail").text(response.email);
                        $("#modalTelefono").text(response.telefono);
                        $("#modalCedula").text(response.cedula);

                        // Mostrar el modal con los datos
                        $("#modalPersona").modal("show");

                        // Resetear el formulario después de un éxito
                        $("#formPersona")[0].reset();
                    } else if (response.status === "error") {
                        // Mostrar los errores en sus respectivos campos
                        if (response.errors) {
                            for (var field in response.errors) {
                                $("#" + field + "Error").text(response.errors[field])
                                    .show();
                            }
                        } else {
                            // Mostrar mensaje de error genérico si no hay errores específicos
                            alert(response.message);
                        }
                    }
                },
                error: function() {
                    // Manejar errores en la solicitud
                    alert(
                        "Ocurrió un error al procesar la solicitud. Por favor, inténtalo de nuevo."
                    );
                }
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#modalUsuario, #modalPersona').on('hidden.bs.modal', function() {
            location.reload(); // Recarga la página cuando el modal se cierre
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#tablaPersonas').DataTable({
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