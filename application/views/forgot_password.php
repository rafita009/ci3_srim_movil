<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
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
        
        .recover-card {
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.15);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            margin: 2rem auto;
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s;
        }
        
        .recover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.75rem 2.5rem rgba(0, 0, 0, 0.2);
        }
        
        .card-header {
            background-color: white;
            padding: 2rem 2rem 1rem;
            border-bottom: none;
            text-align: center;
        }
        
        .card-body {
            padding: 1.5rem 2rem 2rem;
        }
        
        .card-header h1 {
            font-weight: 700;
            color: #3a3b45;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .card-header p {
            color: #858796;
            font-size: 1rem;
            max-width: 90%;
            margin: 0 auto;
        }
        
        .form-control {
            height: 3.25rem;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            border-radius: 0.5rem;
            border: 1px solid #d1d3e2;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        
        .form-control:focus {
            border-color: #bac8f3;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .input-group-text {
            background-color: #4e73df;
            border-color: #4e73df;
            color: white;
        }
        
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            transition: all 0.2s;
        }
        
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
            transform: translateY(-2px);
        }
        
        .btn-primary:active {
            transform: translateY(1px);
        }
        
        .btn-link {
            color: #4e73df;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .btn-link:hover {
            color: #224abe;
            text-decoration: underline;
        }
        
        .footer-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 1rem;
            padding: 1.25rem;
            margin-top: 1rem;
            text-align: center;
            box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .recover-card {
                margin: 1rem;
                border-radius: 0.75rem;
            }
            
            .card-header {
                padding: 1.5rem 1.5rem 1rem;
            }
            
            .card-body {
                padding: 1rem 1.5rem 1.5rem;
            }
        }
        
        .brand-logo {
            max-width: 150px;
            margin-bottom: 1.25rem;
        }
        
        .btn-block {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="recover-card">
                    <div class="card-header">
                        <!-- Logo de la empresa -->
                        <img src="<?php echo base_url();?>public/assets/img/logo.png" alt="Logo" class="brand-logo">
                        <h1>¿Olvidaste tu contraseña?</h1>
                        <p>No te preocupes, te ayudaremos a recuperar el acceso</p>
                    </div>
                    <div class="card-body">
                        <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <?= $this->session->flashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <?= $this->session->flashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?= site_url('LoginController/enviar_recuperacion') ?>" method="post">
                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold mb-2">Correo Electrónico</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           placeholder="Ingresa tu correo electrónico" required>
                                </div>
                                <small class="text-muted">Ingresa el correo electrónico asociado a tu cuenta</small>
                            </div>
                            
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Enviar Contraseña Temporal
                                </button>
                            </div>
                            
                            <div class="text-center">
                                <a href="<?= site_url('LoginController') ?>" class="btn btn-link">
                                    <i class="fas fa-arrow-left me-1"></i>Volver al Login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="footer-card">
                    <p class="mb-0">¿Necesitas ayuda adicional? <a href="#" class="fw-bold">Contacta a soporte</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>