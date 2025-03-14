<!-- Archivo: views/auth/cambio_obligatorio.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña Obligatorio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    :root {
        --primary: #4e73df;
        --secondary: #858796;
        --success: #1cc88a;
        --info: #36b9cc;
        --warning: #f6c23e;
        --danger: #e74a3b;
        --light: #f8f9fc;
        --dark: #5a5c69;
    }

    body {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        font-family: 'Nunito', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .section-card {
        background-color: #fff;
        border-radius: 0.35rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        padding: 2rem;
        border: 1px solid #e3e6f0;
    }

    .section-title {
        color: #4e73df;
        font-weight: 700;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
    }

    .form-control {
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
        font-size: 0.85rem;
        border: 1px solid #d1d3e2;
    }

    .form-control:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .form-label {
        font-weight: 600;
        color: #5a5c69;
    }

    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        padding: 0.75rem;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .btn-primary:hover {
        background-color: #224abe;
        border-color: #224abe;
    }

    .alert {
        border-radius: 0.35rem;
        border: 1px solid transparent;
    }

    .text-muted {
        font-size: 0.8rem;
    }

    /* Logo o imagen corporativa */
    .brand-logo {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .brand-logo img {
        max-height: 80px;
    }

    /* Animación sutil para el formulario */
    .section-card {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Footer */
    .footer-text {
        text-align: center;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 2rem;
        font-size: 0.8rem;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="section-card mt-3 mb-3">
                    <!-- Opcional: Logo de la empresa -->
                    <div class="brand-logo">
                        <img src="<?php echo base_url();?>public/assets/img/logo.png" alt="Logo" class="img-fluid">
                    </div>

                    <h2 class="section-title text-center">Cambio de Contraseña Obligatorio</h2>

                    <?php if(validation_errors()): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <?= validation_errors() ?>
                    </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <?= $this->session->flashdata('error') ?>
                    </div>
                    <?php endif; ?>

                    <p class="text-center mb-4">Por motivos de seguridad, debes cambiar tu contraseña temporal por una
                        nueva.</p>

                    <form action="<?= site_url('LoginController/procesar_cambio_obligatorio') ?>" method="post">
                        <!-- Campo de nueva contraseña modificado -->
                        <div class="mb-3">
                            <label for="nueva_contrasena" class="form-label">Nueva Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="nueva_contrasena"
                                    name="nueva_contrasena" required>
                                <!-- El toggle se agregará por JavaScript -->
                            </div>
                            <small class="text-muted">La contraseña debe tener al menos 6 caracteres.</small>
                        </div>

                        <!-- Campo de confirmar contraseña modificado -->
                        <div class="mb-4">
                            <label for="confirmar_contrasena" class="form-label">Confirmar Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="confirmar_contrasena"
                                    name="confirmar_contrasena" required>
                                <!-- El toggle se agregará por JavaScript -->
                            </div>
                            <div id="passwordMatchFeedback" class="invalid-feedback" style="display: none;">
                                Las contraseñas no coinciden.
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key me-2"></i>Cambiar Contraseña
                            </button>
                        </div>
                    </form>
                </div>

                <div class="footer-text">
                    &copy; <?= date('Y') ?> Sistema SCRIM. Todos los derechos reservados.
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para mostrar/ocultar contraseña (opcional) -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Primero, modifiquemos la estructura del HTML para agregar los íconos de toggle
    const nuevaContrasenaInput = document.getElementById('nueva_contrasena');
    const confirmarContrasenaInput = document.getElementById('confirmar_contrasena');
    
    // Agregar botón de toggle para nueva contraseña
    const nuevaContrasenaParent = nuevaContrasenaInput.parentElement;
    const nuevaContrasenaToggle = document.createElement('span');
    nuevaContrasenaToggle.className = 'input-group-text';
    nuevaContrasenaToggle.id = 'toggleNuevaContrasena';
    nuevaContrasenaToggle.innerHTML = '<i class="fas fa-eye"></i>';
    nuevaContrasenaToggle.style.cursor = 'pointer';
    nuevaContrasenaParent.appendChild(nuevaContrasenaToggle);
    
    // Agregar botón de toggle para confirmar contraseña
    const confirmarContrasenaParent = confirmarContrasenaInput.parentElement;
    const confirmarContrasenaToggle = document.createElement('span');
    confirmarContrasenaToggle.className = 'input-group-text';
    confirmarContrasenaToggle.id = 'toggleConfirmarContrasena';
    confirmarContrasenaToggle.innerHTML = '<i class="fas fa-eye"></i>';
    confirmarContrasenaToggle.style.cursor = 'pointer';
    confirmarContrasenaParent.appendChild(confirmarContrasenaToggle);
    
    // Función para alternar visibilidad de contraseña
    function togglePasswordVisibility(inputElement, toggleElement) {
        const icon = toggleElement.querySelector('i');
        
        if (inputElement.type === 'password') {
            inputElement.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            inputElement.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    
    // Añadir eventos click a los toggles
    document.getElementById('toggleNuevaContrasena').addEventListener('click', function() {
        togglePasswordVisibility(nuevaContrasenaInput, this);
    });
    
    document.getElementById('toggleConfirmarContrasena').addEventListener('click', function() {
        togglePasswordVisibility(confirmarContrasenaInput, this);
    });
    
    // Validar que las contraseñas coincidan en tiempo real
    function validarContrasenas() {
        const nuevaContrasena = nuevaContrasenaInput.value;
        const confirmarContrasena = confirmarContrasenaInput.value;
        
        // Solo validar si ambos campos tienen contenido
        if (nuevaContrasena && confirmarContrasena) {
            if (nuevaContrasena !== confirmarContrasena) {
                confirmarContrasenaInput.setCustomValidity('Las contraseñas no coinciden');
                confirmarContrasenaInput.style.borderColor = '#e74a3b';
            } else {
                confirmarContrasenaInput.setCustomValidity('');
                confirmarContrasenaInput.style.borderColor = '#1cc88a';
            }
        } else {
            confirmarContrasenaInput.setCustomValidity('');
            confirmarContrasenaInput.style.borderColor = '';
        }
    }
    
    // Añadir eventos para validar contraseñas
    nuevaContrasenaInput.addEventListener('input', validarContrasenas);
    confirmarContrasenaInput.addEventListener('input', validarContrasenas);
    
    // Validar formulario antes de enviar
    document.querySelector('form').addEventListener('submit', function(event) {
        validarContrasenas();
        
        if (!this.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
});
    </script>
</body>

</html>