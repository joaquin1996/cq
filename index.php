<?php 
// manejo de sesiones
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./img/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
<!--===============================================================================================-->
</head>
<body>

<style>

.login100-form-bgbtn {
    background: -webkit-linear-gradient(right, #9eec42, #0fb7a7, #8BC34A, #009688);
}

.logo-login {
    width: 10rem;
    position: absolute;
    border-radius: 0px 4px 25px 12px;
}

.logo-unesur {
    width: 10rem;
    position: absolute;
	right: 0px;
    border-radius: 4px 0px 12px 25px;
}

</style>

	<div class="limiter">

	<!-- logo de curriculum query -->
    <img src="./img/logo.png" class="logo-login" alt="">
	<!-- logo de unesur en el login -->
	<img src="./img/logo.png" class="logo-unesur" alt="">

		<div class="container-login100 p-index">
			<div class="wrap-login100">
				<form action="login.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Iniciar Sesion
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" name="email" required>
						<span class="focus-input100" data-placeholder="Correo electrónico"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" required>
						<span class="focus-input100" data-placeholder="Contraseña"></span>
					</div>

					<!-- mensajes de respuesta -->
					<?php include './includes/mensajes.php'; ?>

					<?php if (isset($_GET['res'])) : ?>
						<div class="alert alert-danger text-center transicion" role="alert">
							Credenciales incorrectas...
						</div>
					<?php endif; ?>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Entrar
							</button>
						</div>
					</div>
                   
				</form>
				<br>
                <div class="col-md-12">
                    <a href="registrarse.php" style="float:left">Registrate</a>
                    <a href="recuperacion.php" style="float:right">Recuperar contrase&ntilde;a</a>
                </div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/login.js"></script>

</body>
</html>