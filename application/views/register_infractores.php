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





</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
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
                                            <label class="form-label fw-bold">Foto del Infractor</label>
                                            <div class="border rounded overflow-hidden mb-2"
                                                style="height: 250px; width: 75%;">
                                                <div class="w-100 h-100 position-relative">
                                                    <?php if (!empty($infractor['F_INFRACTOR_RUTA'])): ?>
                                                    <img src="<?= base_url('uploads/fotos_infractores/' . $infractor['F_INFRACTOR_RUTA']) ?>"
                                                        class="w-100 h-100 object-fit-cover" alt="Foto del Infractor">
                                                    <?php else: ?>
                                                    <div
                                                        class="position-absolute top-50 start-50 translate-middle text-muted">
                                                        <i class="fas fa-user-circle fa-4x"></i>
                                                        <p class="mt-2">No hay foto disponible</p>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!-- Información adicional del infractor -->
                                            <div class="mt-2">
                                                <p class="mb-1"><strong>Nombres:</strong>
                                                    <?= $infractor['N_INFRACTOR'] ?></p>
                                                <p class="mb-1"><strong>Apellidos:</strong>
                                                    <?= $infractor['A_INFRACTOR'] ?></p>
                                                <p class="mb-1"><strong>Cédula:</strong>
                                                    <?= $infractor['C_INFRACTOR'] ?></p>
                                                <input type="hidden" name="id_infractor" value="<?= $infractor['ID_INFRACTOR'] ?>">    
                                                
                                            </div>
                                        </div>

                                        <!-- Fotos de pertenencias -->
                                        <div>
                                            <label class="form-label fw-bold">Agregar fotos de Pertenencias</label>
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


                                        <div class="col-12">
                                            <div class="position-relative">
                                                <br>
                                                <h4 class="text-center font-weight-bold mb-4">A.C.T que Procede</h4>
                                                <!-- Input de búsqueda con autocomplete -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-search"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="searchAct" class="form-control"
                                                        placeholder="Buscar ACT..." autocomplete="off">
                                                    <div class="input-group-append" id="clearButton"
                                                        style="display: none;">
                                                        <button class="btn btn-outline-secondary" type="button">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- Campo oculto para el ID -->
                                                <input type="hidden" id="selected_act_id" name="act_id" required>
                                                <small id="act_idError" class="error-message text-danger"></small>
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
                                                <br>
                                                <br>
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
                                                    <label for="act_cdit" class="form-label fw-bold">A.C.T recibe CDIT 
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <br>
                                                    <br>
                                                    <select id="act_cdit" name="act_cdit" class="form-select" required>
                                                        <option value="">Seleccione...</option>
                                                        <?php foreach ($agentes as $agente): ?>
                                                        <option value="<?= $agente['ID_AGENTE']; ?>">
                                                            <?= $agente['NRO_ACT'] . ' - ' . $agente['NOMBRES_ACT'] . ' ' . $agente['APELLIDOS_ACT']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
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

   
<!-- Script para mostrar/ocultar campos -->
<script>
    $(document).on('shown.bs.modal', '#modalVistaInfractor', function() {
        // Script para mostrar/ocultar campos
        const libertadRadio = document.getElementById("libertad");
        const detencionRadio = document.getElementById("detencion");
        const detencionFields = document.getElementById("detencionFields");
        const fotoFieldLibertad = document.getElementById("fotoFieldLibertad");
        const centroDetencionField = document.getElementById("centro_detencion");

        // Verificar que los elementos existan
        if (libertadRadio && detencionRadio && detencionFields && fotoFieldLibertad && centroDetencionField) {
            // Remover eventos anteriores para evitar duplicados
            libertadRadio.removeEventListener("change", libertadChangeHandler);
            detencionRadio.removeEventListener("change", detencionChangeHandler);

            // Definir los manejadores de eventos
            function libertadChangeHandler() {
                if (this.checked) {
                    fotoFieldLibertad.classList.remove("d-none");
                    detencionFields.style.display = "none";
                }
            }

            function detencionChangeHandler() {
                if (this.checked) {
                    fotoFieldLibertad.classList.add("d-none");
                    detencionFields.style.display = "block";
                    centroDetencionField.style.display = "block";
                }
            }

            // Agregar los nuevos event listeners
            libertadRadio.addEventListener("change", libertadChangeHandler);
            detencionRadio.addEventListener("change", detencionChangeHandler);

            // Establecer estado inicial según el radio button seleccionado
            if (libertadRadio.checked) {
                fotoFieldLibertad.classList.remove("d-none");
                detencionFields.style.display = "none";
            } else if (detencionRadio.checked) {
                fotoFieldLibertad.classList.add("d-none");
                detencionFields.style.display = "block";
                centroDetencionField.style.display = "block";
            }
        }
    });

    // Cuando el modal se cierra, restablecer los campos
    $(document).on('hidden.bs.modal', '#modalVistaInfractor', function() {
        const libertadRadio = document.getElementById("libertad");
        const detencionRadio = document.getElementById("detencion");
        
        // Desmarcar los radio buttons
        if (libertadRadio) libertadRadio.checked = false;
        if (detencionRadio) detencionRadio.checked = false;
    });
</script>
<!--script para visualizar fotos-->
<script>
    $(document).on('shown.bs.modal', '#modalVistaInfractor', function() {
        // Previsualización de las fotos de pertenencias
        const belongingsInput = document.getElementById('belongingsInput');
        const belongingsPreview = document.getElementById('belongingsPreview');

        if (!belongingsInput || !belongingsPreview) {
            console.log('Elementos de pertenencias no disponibles');
            return;
        }

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
                        const fileIndex = parseInt(previewCol.dataset.fileIndex);
                        const newFiles = new DataTransfer();

                        Array.from(currentFiles.files).forEach((file, idx) => {
                            if (idx !== fileIndex) {
                                newFiles.items.add(file);
                            }
                        });

                        currentFiles = newFiles;
                        belongingsInput.files = currentFiles.files;
                        previewCol.remove();

                        Array.from(belongingsPreview.children).forEach((col, idx) => {
                            col.dataset.fileIndex = idx;
                        });

                        if (belongingsPreview.children.length === 0) {
                            belongingsInput.value = '';
                        }
                    };

                    belongingsPreview.appendChild(previewCol);
                }
                reader.readAsDataURL(file);
            });
        });
    });
</script>
<!--script para limpiar valores de campos-->
<script>
   $(document).on('shown.bs.modal', '#modalVistaInfractor', function() {
    const $modalForm = $("#modalVistaInfractor form");

    // Función para limpiar campos de detención
    function limpiarCamposDetencion() {
        $("#tiempo_detenido_anos", $modalForm).val("");
        $("#tiempo_detenido_meses", $modalForm).val("");
        $("#tiempo_detenido_dias", $modalForm).val("");
        $("#tiempo_detenido_horas", $modalForm).val("");
        $("#centro_detencion", $modalForm).val("");
        $("#fecha_hora_recibe", $modalForm).val("");
        $("#act_cdit", $modalForm).val("").prop('selectedIndex', 0); 
        $("#foto_detencion", $modalForm).val("");
        $("#foto_detencionError", $modalForm).text("").hide();
    }

    // Función para limpiar campos de libertad
    function limpiarCamposLibertad() {
        $("#foto_libertad", $modalForm).val("");
        $("#foto_libertadError", $modalForm).text("").hide();
    }

    // Evento para radio buttons
    $("#libertad", $modalForm).on('change', function() {
        if($(this).is(":checked")) {
            limpiarCamposDetencion();
        }
    });

    $("#detencion", $modalForm).on('change', function() {
        if($(this).is(":checked")) {
            limpiarCamposLibertad();
        }
    });

    $modalForm.on("submit", function(e) {
        e.preventDefault();
        // Limpiar mensajes de error previos
        $(".error-message").text("").hide();
        
        // Verificar opción seleccionada
        const isLibertad = $("#libertad", this).is(":checked");
        const isDetencion = $("#detencion", this).is(":checked");
        
        // Crear FormData
        const formData = new FormData(this);

        // Agregar el tipo de proceso explícitamente
        if (isLibertad) {
            formData.set('tipo', '1');
            limpiarCamposDetencion(); // Asegurar que los campos de detención estén limpios
            
            const libertadFiles = $("#foto_libertad", this)[0].files;
            if (libertadFiles.length > 0) {
                Array.from(libertadFiles).forEach((file, index) => {
                    formData.append(`foto_libertad[${index}]`, file);
                });
            } else {
                $("#foto_libertadError", this).text("Debe seleccionar al menos un archivo.").show();
                return;
            }
        }

        if (isDetencion) {
            formData.set('tipo', '2');
            limpiarCamposLibertad(); // Asegurar que los campos de libertad estén limpios
            
            const detencionFiles = $("#foto_detencion", this)[0].files;
            if (detencionFiles.length > 0) {
                Array.from(detencionFiles).forEach((file, index) => {
                    formData.append(`foto_detencion[${index}]`, file);
                });
            } else {
                $("#foto_detencionError", this).text("Debe seleccionar al menos un archivo.").show();
                return;
            }
        }

        // Mostrar loader
        Swal.fire({
            title: 'Guardando...',
            text: 'Por favor espere',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Enviar datos al servidor
        $.ajax({
            url: baseUrl + "index.php/ProcesosController/guardar",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.close();
                
                if (response.status === "error") {
                    if (response.errors) {
                        const errors = response.errors;
                        for (const field in errors) {
                            $(`#${field}Error`, $modalForm).text(errors[field]).show();
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Por favor, verifica los datos ingresados.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error en el formulario. Por favor, verifica los datos.'
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Registro guardado exitosamente.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Cerrar el modal
                        $('#modalVistaInfractor').modal('hide');
                        // Recargar la página
                        location.reload();
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.close();
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                });
            }
        });
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
<!-- Script para distritos y cantones -->
<script>
    $(document).on('shown.bs.modal', '#modalVistaInfractor', function() {
    const distrito = document.getElementById('distrito');
    
    if (distrito) {
        distrito.addEventListener('change', function() {
            const distritoId = this.value;
            const cantonSelect = document.getElementById('canton');
            
            if (distritoId) {
                cantonSelect.disabled = false;
                
                // Mostrar loader
                Swal.fire({
                    title: 'Cargando...',
                    text: 'Obteniendo cantones',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch(baseUrl + `index.php/ProcesosController/get_cantones?distrito_id=${distritoId}`)
                    .then(response => response.json())
                    .then(data => {
                        cantonSelect.innerHTML = '<option value="">Seleccione...</option>';
                        data.forEach(canton => {
                            cantonSelect.innerHTML +=
                                `<option value="${canton.ID_CANTON}">${canton.NOMBRE_CANTON}</option>`;
                        });
                        Swal.close();
                    })
                    .catch(error => {
                        console.error('Error al cargar los cantones:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudieron cargar los cantones'
                        });
                    });
            } else {
                cantonSelect.disabled = true;
                cantonSelect.innerHTML = '<option value="">Seleccione un distrito primero...</option>';
            }
        });

        // Disparar el evento change si ya hay un valor seleccionado
        if (distrito.value) {
            const event = new Event('change');
            distrito.dispatchEvent(event);
        }
    }
        });
</script>
<!-- Script para seleccionar agente que procede -->
<script>
     $(document).ready(function() {
            const searchInput = $('#searchAct');
            const clearButton = $('#clearButton');
            let selectedAct = null;
            let searchTimeout;

            searchInput.on('input', function() {
                clearTimeout(searchTimeout);
                const searchTerm = $(this).val();

                if (searchTerm.length > 0) {
                    clearButton.show();
                    searchTimeout = setTimeout(function() {
                        searchActs(searchTerm);
                    }, 300);
                } else {
                    clearButton.hide();
                    $('#actDropdown').remove();
                    clearSelection();
                }
            });

            clearButton.on('click', function() {
                clearSelection();
                $('#actDropdown').remove();
            });

            // Cerrar el dropdown cuando se hace clic fuera
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.position-relative').length) {
                    $('#actDropdown').remove();
                }
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
                        showDropdown(acts);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la búsqueda:', error);
                    }
                });
            }

            function showDropdown(acts) {
                // Remover dropdown existente
                $('#actDropdown').remove();

                // Crear nuevo dropdown
                const dropdown = $(
                    `<div id="actDropdown" class="dropdown-menu show w-100 shadow" style="max-height: 300px; overflow-y: auto;"></div>`
                    );

                if (acts.length > 0) {
                    acts.forEach(act => {
                        const item = $(`
                        <a href="#" class="dropdown-item py-2">
                            <div class="font-weight-bold">${act.NRO_ACT}</div>
                            <small class="text-muted">${act.APELLIDOS_ACT}, ${act.NOMBRES_ACT}</small>
                        </a>
                    `);

                        item.on('click', function(e) {
                            e.preventDefault();
                            selectAct(act);
                            dropdown.remove();
                        });

                        dropdown.append(item);
                    });
                } else {
                    dropdown.append(`
                    <div class="dropdown-item text-muted text-center py-2">
                        No se encontraron resultados
                    </div>
                `);
                }

                // Insertar el dropdown después del input-group
                searchInput.closest('.input-group').after(dropdown);
            }

            function selectAct(act) {
                selectedAct = act;
                $('#selected_act_id').val(act.ID_AGENTE);
                searchInput.val(`${act.NRO_ACT} - ${act.APELLIDOS_ACT}, ${act.NOMBRES_ACT}`);
                clearButton.show();
            }

            function clearSelection() {
                selectedAct = null;
                $('#selected_act_id').val('');
                searchInput.val('');
                clearButton.hide();
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