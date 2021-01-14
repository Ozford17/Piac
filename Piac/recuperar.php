<!DOCTYPE html>
<html>
<head>
	<title>Recuperar contraseña</title>
	<link rel="shortcut icon" href="images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<div class="arriba">	</div>
	<div id="abajo_recu">
		<div id="iz">
			<img src="images/Logo.png">
		</div>
		<div id="de">
			<div>
				<form action="bean/recuperar.php" method="POSt"> 
					<label id="subtitulo">Recuperar Contraseña</label><br>
					<label>Usuario</label>
					<input type="text" name="usu"><br>
					<input type="submit" name="Enviar" value="Enviar">
				</form>
			</div>
		</div>
		
	</div>

</body>
</html>
<?php
if (isset($_GET['ok'])) {
	if ($_GET['ok']==1) {
		echo "<script languaje='javascript'>alert('Se envio su contraseña al correo')</script>";
	}
	else{
		echo "<script languaje='javascript'>alert('no se encontro el Usuario')</script>";
	} 
}
?>