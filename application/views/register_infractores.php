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
    <link href="<?php echo base_url();?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Agregar el enlace al CSS de Bootstrap Icons desde el CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">



    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
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


                    <form action="<?= site_url('ProcesosController/guardar'); ?>" method="POST"
                        enctype="multipart/form-data">
                        <h4>Registrar Proceso</h4>

                        <div class="card shadow-sm p-4 mb-4">

                            <div class="card-body">
                                <div class="row">
                                    <h4>Datos del infractor</h4>

                                    <!-- Columna izquierda: Fotos -->
                                    <div class="col-md-4">

                                        <!-- Foto del infractor -->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Foto del Infractor </label>
                                            <div class="border rounded overflow-hidden mb-2"
                                                style="height: 250px; width: 75%;">
                                                <div class="w-100 h-100 position-relative">
                                                    <img id="photoPreview" class="d-none w-100 h-100 object-fit-cover">
                                                    <div id="previewPlaceholder"
                                                        class="position-absolute top-50 start-50 translate-middle text-muted">
                                                        Vista previa de la foto
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group" style="width: 75%;">
                                                <input type="file" class="form-control form-control-sm" id="photoInput"
                                                    name="foto_infractor" accept="image/*">
                                            </div>
                                        </div>

                                        <!-- Fotos de pertenencias -->
                                        <div>
                                            <label class="form-label fw-bold">Fotos de las Pertenencias</label>
                                            <div class="input-group mb-3" style="width: 75%;">
                                                <input type="file" class="form-control form-control-sm"
                                                    id="belongingsInput" name="foto_pertenencias[]" accept="image/*"
                                                    multiple>
                                            </div>
                                            <div class="row g-2" id="belongingsPreview" style="width: 75%;">
                                                <!-- Las previsualizaciones se agregarán aquí -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- Datos del infractor -->
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="nombre_inf" class="form-label fw-bold">Nombres <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="nombre_inf"
                                                    name="nombre_inf" required>
                                                <small id="nombre_infError" class="error-message text-danger"></small>

                                            </div>
                                            <div class="col-md-6">
                                                <label for="apellidos_inf" class="form-label fw-bold">Apellidos
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="apellidos_inf"
                                                    name="apellidos_inf" required>
                                                <small id="apellidos_infError"
                                                    class="error-message text-danger"></small>

                                            </div>
                                        </div>

                                        <div class="row g-3 mt-3">
                                            <div class="col-md-6">
                                                <label for="cedula_inf" class="form-label fw-bold">Cédula <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cedula_inf"
                                                    name="cedula_inf" maxlength="10" required>
                                                <small id="cedula_infError" class="error-message text-danger"></small>

                                            </div>
                                            <div class="col-md-6">
                                                <label for="telefono_inf" class="form-label fw-bold">Teléfono</label>
                                                <input type="text" class="form-control" id="telefono_inf"
                                                    name="telefono_inf" maxlength="13" required>
                                                <small id="telefono_infError" class="error-message text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="position-relative">
                                                <br>
                                                <h4 class="text-center font-weight-bold mb-4">A.C.T que Procede</h4>

                                                <!-- Input de búsqueda -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-search"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="searchAct" class="form-control"
                                                        placeholder="Buscar por nombre, apellido o número de ACT..."
                                                        autocomplete="off">
                                                </div>

                                                <!-- Resultados de búsqueda -->
                                                <div id="actResults"
                                                    class="position-absolute w-100 mt-1 border rounded bg-white"
                                                    style="display: none; max-height: 300px; overflow-y: auto; z-index: 1050;">
                                                </div>

                                                <!-- Campo oculto para el ID -->
                                                <input type="hidden" id="selected_act_id" name="act_id" required>
                                                <small id="act_idError" class="error-message text-danger"></small>

                                                <!-- Información del ACT seleccionado -->
                                                <div id="selectedActInfo" class="mt-2" style="display: none;">
                                                    <div
                                                        class="alert alert-info d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong id="selectedActNumber"></strong>
                                                            <br>
                                                            <span id="selectedActName"></span>
                                                        </div>
                                                        <button type="button" class="close" id="clearSelection">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row g-3 mt-3">
                                            <div class="col-md-3">

                                                <label for="fecha_procedimiento" class="form-label fw-bold">Fecha de
                                                    Procedimiento <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="fecha_procedimiento"
                                                    name="fecha_procedimiento" required>
                                                <small id="fecha_procedimientoError"
                                                    class="error-message text-danger"></small>
                                            </div>
                                            <div class="col-md-5">

                                                <label for="tipo_placa" class="form-label fw-bold">Tipo de
                                                    Placa<span class="text-danger">*</span></label>
                                                <select id="tipo_placa" name="tipo_placa" class="form-select" required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($tipo_placas as $tipoplaca): ?>
                                                    <option value="<?= $tipoplaca['ID_TIPO_PLACA']; ?>">
                                                        <?= $tipoplaca['TIPO_PLACA']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small id="tipo_placaError" class="error-message text-danger"></small>

                                            </div>
                                            <div class="col-md-4">

                                                <label for="num_placa" class="form-label fw-bold">Número de Placa
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="num_placa" name="num_placa"
                                                    maxlength="13" required>
                                                <small id="num_placaError" class="error-message text-danger"></small>
                                            </div>

                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-md-4">
                                                <label for="causa" class="form-label fw-bold">Seleccione una Causa
                                                    <span class="text-danger">*</span></label>
                                                <select id="causa" name="causa" class="form-select" required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($causas as $causa): ?>
                                                    <option value="<?= $causa['ID_CAUSA']; ?>">
                                                        <?= $causa['CAUSA']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small id="causaError" class="error-message text-danger"></small>

                                            </div>
                                            <div class="col-md-4">

                                                <label for="tipo_prueba" class="form-label fw-bold">Tipo de Prueba
                                                    <span class="text-danger">*</span></label>
                                                <select id="tipo_prueba" name="tipo_prueba" class="form-select"
                                                    required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($tipo_pruebas as $tipoprueba): ?>
                                                    <option value="<?= $tipoprueba['ID_TIPO_PRUEBA']; ?>">
                                                        <?= $tipoprueba['NOMBRE_PRUEBA']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small id="tipo_placaError" class="error-message text-danger"></small>

                                            </div>
                                            <div class="col-md-4">

                                                <label for="valor_prueba" class="form-label fw-bold">Valor Prueba
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="valor_prueba"
                                                    name="valor_prueba">
                                                <small id="valor_pruebaError" class="error-message text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-md-6">
                                                <label for="distrito" class="form-label fw-bold">Seleccione un
                                                    Distrito
                                                    <span class="text-danger">*</span></label>
                                                <select id="distrito" name="distrito" class="form-select" required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($distritos as $distrito): ?>
                                                    <option value="<?= $distrito['ID_DISTRITO']; ?>">
                                                        <?= $distrito['NOMBRE_DISTRITO']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small id="distritoError" class="error-message text-danger"></small>

                                            </div>
                                            <div class="col-md-6">
                                                <label for="canton" class="form-label fw-bold">Seleccione un Cantón
                                                    <span class="text-danger">*</span></label>
                                                <select id="canton" name="canton" class="form-select" required disabled>
                                                    <option value="">Seleccione un distrito primero...</option>
                                                </select>
                                                <small id="cantonError" class="error-message text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-md-4">
                                                <label for="fecha_entrada_valoracion" class="form-label fw-bold">
                                                    Fecha y hora de Entrada Valoración Medica<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="datetime-local" class="form-control"
                                                    id="fecha_entrada_valoracion" name="fecha_entrada_valoracion"
                                                    required>
                                                <small id="fecha_entrada_valoracionError"
                                                    class="error-message text-danger"></small>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="fecha_salida_valoracion" class="form-label fw-bold">
                                                    Fecha y hora de Salida Valoración Medica<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="datetime-local" class="form-control"
                                                    id="fecha_salida_valoracion" name="fecha_salida_valoracion"
                                                    required>
                                                <small id="fecha_salida_valoracionError"
                                                    class="error-message text-danger"></small>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label for="act_custodio" class="form-label fw-bold">Agente
                                                    Custodio<span class="text-danger">*</span></label>
                                                <select id="act_custodio" name="act_custodio" class="form-select"
                                                    required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($agentes as $agente): ?>
                                                    <option value="<?= $agente['ID_AGENTE']; ?>">
                                                        <?= $agente['NRO_ACT'] . ' - ' . $agente['NOMBRES_ACT'] . ' ' . $agente['APELLIDOS_ACT']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small id="act_custodioError" class="error-message text-danger"></small>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="observacion" class="form-label fw-bold">Observación</label>
                                                <textarea class="form-control" id="observacion" name="observacion"
                                                    rows="4"></textarea>
                                                <small id="observacionError" class="error-message text-danger"></small>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="novedad" class="form-label fw-bold">Novedad</label>
                                                <textarea class="form-control" id="novedad" name="novedad"
                                                    rows="4"></textarea>
                                                <small id="novedadError" class="error-message text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-12 col-md-8">
                                                <label class="form-label fw-bold mb-4 fs-5">Resolución de Audiencia
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="d-flex flex-column flex-md-row gap-3">
                                                    <!-- Opción Libertad -->
                                                    <div class="flex-grow-1">
                                                        <input class="btn-check" type="radio"
                                                            name="resolucion_audiencia" id="libertad" value="1"
                                                            required>
                                                        <label
                                                            class="btn btn-outline-primary w-100 p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center"
                                                            for="libertad">
                                                            <i class="bi bi-unlock fs-1 mb-2"></i>
                                                            <span class="fs-5 fw-bold">Libertad</span>
                                                        </label>
                                                    </div>
                                                    <!-- Opción Detención -->
                                                    <div class="flex-grow-1">
                                                        <input class="btn-check" type="radio"
                                                            name="resolucion_audiencia" id="detencion" value="2"
                                                            required>
                                                        <label
                                                            class="btn btn-outline-primary w-100 p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center"
                                                            for="detencion">
                                                            <i class="bi bi-lock fs-1 mb-2"></i>
                                                            <span class="fs-5 fw-bold">Detención</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <small id="resolucion_audienciaError"
                                                    class="error-message text-danger"></small>
                                            </div>
                                        </div>

                                        <!-- Campos dinámicos (ocultos inicialmente) -->
                                        <div id="detencionFields" class="mt-4" style="display: none;">
                                            <div class="row g-3 mt-3">
                                                <div class="col-md-10">
                                                    <label class="form-label fw-bold">Tiempo Detenido</label>
                                                    <div class="row g-2">
                                                        <!-- Años -->
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="tiempo_detenido_anos"
                                                                    name="tiempo_detenido_anos" min="0" value="0"
                                                                    placeholder="0" aria-label="Años">
                                                                <span class="input-group-text">Años</span>
                                                                <small id="tiempo_detenido_anosError"
                                                                    class="error-message text-danger"></small>
                                                            </div>

                                                        </div>
                                                        <!-- Meses -->
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="tiempo_detenido_meses"
                                                                    name="tiempo_detenido_meses" min="0" value="0"
                                                                    max="11" placeholder="0" aria-label="Meses">
                                                                <span class="input-group-text">Meses</span>
                                                                <small id="tiempo_detenido_mesesError"
                                                                    class="error-message text-danger"></small>
                                                            </div>

                                                        </div>
                                                        <!-- Días -->
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="tiempo_detenido_dias"
                                                                    name="tiempo_detenido_dias" min="0" max="30"
                                                                    value="0" placeholder="0" aria-label="Días">
                                                                <span class="input-group-text">Días</span>
                                                                <small id="tiempo_detenido_diasError"
                                                                    class="error-message text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <!-- Horas -->
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="tiempo_detenido_horas"
                                                                    name="tiempo_detenido_horas" min="0" value="0"
                                                                    max="23" placeholder="0" aria-label="Horas">
                                                                <span class="input-group-text">Horas</span>
                                                                <small id="tiempo_detenido_horasError"
                                                                    class="error-message text-danger"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 mt-3">
                                                <div class="col-md-4">
                                                    <label for="centro_detencion" class="form-label fw-bold">Centro
                                                        de
                                                        Detencion <span class="text-danger">*</span></label>
                                                    <select id="centro_detencion" name="centro_detencion"
                                                        class="form-select">
                                                        <option value="">Seleccione...</option>
                                                        <?php foreach ($cdit as $cdits): ?>
                                                        <option value="<?= $cdits['ID_CDIT']; ?>">
                                                            <?= $cdits['NOMBRE_CDIT']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <small id="centro_detencionError"
                                                        class="error-message text-danger"></small>

                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label for="fecha_hora_recibe" class="form-label fw-bold">Fecha y
                                                        Hora
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="datetime-local" id="fecha_hora_recibe"
                                                        name="fecha_hora_recibe" class="form-control w-100">
                                                    <small id="fecha_hora_recibeError"
                                                        class="error-message text-danger"></small>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="act_cdit" class="form-label fw-bold">A.C.T recibe
                                                        CDIT <span class="text-danger">*</span></label>
                                                    <input type="text" id="act_cdit" name="act_cdit"
                                                        class="form-control">
                                                    <small id="act_cditError" class="error-message text-danger"></small>

                                                </div>

                                                <!-- Campo de foto dinámico -->

                                                <div class="col-md-4">
                                                    <label for="foto_detencion" class="form-label fw-bold">Boleta de
                                                        Encarcelamiento <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <span
                                                                    class="material-icons-outlined">insert_photo</span>
                                                            </span>
                                                        </div>
                                                        <input type="file" class="form-control" id="foto_detencion"
                                                            name="foto_detencion[]" accept="image/*,application/pdf"
                                                            multiple>
                                                    </div>
                                                    <small id="foto_detencionError"
                                                        class="error-message text-danger"></small>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row g-3 mt-4">
                                            <!-- Campo de foto para Libertad -->
                                            <div id="fotoFieldLibertad" class="row g-3 mt-3 d-none">
                                                <div class="col-md-4">
                                                    <label for="foto_libertad" class="form-label fw-bold">Boleta de
                                                        Libertad
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <span
                                                                    class="material-icons-outlined">insert_photo</span>
                                                            </span>
                                                        </div>
                                                        <input type="file" class="form-control" id="foto_libertad"
                                                            name="foto_libertad[]" accept="image/*,application/pdf"
                                                            multiple>
                                                    </div>
                                                    <small id="foto_libertadError"
                                                        class="error-message text-danger"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón de envío -->
                            <div class="mt-4 text-right">
                                <button type="submit" id="btnRegistrarInfractor" class="btn btn-success">Registrar
                                    Infractor</button>

                            </div>
                        </div>





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

    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>

    <!--script para permitir solo #en cedula-->
    <script>
    document.getElementById('cedula_inf').addEventListener('keydown', function(event) {
        // Permitir teclas como Backspace, Delete, Tab, Escape, Enter, etc.
        if (
            event.key === "Backspace" ||
            event.key === "Delete" ||
            event.key === "Tab" ||
            event.key === "ArrowLeft" ||
            event.key === "ArrowRight" ||
            event.key === "Enter"
        ) {
            return; // Permitir estas teclas
        }

        // Bloquear caracteres no numéricos (excepto números del 0 al 9)
        if (!/^\d$/.test(event.key)) {
            event.preventDefault();
        }
    });
    </script>
    <!-- Script para mostrar/ocultar campos -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const libertadRadio = document.getElementById("libertad");
        const detencionRadio = document.getElementById("detencion");
        const detencionFields = document.getElementById("detencionFields");
        const fotoFieldLibertad = document.getElementById("fotoFieldLibertad");
        const centroDetencionField = document.getElementById("centro_detencion");

        // Listener para cambiar los campos dinámicos según la selección
        libertadRadio.addEventListener("change", function() {
            if (this.checked) {
                // Mostrar los campos de libertad y ocultar los de detención
                fotoFieldLibertad.classList.remove("d-none");
                detencionFields.style.display = "none";
            }
        });

        detencionRadio.addEventListener("change", function() {
            if (this.checked) {
                // Mostrar los campos de detención y ocultar los de libertad
                fotoFieldLibertad.classList.add("d-none");
                detencionFields.style.display = "block";
                centroDetencionField.style.display = "block"; // Mostrar el campo 'centro_detencion'
            }
        });
    });
    </script>


    <!--script para visualizar fotos-->
    <script>
    // Previsualización de la foto del infractor
    const photoInput = document.getElementById('photoInput');
    const photoPreview = document.getElementById('photoPreview');
    const previewPlaceholder = document.getElementById('previewPlaceholder');
    const photoContainer = document.querySelector('.w-100.h-100.position-relative');

    // Agregar botón de cierre al contenedor de la foto del infractor
    const closeButton = document.createElement('button');
    closeButton.className = 'btn-close position-absolute top-0 end-0 m-2 bg-white rounded-circle';
    closeButton.style.padding = '0.25rem';
    closeButton.style.zIndex = '10';
    closeButton.setAttribute('aria-label', 'Close');
    closeButton.style.display = 'none';
    photoContainer.appendChild(closeButton);

    // Función para resetear la vista previa
    function resetPhotoPreview() {
        photoPreview.classList.add('d-none');
        previewPlaceholder.classList.remove('d-none');
        photoInput.value = '';
        closeButton.style.display = 'none';
    }

    // Evento click para el botón de cierre
    closeButton.addEventListener('click', resetPhotoPreview);

    // Modificar el evento change del input de foto
    photoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                photoPreview.src = e.target.result;
                photoPreview.classList.remove('d-none');
                previewPlaceholder.classList.add('d-none');
                closeButton.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Previsualización de las fotos de pertenencias
    const belongingsInput = document.getElementById('belongingsInput');
    const belongingsPreview = document.getElementById('belongingsPreview');

    // Objeto para mantener un registro de los archivos
    let currentFiles = new DataTransfer();

    belongingsInput.addEventListener('change', function(e) {
        belongingsPreview.innerHTML = '';
        const files = Array.from(e.target.files);

        // Reiniciar el DataTransfer
        currentFiles = new DataTransfer();

        files.forEach((file, index) => {
            // Agregar el archivo al DataTransfer
            currentFiles.items.add(file);

            const reader = new FileReader();
            reader.onload = function(e) {
                const previewCol = document.createElement('div');
                previewCol.className = 'col-4';
                previewCol.dataset.fileIndex = index;

                previewCol.innerHTML = `
                <div class="position-relative border rounded overflow-hidden" style="padding-bottom: 100%;">
                    <img src="${e.target.result}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-1 bg-white rounded-circle" 
                            style="padding: 0.25rem;" aria-label="Close"></button>
                </div>`;

                previewCol.querySelector('.btn-close').onclick = function() {
                    // Obtener el índice del archivo a eliminar
                    const fileIndex = parseInt(previewCol.dataset.fileIndex);

                    // Crear un nuevo DataTransfer
                    const newFiles = new DataTransfer();

                    // Copiar todos los archivos excepto el que se va a eliminar
                    Array.from(currentFiles.files).forEach((file, idx) => {
                        if (idx !== fileIndex) {
                            newFiles.items.add(file);
                        }
                    });

                    // Actualizar la lista de archivos actual
                    currentFiles = newFiles;

                    // Actualizar el input con los archivos restantes
                    belongingsInput.files = currentFiles.files;

                    // Eliminar la previsualización
                    previewCol.remove();

                    // Reasignar índices a las previsualizaciones restantes
                    Array.from(belongingsPreview.children).forEach((col, idx) => {
                        col.dataset.fileIndex = idx;
                    });

                    // Si no quedan archivos, limpiar el input
                    if (belongingsPreview.children.length === 0) {
                        belongingsInput.value = '';
                    }
                };

                belongingsPreview.appendChild(previewCol);
            }
            reader.readAsDataURL(file);
        });
    });
    </script>
    <!--script para limpiar valores de campos-->
    <script>
    $("form").on("submit", function(e) {
        e.preventDefault();

        // Limpiar mensajes de error previos
        $(".error-message").text("").hide();

        // Verificar opción seleccionada
        const isLibertad = $("#libertad").is(":checked");
        const isDetencion = $("#detencion").is(":checked");

        // Crear FormData
        const formData = new FormData(this);

        // Agregar el tipo de proceso explícitamente
        if (isLibertad) {
            formData.set('tipo', '1');

            // Limpiar campos de detención
            $("#tiempo_detenido_anos").val("");
            $("#tiempo_detenido_meses").val("");
            $("#tiempo_detenido_dias").val("");
            $("#tiempo_detenido_horas").val("");
            $("#centro_detencion").val("");
            $("#fecha_hora_recibe").val("");
            $("#act_cdit").val("");

            // Limpiar archivos de detención
            $("#foto_detencion").val("");

            // Agregar todos los archivos de libertad al FormData
            const libertadFiles = $("#foto_libertad")[0].files;
            if (libertadFiles.length > 0) {
                Array.from(libertadFiles).forEach((file, index) => {
                    formData.append(`foto_libertad[${index}]`, file);
                });
            } else {
                $("#foto_libertadError").text("Debe seleccionar al menos un archivo.").show();
                return;
            }
        }

        if (isDetencion) {
            formData.set('tipo', '2');

            // Limpiar archivos de libertad
            $("#foto_libertad").val("");

            // Agregar todos los archivos de detención al FormData
            const detencionFiles = $("#foto_detencion")[0].files;
            if (detencionFiles.length > 0) {
                Array.from(detencionFiles).forEach((file, index) => {
                    formData.append(`foto_detencion[${index}]`, file);
                });
            } else {
                $("#foto_detencionError").text("Debe seleccionar al menos un archivo.").show();
                return;
            }
        }

        // Enviar datos al servidor
        $.ajax({
            url: "<?= base_url('index.php/ProcesosController/guardar'); ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === "error") {
                    if (response.errors) {
                        const errors = response.errors;
                        for (const field in errors) {
                            $(`#${field}Error`).text(errors[field]).show();
                        }
                    } else {
                        alert("Ocurrió un error en el formulario. Por favor, verifica los datos.");
                    }
                } else {
                    alert("Registro guardado exitosamente.");
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });
    </script>
    <!-- Script para presionar boton de guardar -->
    <script>
    // Esperar a que el documento esté listo
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener los radio buttons
        const libertadRadio = document.getElementById('libertad');
        const detencionRadio = document.getElementById('detencion');
        const btnRegistrarInfractor = document.getElementById('btnRegistrarInfractor');

        // Función para presionar el botón cuando se seleccione una opción
        function presionarBoton() {
            btnRegistrarInfractor.click(); // Simula un clic en el botón de registro
        }

        // Escuchar los cambios en los radio buttons
        libertadRadio.addEventListener('change', presionarBoton);
        detencionRadio.addEventListener('change', presionarBoton);
    });
    </script>

    <script>
    document.getElementById('distrito').addEventListener('change', function() {
        const distritoId = this.value;
        const cantonSelect = document.getElementById('canton');

        if (distritoId) {
            cantonSelect.disabled = false;

            fetch(`<?= site_url('ProcesosController/get_cantones'); ?>?distrito_id=${distritoId}`)
                .then(response => response.json())
                .then(data => {
                    cantonSelect.innerHTML = '<option value="">Seleccione...</option>';
                    data.forEach(canton => {
                        cantonSelect.innerHTML +=
                            `<option value="${canton.ID_CANTON}">${canton.NOMBRE_CANTON}</option>`;
                    });
                })
                .catch(error => {
                    console.error('Error al cargar los cantones:', error);
                });
        } else {
            cantonSelect.disabled = true;
            cantonSelect.innerHTML = '<option value="">Seleccione un distrito primero...</option>';
        }
    });
    </script>

    <script>
    $(document).ready(function() {
        const searchInput = $('#searchAct');
        const resultsDiv = $('#actResults');
        const selectedInfo = $('#selectedActInfo');
        let searchTimeout;

        searchInput.on('focus', function() {
            if (searchInput.val().length > 0) {
                resultsDiv.show();
            }
        });

        searchInput.on('input', function() {
            clearTimeout(searchTimeout);
            const searchTerm = $(this).val();

            if (searchTerm.length > 0) {
                searchTimeout = setTimeout(function() {
                    searchActs(searchTerm);
                }, 300);
            } else {
                resultsDiv.hide();
            }
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.position-relative').length) {
                resultsDiv.hide();
            }
        });

        // Agregar manejador para el botón de limpiar
        $('#clearSelection').on('click', function() {
            // Limpiar el campo oculto
            $('#selected_act_id').val('');
            // Ocultar la información seleccionada
            selectedInfo.hide();
            // Limpiar el campo de búsqueda
            searchInput.val('');
        });

        function searchActs(term) {
            $.ajax({
                url: '<?php echo site_url(); ?>/ProcesosController/search_acts',
                method: 'POST',
                dataType: 'json',
                data: {
                    search: term,
                    <?= $this->security->get_csrf_token_name() ?>: '<?= $this->security->get_csrf_hash() ?>'
                },
                success: function(acts) {
                    displayResults(acts);
                },
                error: function(xhr, status, error) {
                    console.error('Error en la búsqueda:', error);
                }
            });
        }

        function displayResults(acts) {
            resultsDiv.empty();

            if (acts.length > 0) {
                acts.forEach(function(act) {
                    const resultItem = $(`
                    <div class="p-3 border-bottom" style="cursor: pointer;">
                        <div class="font-weight-bold">${act.NRO_ACT}</div>
                        <div class="small text-muted">
                            ${act.APELLIDOS_ACT}, ${act.NOMBRES_ACT}
                        </div>
                    </div>
                `);

                    resultItem.hover(
                        function() {
                            $(this).addClass('bg-light');
                        },
                        function() {
                            $(this).removeClass('bg-light');
                        }
                    );

                    resultItem.on('click', function() {
                        selectAct(act);
                    });

                    resultsDiv.append(resultItem);
                });
            } else {
                resultsDiv.append(`
                <div class="p-3 text-center text-muted">
                    No se encontraron resultados
                </div>
            `);
            }

            resultsDiv.show();
        }

        function selectAct(act) {
            $('#selected_act_id').val(act.ID_ACT_PROCEDE);
            $('#selectedActNumber').text(act.NRO_ACT);
            $('#selectedActName').text(`${act.APELLIDOS_ACT}, ${act.NOMBRES_ACT}`);

            searchInput.val('');
            resultsDiv.hide();
            selectedInfo.show();
        }
    });
    </script>


    <script src="<?php echo base_url();?>public/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>