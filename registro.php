<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>DevFinder - Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/registro.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<img class="wave" src="img/logos/wave.png">
	<div class="contenedor">
		<div class="img">
			<img src="img/logos/progra.svg">
		</div>
		<div class="login-content">
			<form action="ajax/login.php" method="POST">
				<h2 class="title">Registrate!</h2>
          <h4 id="label-tipo-cuenta">¿Qué tipo de cuenta deseas crear?</h4>
           		<div class="input-div">
           		   <div class="i"> 
           		   </div>
           		   <div class="div">
           		    	<select id="slc-tipo-cuenta" name="slc-tipo-cuenta" class="input">
                      		<option value="0" selected>Tipo de Cuenta</option>
                    	</select>
            	   </div>
            	</div>
           		<div class="input-div one d-none" id="div-nombre">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 class="h5">Nombre</h5>
           		   		<input type="text" class="input" id="txt-nombre">
           		   </div>
           		</div>
               <div class="input-div one d-none" id="div-apellido">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 class="h5">Apellido</h5>
           		   		<input type="text" class="input" id="txt-apellido">
           		   </div>
           		</div>
               <div class="input-div one d-none" id="div-correo">
           		   <div class="i">
           		   		<i class="fas fa-envelope-open-text"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 class="h5">Correo</h5>
           		   		<input type="email" class="input" id="txt-correo">
           		   </div>
           		</div>
               <div class="input-div one d-none" id="div-contraseña">
           		   <div class="i">
           		   		<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 class="h5">Contraseña</h5>
           		   		<input type="password" class="input" id="txt-contraseña">
           		   </div>
           		</div>
               <div class="input-div one d-none" id="div-repetir-contraseña">
           		   <div class="i">
           		   		<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 class="h5">Repetir contraseña</h5>
           		   		<input type="password" class="input" id="txt-repetir-contraseña">
           		   </div>
           		</div>
               <div class="input-div one d-none" id="div-telefono">
           		   <div class="i">
           		   		<i class="fas fa-mobile-alt"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 class="h5">Teléfono</h5>
           		   		<input type="number" class="input" id="txt-telefono">
           		   </div>
           		</div>
				<div class="input-div one d-none" id="div-pais">
           		   <div class="i">
           		   </div>
           		   <div class="div">
           		   		<select id="slc-paises" name="slc-paises" class="input">
                      		<option value="0" selected>¿De que país eres?</option>
                    	</select>
           		   </div>
           		</div>
              	<div class="input-div one d-none" id="div-direccion">
           		   <div class="i">
           		   		<i class="fas fa-street-view"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 class="h5">Dirección</h5>
           		   		<input type="text" class="input" id="txt-direccion">
           		   </div>
           		</div>
            	<input type="button" class="button" value="Registrate" id="btn-signup">
				<div class="text-center">
					<h5 class="h5" id="label-login">¿Ya tienes cuenta?</h5>
            		<h5 class="h5"><a href="login.php" id="registrate">Inicia Sesión Ahora!</a></h5>
				</div>
            </form>
        </div>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/controlador.js"></script>
    <script src="js/login.js"></script>
</body>
</html>