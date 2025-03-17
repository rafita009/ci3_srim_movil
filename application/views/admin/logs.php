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
  <link href="<?php echo base_url(); ?>public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="<?php echo base_url();?>public/assets/js/sweetalert211.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">

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
        <div class="col-12">
            <div class="card rounded shadow">
                <div class="card-header">
                    <h3 class="card-title" style="color: black">Registro de Logins de Usuarios</h3>
                </div>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center mb-3">
                    <button type="button" class="btn btn-danger mr-2 btn-eliminar-todos">
    <i class="fas fa-trash"></i> Eliminar Todos
</button>
                        
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tablaLogins">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Fecha Login</th>
                                    <th>Dirección IP</th>
                                    <th>Navegador</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($logins)): ?>
                                <?php foreach($logins as $login): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($login['ID_LOGIN']); ?></td>
                                    <td><?php echo htmlspecialchars($login['USUARIO']); ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($login['FECHA_LOGIN'])); ?></td>
                                    <td><?php echo htmlspecialchars($login['IP_ADDRESS']); ?></td>
                                    <td>
                                    <span class="badge badge-info" data-toggle="tooltip" data-html="true" 
      title="<strong>Detalles completos:</strong><br><?php 
      echo nl2br(htmlspecialchars($login['USER_AGENT'])); 
      ?>">
    <?php 
    $user_agent = $login['USER_AGENT'];
    echo strlen($user_agent) > 50 ? substr($user_agent, 0, 50) . '...' : $user_agent; 
    ?>
</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            
                                        <a href="<?php echo site_url('SearchController/eliminar/'.$login['ID_LOGIN']); ?>" 
   class="btn btn-danger btn-sm btn-eliminar" 
   data-id="<?php echo $login['ID_LOGIN']; ?>" 
   title="Eliminar">
    <i class="fas fa-trash"></i>
</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No hay registros de login</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
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
    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

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
    $('#tablaLogins').DataTable({
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            infoPostFix: "",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último"
            },
            aria: {
                sortAscending: ": Activar para ordenar la columna de manera ascendente",
                sortDescending: ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
});
    </script>
    <script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({
        boundary: 'window',
        placement: 'top'
    });
});
</script>
<script>
$(document).ready(function() {
    $('.btn-eliminar-todos').on('click', function() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esto eliminará TODOS los registros de login",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar todos',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Llamada AJAX para eliminar todos los logins
                $.ajax({
                    url: '<?php echo site_url("SearchController/eliminar_todos"); ?>',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Eliminados',
                                'Todos los registros de login han sido eliminados.',
                                'success'
                            ).then(() => {
                                // Recargar la página o actualizar la tabla
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error',
                                'No se pudieron eliminar los registros.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error',
                            'Hubo un problema al intentar eliminar los registros.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $('.btn-eliminar').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var loginId = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción. Se eliminará el registro de login " + loginId,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirigir a la URL de eliminación
                window.location.href = url;
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
