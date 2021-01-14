<!DOCTYPE html>
<html>
<head>
	<title>PIAC</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="src/js/jquery-3.4.1.min.js"></script>
	<link rel="shortcut icon" href="images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script>
		$(document).ready(function(){
			$('#formulario').submit(function(){
				$.ajax({
					url:"bean/adentro.php",
					type:"POST",
					dataType:"HTML",
					data:$('#formulario').serialize(),
					success:function(data){
						let men = (atob(data));
						var para= jQuery.parseJSON(men);
						if (para.error=="true") {
							alert(para.mensaje);
						}
						else
						{
							window.location=para.direc;
						}
					}
				})
			});
		});
	</script>
</head>
<body>
	<div class="arriba">	</div>
	<div class="centro">
		<img id="Logo"src="images/Logo.png">
		<form id="formulario" method="post" action="javascript:Entrar.focus();">
			<label>Usuario</label><br>
			<input type="text" name="nombre_usuario" required=""><br>
			<label>Contraseña</label><br>
			<input type="password" name="contraseña" required=""><br>
			<br>
			<a href="recuperar.php">¿Olvidaste la contraseña?</a><br><br>
			<a href="https://www.ecoblue.co/#escribir">Pedir Registrarme</a><br>
			<input type="submit" value="Entrar" id="Entrar">
		</form>
	<div>

</body>
</html>
<?php
if(isset($_GET['c']))
{
	session_start();
	session_destroy();
	header('Location:https://www.piac.ecoblue.co/');
	exit();
}
?>