<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('DashboardController/all') ?>">
    <div class="sidebar-brand-icon">
        <img src="<?= base_url('public/assets/img/logo.png') ?>" alt="Logo SRIM" style="height: 40px; width: auto;">
    </div>
    <div class="sidebar-brand-text mx-3">SCRIM</div>
</a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard (accesible para todos) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'DashboardController') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('DashboardController/all') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- SECCIÓN SOLO PARA ADMINISTRADORES -->
    <?php if($this->session->userdata('rol') == 'administrador'): ?>

    <!-- Heading - Administración -->
    <div class="sidebar-heading">
        Administración
    </div>

    <!-- Nav Item - Usuarios (solo admin) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'PersonasController' || $this->uri->segment(1) == 'RolesController' || $this->uri->segment(1) == 'AgentesController') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios"
            aria-expanded="<?= ($this->uri->segment(1) == 'PersonasController' || $this->uri->segment(1) == 'RolesController' || $this->uri->segment(1) == 'AgentesController') ? 'true' : 'false' ?>"
            aria-controls="collapseUsuarios">
            <i class="fas fa-users-cog"></i>
            <span>Gestión de Usuarios</span>
        </a>
        <div id="collapseUsuarios"
            class="collapse <?= ($this->uri->segment(1) == 'PersonasController' || $this->uri->segment(1) == 'RolesController' || $this->uri->segment(1) == 'AgentesController') ? 'show' : '' ?>"
            aria-labelledby="headingUsuarios" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administrar:</h6>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'PersonasController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                    href="<?= site_url('PersonasController/index') ?>">
                    <i class="fas fa-user-plus"></i> Usuarios
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'RolesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                    href="<?= site_url('RolesController/index') ?>">
                    <i class="fas fa-user-shield"></i> Roles
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'AgentesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                    href="<?= site_url('AgentesController/index') ?>">
                    <i class="fas fa-user-tie"></i> Agentes
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Módulos (solo admin) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'BdController' || $this->uri->segment(1) == 'CausasController' || $this->uri->segment(1) == 'Tipo_p_Controller' || $this->uri->segment(1) == 'CditController') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseModulos"
            aria-expanded="<?= ($this->uri->segment(1) == 'BdController' || $this->uri->segment(1) == 'CausasController' || $this->uri->segment(1) == 'Tipo_p_Controller' || $this->uri->segment(1) == 'CditController') ? 'true' : 'false' ?>"
            aria-controls="collapseModulos">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Configuración Sistema</span>
        </a>
        <div id="collapseModulos"
            class="collapse <?= ($this->uri->segment(1) == 'BdController' || $this->uri->segment(1) == 'CausasController' || $this->uri->segment(1) == 'Tipo_p_Controller' || $this->uri->segment(1) == 'CditController') ? 'show' : '' ?>"
            aria-labelledby="headingModulos" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Configurar:</h6>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'BdController') ? 'active' : '' ?>" href="<?= site_url('BdController/index') ?>">
                    <i class="fas fa-database"></i> Respaldos BD
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'CausasController') ? 'active' : '' ?>" href="<?= site_url('CausasController/index') ?>">
                    <i class="fas fa-gavel"></i> Causas
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'Tipo_p_Controller') ? 'active' : '' ?>" href="<?= site_url('Tipo_p_Controller/index') ?>">
                    <i class="fas fa-clipboard-list"></i> Tipos de Pruebas
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'CditController') ? 'active' : '' ?>" href="<?= site_url('CditController/index') ?>">
                    <i class="fas fa-building"></i> Centros de Detenciones
                </a>
            </div>
        </div>
    </li>
    
    <?php endif; ?>

    <?php if($this->session->userdata('rol') == 'administrador'): ?>
    <!-- Nav Item - Todos los Procesos (solo para administradores) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'SearchController' && $this->uri->segment(2) == 'procesos_tabla') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('SearchController/procesos_tabla') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Todos los Procesos</span>
        </a>
    </li>   
<?php endif; ?>   


    <?php if($this->session->userdata('rol') == 'administrador'): ?>
    <!-- Nav Item - Consultar (solo para administradores) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'SearchController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('SearchController/index') ?>">
            <i class="fas fa-fw fa-search"></i>
            <span>Busqueda Avanzada</span>
        </a>
    </li>   
<?php endif; ?>
    <!-- SECCIÓN PARA GESTORES Y ADMINISTRADORES -->
    <!-- Heading - Gestión Operativa -->
    <?php if($this->session->userdata('rol') == 'gestor'): ?>

    <div class="sidebar-heading">
        Gestión Operativa
    </div>

    <!-- Nav Item - Infractores (accesible para gestores y admins) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'InfractoresController') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('InfractoresController/index') ?>">
            <i class="fas fa-user-tag"></i>
            <span>Infractores</span>
        </a>
    </li>

    <!-- Nav Item - Procesos (accesible para gestores y admins) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'ProcesosController' || $this->uri->segment(1) == 'SearchController') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProcesos"
            aria-expanded="<?= ($this->uri->segment(1) == 'ProcesosController' || $this->uri->segment(1) == 'SearchController') ? 'true' : 'false' ?>"
            aria-controls="collapseProcesos">
            <i class="fas fa-file-contract"></i>
            <span>Gestión de Procesos</span>
        </a>
        <div id="collapseProcesos"
            class="collapse <?= ($this->uri->segment(1) == 'ProcesosController' || $this->uri->segment(1) == 'SearchController') ? 'show' : '' ?>"
            aria-labelledby="headingProcesos" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Procesos:</h6>
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
    <?php endif; ?>

    <!-- SECCIÓN DE UI/UX VISUALIZACIÓN -->
    <div class="sidebar-heading">
        Visualización
    </div>

    

    <!-- Nav Item - Reports (accesible para todos) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'ReportesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>Reportes</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>