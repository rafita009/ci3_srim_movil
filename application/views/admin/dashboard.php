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
    <style>
    /* Estilos adicionales para asegurar la alineación */
    .chart-area,
    .chart-pie {
        position: relative;
        min-height: 300px;
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    /* Eliminar padding que pueda causar diferencias */
    .chart-pie {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
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
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <?php if($this->session->userdata('rol') == 'administrador'): ?>
                        <a href="<?= site_url('BdController/generate') ?>"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generar Respaldo
                        </a>
                        <?php endif; ?>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Procesos Registrados Ultimo Mes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $procesos_ultimo_mes; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Procesos Registrados Mes Actual</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php 
                                            // Depuración
                                            echo isset($procesos_mes_actual) ? $procesos_mes_actual : 0;
                                        ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-copy fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Detención vs Libertad (Histórico)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo $relacion_detencion_libertad['porcentaje_libertad']; ?>%
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: <?php echo $relacion_detencion_libertad['porcentaje_libertad']; ?>%"
                                                            aria-valuenow="<?php echo $relacion_detencion_libertad['porcentaje_libertad']; ?>"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 small">
                                                <span class="text-success mr-2">
                                                    <i class="fas fa-unlock"></i> Libertad:
                                                    <?php echo $relacion_detencion_libertad['libertad']; ?>
                                                </span>
                                                <span class="text-danger">
                                                    <i class="fas fa-lock"></i> Detención:
                                                    <?php echo $relacion_detencion_libertad['detencion']; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Infractores Registrados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $total_infractores; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row d-flex">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7 d-flex flex-column">
                            <div class="card shadow mb-4 flex-grow-1 d-flex flex-column">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Procesos por Mes -
                                        <?= isset($año) ? $año : date('Y') ?></h6>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <div class="chart-area flex-grow-1">
                                        <canvas id="graficoProcesosPorMes"></canvas>
                                    </div>
                                    <hr>
                                    <p>Este gráfico muestra el número total de procesos registrados por mes durante el
                                        año <?= isset($año) ? $año : date('Y') ?>.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5 d-flex flex-column">
                            <div class="card shadow mb-4 flex-grow-1 d-flex flex-column">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Procesos por Distrito</h6>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <div class="chart-pie flex-grow-1">
                                        <canvas id="graficoDistritosPie"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <?php $colores = ['text-primary', 'text-success', 'text-info', 'text-warning', 'text-danger']; ?>
                                        <?php foreach ($distritos as $index => $distrito): ?>
                                        <?php if ($index < count($colores)): ?>
                                        <span class="mr-2">
                                            <i class="fas fa-circle <?php echo $colores[$index]; ?>"></i>
                                            <?php echo $distrito->distrito; ?>
                                        </span>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <!-- Causas Card -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Distribución de Causas</h6>
                                </div>
                                <div class="card-body">
                                    <?php foreach ($causas_porcentajes as $causa): ?>
                                    <h4 class="small font-weight-bold"><?php echo $causa->nombre; ?> <span
                                            class="float-right"><?php echo $causa->porcentaje; ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar <?php echo $causa->color; ?>" role="progressbar"
                                            style="width: <?php echo $causa->porcentaje; ?>%"
                                            aria-valuenow="<?php echo $causa->porcentaje; ?>" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Tipos de Prueba Card -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tipos de Prueba</h6>
                                </div>
                                <div class="card-body">
                                    <?php foreach ($pruebas_porcentajes as $prueba): ?>
                                    <h4 class="small font-weight-bold"><?php echo $prueba->nombre; ?> <span
                                            class="float-right"><?php echo $prueba->porcentaje; ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar <?php echo $prueba->color; ?>" role="progressbar"
                                            style="width: <?php echo $prueba->porcentaje; ?>%"
                                            aria-valuenow="<?php echo $prueba->porcentaje; ?>" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Guía del Sistema</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="<?php echo base_url();?>public/assets/img/documents.svg"
                                            alt="Documentos judiciales">
                                    </div>
                                    <p>El Sistema de Registro de Infractores y Manejo de Procesos (SCRIM) te permite
                                        gestionar eficientemente todos los procedimientos judiciales relacionados con
                                        infracciones de tránsito, desde la captura inicial de datos hasta la resolución
                                        final.</p>

                                    
                                    <p></p>
                                    <a href="<?php echo base_url('public/manuales/manual_administrador_scrim.pdf'); ?>"
                                        class="btn btn-success btn-sm" download>
                                        <i class="fas fa-download mr-1"></i> Descargar Manual del Administrador
                                    </a>
                                    <p></p>
                                    <a href="<?php echo base_url('public/manuales/manual_gestor_scrim.pdf'); ?>"
                                        class="btn btn-primary btn-sm" download>                                                                                                            
                                        <i class="fas fa-download mr-1"></i> Descargar Manual del Gestor
                                    </a>
                                </div>
                            </div>

                            <!-- Approach -->


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

    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>
    <!-- Script específico para este gráfico -->
    <!-- Al final de tu archivo, después de todas las demás cargas de scripts -->
    <script>
    $(document).ready(function() {
        // Preparar los datos para el gráfico
        var datos = <?= json_encode(array_values($datos ?? [])) ?>;

        // Usar datos de prueba si no hay datos reales
        if (!datos || datos.length === 0) {
            datos = [5, 10, 15, 8, 12, 20, 25, 18, 10, 5, 3, 15]; // Valores de prueba
            console.log("Usando datos de prueba");
        }

        console.log("Datos del gráfico:", datos);

        // Obtener el canvas
        var ctx = document.getElementById("graficoProcesosPorMes");

        if (ctx) {
            // Configurar el gráfico
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct",
                        "Nov", "Dic"
                    ],
                    datasets: [{
                        label: "Procesos",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: datos,
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                beginAtZero: true, // Asegurar que comience en cero
                                callback: function(value) {
                                    return value;
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                    '';
                                return datasetLabel + ': ' + tooltipItem.yLabel + ' procesos';
                            }
                        }
                    }
                }
            });

            console.log("Gráfico de línea creado exitosamente");
        } else {
            console.error("Canvas 'graficoProcesosPorMes' no encontrado");
        }
    });
    </script>

    <script>
    $(document).ready(function() {
        // Preparar los datos para el gráfico
        var datos = [];
        var etiquetas = [];
        var coloresFondo = [
            'rgba(78, 115, 223, 0.8)', // Azul (Norte)
            'rgba(28, 200, 138, 0.8)', // Verde (Sur)
            'rgba(54, 185, 204, 0.8)', // Turquesa (Pacífico)
            'rgba(246, 194, 62, 0.8)' // Amarillo (Centro)
        ];
        var coloresBorde = [
            'rgba(78, 115, 223, 1)',
            'rgba(28, 200, 138, 1)',
            'rgba(54, 185, 204, 1)',
            'rgba(246, 194, 62, 1)'
        ];

        <?php 
    // Verificar datos en la consola
    echo "console.log('Datos de distritos:');";
    foreach ($distritos as $distrito) {
        echo "console.log('" . $distrito->distrito . ": " . $distrito->total . "');";
    }
    ?>

        <?php foreach ($distritos as $distrito): ?>
        datos.push(<?php echo $distrito->total; ?>);
        etiquetas.push('<?php echo $distrito->distrito; ?>');
        <?php endforeach; ?>

        // Obtener el canvas
        var ctx = document.getElementById("graficoDistritosPie");

        if (ctx) {
            // Configurar el gráfico
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        data: datos,
                        backgroundColor: coloresFondo.slice(0, etiquetas.length),
                        borderColor: coloresBorde.slice(0, etiquetas.length),
                        borderWidth: 1
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce(function(previousValue,
                                    currentValue) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var porcentaje = Math.round((currentValue / total) * 100);
                                return data.labels[tooltipItem.index] + ': ' + currentValue +
                                    ' procesos (' + porcentaje + '%)';
                            }
                        }
                    },
                    legend: {
                        display: true,
                        position: 'bottom'
                    },
                    cutoutPercentage: 70,
                },
            });

            console.log("Gráfico de distritos creado exitosamente");
        } else {
            console.error("Canvas 'graficoDistritosPie' no encontrado");
        }
    });
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="<?php echo base_url();?>public/assets/vendor/chart.js/Chart.min.js"></script>

</body>

</html>