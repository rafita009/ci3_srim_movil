<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
body {
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.login-container img {
    max-width: 180px;
    display: block;
    margin: 0 auto 15px;
}

.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
}

.form-control {
    border-radius: 5px;
    height: 45px;
}

.btn-primary {
    background-color: #0d6efd;
    border: none;
    height: 45px;
    font-size: 16px;
    font-weight: bold;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.input-group-text {
    background-color: white;
    border-left: none;
    cursor: pointer;
}

.form-group input {
    border-right: none;
}

.forgot-password {
    text-align: center;
    margin-top: 15px;
}

.forgot-password a {
    color: #007bff;
    font-weight: bold;
    text-decoration: none;
}

.forgot-password a:hover {
    text-decoration: underline;
}
</style>
</head>

<body>

    <div class="login-container">
        <img src="<?php echo base_url();?>public/assets/img/logo.png" alt="EPM Logo">
        <h2>Iniciar Sesión</h2>
        <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
        <form action="<?= site_url(); ?>/LoginController/validar" method="POST">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="user" id="user" class="form-control" placeholder="Ingrese Usuario" maxlength="15" required>
                </div>
            <div class="form-group">
                <label>Contraseña</label>
                <div class="input-group">
                <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese Contraseña" maxlength="30" required>

                    <div class="input-group-append">
                        <span class="input-group-text" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            <div class="forgot-password">
                <p>¿Olvidaste tu contraseña? <a href="#">Recuperar</a></p>
            </div>
        </form>
    </div>

    <script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
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

    <script>
    $(document).ready(function() {
        $("#togglePassword").click(function() {
            var input = $("#exampleInputPassword");
            var icon = $(this).find("i");

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                input.attr("type", "password");
                icon.removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    });
    </script>

</body>

</html>