<?php
		require_once"../../../src/consultas.php";
		$consultas= new consultas();
		$s=$_GET['s'];
		session_start();
		$cod=base64_decode($s);
		if ($_SESSION['sede']==0) {
		header('Location:../../index.php');
		exit();
		}
		?>
<!DOCTYPE >
<html>
<head>
	<title>Huella de carbono</title>
	<link rel="shortcut icon" href="../../../images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="../../../css/sede.css">
	<link rel="stylesheet" type="text/css" href="../../../css/arriba.css">
	
</head>
<body>
	<div class="arriba"><img src="../../../images/Logo.png"><p style="margin-left: 40%;">Huella hidrica</p><p id="Cerrar"><a href="https://piac.ecoblue.co/" > Cerrar sesion</a></p></div>
	<?php require '../Coditas/Menu.php'?>
<div id="centro_hidrico">
	<form action="prove/A_hidrico.php" method="POST">
	<div id="azul">
		<img src="../../../images/azul.png">
		<label for="t_azul">Ingrese el valor en m3 del consumo que aparece en su factura</label>
		<input type="text" name="azul" id="t_azul" value="0">
	</div>
	<div id="gris">
		<img src="../../../images/gris.png">
		<label for="t_gris">Ingrese la cantidad en m3 de la cantidad de agua dulce para diluir la contaminacion</label>
		<input type="text" name="gris" id="t_gris" value="0">
	</div>	
	<div id="verde">
			<img src="../../../images/verde.png">
			<label for="t_verde">Ingrese el valor en mm del valor de agua recogia. Este valor lo encuentra en la estacion Metereologica del IDAM mas cercana. esta informacion se encuentra buscado en la estacion metereologica de su ciudad por google</label>
			<input type="text" name="verde" id="t_verde" value="0">
		</div>
		<input type="text" name="sede" value="<?echo $cod?>" hidden>
		<input type="submit" name="Enviar" value="Enviar">
	</form>

</div>
<script src="../../../lib/js/jquery-min.js"></script>
<script src="../../../js/funcionajax.js"></script>
<script src="../../../lib/js/bootstrap4/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>