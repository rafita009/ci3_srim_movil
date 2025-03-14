<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema SCRIM">
    <meta name="author" content="">

    <title>Sistema SCRIM - Iniciar Sesión</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4e73df;
            --primary-dark: #224abe;
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
            justify-content: center;
            align-items: center;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.75rem 2.5rem rgba(0, 0, 0, 0.2);
        }

        .login-container img {
            max-width: 150px;
            display: block;
            margin: 0 auto 1.5rem;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: #3a3b45;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: #5a5c69;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            border-radius: 0.5rem;
            height: 3.25rem;
            font-size: 0.9rem;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d3e2;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: #bac8f3;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }

        .input-group {
            position: relative;
        }

        .input-group-append {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            z-index: 10;
        }

        .input-group-text {
            background-color: transparent;
            border: none;
            height: 100%;
            display: flex;
            align-items: center;
            padding: 0 1rem;
            color: #6e707e;
            cursor: pointer;
            transition: color 0.2s;
        }

        .input-group-text:hover {
            color: var(--primary);
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            height: 3.25rem;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .btn-primary:active {
            transform: translateY(1px);
        }

        .btn-block {
            width: 100%;
        }

        .forgot-password {
            text-align: center;
            margin-top: 1.5rem;
        }

        .forgot-password a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-password a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .alert {
            border-radius: 0.5rem;
            border: none;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-danger::before {
            content: '\f071';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            margin-right: 0.75rem;
            font-size: 1.1rem;
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

        @media (max-width: 576px) {
            .login-container {
                padding: 2rem;
                margin: 1rem;
                border-radius: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="<?php echo base_url();?>public/assets/img/logo.png" alt="Logo del Sistema">
        <h2>Iniciar Sesión</h2>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        
        <form action="<?= site_url(); ?>/LoginController/validar" method="POST">
            <div class="form-group">
                <label for="user">Usuario</label>
                <input type="text" name="user" id="user" class="form-control" 
                    placeholder="Ingrese su nombre de usuario" maxlength="15" required>
            </div>
            
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <div class="input-group">
                    <input type="password" name="contrasena" id="contrasena" class="form-control" 
                        placeholder="Ingrese su contraseña" maxlength="30" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
            </button>
            
            <div class="forgot-password">
                <p>¿Olvidaste tu contraseña? <a href="<?php echo site_url();?>/LoginController/forgot_password">Recuperar</a></p>
            </div>
        </form>
    </div>

    <!-- Script para mostrar/ocultar contraseña -->
    <script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("contrasena");
        var icon = this.querySelector("i");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>public/assets/js/sb-admin-2.min.js"></script>
</body>

</html>