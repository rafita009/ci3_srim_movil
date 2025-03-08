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
                
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
                    <div>
                        <p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistroInfractor">
                            <i class="fas fa-user-plus mr-2"></i>Registrar Nuevo Infractor
                        </button>
 
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminados">
                            <i class="fas fa-trash"></i> Eliminados

                        </button>
                        </p>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php elseif ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                    <table id="tablaInfractores" class="table table-bordered table-hover datatable">
                    <thead class="thead-dark">
                                <tr>
                                  <th class="d-none">ID</th>
                                    <th>Foto</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Cedula</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($datos)): ?>
                                <?php foreach($datos as $dato): ?>
                                <tr>
                                    <td class="d-none"><?php echo $dato['ID_INFRACTOR']; ?></td>
                                    <td><?php echo $dato['']; ?></td>
                                    <td><?php echo $dato['N_INFRACTOR']; ?></td>
                                    <td><?php echo $dato['A_INFRACTOR']; ?></td>
                                    <td><?php echo $dato['C_INFRACTOR']; ?></td>
                                    <td><?php echo $dato['T_INFRACTOR']; ?></td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-editar" data-id="<?php echo $dato['ID_INFRACTOR']; ?>">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </button>

                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('InfractoresController/eliminar/'.$dato['ID_INFRACTOR']); ?>"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="<?php echo site_url();?>/LoginController/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- 2. Estructura del Modal para Bootstrap 4 (SB Admin 2) -->
<div class="modal fade" id="modalRegistroInfractor" tabindex="-1" role="dialog" aria-labelledby="modalRegistroInfractorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistroInfractorLabel">Registrar Nuevo Infractor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí va el contenido del formulario -->
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
                                class="form-label font-weight-bold">Nombres<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="nombre_inf"
                                name="nombre_inf" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellidos_inf"
                                class="form-label font-weight-bold">Apellidos<span
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
                                class="form-label font-weight-bold">Cédula<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="cedula_inf"
                                name="cedula_inf" maxlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono_inf" class="form-label font-weight-bold">Teléfono</label>
                            <input type="text" class="form-control" id="telefono_inf"
                                name="telefono_inf">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Cancelar
                </button>
                <button type="button" class="btn btn-primary" id="btnGuardarInfractor">
                    <i class="fas fa-save mr-2"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

  <!-- 3. JavaScript para manejar el formulario dentro del modal -->
<script>
    $(document).ready(function() {
        // Vista previa de la imagen cuando se selecciona una foto
        $('#foto_inf').change(function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo-preview').attr('src', e.target.result).show();
                    $('#default-icon').hide();
                };
                reader.readAsDataURL(file);
            }
        });

        // Manejar el envío del formulario desde el botón en el footer del modal
        $('#btnGuardarInfractor').click(function() {
            // Validar formulario
            if($('#formRegistroInfractor')[0].checkValidity()) {
                $('#formRegistroInfractor').submit();
            } else {
                // Mostrar validaciones
                $('#formRegistroInfractor')[0].reportValidity();
            }
        });

        // Limpiar el formulario cuando se cierra el modal
        $('#modalRegistroInfractor').on('hidden.bs.modal', function () {
            $('#formRegistroInfractor')[0].reset();
            $('#photo-preview').hide();
            $('#default-icon').show();
        });
    });
</script>                                
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
