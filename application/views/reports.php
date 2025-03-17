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
    <!-- CSS adicional para asegurar que los gráficos no causen scroll infinito -->
    <style>
    .chart-area {
        position: relative;
        height: 477px;
        margin-bottom: 30px;
    }

    .card-body {
        overflow: hidden;
        /* Esto evita desbordamiento */
    }

    /* Estilos para la tabla para evitar que se expanda demasiado */
    #dataTable {
        width: 100% !important;
    }

    @media (max-width: 768px) {
        .chart-area {
            height: 250px;
        }
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
                <!-- Contenedor de página con gráficos -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Panel de Análisis de Procedimientos</h1>
                    </div>

                    <!-- Filtros y Opciones -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h4 class="m-0 font-weight-bold text-primary">Opciones de Visualización</h4>
                                    <h5>Total Procedimientos: <?php echo $total_procedimientos;?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tipoVisualizacion">Ver por:</label>
                                                <select class="form-control" id="tipoVisualizacion">
                                                    <option value="meses">Meses</option>
                                                    <option value="dias">Días</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="anioSeleccionado">Año:</label>
                                                <select class="form-control" id="anioSeleccionado">
                                                    <option value="2025">2025</option>
                                                    <option value="2024" selected>2024</option>
                                                    <option value="2023">2023</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="mesContainer" style="display: none;">
                                            <div class="form-group">
                                                <label for="mesSeleccionado">Mes:</label>
                                                <select class="form-control" id="mesSeleccionado">
                                                    <option value="1">Enero</option>
                                                    <option value="2">Febrero</option>
                                                    <option value="3">Marzo</option>
                                                    <option value="4">Abril</option>
                                                    <option value="5">Mayo</option>
                                                    <option value="6">Junio</option>
                                                    <option value="7">Julio</option>
                                                    <option value="8">Agosto</option>
                                                    <option value="9">Septiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gráficos -->
                    <div class="row">
                        <!-- Gráfico Principal -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary" id="chartTitle">Procedimientos por Mes
                                    </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Opciones:</div>
                                            <a class="dropdown-item" href="#" id="downloadChart">Descargar Gráfico</a>
                                            <a class="dropdown-item" href="#" id="toggleChartType">Cambiar Tipo de
                                                Gráfico</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" id="refreshData">Actualizar Datos</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="procedimientosChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjetas de Resumen -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Resumen</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center mb-3">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de Procedimientos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"
                                                id="totalProcedimientos">215</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>

                                    <div class="row no-gutters align-items-center mb-3">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Libertad</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalLibertad">138
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-unlock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>

                                    <div class="row no-gutters align-items-center mb-3">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Detención</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalDetencion">77
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-lock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>

                                    <!-- Esta es la parte que necesita ser corregida -->
                                    <div class="mt-4">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Distribución de Procedimientos</div>
                                            <div style="height: 300px; position: relative;"> <!-- Aumentar la altura -->
    <canvas id="distribucionChart"></canvas>
</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Datos -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Datos Detallados</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Período</th>
                                                    <th>Total</th>
                                                    <th>Libertad</th>
                                                    <th>Detención</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaDetalle">
                                                <!-- Los datos se cargarán dinámicamente -->
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
                <div class="modal-body">Selecciona "Cerrar sesión" si estás seguro de que quieres cerrar tu sesión.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="<?php echo site_url();?>/LoginController/logout">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>public/assets/vendor/chart.js/Chart.min.js"></script>
    <script>
    var baseUrl = '<?php echo base_url(); ?>';
    </script>
   <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Referencias a elementos DOM
    const tipoVisualizacion = document.getElementById('tipoVisualizacion');
    const anioSeleccionado = document.getElementById('anioSeleccionado');
    const mesSeleccionado = document.getElementById('mesSeleccionado');
    const mesContainer = document.getElementById('mesContainer');
    const chartTitle = document.getElementById('chartTitle');
    const tablaDetalle = document.getElementById('tablaDetalle');

    // Referencias para gráficos
    let procedimientosChart;
    let distribucionChart;

    // Variables para controlar el tipo de gráfico
    let currentChartType = 'bar';
    
    // Añadir opción para el año 2022 si no existe
    function actualizarSelectoresAnio() {
        // Verificar si ya existe la opción para 2022
        let existe2022 = false;
        for (let i = 0; i < anioSeleccionado.options.length; i++) {
            if (anioSeleccionado.options[i].value === '2022') {
                existe2022 = true;
                break;
            }
        }
        
        // Si no existe, añadirla
        if (!existe2022) {
            const option = document.createElement('option');
            option.value = '2022';
            option.textContent = '2022';
            anioSeleccionado.appendChild(option);
        }
    }

    // Función para actualizar gráficos
    function actualizarGraficos(datos) {

        if (procedimientosChart) {
            procedimientosChart.destroy();
        }

        if (distribucionChart) {
            distribucionChart.destroy();
        }

        // Preparar datos para el gráfico principal
        const labels = datos.map(item => item.periodo);
        const totales = datos.map(item => item.total);
        const libertad = datos.map(item => item.libertad);
        const detencion = datos.map(item => item.detencion);

        // Gráfico principal
        const ctx = document.getElementById('procedimientosChart').getContext('2d');
        procedimientosChart = new Chart(ctx, {
            type: currentChartType,
            data: {
                labels: labels,
                datasets: [{
                        label: 'Total',
                        data: totales,
                        backgroundColor: 'rgba(78, 115, 223, 0.2)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Libertad',
                        data: libertad,
                        backgroundColor: 'rgba(28, 200, 138, 0.2)',
                        borderColor: 'rgba(28, 200, 138, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Detención',
                        data: detencion,
                        backgroundColor: 'rgba(231, 74, 59, 0.2)',
                        borderColor: 'rgba(231, 74, 59, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // Calcular totales para el gráfico de distribución
        const totalLibertad = datos.reduce((sum, item) => sum + item.libertad, 0);
        const totalDetencion = datos.reduce((sum, item) => sum + item.detencion, 0);

        // Gráfico de distribución (Pie Chart)
        const ctxPie = document.getElementById('distribucionChart').getContext('2d');
        distribucionChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: ['Libertad', 'Detención'],
        datasets: [{
            data: [totalLibertad, totalDetencion],
            backgroundColor: [
                'rgba(28, 200, 138, 0.8)',
                'rgba(231, 74, 59, 0.8)'
            ],
            borderColor: [
                'rgba(28, 200, 138, 1)',
                'rgba(231, 74, 59, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, // Cambiar a false
        layout: {
            padding: 10 // Añadir un poco de padding
        },
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 12
                }
            }
        }
    }
});
    }

    // Función para actualizar la tabla
    function actualizarTabla(datos) {
        tablaDetalle.innerHTML = '';

        datos.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>${item.periodo}</td>
            <td>${item.total}</td>
            <td>${item.libertad}</td>
            <td>${item.detencion}</td>
        `;
            tablaDetalle.appendChild(row);
        });
    }

    // Función para actualizar el resumen
    function actualizarResumen(datos) {
        const totalProcedimientos = datos.reduce((sum, item) => sum + item.total, 0);
        const totalLibertad = datos.reduce((sum, item) => sum + item.libertad, 0);
        const totalDetencion = datos.reduce((sum, item) => sum + item.detencion, 0);

        document.getElementById('totalProcedimientos').textContent = totalProcedimientos;
        document.getElementById('totalLibertad').textContent = totalLibertad;
        document.getElementById('totalDetencion').textContent = totalDetencion;
    }

    // Función para cargar datos según selección
    function cargarDatos() {
        const tipo = tipoVisualizacion.value;
        const anio = anioSeleccionado.value;
        const mes = mesSeleccionado.value;

        // Mostrar indicador de carga
        tablaDetalle.innerHTML =
            '<tr><td colspan="4" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando datos...</td></tr>';

        // Actualizar la visibilidad del selector de mes
        if (tipo === 'dias') {
            mesContainer.style.display = 'block';
            const nombreMes = mesSeleccionado.options[mesSeleccionado.selectedIndex].text;
            chartTitle.textContent = `Procedimientos por Día (${nombreMes} ${anio})`;
        } else {
            mesContainer.style.display = 'none';
            chartTitle.textContent = `Procedimientos por Mes (${anio})`;
        }

        // Hacer solicitud AJAX para obtener datos
        $.ajax({
            url: '<?= site_url("DashboardController/obtener_estadisticas_procedimientos") ?>',
            type: 'GET',
            dataType: 'json',
            data: {
                tipo: tipo,
                anio: anio,
                mes: mes
            },
            success: function(datosRecibidos) {
                // Actualizar gráficos con datos recibidos
                actualizarGraficos(datosRecibidos);
                actualizarTabla(datosRecibidos);
                actualizarResumen(datosRecibidos);
            },
            error: function() {
                console.error('Error al cargar los datos');

                // Usar datos de prueba en caso de error
                let datosPrueba = [];

                if (tipo === 'meses') {
                    // Si está seleccionado el año 2022, mostrar datos de ejemplo para 2022
                    if (anio === '2022') {
                        datosPrueba = [{
                                periodo: 'Enero',
                                total: 25,
                                libertad: 15,
                                detencion: 10
                            },
                            {
                                periodo: 'Febrero',
                                total: 30,
                                libertad: 20,
                                detencion: 10
                            },
                            {
                                periodo: 'Marzo',
                                total: 28,
                                libertad: 18,
                                detencion: 10
                            },
                            {
                                periodo: 'Abril',
                                total: 26,
                                libertad: 14,
                                detencion: 12
                            },
                            {
                                periodo: 'Mayo',
                                total: 32,
                                libertad: 22,
                                detencion: 10
                            },
                            {
                                periodo: 'Junio',
                                total: 29,
                                libertad: 19,
                                detencion: 10
                            },
                            {
                                periodo: 'Julio',
                                total: 27,
                                libertad: 17,
                                detencion: 10
                            },
                            {
                                periodo: 'Agosto',
                                total: 31,
                                libertad: 21,
                                detencion: 10
                            },
                            {
                                periodo: 'Septiembre',
                                total: 26,
                                libertad: 16,
                                detencion: 10
                            },
                            {
                                periodo: 'Octubre',
                                total: 33,
                                libertad: 23,
                                detencion: 10
                            },
                            {
                                periodo: 'Noviembre',
                                total: 28,
                                libertad: 18,
                                detencion: 10
                            },
                            {
                                periodo: 'Diciembre',
                                total: 24,
                                libertad: 14,
                                detencion: 10
                            }
                        ];
                    } else {
                        // Datos de ejemplo para otros años (como estaban originalmente)
                        datosPrueba = [{
                                periodo: 'Enero',
                                total: 32,
                                libertad: 20,
                                detencion: 12
                            },
                            {
                                periodo: 'Febrero',
                                total: 28,
                                libertad: 18,
                                detencion: 10
                            },
                            {
                                periodo: 'Marzo',
                                total: 35,
                                libertad: 22,
                                detencion: 13
                            },
                            {
                                periodo: 'Abril',
                                total: 29,
                                libertad: 15,
                                detencion: 14
                            },
                            {
                                periodo: 'Mayo',
                                total: 36,
                                libertad: 25,
                                detencion: 11
                            },
                            {
                                periodo: 'Junio',
                                total: 24,
                                libertad: 16,
                                detencion: 8
                            },
                            {
                                periodo: 'Julio',
                                total: 31,
                                libertad: 22,
                                detencion: 9
                            }
                        ];
                    }
                } else {
                    // Datos por día (ejemplo para cualquier mes)
                    datosPrueba = [{
                            periodo: 'Día 1',
                            total: 3,
                            libertad: 2,
                            detencion: 1
                        },
                        {
                            periodo: 'Día 2',
                            total: 0,
                            libertad: 0,
                            detencion: 0
                        },
                        {
                            periodo: 'Día 3',
                            total: 2,
                            libertad: 1,
                            detencion: 1
                        },
                        {
                            periodo: 'Día 4',
                            total: 4,
                            libertad: 3,
                            detencion: 1
                        },
                        {
                            periodo: 'Día 5',
                            total: 1,
                            libertad: 1,
                            detencion: 0
                        }
                    ];
                }

                actualizarGraficos(datosPrueba);
                actualizarTabla(datosPrueba);
                actualizarResumen(datosPrueba);
            }
        });
    }

    // Cambiar tipo de gráfico
    document.getElementById('toggleChartType').addEventListener('click', function(e) {
        e.preventDefault();
        currentChartType = currentChartType === 'bar' ? 'line' : 'bar';
        cargarDatos(); // Recargar los datos con el nuevo tipo de gráfico
    });

    // Descargar gráfico
    document.getElementById('downloadChart').addEventListener('click', function(e) {
        e.preventDefault();
        const canvas = document.getElementById('procedimientosChart');
        const image = canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.href = image;
        link.download = 'procedimientos-chart.png';
        link.click();
    });

    // Refrescar datos
    document.getElementById('refreshData').addEventListener('click', function(e) {
        e.preventDefault();
        cargarDatos();
    });

    // Event Listeners para los filtros
    tipoVisualizacion.addEventListener('change', cargarDatos);
    anioSeleccionado.addEventListener('change', cargarDatos);
    mesSeleccionado.addEventListener('change', cargarDatos);

    // Actualizar selectores antes de inicializar
    actualizarSelectoresAnio();
    
    // Inicializar todo
    cargarDatos();
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