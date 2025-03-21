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
    <script src="<?php echo base_url();?>public/assets/js/sweetalert211.js"></script>


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
                    <div class="">
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


                        <!-- Estilos personalizados -->
    <style>
    .custom-card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .form-section {
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 1rem;
        margin-bottom: 1rem;
    }

    .section-title {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #3498db;
        display: inline-block;
    }

    .photo-container {
        background-color:rgb(226 226 226);
        border: 2px dashed #dee2e6;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .photo-container:hover {
        border-color: #3498db;
    }

    .required-field::after {
        content: "*";
        color: #dc3545;
        margin-left: 4px;
    }

    .btn-custom {
        padding: 10px 25px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .resolution-card {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .resolution-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    </style>


    <!-- Modal para visualizar la información del infractor mediante un formulario -->

    <form action="<?= site_url('ProcesosController/guardar'); ?>" method="POST" enctype="multipart/form-data" class="py-4">
        <div class="container">
            
            <div class="custom-card p-4">
                <!-- Sección de Datos del Infractor -->
                <div class="form-section">
                    <h4 class="section-title">Datos del Infractor</h4>
                    <div class="row">
                        <!-- Columna de Fotos -->
                        <div class="col-md-4">
                            <!-- Foto del infractor -->
                            <div class="photo-container p-3 mb-4">
                                <label class="form-label fw-bold mb-3">Foto del Infractor</label>
                                <div class="ratio ratio-1x1 mb-3">
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center">
                                        <?php if (!empty($infractor['F_INFRACTOR_RUTA'])): ?>
                                            <img src="<?= base_url(str_replace('./', '', $infractor['F_INFRACTOR_RUTA'])) ?>"
                                            class="img-fluid rounded" alt="Foto del Infractor">
                                        <?php else: ?>
                                            <div class="text-center text-muted">
                                                <i class="fas fa-user-circle fa-4x mb-2"></i>
                                                <p>No hay foto disponible</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <!-- Información del infractor -->
                                <div class="info-container bg-light p-3 rounded">
                                    <p class="mb-2"><strong>Nombres:</strong> <?= $infractor['N_INFRACTOR'] ?></p>
                                    <p class="mb-2"><strong>Apellidos:</strong> <?= $infractor['A_INFRACTOR'] ?></p>
                                    <p class="mb-2"><strong>Cédula:</strong> <?= $infractor['C_INFRACTOR'] ?></p>
                                    <input type="hidden" name="id_infractor" value="<?= $infractor['ID_INFRACTOR'] ?>">
                                </div>
                            </div>

                            <!-- Fotos de pertenencias -->
                            <div class="photo-container p-3">
                                <label class="form-label fw-bold mb-3">Fotos de Pertenencias</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="belongingsInput" 
                                        name="foto_pertenencias[]" accept="image/*" multiple>
                                </div>
                                <div class="row g-2" id="belongingsPreview">
                                    <!-- Previsualizaciones aquí -->
                                </div>
                            </div>
                        </div>
                                             
                        <!-- Columna de Datos del Proceso -->
                        <div class="col-md-8">
                            <!-- A.C.T que Procede -->
                            <div class="mb-4">
                                <h5 class="text-center fw-bold mb-3">Agente de Control de Transito que Procede</h5>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" id="searchAct" class="form-control" placeholder="Busca por Nombres o Numero de Agente">
                                    <button class="btn btn-outline-secondary d-none" id="clearButton" type="button">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <input type="hidden" id="selected_act_id" name="act_id" required>
                                <small id="act_idError" class="text-danger"></small>
                            </div>

                            <!-- Información del Procedimiento -->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold required-field">Fecha de Procedimiento</label>
                                    <input type="date" class="form-control" id="fecha_procedimiento" name="fecha_procedimiento" required>
                                    <small id="fecha_procedimientoError" class="text-danger"></small>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold required-field">Tipo de Placa</label>
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
                                    <label class="form-label fw-bold required-field">Número de Placa</label>
                                    <input type="text" class="form-control" id="num_placa" name="num_placa" maxlength="13" required>
                                    <small id="num_placaError" class="error-message text-danger"></small>

                                </div>
                            </div>

                            <!-- Causa y Pruebas -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold required-field">Causa</label>
                                    <select id="causa" name="causa" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($causas as $causa): ?>
                                            <option value="<?= $causa['ID_CAUSA']; ?>"><?= $causa['CAUSA']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="causaError" class="error-message text-danger"></small>

                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold required-field">Tipo de Prueba</label>
                                    <select id="tipo_prueba" name="tipo_prueba" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($tipo_pruebas as $tipoprueba): ?>
                                            <option value="<?= $tipoprueba['ID_TIPO_PRUEBA']; ?>">
                                                <?= $tipoprueba['NOMBRE_PRUEBA']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="tipo_pruebaError" class="error-message text-danger"></small>

                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold required-field">Valor Prueba</label>
                                    <input type="text" class="form-control" id="valor_prueba" name="valor_prueba" required>
                                    <small id="valor_pruebaError" class="error-message text-danger"></small>

                                </div>
                            </div>

                            <!-- Ubicación -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold required-field">Distrito</label>
                                    <select id="distrito" name="distrito" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($distritos as $distrito): ?>
                                            <option value="<?= $distrito['ID_DISTRITO']; ?>">
                                                <?= $distrito['NOMBRE_DISTRITO']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold required-field">Cantón</label>
                                    <select id="canton" name="canton" class="form-select" required disabled>
                                        <option value="">Seleccione un distrito primero...</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Valoración Médica -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold required-field">Entrada Valoración Médica</label>
                                    <input type="datetime-local" class="form-control" id="fecha_entrada_valoracion" 
                                        name="fecha_entrada_valoracion" required>
                                        <small id="fecha_entrada_valoracionError" class="error-message text-danger"></small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold required-field">Salida Valoración Médica</label>
                                    <input type="datetime-local" class="form-control" id="fecha_salida_valoracion" 
                                        name="fecha_salida_valoracion" required>
                                        <small id="fecha_salida_valoracionError" class="error-message text-danger"></small>
                                </div>
                            </div>

                            <!-- Agente y Observaciones -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold required-field">Agente Custodio</label>
                                    <select id="act_custodio" name="act_custodio" class="form-select" required>
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
                                    <label class="form-label fw-bold">Observación</label>
                                    <textarea class="form-control" id="observacion" name="observacion" rows="4"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Novedad</label>
                                    <textarea class="form-control" id="novedad" name="novedad" rows="4"></textarea>
                                </div>
                            </div>

                            <!-- Resolución de Audiencia -->
                           <!-- Resolución de Audiencia con diseño responsivo -->
<div class="row g-3 mt-4">
    <div class="col-12">
        <label class="form-label fw-bold required-field mb-3">Resolución de Audiencia</label>
        <div class="d-flex flex-column flex-md-row gap-3">
            <div class="resolution-card w-100">
                <input class="btn-check" type="radio" name="resolucion_audiencia" 
                    id="libertad" value="1" required>
                <label class="btn btn-outline-primary w-100 p-3 d-flex flex-column 
                    align-items-center" for="libertad">
                    <i class="bi bi-unlock fs-3 mb-2"></i>
                    <span class="fs-6">Libertad</span>
                </label>
            </div>
            <div class="resolution-card w-100">
                <input class="btn-check" type="radio" name="resolucion_audiencia" 
                    id="detencion" value="2" required>
                <label class="btn btn-outline-primary w-100 p-3 d-flex flex-column 
                    align-items-center" for="detencion">
                    <i class="bi bi-lock fs-3 mb-2"></i>
                    <span class="fs-6">Detención</span>
                </label>
            </div>
        </div>
    </div>
</div>

                            <!-- Campos de Detención (ocultos inicialmente) -->
                            <div id="detencionFields" class="mt-4 d-none">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-bold mb-3">Tiempo Detenido</label>
                                        <div class="row g-3">

                                        <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="tiempo_detenido_anos"
                                                        name="tiempo_detenido_anos" min="0"  value="" placeholder="0">
                                                    <span class="input-group-text" aria-label="Años">Años</span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="tiempo_detenido_meses"
                                                        name="tiempo_detenido_meses" min="0" max="11" value="">
                                                    <span class="input-group-text">Meses</span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="tiempo_detenido_dias"
                                                        name="tiempo_detenido_dias" min="0" max="30" value="">
                                                    <span class="input-group-text">Días</span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="tiempo_detenido_horas"
                                                        name="tiempo_detenido_horas" min="0" max="23" value="">
                                                    <span class="input-group-text">Horas</span>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="tiempo_detenido_anos_error" class="text-danger mt-2"></div>

                                    </div>
                                    
                                    <!-- Información del Centro de Detención -->
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold required-field">Centro de Detención</label>
                                        <select id="centro_detencion" name="centro_detencion" class="form-select">
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($cdit as $cdits): ?>
                                                <option value="<?= $cdits['ID_CDIT']; ?>">
                                                    <?= $cdits['NOMBRE_CDIT']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="centro_detencionError" class="error-message text-danger"></small>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold required-field">Fecha de Recepción</label>
                                        <input type="datetime-local" id="fecha_hora_recibe" name="fecha_hora_recibe" 
                                            class="form-control">
                                            <small id="fecha_hora_recibeError" class="error-message text-danger"></small>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold required-field">A.C.T recibe CDIT</label>
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
                                    
                                    <!-- Boleta de Encarcelamiento -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold required-field">Boleta de Encarcelamiento</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="material-icons-outlined">insert_photo</i>
                                            </span>
                                            <input type="file" class="form-control" id="foto_detencion"
                                                name="foto_detencion[]" accept="image/*,application/pdf" multiple>
                                        </div>
                                        <small class="text-muted">Puede seleccionar múltiples archivos</small>
                                        <small id="foto_detencionError" class="error-message text-danger"></small>
                                    </div>
                                </div>
                            </div>

                            <!-- Campo de foto para Libertad -->
                            <div id="fotoFieldLibertad" class="mt-4 d-none">
                                <div class="col-12">
                                    <label class="form-label fw-bold required-field">Boleta de Libertad</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="material-icons-outlined">insert_photo</i>
                                        </span>
                                        <input type="file" class="form-control" id="foto_libertad"
                                            name="foto_libertad[]" accept="image/*,application/pdf" multiple>
                                    </div>
                                    <small class="text-muted">Puede seleccionar múltiples archivos</small>
                                    <small id="foto_libertadError" class="error-message text-danger"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón de envío -->
                <div class="row mt-4">
                    <div class="col-12 text-end">
                        <button type="submit" id="btnRegistrarInfractor" class="btn btn-success btn-custom">
                            <i class="fas fa-save me-2"></i>Registrar Proceso
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


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

    <!-- Script completo con limpieza de campos y solución para act_cdit -->
    <script>
$(document).on('shown.bs.modal', '#modalVistaInfractor', function() {
    const $modalForm = $("#modalVistaInfractor form");
    
    // Referencias a elementos
    const $libertadRadio = $("#libertad", $modalForm);
    const $detencionRadio = $("#detencion", $modalForm);
    const $detencionFields = $("#detencionFields");
    const $fotoFieldLibertad = $("#fotoFieldLibertad");
    const $actCdit = $("#act_cdit", $modalForm);
    
    // Agregar contenedor para errores de tiempo detenido si no existe
    if ($("#tiempo_detenido_error", $modalForm).length === 0) {
        $(".row", $detencionFields).first().append('<div id="tiempo_detenido_error" class="text-danger mt-2 col-12"></div>');
    }
    
    // Función para limpiar campos de detención
    function limpiarCamposDetencion() {
        
        // Limpiamos todos los campos de detención
        $("#tiempo_detenido_anos", $modalForm).val("0");
        $("#tiempo_detenido_meses", $modalForm).val("0");
        $("#tiempo_detenido_dias", $modalForm).val("0");
        $("#tiempo_detenido_horas", $modalForm).val("0");
        $("#centro_detencion", $modalForm).val("");
        $("#fecha_hora_recibe", $modalForm).val("");
        $("#foto_detencion", $modalForm).val("");
        $("#foto_detencionError", $modalForm).text("").hide();
        
        // Limpiar mensaje de error de tiempo detenido
        $("#tiempo_detenido_error", $modalForm).text("").hide();
        $(".tiempo-detenido-input").removeClass("is-invalid");
        
        // Desconectamos el campo act_cdit de la validación y limpiamos su valor
        $actCdit.val("").prop("required", false);
        
        // Si es un select, reseteamos la selección al primer elemento
        if ($actCdit.is("select")) {
            $actCdit.prop('selectedIndex', 0);
        }
    }
    
    // Función para limpiar campos de libertad
    function limpiarCamposLibertad() {
        
        // Limpiamos todos los campos relacionados con libertad
        $("#foto_libertad", $modalForm).val("");
        $("#foto_libertadError", $modalForm).text("").hide();
    }
    
    // Eliminamos handlers previos para evitar duplicados
    $libertadRadio.off("change");
    $detencionRadio.off("change");
    
    // Manejadores de eventos para los radio buttons
    $libertadRadio.on("change", function() {
        if ($(this).is(":checked")) {
            
            // Mostrar campos de libertad y ocultar campos de detención
            $fotoFieldLibertad.removeClass("d-none");
            
            // IMPORTANTE: Primero quitar el required antes de ocultar
            $actCdit.prop("required", false);
            
            // Limpiar campos de detención ANTES de ocultar
            limpiarCamposDetencion();
            
            // Ahora ocultamos los campos
            $detencionFields.addClass("d-none");
        }
    });
    
    $detencionRadio.on("change", function() {
        if ($(this).is(":checked")) {
            
            // Ocultar campos de libertad
            $fotoFieldLibertad.addClass("d-none");
            
            // Limpiar campos de libertad
            limpiarCamposLibertad();
            
            // IMPORTANTE: Primero mostramos los campos antes de manipular sus valores
            $detencionFields.removeClass("d-none");
            
            // Restaurar el required después de mostrar
            $actCdit.prop("required", true);
        }
    });
    
    // Establecer estado inicial cuando se abre el modal
    
    if ($libertadRadio.is(":checked")) {
        $libertadRadio.trigger("change");
    } else if ($detencionRadio.is(":checked")) {
        $detencionRadio.trigger("change");
    } else {
        // Si no hay ninguna opción seleccionada por defecto, configuramos ambos campos
        $actCdit.prop("required", false);
        $detencionFields.addClass("d-none");
        $fotoFieldLibertad.addClass("d-none");
    }
    
    // Añadir clase a los inputs de tiempo detenido para facilitar su selección
    $("#tiempo_detenido_anos, #tiempo_detenido_meses, #tiempo_detenido_dias, #tiempo_detenido_horas", $modalForm)
        .addClass("tiempo-detenido-input");
    
    // Validación en tiempo real para campos de tiempo detenido
    $(".tiempo-detenido-input", $modalForm).on("input", function() {
        // Verificar si al menos un campo tiene valor > 0
        const anos = parseInt($("#tiempo_detenido_anos", $modalForm).val()) || 0;
        const meses = parseInt($("#tiempo_detenido_meses", $modalForm).val()) || 0;
        const dias = parseInt($("#tiempo_detenido_dias", $modalForm).val()) || 0;
        const horas = parseInt($("#tiempo_detenido_horas", $modalForm).val()) || 0;
        
        if (anos > 0 || meses > 0 || dias > 0 || horas > 0) {
            // Quitar mensajes de error si al menos un campo tiene valor
            $(".tiempo-detenido-input", $modalForm).removeClass("is-invalid");
            $("#tiempo_detenido_error", $modalForm).text("").hide();
        }
    });
    
    // Manejo del envío del formulario
    $modalForm.off("submit").on("submit", function(e) {
        e.preventDefault();
        $(".error-message", $modalForm).text("").hide();
        
        const isLibertad = $libertadRadio.is(":checked");
        const isDetencion = $detencionRadio.is(":checked");
        
        // Verificar una vez más que el required esté correcto antes de enviar
        if (isLibertad) {
            $actCdit.prop("required", false);
        }
        
        // Validar tiempo detenido antes de enviar (si está en modo detención)
        if (isDetencion) {
            const anos = parseInt($("#tiempo_detenido_anos", $modalForm).val()) || 0;
            const meses = parseInt($("#tiempo_detenido_meses", $modalForm).val()) || 0;
            const dias = parseInt($("#tiempo_detenido_dias", $modalForm).val()) || 0;
            const horas = parseInt($("#tiempo_detenido_horas", $modalForm).val()) || 0;
            
            if (anos === 0 && meses === 0 && dias === 0 && horas === 0) {
                // Mostrar error si todos los campos son 0
                $(".tiempo-detenido-input", $modalForm).addClass("is-invalid");
                $("#tiempo_detenido_error", $modalForm)
                    .text("Debe ingresar al menos un valor mayor a 0 en los campos de tiempo detenido.")
                    .show();
                return; // Detener envío
            }
        }
        
        const formData = new FormData(this);

        if (isLibertad) {
            formData.set('tipo', '1');
            
            // Para libertad, aseguramos que los campos de detención estén vacíos
            // pero sin tocar los campos visualmente, solo a nivel de datos
            formData.set('tiempo_detenido_anos', '0');
            formData.set('tiempo_detenido_meses', '0');
            formData.set('tiempo_detenido_dias', '0');
            formData.set('tiempo_detenido_horas', '0');
            formData.set('centro_detencion', '');
            formData.set('fecha_hora_recibe', '');
            formData.set('act_cdit', '');
            
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
            
            // Para detención, aseguramos que los campos de libertad estén vacíos
            formData.delete('foto_libertad');
            
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

        // Continuar con el envío AJAX...
        Swal.fire({
            title: 'Guardando...',
            text: 'Por favor espere',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

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
                            if (field === "tiempo_detenido_anos") {
                                // Manejo especial para error de tiempo detenido
                                $(".tiempo-detenido-input", $modalForm).addClass("is-invalid");
                                $("#tiempo_detenido_error", $modalForm).text(errors[field]).show();
                            } else {
                                $(`#${field}Error`, $modalForm).text(errors[field]).show();
                            }
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Por favor, corrige los errores en el formulario.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'Ocurrió un error en el formulario. Por favor, verifica los datos.'
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
                        try {
                            // Cerrar el modal primero
                            $('#modalVistaInfractor').modal('hide');
                            
                            // Verificar si tenemos un ID de proceso para redirigir
                            if (response.id_proceso) {
                                // Redirigir a la página de detalles del proceso
                                window.location.href = baseUrl + 'index.php/SearchController/detalle/' + response.id_proceso;
                            } else {
                                // Si no hay ID, simplemente recargar la página
                                location.reload();
                            }
                        } catch (error) {
                            console.error("Error al cerrar el modal:", error);
                            // Alternativa manual para cerrar el modal en caso de error
                            $('#modalVistaInfractor').removeClass('show').css('display', 'none');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            
                            // Redirigir después de cerrar manualmente
                            if (response.id_proceso) {
                                window.location.href = baseUrl + 'index.php/SearchController/detalle/' + response.id_proceso;
                            } else {
                                location.reload();
                            }
                        }
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
    <!--script para visualizar fotos-->
    <script>
$(document).on('shown.bs.modal', '#modalVistaInfractor', function() {
    // Evitar múltiples inicializaciones usando un flag
    if ($(this).data('belongings-initialized')) {
        return;
    }
    $(this).data('belongings-initialized', true);
    
    const belongingsInput = document.getElementById('belongingsInput');
    const belongingsPreview = document.getElementById('belongingsPreview');
    
    if (!belongingsInput || !belongingsPreview) {
        console.log('Elementos de pertenencias no disponibles');
        return;
    }
    
    // Crear un DataTransfer para manejar los archivos
    let currentFiles = new DataTransfer();
    
    // Usar .one() en lugar de .addEventListener para evitar múltiples bindings
    $(belongingsInput).off('change').on('change', function(e) {
        // Limpiar la vista previa
        belongingsPreview.innerHTML = '';
        
        // Obtener los archivos seleccionados
        const files = Array.from(e.target.files);
        console.log(`Archivos seleccionados: ${files.length}`);
        
        // Resetear el DataTransfer
        currentFiles = new DataTransfer();
        
        // Procesar cada archivo
        files.forEach((file, index) => {
            // Comprobar si ya existe un archivo con el mismo nombre y tamaño
            const fileExists = Array.from(currentFiles.files).some(
                existingFile => existingFile.name === file.name && existingFile.size === file.size
            );
            
            if (!fileExists) {
                // Añadir al DataTransfer solo si no existe
                currentFiles.items.add(file);
                console.log(`Añadido archivo: ${file.name}`);
                
                // Crear vista previa
                const reader = new FileReader();
                reader.onload = function(event) {
                    const previewCol = document.createElement('div');
                    previewCol.className = 'col-4';
                    previewCol.dataset.fileIndex = index;
                    
                    previewCol.innerHTML = `
                        <div class="position-relative border rounded overflow-hidden" style="padding-bottom: 100%;">
                            <img src="${event.target.result}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-1 bg-white rounded-circle"
                                     style="padding: 0.25rem;" aria-label="Close"></button>
                        </div>`;
                    
                    // Manejar el evento de eliminación
                    $(previewCol).find('.btn-close').on('click', function() {
                        const fileIndex = parseInt(previewCol.dataset.fileIndex);
                        const newFiles = new DataTransfer();
                        
                        Array.from(currentFiles.files).forEach((file, idx) => {
                            if (idx !== fileIndex) {
                                newFiles.items.add(file);
                            }
                        });
                        
                        // Actualizar los archivos
                        currentFiles = newFiles;
                        belongingsInput.files = currentFiles.files;
                        
                        // Eliminar la vista previa
                        previewCol.remove();
                        
                        // Actualizar los índices
                        Array.from(belongingsPreview.children).forEach((col, idx) => {
                            col.dataset.fileIndex = idx;
                        });
                        
                        // Si no hay archivos, limpiar el input
                        if (belongingsPreview.children.length === 0) {
                            belongingsInput.value = '';
                        }
                    });
                    
                    belongingsPreview.appendChild(previewCol);
                };
                
                reader.readAsDataURL(file);
            }
        });
    });
});
</script>

   
    <!-- Script para presionar boton de guardar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const libertadRadio = document.getElementById('libertad');
            const detencionRadio = document.getElementById('detencion');
            const btnRegistrarInfractor = document.getElementById('btnRegistrarInfractor');

            function presionarBoton() {
                if (btnRegistrarInfractor) {
                    btnRegistrarInfractor.click();
                }
            }

            if (libertadRadio && detencionRadio) {
                libertadRadio.addEventListener('change', presionarBoton);
                detencionRadio.addEventListener('change', presionarBoton);
            }
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

            // Agregar posicionamiento relativo al contenedor del input
            searchInput.closest('.input-group').css('position', 'relative');

            searchInput.on('input', function() {
                clearTimeout(searchTimeout);
                const searchTerm = $(this).val();

                if (searchTerm.length > 0) {
                    clearButton.removeClass('d-none').show();
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

            $(document).on('click', function(e) {
                if (!$(e.target).closest('.input-group').length) {
                    $('#actDropdown').remove();
                }
            });

            function searchActs(term) {
                $.ajax({
                    url: baseUrl + 'index.php/ProcesosController/search_acts',
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
                $('#actDropdown').remove();
                
                const dropdown = $(`
                    <div id="actDropdown" class="position-absolute w-100 bg-white border rounded shadow-sm" 
                        style="top: 100%; left: 0; z-index: 1050; max-height: 300px; overflow-y: auto;">
                    </div>
                `);

                if (acts.length > 0) {
                    acts.forEach(act => {
                        const item = $(`
                            <div class="p-2 hover:bg-gray-100 cursor-pointer">
                                <div class="font-weight-bold">${act.NRO_ACT}</div>
                                <small class="text-muted">${act.APELLIDOS_ACT}, ${act.NOMBRES_ACT}</small>
                            </div>
                        `);

                        item.on('click', function() {
                            selectAct(act);
                            dropdown.remove();
                        });

                        dropdown.append(item);
                    });
                } else {
                    dropdown.append(`
                        <div class="p-2 text-center text-muted">
                            No se encontraron resultados
                        </div>
                    `);
                }

                searchInput.closest('.input-group').append(dropdown);
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