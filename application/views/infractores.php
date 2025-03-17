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
    <!-- JavaScript de SweetAlert2 -->
    <script src="<?php echo base_url();?>public/assets/js/sweetalert211.js"></script>
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <!-- Estilos personalizados -->
    <style>
    .hover-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .pagination .page-link {
        color: #4e73df;
    }
    </style>
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
                <!-- Contenedor principal -->
                <div class="container-fluid">
                    <!-- Controles superiores: búsqueda, filtros y cambio de vista -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <!-- Búsqueda -->
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="filtro-infractores"
                                            placeholder="Buscar infractor...">
                                    </div>
                                </div>

                                <!-- Filtros y controles -->
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-md-end">
                                        <!-- Filtro por estado -->
                                        <div class="mr-2">
                                            <select class="form-control" id="filtro-estado">
                                                <option value="">Todos</option>
                                                <option value="con-foto">Con foto</option>
                                                <option value="sin-foto">Sin foto</option>
                                            </select>
                                        </div>

                                        <!-- Ordenación -->
                                        <div class="mr-2">
                                            <select class="form-control" id="orden-infractores">
                                                <option value="nombre-asc">Nombre A-Z</option>
                                                <option value="nombre-desc">Nombre Z-A</option>

                                            </select>
                                        </div>

                                        <!-- Cambio de vista -->
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-outline-primary active"
                                                id="vista-cuadricula"><i class="fas fa-th"></i></button>
                                            <button type="button" class="btn btn-outline-primary" id="vista-lista"><i
                                                    class="fas fa-list"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contador de resultados -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="m-0" id="contador-resultados">
                            Mostrando <span id="elementos-visibles">0</span> de <span
                                id="total-infractores"><?php echo $total_infractores; ?></span> infractores
                        </h5> <button class="btn btn-success" onclick="abrirModalRegistro()">
                            <i class="fas fa-plus mr-1"></i> Nuevo Infractor
                        </button>
                    </div>

                    <!-- Vista de cuadrícula (predeterminada) -->
                    <div id="vista-cuadricula-contenedor">
                        <div class="row" id="infractores-grid">
                            <?php if(!empty($datos)): ?>
                            <?php foreach($datos as $dato): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4 infractor-card"
                                data-nombre="<?php echo strtolower($dato['N_INFRACTOR'] . ' ' . $dato['A_INFRACTOR']); ?>"
                                data-cedula="<?php echo $dato['C_INFRACTOR']; ?>"
                                data-foto="<?php echo !empty($dato->F_INFRACTOR_RUTA) || !empty($dato['F_INFRACTOR_RUTA']) ? 'con-foto' : 'sin-foto'; ?>">
                                <div class="card h-100 shadow-sm hover-card">
                                    <div class="card-body text-center">
                                        <!-- Foto del infractor -->
                                        <?php if(!empty($dato->F_INFRACTOR_RUTA) || !empty($dato['F_INFRACTOR_RUTA'])): ?>
                                        <?php 
                                        $ruta_foto = is_object($dato) ? $dato->F_INFRACTOR_RUTA : $dato['F_INFRACTOR_RUTA'];
                                        $ruta_foto = preg_replace('/^\.\//', '', $ruta_foto);
                                    ?>
                                        <div class="avatar-container mx-auto mb-3">
                                            <a href="<?php echo base_url($ruta_foto); ?>" data-fancybox="gallery"
                                                data-caption="<?php echo $dato['N_INFRACTOR'] . ' ' . $dato['A_INFRACTOR']; ?>">
                                                <img src="<?php echo base_url($ruta_foto); ?>" alt="Foto"
                                                    class="rounded-circle img-thumbnail"
                                                    style="width: 120px; height: 120px; object-fit: cover; cursor: pointer; transition: transform 0.3s;">
                                            </a>
                                        </div>
                                        <?php else: ?>
                                        <div class="avatar-container d-flex justify-content-center align-items-center bg-light rounded-circle mx-auto mb-3"
                                            style="width: 120px; height: 120px; border: 1px solid #dee2e6;">
                                            <i class="fas fa-user text-secondary" style="font-size: 3rem;"></i>
                                        </div>
                                        <?php endif; ?>

                                        <!-- Información del infractor -->
                                        <h5 class="card-title">
                                            <?php echo $dato['N_INFRACTOR'] . ' ' . $dato['A_INFRACTOR']; ?></h5>
                                        <p class="card-text mb-1">
                                            <span class="badge badge-light p-2"><i class="fas fa-id-card mr-1"></i>
                                                <?php echo $dato['C_INFRACTOR']; ?></span>
                                        </p>
                                        <?php if(!empty($dato['T_INFRACTOR'])): ?>
                                        <p class="card-text mb-3">
                                            <span class="badge badge-light p-2"><i class="fas fa-phone mr-1"></i>
                                                <?php echo $dato['T_INFRACTOR']; ?></span>
                                        </p>
                                        <?php else: ?>
                                        <p class="card-text mb-3">
                                            <span class="badge badge-light p-2 text-muted"><i
                                                    class="fas fa-phone mr-1"></i> No disponible</span>
                                        </p>
                                        <?php endif; ?>

                                        <!-- Botón de edición -->
                                        <button class="btn btn-primary btn-sm btn-block"
                                            onclick="abrirModalEdicion(<?php echo $dato['ID_INFRACTOR']; ?>)">
                                            <i class="fas fa-edit mr-1"></i> Editar
                                        </button>
                                        <?php 
// Verificar si el infractor tiene procesos asociados
$tiene_procesos = $this->InfractoresModel->tiene_procesos_asociados($dato['ID_INFRACTOR']);
?>

                                        <?php if (!$tiene_procesos): ?>
                                        <button class="btn btn-danger btn-sm btn-eliminar-infractor"
                                            data-id="<?php echo $dato['ID_INFRACTOR']; ?>"
                                            data-nombre="<?php echo $dato['N_INFRACTOR'] . ' ' . $dato['A_INFRACTOR']; ?>">
                                            <i class="fas fa-trash mr-1"></i> Eliminar
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-info">
                                    No se encontraron infractores registrados.
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Vista de lista (alternativa) -->
                    <div id="vista-lista-contenedor" style="display: none;">
                        <div class="card">
                            <div class="list-group list-group-flush" id="infractores-list">
                                <?php if(!empty($datos)): ?>
                                <?php foreach($datos as $dato): ?>
                                <div class="list-group-item infractor-item"
                                    data-nombre="<?php echo strtolower($dato['N_INFRACTOR'] . ' ' . $dato['A_INFRACTOR']); ?>"
                                    data-cedula="<?php echo $dato['C_INFRACTOR']; ?>"
                                    data-foto="<?php echo !empty($dato->F_INFRACTOR_RUTA) || !empty($dato['F_INFRACTOR_RUTA']) ? 'con-foto' : 'sin-foto'; ?>">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <?php if(!empty($dato->F_INFRACTOR_RUTA) || !empty($dato['F_INFRACTOR_RUTA'])): ?>
                                            <?php 
                                            $ruta_foto = is_object($dato) ? $dato->F_INFRACTOR_RUTA : $dato['F_INFRACTOR_RUTA'];
                                            $ruta_foto = preg_replace('/^\.\//', '', $ruta_foto);
                                        ?>
                                            <a href="<?php echo base_url($ruta_foto); ?>" data-fancybox="gallery-list"
                                                data-caption="<?php echo $dato['N_INFRACTOR'] . ' ' . $dato['A_INFRACTOR']; ?>">
                                                <img src="<?php echo base_url($ruta_foto); ?>" alt="Foto"
                                                    class="rounded-circle img-thumbnail"
                                                    style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;">
                                            </a>
                                            <?php else: ?>
                                            <div class="d-flex justify-content-center align-items-center bg-light rounded-circle"
                                                style="width: 60px; height: 60px; border: 1px solid #dee2e6;">
                                                <i class="fas fa-user text-secondary" style="font-size: 1.5rem;"></i>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="mb-1">
                                                <?php echo $dato['N_INFRACTOR'] . ' ' . $dato['A_INFRACTOR']; ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="badge badge-light p-2"><i class="fas fa-id-card mr-1"></i>
                                                <?php echo $dato['C_INFRACTOR']; ?></span>
                                        </div>
                                        <div class="col-md-3">
                                            <?php if(!empty($dato['T_INFRACTOR'])): ?>
                                            <span class="badge badge-light p-2"><i class="fas fa-phone mr-1"></i>
                                                <?php echo $dato['T_INFRACTOR']; ?></span>
                                            <?php else: ?>
                                            <span class="badge badge-light p-2 text-muted"><i
                                                    class="fas fa-phone mr-1"></i> No disponible</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <button class="btn btn-primary btn-sm"
                                                onclick="abrirModalEdicion(<?php echo $dato['ID_INFRACTOR']; ?>)">
                                                <i class="fas fa-edit mr-1"></i> Editar
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <div class="list-group-item">
                                    <div class="alert alert-info mb-0">
                                        No se encontraron infractores registrados.
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Paginación -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            <select class="form-control" id="items-por-pagina">
                                <option value="12">12 por página</option>
                                <option value="24">24 por página</option>
                                <option value="48">48 por página</option>
                                <option value="0">Ver todos</option>
                            </select>
                        </div>
                        <nav aria-label="Navegación de páginas">
                            <ul class="pagination" id="paginacion">
                                <!-- La paginación se generará dinámicamente con JavaScript -->
                            </ul>
                        </nav>
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

    <!-- Modal para Registrar/Editar Infractor -->
    <div class="modal fade" id="modalInfractor" tabindex="-1" role="dialog" aria-labelledby="modalInfractorLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfractorLabel">Registrar Nuevo Infractor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí va el contenido del formulario -->
                    <?php echo form_open_multipart('', 'id="formInfractor"'); ?>
                    <!-- Campo oculto para el ID del infractor (solo para edición) -->
                    <input type="hidden" name="id_infractor" id="id_infractor">
                    <!-- Campo oculto para la acción (registrar o actualizar) -->
                    <input type="hidden" name="accion" id="accion" value="registrar">

                    <!-- Sección de foto -->
                    <div class="text-center mb-4">
                        <div class="position-relative d-inline-block">
                            <div class="rounded-circle overflow-hidden bg-light d-flex align-items-center justify-content-center"
                                style="width: 150px; height: 150px;">
                                <img id="photo-preview" src="" class="img-fluid"
                                    style="width: 150px; height: 150px; object-fit: cover; display: none;">
                                <!-- Ícono por defecto -->
                                <i class="fas fa-user fa-4x text-secondary" id="default-icon"></i>
                            </div>
                            <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center"
                                style="top: 0; left: 0; background: rgba(0,0,0,0.5); opacity: 0; transition: opacity 0.3s">
                                <i class="fas fa-camera fa-2x text-white"></i>
                            </div>
                            <input type="file" name="foto_inf" id="foto_inf" class="position-absolute w-100 h-100"
                                style="top: 0; left: 0; opacity: 0; cursor: pointer;" accept="image/*">
                        </div>
                        <small class="form-text text-muted mt-2" id="foto-texto">Haga clic para agregar una foto</small>
                    </div>

                    <!-- Campos del formulario -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="n_infractor" class="form-label font-weight-bold">Nombres<span
                                        class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="n_infractor" name="n_infractor" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="a_infractor" class="form-label font-weight-bold">Apellidos<span
                                        class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="a_infractor" name="a_infractor" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cedula_inf" class="form-label font-weight-bold">Cédula<span
                                        class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="cedula_inf" name="cedula_inf" maxlength="10"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_infractor" class="form-label font-weight-bold">Teléfono</label>
                                <input type="text" class="form-control" id="t_infractor" name="t_infractor">
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i>Cancelar
                    </button>
                    <button type="button" class="btn btn-primary" id="btnGuardarInfractor">
                        <i class="fas fa-save mr-2"></i><span id="btn-text">Guardar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

    <script>
    $(document).ready(function() {

        // Contar solo los elementos de la vista activa inicialmente
        var activeView = $('#vista-cuadricula').hasClass('active') ? 'grid' : 'list';
        var totalInfractoresReales = activeView === 'grid' ?
            $('#infractores-grid .infractor-card').length :
            $('#infractores-list .infractor-item').length;


        // Actualizar el contador en la interfaz con el número real
        $("#total-infractores").text(totalInfractoresReales);


        // Variables para paginación
        var itemsPorPagina = 12;
        var paginaActual = 1;
        var infractores = activeView === 'grid' ?
            $('#infractores-grid .infractor-card') :
            $('#infractores-list .infractor-item');
        var totalMostrados = totalInfractoresReales;

        // ===== PARTE 1: MANIPULACIÓN DE MODALES ======
        // Vista previa de la imagen cuando se selecciona una foto
        $('#foto_inf').change(function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo-preview').attr('src', e.target.result).show();
                    $('#default-icon').hide();
                };
                reader.readAsDataURL(file);
            }
        });

        // Función para abrir el modal en modo CREAR
        window.abrirModalRegistro = function() {
            // Reiniciar el formulario
            resetearFormulario();

            // Configurar el modal para modo registro
            $('#modalInfractorLabel').text('Registrar Nuevo Infractor');
            $('#btn-text').text('Guardar');
            $('#foto-texto').text('Haga clic para agregar una foto');
            $('#accion').val('registrar');
            $('#formInfractor').attr('action',
                '<?php echo base_url("index.php/InfractoresController/registrar_infractor"); ?>');

            // Mostrar el modal
            $('#modalInfractor').modal('show');
        };

        // Función para abrir el modal en modo EDITAR
        window.abrirModalEdicion = function(id) {
            // Reiniciar el formulario
            resetearFormulario();


            // Configurar el modal para modo edición
            $('#modalInfractorLabel').text('Editar Infractor');
            $('#btn-text').text('Actualizar');
            $('#foto-texto').text('Haga clic para cambiar la foto');
            $('#accion').val('actualizar');
            $('#formInfractor').attr('action',
                '<?php echo base_url("index.php/InfractoresController/actualizar"); ?>');

            // Asignar el ID al campo oculto explícitamente
            $('#id_infractor').val(id);


            // Mostrar indicador de carga
            Swal.fire({
                title: 'Cargando...',
                text: 'Obteniendo datos del infractor',
                didOpen: () => {
                    Swal.showLoading();
                },
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            });

            // Cargar datos del infractor
            $.ajax({
                url: '<?php echo base_url("index.php/InfractoresController/obtener_infractor/"); ?>' +
                    id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Cerrar el indicador de carga
                    Swal.close();

                    if (response.success) {
                        // Cargar datos en el formulario
                        $('#id_infractor').val(response.data.ID_INFRACTOR);
                        $('#n_infractor').val(response.data.N_INFRACTOR);
                        $('#a_infractor').val(response.data.A_INFRACTOR);
                        $('#t_infractor').val(response.data.T_INFRACTOR);
                        $('#cedula_inf').val(response.data.C_INFRACTOR);

                        // Cargar foto si existe
                        if (response.data.F_INFRACTOR_RUTA) {
                            // Quitar ./ del inicio si existe
                            var ruta_foto = response.data.F_INFRACTOR_RUTA.replace(/^\.\//, '');
                            $('#photo-preview').attr('src', '<?php echo base_url(); ?>' +
                                ruta_foto);
                            $('#photo-preview').show();
                            $('#default-icon').hide();
                        }

                        // Mostrar el modal
                        $('#modalInfractor').modal('show');
                    } else {
                        // Mostrar mensaje de error con SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Cerrar el indicador de carga
                    Swal.close();

                    console.error('Error al obtener datos del infractor:', error);
                    console.error('Respuesta del servidor:', xhr.responseText);

                    // Mostrar mensaje de error con SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al cargar los datos del infractor. Por favor, intente nuevamente.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar'
                    });
                }
            });
        };

        // Función para reiniciar el formulario
        function resetearFormulario() {
            $('#formInfractor')[0].reset();
            $('#id_infractor').val('');
            $('#photo-preview').hide();
            $('#default-icon').show();
        }

        // Modificar el manejador del envío del formulario
        $('#btnGuardarInfractor').click(function() {
            if ($('#formInfractor')[0].checkValidity()) {
                var formData = new FormData($('#formInfractor')[0]);

                // Mostrar un indicador de carga mientras se procesa
                Swal.fire({
                    title: 'Procesando...',
                    text: 'Por favor espere mientras se procesa la solicitud',
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false
                });

                // Enviar petición AJAX
                $.ajax({
                    url: $('#formInfractor').attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        // Cerrar el indicador de carga
                        Swal.close();

                        if (response.success) {
                            // Cerrar modal actual
                            $('#modalInfractor').modal('hide');

                            // Mostrar mensaje de éxito con SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: response.message,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                // Después de que el usuario presione "Aceptar"
                                if (result.isConfirmed) {
                                    // Si hay un ID de infractor, abrir el modal personalizado
                                    if (response.id_infractor) {
                                        abrirModalVistaInfractor(response
                                            .id_infractor);
                                    } else {
                                        // Si no hay ID, actualizar el contenido sin recargar la página
                                        actualizarContenido();
                                    }
                                }
                            });
                        } else {
                            // AQUÍ ESTÁ LA MODIFICACIÓN CLAVE:
                            // Verificar si es un caso de cédula existente
                            if (response.infractor_existe && response.id_infractor) {
                                // Cerrar modal actual primero
                                $('#modalInfractor').modal('hide');

                                // Mostrar mensaje informativo con opción para ver el infractor
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Ya existe un infractor con esta cedula',
                                    text: response.message,
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ver infractor',
                                    cancelButtonText: 'Cerrar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Abrir el modal con la información del infractor existente
                                        abrirModalVistaInfractor(response
                                            .id_infractor);
                                    }
                                });
                            } else {
                                // Caso normal de error
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                });
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la solicitud:', error);
                        console.error('Respuesta del servidor:', xhr.responseText);

                        // Mostrar mensaje de error con SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error al procesar la solicitud. Por favor, intente nuevamente.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                });
            } else {
                // Mostrar validaciones
                $('#formInfractor')[0].reportValidity();
            }
        });

        // Limpiar el formulario cuando se cierra el modal
        $('#modalInfractor').on('hidden.bs.modal', function() {
            resetearFormulario();
        });

        // Función para actualizar contenido sin recargar la página
        function actualizarContenido() {
            $.ajax({
                url: window.location.href,
                type: 'GET',
                success: function(response) {
                    // Extraer solo la parte de los infractores del HTML
                    var tempDiv = $('<div>').html(response);
                    var nuevoContenido = tempDiv.find('#infractores-grid').html();

                    if (nuevoContenido) {
                        // Actualizar el contenido
                        $('#infractores-grid').html(nuevoContenido);

                        // Reinicializar la paginación
                        inicializarPaginacion();
                    } else {
                        // Si no se puede extraer el contenido, recargar la página
                        location.reload();
                    }
                },
                error: function() {
                    // En caso de error, recargar la página
                    location.reload();
                }
            });
        }
        // Función auxiliar para abrir el modal del infractor
        function abrirModalVistaInfractor(id_infractor) {
            const baseUrl = '<?php echo base_url(); ?>';

            // Eliminar modal anterior si existe
            $('#modalVistaInfractor').remove();

            // Crear estructura del modal
            const modalHTML = `
    <div class="modal fade" id="modalVistaInfractor" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información del Infractor</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-spinner fa-spin fa-3x"></i>
                        <p class="mt-2">Cargando información...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>`;

            // Añadir modal al body
            $('body').append(modalHTML);

            // Cargar contenido en el modal
            $.get(baseUrl + 'index.php/ProcesosController/cargar_vista_modal/' + id_infractor)
                .done(function(modalContent) {
                    // Insertar contenido en el body del modal
                    $('#modalVistaInfractor .modal-body').html(modalContent);

                    // Mostrar modal
                    $('#modalVistaInfractor').modal('show');
                })
                .fail(function(error) {
                    console.error('Error al cargar el contenido del modal:', error);
                    $('#modalVistaInfractor .modal-body').html(
                        '<div class="alert alert-danger">Error al cargar la información. Por favor, intente nuevamente.</div>'
                    );
                });
        }
        // ===== PARTE 2: FILTROS Y PAGINACIÓN ======

        // Función para inicializar la paginación
        function inicializarPaginacion() {

            // Determinar qué vista está activa
            var activeView = $('#vista-cuadricula').hasClass('active') ? 'grid' : 'list';

            // Contar solo los elementos de la vista activa
            infractores = activeView === 'grid' ?
                $('#infractores-grid .infractor-card') :
                $('#infractores-list .infractor-item');

            totalInfractoresReales = infractores.length;
            totalMostrados = totalInfractoresReales;


            // Actualizar contador y paginación
            actualizarContadorResultados();
            crearPaginacion();
            mostrarPagina(1);
        }

        // Inicializar paginación si hay elementos
        if (infractores.length > 0) {
            inicializarPaginacion();

            // Búsqueda en tiempo real
            $("#filtro-infractores").on("keyup", function() {
                filtrarInfractores();
            });

            // Filtro por estado (con/sin foto)
            $("#filtro-estado").on("change", function() {
                filtrarInfractores();
            });

            // Ordenación
            $("#orden-infractores").on("change", function() {
                ordenarInfractores();
            });

            // Cambio de vista
            $("#vista-cuadricula").on("click", function() {
                $(this).addClass('active');
                $("#vista-lista").removeClass('active');
                $("#vista-cuadricula-contenedor").show();
                $("#vista-lista-contenedor").hide();

                // Reinicializar paginación para la vista de cuadrícula
                inicializarPaginacion();
            });

            $("#vista-lista").on("click", function() {
                $(this).addClass('active');
                $("#vista-cuadricula").removeClass('active');
                $("#vista-cuadricula-contenedor").hide();
                $("#vista-lista-contenedor").show();

                // Reinicializar paginación para la vista de lista
                inicializarPaginacion();
            });

            // Cambio de items por página
            $("#items-por-pagina").on("change", function() {
                itemsPorPagina = parseInt($(this).val());
                paginaActual = 1;

                if (itemsPorPagina === 0) {
                    // Mostrar todos
                    $('.infractor-card:not(.d-none), .infractor-item:not(.d-none)').show();
                    $("#paginacion").hide();
                } else {
                    crearPaginacion();
                    mostrarPagina(1);
                    $("#paginacion").show();
                }
            });
        } else {}

        // Función para filtrar infractores
        function filtrarInfractores() {
            var valor = $("#filtro-infractores").val().toLowerCase();
            var estado = $("#filtro-estado").val();

            infractores.each(function() {
                var mostrar = true;

                // Filtrar por texto
                if (valor) {
                    // Buscar en todo el texto del elemento
                    var textoCompleto = $(this).text().toLowerCase();
                    mostrar = textoCompleto.indexOf(valor) > -1;
                }

                // Filtrar por estado de foto
                if (mostrar && estado) {
                    var conFoto = $(this).find('img.rounded-circle').length > 0;
                    if (estado === 'con-foto' && !conFoto) {
                        mostrar = false;
                    } else if (estado === 'sin-foto' && conFoto) {
                        mostrar = false;
                    }
                }

                // Aplicar visibilidad
                $(this).toggleClass('d-none', !mostrar);
            });

            // Actualizar contador, paginación y mostrar primera página
            actualizarContadorResultados();
            paginaActual = 1;
            crearPaginacion();
            mostrarPagina(1);
        }

        // Función para ordenar infractores
        function ordenarInfractores() {
            var orden = $("#orden-infractores").val();
            var gridContainer = $('#infractores-grid');
            var listContainer = $('#infractores-list');

            if (!orden) return;

            // Función para comparar elementos según criterio
            function compararElementos(a, b) {
                var aText, bText;

                switch (orden) {
                    case 'nombre-asc':
                        aText = $(a).find('.card-title, h5').first().text().toLowerCase();
                        bText = $(b).find('.card-title, h5').first().text().toLowerCase();
                        return aText.localeCompare(bText);

                    case 'nombre-desc':
                        aText = $(a).find('.card-title, h5').first().text().toLowerCase();
                        bText = $(b).find('.card-title, h5').first().text().toLowerCase();
                        return bText.localeCompare(aText);

                    case 'cedula-asc':
                        aText = $(a).find('.badge:contains("Cédula"), .badge:contains("cédula")').text()
                            .replace(/\D/g, '');
                        bText = $(b).find('.badge:contains("Cédula"), .badge:contains("cédula")').text()
                            .replace(/\D/g, '');
                        return aText - bText;

                    case 'cedula-desc':
                        aText = $(a).find('.badge:contains("Cédula"), .badge:contains("cédula")').text()
                            .replace(/\D/g, '');
                        bText = $(b).find('.badge:contains("Cédula"), .badge:contains("cédula")').text()
                            .replace(/\D/g, '');
                        return bText - aText;

                    default:
                        return 0;
                }
            }

            // Ordenar elementos de la cuadrícula
            var gridItems = gridContainer.find('.infractor-card').get();
            gridItems.sort(compararElementos);
            $.each(gridItems, function(i, item) {
                gridContainer.append(item);
            });

            // Ordenar elementos de la lista
            var listItems = listContainer.find('.infractor-item').get();
            listItems.sort(compararElementos);
            $.each(listItems, function(i, item) {
                listContainer.append(item);
            });

            // Actualizar paginación
            mostrarPagina(paginaActual);
        }

        // Función para crear la paginación
        function crearPaginacion() {
            // Usar el total real de elementos
            var totalElementos = totalInfractoresReales;
            var paginacion = ''; // Inicializar la variable paginacion

            if (itemsPorPagina === 0 || totalElementos <= itemsPorPagina) {
                $("#paginacion").empty().hide();
                infractores.show();
                return;
            }

            var totalPaginas = Math.ceil(totalElementos / itemsPorPagina);

            // Simplificar paginación para depuración
            for (var i = 1; i <= totalPaginas; i++) {
                paginacion += '<li class="page-item' + (paginaActual === i ? ' active' : '') + '">' +
                    '<a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
            }

            $("#paginacion").html(paginacion).show();

            // Asignar eventos (desactivando primero para evitar duplicaciones)
            $("#paginacion .page-link").off('click').on("click", function(e) {
                e.preventDefault();
                var pagina = $(this).data('page');
                if (pagina) {
                    mostrarPagina(parseInt(pagina));
                }
            });

        }

        // Función para mostrar una página específica
        function mostrarPagina(pagina) {
            // Obtener elementos filtrados actuales
            var infractoresFiltrados = infractores.not('.d-none');
            var totalElementos = infractoresFiltrados.length;

            // Validar página solicitada
            var totalPaginas = Math.ceil(totalElementos / itemsPorPagina);
            if (pagina > totalPaginas) pagina = totalPaginas;
            if (pagina < 1) pagina = 1;

            // Actualizar variable global
            paginaActual = pagina;

            // Actualizar UI de paginación
            $("#paginacion .page-item").removeClass('active');
            $("#paginacion .page-link[data-page='" + pagina + "']").parent().addClass('active');

            // Calcular índices
            var inicio = (pagina - 1) * itemsPorPagina;
            var fin = Math.min(inicio + itemsPorPagina, totalElementos);


            // Ocultar todos primero
            infractoresFiltrados.hide();

            // Mostrar solo los de esta página
            infractoresFiltrados.slice(inicio, fin).show();

            // Verificación
            setTimeout(function() {}, 100);
        }

        // Actualizar contador de resultados
        function actualizarContadorResultados() {
            var infractoresFiltrados = infractores.not('.d-none');
            totalMostrados = infractoresFiltrados.length;

            // Actualizar texto
            $("#total-infractores").text(totalMostrados);

            // Actualizar el contador de elementos visibles
            var elementosVisibles = $('.infractor-card:visible, .infractor-item:visible').length;
            $("#elementos-visibles").text(elementosVisibles);

        }

        // Intentar inicializar Fancybox si está disponible
        if (typeof Fancybox !== 'undefined') {
            try {
                Fancybox.bind("[data-fancybox]", {
                    loop: true,
                    buttons: ["zoom", "slideShow", "fullScreen", "download", "close"],
                    animationEffect: "fade"
                });
            } catch (e) {
                console.error("Error al inicializar Fancybox:", e);
            }
        } else {
            console.warn("Fancybox no está disponible. Asegúrate de incluir la biblioteca.");
        }
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
        $('.btn-eliminar-infractor').on('click', function() {
            const id = $(this).data('id');
            const nombre = $(this).data('nombre');

            Swal.fire({
                title: '¿Estás seguro?',
                html: `Vas a eliminar al infractor <strong>${nombre}</strong>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir al método de eliminación
                    window.location.href =
                        `<?= site_url('InfractoresController/eliminar_infractor/') ?>${id}`;
                }
            });
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