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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
                        <!-- Formulario de búsqueda -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-title">

                                </div>
                                <div class="card-body">
                                    <form action="<?php echo site_url('SearchController/index'); ?>" method="get">
                                        <div class="row">
                                            <!-- Buscar por -->
                                            <div class="col-md-6">
                                                <label for="buscar_por" class="form-label">Buscar por:</label>
                                                <select id="buscar_por" name="buscar_por" class="form-control"
                                                    onchange="mostrarCampo()">
                                                    <option value="">Seleccione...</option>
                                                    <option value="distrito">Distrito</option>
                                                    <option value="canton">Cantón</option>
                                                    <option value="causa">Causa</option>
                                                    <option value="tipo_prueba">Tipo de Prueba</option>
                                                    <option value="nombre_apellido">Nombres y Apellidos</option>
                                                    <option value="placa">Placa</option>
                                                    <option value="cedula">Cédula</option>
                                                    <option value="telefono">Teléfono</option>
                                                    <option value="centro_detencion">Centro de Detención</option>
                                                </select>
                                            </div>
                                            <!-- Campo dinámico (Select o Input) -->
                                            <div class="col-md-6">
                                                <label for="seleccion_db" class="form-label">Seleccione:</label>
                                                <select id="seleccion_db" name="seleccion_db" class="form-control"
                                                    style="display: none;">
                                                    <option value="">Seleccione...</option>
                                                </select>
                                                <input type="text" id="valor_busqueda" name="valor_busqueda"
                                                    class="form-control" placeholder="Ingrese valor" style="display: none;">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <!-- Filtrar por -->
                                            <div class="col-md-4">
                                                <label for="filtrar_fecha" class="form-label">Filtrar por:</label>
                                                <select id="filtrar_fecha" name="filtrar_fecha" class="form-control">
                                                    <option value="registro">Fecha de Registro</option>
                                                    <option value="procedimiento" selected>Fecha de Procedimiento</option>
                                                </select>
                                            </div>

                                            <!-- Fecha de Inicio -->
                                            <div class="col-md-4">
                                                <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control">
                                            </div>

                                            <!-- Fecha de Fin -->
                                            <div class="col-md-4">
                                                <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                                                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Botón de búsqueda -->
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                <i class="bx bx-search"></i> Buscar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- Resultados -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header bg-dark text-white">
                                    <h5 class="mb-0">Procesos Asociados</h5>
                                </div>
                                <!-- Spinner de carga -->
                                <div id="loading" style="display: none;">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Cargando...</span>
                                    </div>
                                </div>


                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="tablaSearch" class="table table-bordered table-hover datatable">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nro Proceso</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Cédula</th>
                                                    <th>Placa</th>
                                                    <th>Causa</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $this->load->view('admin/_partials/tab_results', ['resultados' => $resultados]); ?>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Resultados -->

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
                    <a class="btn btn-primary" href="<?php echo site_url(); ?>/LoginController/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>public/assets/vendor/jquery/jquery.min.js"></script>
    


    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <!-- JavaScript para mostrar el campo de búsqueda dinámicamente -->
    <script>
        function mostrarCampo() {
            const buscarPor = document.getElementById('buscar_por').value;
            const selectDB = document.getElementById('seleccion_db');
            const inputBusqueda = document.getElementById('valor_busqueda');
            const labelSelect = document.querySelector('label[for="seleccion_db"]');

            // Función para formatear el texto
            function formatearTexto(texto) {
                // Reemplazar guiones bajos por espacios y capitalizar cada palabra
                return texto.split('_')
                    .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
                    .join(' ');
            }

            // Lista de campos que requieren select (agregado centro_detencion)
            const camposSelect = ['distrito', 'canton', 'causa', 'tipo_prueba', 'centro_detencion'];

            if (camposSelect.includes(buscarPor)) {
                // Mostrar select y ocultar input
                selectDB.style.display = 'block';
                inputBusqueda.style.display = 'none';

                // Formatear el texto del label
                labelSelect.textContent = `Seleccione ${formatearTexto(buscarPor)}:`;
                // Limpiar el input
                inputBusqueda.value = '';

                // Mostrar indicador de carga
                selectDB.innerHTML = '<option value="">Cargando...</option>';

                // Cargar opciones del select usando AJAX
                $.ajax({
                    url: '<?php echo site_url("SearchController/get_opciones"); ?>',
                    type: 'GET',
                    data: {
                        tipo: buscarPor
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success' && response.data) {
                            // Limpiar select actual
                            selectDB.innerHTML = '<option value="">Seleccione...</option>';

                            // Agregar nuevas opciones
                            response.data.forEach(function(item) {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.nombre;
                                selectDB.appendChild(option);
                            });
                        } else {
                            console.error('Error en la respuesta:', response);
                            selectDB.innerHTML = '<option value="">Error al cargar opciones</option>';
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error AJAX:', error);
                        console.log('Estado:', status);
                        console.log('Respuesta:', xhr.responseText);
                        selectDB.innerHTML = '<option value="">Error al cargar opciones</option>';
                    }
                });
            } else if (buscarPor) {
                // Mostrar input y ocultar select
                selectDB.style.display = 'none';
                inputBusqueda.style.display = 'block';

                // Actualizar placeholder según tipo
                switch (buscarPor) {
                    case 'nombre_apellido':
                        inputBusqueda.placeholder = 'Ingrese nombres y apellidos';
                        break;
                    case 'placa':
                        inputBusqueda.placeholder = 'Ingrese número de placa';
                        break;
                    case 'cedula':
                        inputBusqueda.placeholder = 'Ingrese número de cédula';
                        break;
                    case 'telefono':
                        inputBusqueda.placeholder = 'Ingrese número de teléfono';
                        break;
                }

                // Limpiar el select
                selectDB.value = '';
            } else {
                // Si no hay selección, ocultar ambos
                selectDB.style.display = 'none';
                inputBusqueda.style.display = 'none';
            }
        }
    </script>
    <script>
        // Variable global para la tabla
let tabla;

// Inicialización cuando el documento está listo
$(document).ready(function() {
    inicializarDataTable();

    // Manejador del formulario de búsqueda
    $('#formBusqueda').on('submit', function(e) {
        e.preventDefault();
        $('#loading').show();

        $.ajax({
            url: $(this).attr('action'),
            type: 'GET',
            data: $(this).serialize(),
            success: function(response) {
                $('#tablaSearch tbody').html(response);
                if (tabla) {
                    tabla.destroy();
                }
                inicializarDataTable();
            },
            error: function() {
                alert('Error al realizar la búsqueda');
                $('#tablaSearch tbody').html('<tr><td colspan="7" class="text-center">Error al realizar la búsqueda</td></tr>');
            },
            complete: function() {
                $('#loading').hide();
            }
        });
    });
});

// Función para inicializar DataTables
function inicializarDataTable() {
    try {
        if ($.fn.DataTable.isDataTable('#tablaSearch')) {
            $('#tablaSearch').DataTable().destroy();
        }
        
        $.fn.dataTable.ext.errMode = 'none'; // Oculta el mensaje de advertencia

        tabla = $('#tablaSearch').DataTable({
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
            },
            "ordering": true,
            "responsive": true,
            "retrieve": true,
            "processing": true
        });
    } catch (error) {
        console.warn('Error inicializando DataTable:', error);
    }
}
    </script>



    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>