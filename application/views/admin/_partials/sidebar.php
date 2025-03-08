
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
       Gestión
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
            <h6 class="collapse-header">Agregar:</h6>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'PersonasController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                href="<?= site_url('PersonasController/index') ?>">
                <i class="fas fa-user-plus"></i> Usuario
            </a>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'RolesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                href="<?= site_url('RolesController/index') ?>">
                <i class="fas fa-user-shield"></i> Roles
            </a>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'AgentesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                href="<?= site_url('AgentesController/index') ?>">
                <i class="fas fa-user-shield"></i> Agentes
            </a>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'AgentesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                href="<?= site_url('InfractoresController/index') ?>">
                <i class="fas fa-user-shield"></i> Infractores
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
            <h6 class="collapse-header">Gestión:</h6>
            <a class="collapse-item <?= ($this->uri->segment(1) == 'ProcesosController' && 
                                   ($this->uri->segment(2) == 'index' || 
                                    $this->uri->segment(2) == 'select_infractor')) ? 'active' : '' ?>"
           href="<?= site_url('ProcesosController/select_infractor') ?>">
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
        Añadir
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Módulos</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Insertar:</h6>
                <a class="collapse-item" href="<?= site_url('BdController/index') ?>">Respaldos</a>

                <a class="collapse-item" href="<?= site_url('CausasController/index') ?>">Causas</a>
                <a class="collapse-item" href="<?= site_url('Tipo_p_Controller/index') ?>">Tipos de Pruebas</a>
                <a class="collapse-item" href="<?= site_url('CditController/index') ?>">Centros de Detenciones</a>


                
            </div>

        </div>
       
    </li>
    <hr class="sidebar-divider">


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

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>


