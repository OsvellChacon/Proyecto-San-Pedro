<?php
	require_once "controllers/Usuarios_ctr.php";
	require_once "models/Usuarios_mdl.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/Lo_Dir.css">
    <link rel="shortcut icon" href="views/img/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="views/css/Login.css">
    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/scripts.js"></script>
    <script src="views/js/Estilo.js"></script>
    <title>Colegio San Pedro - Iniciar Sesion</title>
</head>
<body>
	<a href="../" style="text-decoration:none;"><h2 style="color:rgb(0,0,0);">-Colegio San Pedro-</h2></a>
	<div class="container" id="container">		
		<div class="form-container sign-in-container">
		<form action="" method="post">	
			<form action="#">
				<h1>Iniciar Sesion</h1>
				<input type="email" name="ingreso_email" placeholder="Correo" />
				<input type="password" name="ingreso_password" pattern="[A-Za-z0-9_-]{1,15}" placeholder="Contraseña" />
				<a href="#">¿Olvidaste Tu Contraseña?</a>
				<button>Iniciar Sesion</button>
				<?php

					$ingreso_sistema =  new Registro_Ctr();
					$ingreso_sistema -> Ingreso_Admin();

				?>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h3>"El verdadero líder es quien potencializa las capacidades de su equipo, y hace brillar a su gente." <hr> - Osvell Chacon</h3>
				</div>
			</div>
		</div>
	</form>
</body>
</html>