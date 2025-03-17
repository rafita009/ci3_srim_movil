<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('DashboardController/all') ?>">
    <div class="sidebar-brand-icon">
        <img src="<?= base_url('public/assets/img/logo.png') ?>" alt="Logo SRIM" 
             class="img-fluid" 
             style="max-height: 40px; width: auto; object-fit: contain;">
    </div>
    <div class="sidebar-brand-text mx-3">SCRIM</div>
</a>

    <!-- Divider principal -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard (accesible para todos) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'DashboardController') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('DashboardController/all') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider con estilo elegante -->
    <hr class="sidebar-divider">

    <!-- SECCIÓN SOLO PARA ADMINISTRADORES -->
    <?php if($this->session->userdata('rol') == 'administrador'): ?>

    <!-- Heading - Administración con estilo mejorado -->
    <div class="sidebar-heading d-flex align-items-center">
        <i class="fas fa-crown text-warning mr-2"></i>
        <span>Administración</span>
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
                <h6 class="collapse-header font-weight-bold text-primary">Administrar:</h6>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'PersonasController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                    href="<?= site_url('PersonasController/index') ?>">
                    <i class="fas fa-user-plus mr-1"></i> Usuarios
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'RolesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                    href="<?= site_url('RolesController/index') ?>">
                    <i class="fas fa-user-shield mr-1"></i> Roles
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'AgentesController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>"
                    href="<?= site_url('AgentesController/index') ?>">
                    <i class="fas fa-user-tie mr-1"></i> Agentes
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
                <h6 class="collapse-header font-weight-bold text-primary">Configurar:</h6>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'BdController') ? 'active' : '' ?>" href="<?= site_url('BdController/index') ?>">
                    <i class="fas fa-database mr-1"></i> Respaldos BD
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'CausasController') ? 'active' : '' ?>" href="<?= site_url('CausasController/index') ?>">
                    <i class="fas fa-gavel mr-1"></i> Causas
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'Tipo_p_Controller') ? 'active' : '' ?>" href="<?= site_url('Tipo_p_Controller/index') ?>">
                    <i class="fas fa-clipboard-list mr-1"></i> Tipos de Pruebas
                </a>
                <a class="collapse-item <?= ($this->uri->segment(1) == 'CditController') ? 'active' : '' ?>" href="<?= site_url('CditController/index') ?>">
                    <i class="fas fa-building mr-1"></i> Centros de Detenciones
                </a>
            </div>
        </div>
    </li>
    
    <!-- Divider decorativo con gradiente -->
    <hr class="sidebar-divider" style="border-top: 1px solid rgba(255,255,255,0.15); margin: 1rem 1.5rem;">
    
    <!-- SECCIÓN DE CONSULTAS PARA ADMINISTRADORES -->
    <div class="sidebar-heading d-flex align-items-center">
        <i class="fas fa-search text-info mr-2"></i>
        <span>Consultas</span>
    </div>
    
    <!-- Nav Item - Todos los Procesos (solo para administradores) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'SearchController' && $this->uri->segment(2) == 'procesos_tabla') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('SearchController/procesos_tabla') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Todos los Procesos</span>
        </a>
    </li>   

    <!-- Nav Item - Consultar (solo para administradores) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'SearchController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('SearchController/index') ?>">
            <i class="fas fa-fw fa-search"></i>
            <span>Búsqueda Avanzada</span>
        </a>
    </li>  
    <?php endif; ?>
    
   <!-- SECCIÓN PARA GESTORES -->
<?php if($this->session->userdata('rol') == 'gestor'): ?>

<!-- Heading - Gestión Operativa con icono -->
<div class="sidebar-heading d-flex align-items-center">
    <i class="fas fa-tasks text-success mr-2"></i>
    <span>Gestión Operativa</span>
</div>

<!-- Nav Item - Infractores (accesible para gestores) -->
<li class="nav-item <?= ($this->uri->segment(1) == 'InfractoresController') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('InfractoresController/index') ?>">
        <i class="fas fa-user-tag"></i>
        <span>Infractores</span>
    </a>
</li>

<!-- Nav Item - Registrar Proceso (separado como opción independiente) -->
<li class="nav-item <?= ($this->uri->segment(1) == 'ProcesosController' && 
                    ($this->uri->segment(2) == 'index' || 
                    $this->uri->segment(2) == 'select_infractor')) ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('ProcesosController/select_infractor') ?>">
        <i class="fas fa-edit"></i>
        <span>Registrar Proceso</span>
    </a>
</li>

<!-- Nav Item - Consultar (separado como opción independiente) -->
<li class="nav-item <?= ($this->uri->segment(1) == 'SearchController' && $this->uri->segment(2) == 'index') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('SearchController/index') ?>">
        <i class="fas fa-search"></i>
        <span>Consultar</span>
    </a>
</li>

<!-- Nav Item - Todos los Procesos (separado como opción independiente) -->
<li class="nav-item <?= ($this->uri->segment(1) == 'SearchController' && $this->uri->segment(2) == 'procesos_tabla') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('SearchController/procesos_tabla') ?>">
        <i class="fas fa-table"></i>
        <span>Todos los Procesos</span>
    </a>
</li>

<?php endif; ?>

    <!-- Divider final decorativo -->
    <hr class="sidebar-divider">

    <!-- SECCIÓN DE VISUALIZACIÓN PARA TODOS -->
    <div class="sidebar-heading d-flex align-items-center">
        <i class="fas fa-chart-bar text-light mr-2"></i>
        <span>Visualización</span>
    </div>

    <!-- Nav Item - Reports (accesible para todos) -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'DashboardController' && $this->uri->segment(2) == 'reports') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('DashboardController/reports') ?>">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>Reportes</span>
        </a>
    </li>

    <!-- Divider final -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) con estilo mejorado -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>