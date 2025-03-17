<script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>



    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


        <!-- Nav Item - Alerts -->
        <!-- Nav Item - Alerts -->
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" id="notificaciones-contador">0</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Centro de Notificaciones
                </h6>
                <div id="notificaciones-contenedor">
                    <!-- Las notificaciones se cargarán aquí dinámicamente -->
                    <div class="text-center py-3">
                        <i class="fas fa-spinner fa-spin"></i> Cargando notificaciones...
                    </div>
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="#" id="marcar-todas-leidas">Marcar todas
                    como leídas</a>
            </div>
        </li>



        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $usuario ?></span>
                <img class="img-profile rounded-circle"
                    src="<?php echo base_url(!empty($foto) ? $foto : 'uploads/fotos_usuario/default_profile.png'); ?>"
                    alt="">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= site_url('ProfileController/index') ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Mi Cuenta
                </a>
                <?php if($this->session->userdata('rol') === 'administrador'): ?>
                <a class="dropdown-item" href="<?= site_url('SearchController/logs') ?>">
                    <i class="fas fa-clipboard fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logs
                </a>
                <?php endif; ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url('LoginController/logout') ?>" data-toggle="modal"
                    data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Salir
                </a>
            </div>
        </li>

    </ul>

</nav>
<script>
$(document).ready(function() {
    // Función para cargar notificaciones
    function cargarNotificaciones() {
        $.ajax({
            url: '<?php echo site_url("NotificacionesController/obtener_notificaciones"); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Actualizar contador
                if (response.count > 0) {
                    $('#notificaciones-contador').text(response.count > 99 ? '99+' : response
                    .count);
                    $('#notificaciones-contador').show();
                } else {
                    $('#notificaciones-contador').text('0');
                    $('#notificaciones-contador').hide();
                }

                // Limpiar contenedor
                $('#notificaciones-contenedor').empty();

                // Si no hay notificaciones
                if (!response.notificaciones || response.notificaciones.length === 0) {
                    $('#notificaciones-contenedor').html(
                        '<div class="text-center py-3 px-2">No tienes notificaciones</div>');
                    return;
                }

                // Agregar notificaciones al contenedor
                $.each(response.notificaciones, function(index, notificacion) {
                    // Determinar icono según tipo
                    let iconClass = 'fas fa-info-circle';
                    let bgClass = 'bg-primary';

                    if (notificacion.TIPO === 'success') {
                        iconClass = 'fas fa-check';
                        bgClass = 'bg-success';
                    } else if (notificacion.TIPO === 'warning') {
                        iconClass = 'fas fa-exclamation-triangle';
                        bgClass = 'bg-warning';
                    } else if (notificacion.TIPO === 'danger') {
                        iconClass = 'fas fa-exclamation-circle';
                        bgClass = 'bg-danger';
                    }

                    // Crear elemento de notificación con botón eliminar
                    let notificacionHTML = `
                    <div class="dropdown-item d-flex align-items-center notificacion-item">
                        <a href="${notificacion.URL || '#'}" class="d-flex align-items-center flex-grow-1">
                            <div class="mr-3">
                                <div class="icon-circle ${bgClass}">
                                    <i class="${iconClass} text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="small text-gray-500">${notificacion.FECHA_CREACION || 'Fecha no disponible'}</div>
                                <span class="font-weight-bold">${notificacion.TITULO || 'Sin título'}</span>
                                <div class="small">${notificacion.MENSAJE || 'Sin mensaje'}</div>
                            </div>
                        </a>
                        <button class="btn btn-sm text-danger eliminar-notificacion" data-id="${notificacion.ID_NOTIFI}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;

                    $('#notificaciones-contenedor').append(notificacionHTML);
                });

                // Importante: adjuntar eventos DESPUÉS de crear los elementos
                $('.eliminar-notificacion').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const boton = $(this);
                    const id = boton.data('id');
                    const elemento = boton.closest('.notificacion-item');

                    console.log('Eliminando notificación con ID:', id); // Para depuración

                    $.ajax({
                        url: '<?php echo site_url("NotificacionesController/eliminar_notificacion/"); ?>' +
                            id,
                        type: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            console.log('Respuesta del servidor:',
                            response); // Para depuración

                            if (response.success) {
                                // Eliminar el elemento de la UI
                                elemento.fadeOut(300, function() {
                                    $(this).remove();
                                    // Actualizar solo el contador
                                    $.ajax({
                                        url: '<?php echo site_url("NotificacionesController/contar_no_leidas"); ?>',
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(
                                            countResponse) {
                                            if (countResponse
                                                .count > 0
                                                ) {
                                                $('#notificaciones-contador')
                                                    .text(
                                                        countResponse
                                                        .count >
                                                        99 ?
                                                        '99+' :
                                                        countResponse
                                                        .count
                                                        );
                                                $('#notificaciones-contador')
                                                    .show();
                                            } else {
                                                $('#notificaciones-contador')
                                                    .text(
                                                        '0'
                                                        );
                                                $('#notificaciones-contador')
                                                    .hide();
                                            }
                                        }
                                    });
                                });
                            } else {
                                alert('No se pudo eliminar la notificación.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al eliminar notificación:',
                                error);
                            console.error('Respuesta del servidor:', xhr
                                .responseText);
                            alert('Error al eliminar la notificación.');
                        }
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar notificaciones:', error);
                $('#notificaciones-contenedor').html(
                    '<div class="text-center py-3 px-2 text-danger">Error al cargar notificaciones</div>'
                    );
            }
        });
    }

    function formatearFecha(fechaStr) {
        if (!fechaStr) return 'Fecha no disponible';

        try {
            // Intentar convertir diferentes formatos de fecha
            let fecha;

            // Si la fecha viene en formato MySQL (YYYY-MM-DD HH:MM:SS)
            if (typeof fechaStr === 'string' && fechaStr.match(/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/)) {
                // Convertir a formato ISO
                fechaStr = fechaStr.replace(' ', 'T') + '.000Z';
            }

            fecha = new Date(fechaStr);

            // Verificar si la fecha es válida
            if (isNaN(fecha.getTime())) {
                console.error('Fecha inválida:', fechaStr);
                return 'Fecha no disponible';
            }

            const hoy = new Date();
            const ayer = new Date(hoy);
            ayer.setDate(ayer.getDate() - 1);

            // Formatear según sea hoy, ayer u otra fecha
            const opciones = {
                hour: '2-digit',
                minute: '2-digit',
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            };

            // Si es hoy
            if (fecha.toDateString() === hoy.toDateString()) {
                return 'Hoy a las ' + fecha.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });
            }

            // Si es ayer
            if (fecha.toDateString() === ayer.toDateString()) {
                return 'Ayer a las ' + fecha.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });
            }

            // Otra fecha
            return fecha.toLocaleDateString() + ' ' + fecha.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });
        } catch (error) {
            console.error('Error al formatear fecha:', error, fechaStr);
            return 'Fecha no disponible';
        }
    }

    // Marcar todas como leídas
    $('#marcar-todas-leidas').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: '<?php echo site_url("NotificacionesController/marcar_todas_leidas"); ?>',
            type: 'POST',
            dataType: 'json',
            success: function() {
                cargarNotificaciones();
            }
        });
    });

    // Asignar eventos a los botones de eliminar notificación
    $('.eliminar-notificacion').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation(); // Evitar que se propague al enlace padre

        const id = $(this).data('id');
        const notificacionItem = $(this).closest('.notificacion-item');

        // Eliminar notificación
        $.ajax({
            url: '<?php echo site_url("NotificacionesController/eliminar_notificacion/"); ?>' +
                id,
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Eliminar el elemento de la interfaz
                    notificacionItem.fadeOut(300, function() {
                        $(this).remove();
                        // Actualizar contador
                        cargarNotificaciones();
                    });
                }
            }
        });
    });

    // Marcar todas como leídas (ahora eliminar todas)
    $('#marcar-todas-leidas').text('Eliminar todas').on('click', function(e) {
        e.preventDefault();

        // Confirmar antes de eliminar todas
        if (confirm('¿Estás seguro de que deseas eliminar todas las notificaciones?')) {
            $.ajax({
                url: '<?php echo site_url("NotificacionesController/eliminar_todas_notificaciones"); ?>',
                type: 'POST',
                dataType: 'json',
                success: function() {
                    // Actualizar interfaz
                    cargarNotificaciones();
                }
            });
        }
    });
    // Cargar notificaciones al iniciar y cada 60 segundos
    cargarNotificaciones();
    setInterval(cargarNotificaciones, 60000);

    // También cargar al abrir el dropdown
    $('#alertsDropdown').on('click', function() {
        cargarNotificaciones();
    });
});
</script>