<?php
$CI =& get_instance();
$CI->load->model('ProcesosModel');
$infractores = $CI->ProcesosModel->get_all_infractores();
?>
<!-- jQuery primero -->

<!-- Bootstrap Bundle with Popper -->


<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('DashboardController/admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">SRIM MOVILDELNOR</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'DashboardController' && $this->uri->segment(2) == 'admin') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('DashboardController/admin') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'PersonasController' || $this->uri->segment(1) == 'RolesController') ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="<?= ($this->uri->segment(1) == 'PersonasController' || $this->uri->segment(1) == 'RolesController') ? 'true' : 'false' ?>"
        aria-controls="collapseTwo">
        <i class="fas fa-users"></i> <!-- Icono general del menú -->
        <span>Usuarios</span>
    </a>
    <div id="collapseTwo"
        class="collapse <?= ($this->uri->segment(1) == 'PersonasController' || $this->uri->segment(1) == 'RolesController') ? 'show' : '' ?>"
        aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestión de Usuarios:</h6>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'PersonasController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                href="<?= site_url('PersonasController/index') ?>">
                <i class="fas fa-user-plus"></i> Agregar Usuario
            </a>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'RolesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                href="<?= site_url('RolesController/index') ?>">
                <i class="fas fa-user-shield"></i> Roles
            </a>
        </div>
    </div>
</li>


    <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= ($this->uri->segment(1) == 'ProcesosController' || $this->uri->segment(1) == 'SearchController') ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProcesos"
        aria-expanded="<?= ($this->uri->segment(1) == 'ProcesosController' || $this->uri->segment(1) == 'SearchController') ? 'true' : 'false' ?>"
        aria-controls="collapseProcesos">
        <i class="fas fa-cogs"></i> <!-- Icono general del menú -->
        <span>Procesos</span>
    </a>
    <div id="collapseProcesos"
        class="collapse <?= ($this->uri->segment(1) == 'ProcesosController' || $this->uri->segment(1) == 'SearchController') ? 'show' : '' ?>"
        aria-labelledby="headingProcesos" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestión de Procesos:</h6>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'ProcesosController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
       href="#" 
       data-toggle="modal" 
       data-target="#listaInfractoresModal">
        <i class="fas fa-edit"></i> Registrar Proceso
    </a>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'SearchController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                href="<?= site_url('SearchController/index') ?>">
                <i class="fas fa-search"></i> Consultar
            </a>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'SearchController' && $this->uri->segment(2) == 'procesos_tabla') ? 'active' : '' ?>"
                href="<?= site_url('SearchController/procesos_tabla') ?>">
                <i class="fas fa-table"></i> Todos los Procesos
            </a>
        </div>
    </div>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Modulos</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="<?= site_url('CausasController/index') ?>">Causas</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

<!-- Modal en el sidebar -->
<div class="modal fade" id="listaInfractoresModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gestión de Infractores</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <!-- Botones en la parte superior del modal -->
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary" id="btnMostrarLista">
                            <i class="fas fa-list"></i> Lista de Infractores
                        </button>
                        <button type="button" class="btn btn-success ml-2" id="btnMostrarFormulario">
                            <i class="fas fa-user-plus"></i> Registrar Nuevo Infractor
                        </button>
                    </div>
                </div>

                <!-- Contenedor de la lista -->
                <div id="contenedorLista">
                <table class="table table-striped" id="tablaInfractores">                       
                     <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cédula</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($infractores as $infractor): ?>
                            <tr>
                                <td><?= $infractor['N_INFRACTOR'] ?></td>
                                <td><?= $infractor['A_INFRACTOR'] ?></td>
                                <td><?= $infractor['C_INFRACTOR'] ?></td>
                                <td>
                                    <a href="<?= site_url('ProcesosController/index/' . $infractor['ID_INFRACTOR']) ?>" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i> Agregar Proceso
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Contenedor del formulario -->
                <div id="contenedorFormulario" style="display: none;">
                    <form id="formRegistroInfractor">
                        <div class="form-group">
                            <label for="nombre_inf">Nombres</label>
                            <input type="text" class="form-control" id="nombre_inf" name="nombre_inf" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos_inf">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos_inf" name="apellidos_inf" required>
                        </div>
                        <div class="form-group">
                            <label for="cedula_inf">Cédula</label>
                            <input type="text" class="form-control" id="cedula_inf" name="cedula_inf" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono_inf">Teléfono</label>
                            <input type="text" class="form-control" id="telefono_inf" name="telefono_inf">
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" id="btnVolverLista">Volver</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    // Por defecto, mostrar la lista y ocultar el formulario
    $('#contenedorLista').show();
    $('#contenedorFormulario').hide();

    // Destruir DataTable si ya existe
    if ($.fn.DataTable.isDataTable('.table')) {
        $('.table').DataTable().destroy();
    }

    // Inicializar DataTable
    var table = $('#tablaInfractores').DataTable({
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    });

    // Cuando se hace clic en "Lista de Infractores"
    $('#btnMostrarLista').on('click', function() {
        $('#contenedorFormulario').fadeOut('fast', function() {
            $('#contenedorLista').fadeIn('fast');
            table.draw(); // Redibujar la tabla
        });
    });

    // Cuando se hace clic en "Registrar Nuevo Infractor"
    $('#btnMostrarFormulario').on('click', function() {
        $('#contenedorLista').fadeOut('fast', function() {
            $('#contenedorFormulario').fadeIn('fast');
        });
    });

    // Cuando se hace clic en "Volver"
    $('#btnVolverLista').on('click', function() {
        $('#contenedorFormulario').fadeOut('fast', function() {
            $('#contenedorLista').fadeIn('fast');
            table.draw(); // Redibujar la tabla
        });
    });

    // Manejar el envío del formulario
    $('#formRegistroInfractor').on('submit', function(e) {
        e.preventDefault();
        
        // Mostrar spinner o indicador de carga
        Swal.fire({
            title: 'Registrando...',
            text: 'Por favor espere',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '<?= site_url('ProcesosController/registrar_infractor') ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Infractor registrado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al registrar infractor'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en el servidor'
                });
            }
        });
    });
});
</script>