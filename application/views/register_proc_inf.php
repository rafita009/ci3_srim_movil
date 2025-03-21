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
    
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">

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
                <!-- Vista principal de infractores -->
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="h3 mb-4">Gestión de Infractores</h2>

                            <!-- Botones de acción -->
                            <div class="mb-4">
                                <button type="button" class="btn btn-primary" id="btnMostrarLista">
                                    <i class="fas fa-list"></i> Lista de Infractores
                                </button>
                                <button type="button" class="btn btn-success ml-2" id="btnMostrarFormulario">
                                    <i class="fas fa-user-plus"></i> Registrar Nuevo Infractor
                                </button>
                            </div>

                            <!-- Card para contener la lista y el formulario -->
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <!-- Contenedor de la lista -->
                                    <div id="contenedorLista">
                                        <div class= "table-responsive"> 
                                        <table class="table table-striped table-bordered" id="tablaInfractores">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Cédula</th>
                                                    <th>Procesos Asociados</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $contador = 1; // Inicializamos el contador ?>
                                                <?php foreach ($infractores as $key => $infractor): ?>
                                                <tr>
                                                    <td><?= $key + 1 // Usamos el índice del array + 1 ?></td>
                                                    <td><?= htmlspecialchars($infractor['N_INFRACTOR']) ?></td>
                                                    <td><?= htmlspecialchars($infractor['A_INFRACTOR']) ?></td>
                                                    <td><?= htmlspecialchars($infractor['C_INFRACTOR']) ?></td>
                                                    <td>
                                                        <?php if (!empty($asociados[$infractor['ID_INFRACTOR']])) : ?>
                                                        <?php foreach($asociados[$infractor['ID_INFRACTOR']] as $proceso) : ?>
                                                        <div class="mb-2 d-flex align-items-center">
                                                            <span class="me-2">Proceso
                                                                #<?= htmlspecialchars($proceso['ID_PROCESO']) ?> -
                                                                <?= htmlspecialchars($proceso['RESOLUCION']) ?></span>
                                                            <a href="<?= site_url('SearchController/detalle/' . $proceso['ID_PROCESO']) ?>"
                                                                class="btn btn-info btn-sm">
                                                                <i class="bx bx-show"></i> Ver Proceso
                                                            </a>
                                                        </div>
                                                        <?php endforeach; ?>
                                                        <?php else : ?>
                                                        <div class="text-muted">No hay procesos asociados</div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm cargar-modal-infractor"
                                                            data-id="<?= $infractor['ID_INFRACTOR'] ?>">
                                                            <i class="fas fa-plus"></i> Agregar Proceso
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        
                                    </div>

                                    <!-- Contenedor del formulario -->
                                    <div id="contenedorFormulario" style="display: none;">
                                        <div class="row justify-content-center">

                                            <div class="col-md-8">
                                                <h4>Registrar Nuevo Infractor</h4>
                                                <?php echo form_open_multipart('ProcesosController/registrar_infractor', 'id="formRegistroInfractor"'); ?>
                                                <!-- Sección de foto -->
                                                <div class="text-center mb-4">
                                                    <div class="position-relative d-inline-block">
                                                        <div class="rounded-circle overflow-hidden bg-light d-flex align-items-center justify-content-center"
                                                            style="width: 150px; height: 150px;">
                                                            <img id="photo-preview" src="" class="img-fluid"
                                                                style="width: 150px; height: 150px; object-fit: cover; display: none;">
                                                            <!-- Ícono por defecto -->
                                                            <i class="fas fa-user fa-4x text-secondary"
                                                                id="default-icon"></i>
                                                        </div>
                                                        <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center"
                                                            style="top: 0; left: 0; background: rgba(0,0,0,0.5); opacity: 0; transition: opacity 0.3s">
                                                            <i class="fas fa-camera fa-2x text-white"></i>
                                                        </div>
                                                        <input type="file" name="foto_inf" id="foto_inf"
                                                            class="position-absolute w-100 h-100"
                                                            style="top: 0; left: 0; opacity: 0; cursor: pointer;"
                                                            accept="image/*">
                                                    </div>
                                                    <small class="form-text text-muted mt-2">Haga clic para agregar una
                                                        foto</small>
                                                </div>

                                                <!-- Campos del formulario -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nombre_inf"
                                                                class="form-label fw-bold">Nombres<span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="text" class="form-control" id="nombre_inf"
                                                                name="nombre_inf" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="apellidos_inf"
                                                                class="form-label fw-bold">Apellidos<span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="text" class="form-control" id="apellidos_inf"
                                                                name="apellidos_inf" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cedula_inf"
                                                                class="form-label fw-bold">Cédula<span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="text" class="form-control" id="cedula_inf"
                                                                name="cedula_inf" maxlength="10" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="telefono_inf">Teléfono</label>
                                                            <input type="text" class="form-control" id="telefono_inf"
                                                                name="telefono_inf">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-right mt-4">
                                                    <button type="button" class="btn btn-secondary" id="btnVolverLista">
                                                        <i class="fas fa-arrow-left mr-2"></i>Volver
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-2">
                                                        <i class="fas fa-save mr-2"></i>Guardar
                                                    </button>
                                                </div>
                                                <?php echo form_close(); ?>
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


    <!-- jQuery (primero) -->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Bundle (incluye Popper) -->
    <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Easing -->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?php echo base_url();?>public/assets/js/sweetalert211.js"></script>

    <!-- Custom scripts -->
    <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>
    <script>
    var baseUrl = '<?php echo base_url(); ?>';
    </script>
    <script>
        $(document).ready(function() {
    // Variable para rastrear si hay un cargador activo
    let loaderActive = false;
    
    // Función para mostrar el cargador
    function showLoader(message = 'Por favor espere') {
        // Cerrar cualquier alerta existente primero
        if (typeof Swal !== 'undefined') {
            Swal.close();
        }
        
        loaderActive = true;
        
        Swal.fire({
            title: 'Cargando...',
            text: message,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }
    
    // Función para ocultar el cargador
    function hideLoader() {
        if (loaderActive && typeof Swal !== 'undefined') {
            Swal.close();
            loaderActive = false;
            
            // Limpieza adicional por si acaso
            setTimeout(() => {
                const swalBackdrops = document.getElementsByClassName('swal2-backdrop-show');
                if (swalBackdrops.length > 0) {
                    for (let i = 0; i < swalBackdrops.length; i++) {
                        swalBackdrops[i].remove();
                    }
                }
                
                const swalContainers = document.getElementsByClassName('swal2-container');
                if (swalContainers.length > 0) {
                    for (let i = 0; i < swalContainers.length; i++) {
                        swalContainers[i].remove();
                    }
                }
            }, 100);
        }
    } // Clean up modal when it's closed
    $(document).on('hidden.bs.modal', '#modalVistaInfractor', function() {
        $(this).remove();
        // Asegurarse de que el cargador esté cerrado cuando se cierra el modal
        hideLoader();
    });
   

    // Handler for opening modal buttons
    $(document).on('click', '.cargar-modal-infractor', function() {
        loadInfractorModal($(this).data('id'));
    });

    // Function to load and show infractor modal
    // Handler for opening modal buttons
    $(document).on('click', '.cargar-modal-infractor', function() {
        loadInfractorModal($(this).data('id'));
    });

    // Function to load and show infractor modal
    function loadInfractorModal(id_infractor) {
        // Mostrar cargador
        showLoader('Cargando datos del infractor');

        // Remove existing modal if present
        $('#modalVistaInfractor').remove();

        // Load modal content
        $.get(baseUrl + 'index.php/ProcesosController/cargar_vista_modal/' + id_infractor)
            .done(function(modalContent) {
                // Create modal structure
                const modalHTML = `
              <div class="modal fade" id="modalVistaInfractor" tabindex="-1" role="dialog" aria-labelledby="tituloModalInfractor" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content rounded-lg shadow-lg">
            <div class="modal-header bg-primary text-white py-3">
                <h5 class="modal-title font-weight-bold" id="tituloModalInfractor">
                    <i class="fas fa-file-alt mr-2"></i>Registrar Proceso
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <!-- Contenido del modal -->
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
                `;

                // Append modal to body and update content
                $('body').append(modalHTML);
                $('#modalVistaInfractor .modal-body').html(modalContent);

                // Ocultar cargador antes de mostrar el modal
                hideLoader();
                
                // Show modal after content is loaded
                $('#modalVistaInfractor').modal('show');
            })
            .fail(function(error) {
                // Ocultar cargador en caso de error
                hideLoader();
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al cargar los datos del infractor',
                    confirmButtonText: 'Cerrar',
                    timer: 3000,
                    timerProgressBar: true
                });
            });
    }

    // Por defecto, mostrar la lista y ocultar el formulario
    $('#contenedorLista').show();
    $('#contenedorFormulario').hide();

    // Destruir DataTable si ya existe
    if ($.fn.DataTable.isDataTable('#tablaInfractores')) {
        $('#tablaInfractores').DataTable().destroy();
    }

    // Inicializar DataTable (esta parte queda igual)
    var table = $('#tablaInfractores').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        },
        "columnDefs": [{
            "targets": 0, // Primera columna (índice 0)
            "searchable": false,
            "orderable": true,
            "render": function(data, type, row, meta) {
                return meta.row + 1; // Numeración automática
            }
        }],
        "order": [
            [0, 'asc']
        ], // Esto ordena por la primera columna de forma descendente
        "autoWidth": false,
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "processing": true,
        "pageLength": 10,
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "Todos"]
        ]
    });

    // Evento para mostrar la lista (se mantiene igual)
    $('#btnMostrarLista').on('click', function() {
        $('#contenedorFormulario').fadeOut('fast', function() {
            $('#contenedorLista').fadeIn('fast', function() {
                table.columns.adjust();
            });
        });
    });

    // Evento para mostrar el formulario
    $('#btnMostrarFormulario').on('click', function() {
        // Limpiar el formulario
        $('#formRegistroInfractor')[0].reset();
        // Restaurar el estado inicial de la foto
        $('#photo-preview').hide();
        $('#default-icon').show();

        $('#contenedorLista').fadeOut('fast', function() {
            $('#contenedorFormulario').fadeIn('fast');
            $('#nombre_inf').focus();
        });
    });

    // Evento para volver a la lista (se mantiene igual)
    $('#btnVolverLista').on('click', function() {
        $('#contenedorFormulario').fadeOut('fast', function() {
            $('#contenedorLista').fadeIn('fast', function() {
                table.columns.adjust();
            });
        });
    });

    // FORM SUBMISSION - Keep only one handler, removing the duplicate
    $('#formRegistroInfractor').on('submit', function(e) {
        e.preventDefault();
        if (!this.checkValidity()) {
            return false;
        }
        var formData = new FormData(this);
        Swal.fire({
            title: 'Registrando...',
            text: 'Por favor espere',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        $.ajax({
            url: baseUrl + 'index.php/ProcesosController/registrar_infractor',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                // First close the loading dialog
                Swal.close();
                
                if (response.success) {
                    // Success case - show success message then modal
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Infractor registrado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Load modal after success message
                        loadInfractorModal(response.id_infractor);
                    });
                } else {
                    // Error case
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'Error al registrar infractor'
                    }).then(() => {
                        // Check if it's a "cedula already exists" error with infractor info
                        if (response.infractor_existe && response.id_infractor) {
                            // Load infractor modal with existing data
                            loadInfractorModal(response.id_infractor);
                        }
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
    
    // Ajustar la tabla cuando la ventana cambie de tamaño
    $(window).on('resize', function() {
        table.columns.adjust();
    });

    // Validación de la foto antes de la subida
    $('#foto_inf').on('change', function() {
        if (this.files && this.files[0]) {
            var file = this.files[0];
            var fileType = file.type;
            var maxSize = 2 * 1024 * 1024; // 2MB

            // Validar tipo de archivo
            if (!fileType.match('image.*')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Por favor, seleccione solo archivos de imagen'
                });
                this.value = '';
                $('#photo-preview').hide();
                $('#default-icon').show();
                return false;
            }

            // Validar tamaño del archivo
            if (file.size > maxSize) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El archivo es demasiado grande. El tamaño máximo es 2MB'
                });
                this.value = '';
                $('#photo-preview').hide();
                $('#default-icon').show();
                return false;
            }

            // Si pasa las validaciones, mostrar la previsualización
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#photo-preview').attr('src', e.target.result);
                $('#photo-preview').show();
                $('#default-icon').hide();
            }
            reader.readAsDataURL(file);
        } else {
            $('#photo-preview').hide();
            $('#default-icon').show();
        }
    });
});
    </script>

</body>

</html>