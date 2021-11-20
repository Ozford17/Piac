<?php
session_start();
if (empty($_SESSION['nombre']) ){
	{
		header('location:../../bean/cerrar.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../../images/Logo.png" />
	<title>PIAC</title>
	<script type="text/javascript" src="../../src/js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$('#Cerrar').click(function(e){
				e.preventDefault();
				window.location=('../../bean/cerrar.php');
			});
		});
		
	</script>
	<style>
		.arriba #Cerrar{
			position: absolute;
			margin-top: 1vw;
			margin-left: 85%;
			color: white;
			font-size: 1.5vw;
			cursor: pointer;

		}
		a:link{
			text-decoration: none;
		}
		a{
			color: white;
		}
	</style>
</head>
<body>
	<div class="arriba"><img src="../../images/Logo.png"> <p id="Cerrar"> Cerrar sesion</p></div>

	<div id="menu">
	<div id="imagenes"><img src="../../images/admin/empresa.png" id="Empresa"><p>EMPRESA</p><hr></p></div>
	<div id="imagenes"><img src="../../images/admin/usuario.png" id="Usuario"><p>USUARIOS</p><hr></p></div>
	<div id="imagenes"><img src="../../images/admin/registro.png" id="Registro"><p>REGISTRO</p><hr></p></div>
	</div>
	<div>
		<div id="mostrar" style="margin-left: 5%; width: 90%; height: 50vw; border: 5px white inset; margin-bottom: 10vw; position: relative; "></div>
	</div>
		
    
    
    
	<script src="../../lib/js/jquery-min.js"></script>
    <script src="../../js/funcionajax.js"></script>
    <script src="../../lib/js/bootstrap4/jquery-3.1.1.min.js"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>