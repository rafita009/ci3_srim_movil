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

                    <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <?= $this->session->flashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?= $this->session->flashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <!--breadcrumb-->


                    <h2>Editar Infractor</h2>
                    <form action="<?php echo site_url('ProcesosController/actualizar'); ?>" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="ID_PROCESO" value="<?php echo $infractor['N_INFRACTOR']; ?>">

                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" name="N_INFRACTOR" value="<?php echo $infractor['N_INFRACTOR']; ?>"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" name="A_INFRACTOR" value="<?php echo $infractor['A_INFRACTOR']; ?>"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Cédula</label>
                            <input type="text" name="C_INFRACTOR" value="<?php echo $infractor['C_INFRACTOR']; ?>"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Placa</label>
                            <input type="text" name="PLACA" value="<?php echo $infractor['PLACA']; ?>"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Causa</label>
                            <input type="text" name="CAUSA" value="<?php echo $infractor['CAUSA']; ?>"
                                class="form-control">
                        </div>

                        <!-- Mostrar la foto actual si existe -->
                        <div class="form-group">
                            <label>Foto Actual</label><br>
                            <?php if (!empty($infractor['FOTO'])): ?>
                            <img src="<?php echo base_url('uploads/infractores/' . $infractor['FOTO']); ?>"
                                alt="Foto del infractor" class="img-thumbnail" style="max-width: 200px;">
                            <br>
                            <!-- Checkbox para eliminar la foto actual -->
                            <input type="checkbox" name="eliminar_foto" value="1"> Eliminar foto
                            <?php else: ?>
                            <p>No hay foto disponible</p>
                            <?php endif; ?>
                        </div>

                        <!-- Campo para subir una nueva foto -->
                        <div class="form-group">
                            <label>Subir Nueva Foto</label>
                            <input type="file" name="FOTO" class="form-control-file">
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="<?php echo site_url('ProcesosController/index'); ?>"
                            class="btn btn-secondary">Cancelar</a>
                    </form>

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
                    <a class="btn btn-primary" href="<?php echo site_url();?>/LoginController/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>