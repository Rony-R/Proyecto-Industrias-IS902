<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Dev-Finder - Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<img class="wave" src="img/logos/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/logos/typing.svg">
		</div>
		<div class="login-content">
			<form action="ajax/login.php" method="POST">
				<img src="img/logos/logo1.png">
				<h2 class="title">Bienvenido</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
           		   		<input type="text" class="input" id="txt-correo">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" class="input" id="txt-password">
            	   </div>
            	</div>
            	<a href="#">Olvido su contraseña?</a>
            	<input type="button" class="btn" value="Iniciar Sesion" id="btn-login">
				<div class="text-center">
					<h5 id="label-registrate">¿No tienes cuenta aún?</h5>
            		<a href="registro.php" id="registrate">Registrate!</a>
				</div>
            </form>
        </div>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/controlador.js"></script>
    <script src="js/login.js"></script>
</body>
</html>