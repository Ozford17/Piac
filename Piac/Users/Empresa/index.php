<?php
require_once'../../src/consultas.php';
require_once'../bean/renderMenu.php';
$consultas= new consultas();
$render= new renderMenu();
session_start();
if ($_SESSION['sede']==0) {
	header('Location:../../index.php');
	exit();
}


?>
<!DOCTYPE>
<html>
<head>
	<title>Piac-Empresa</title>
	<link rel="shortcut icon" href="../../images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="../../css/empresa.css">
	<link rel="stylesheet" type="text/css" href="../../css/arriba.css">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>|
	
</head>
<body>
<div class="arriba"><img src="../../images/Logo.png"><p>Listado de empresas</p><a href="https://piac.ecoblue.co/index.php?c=1/"> Cerrar sesion</a></p></div>

	<div id="menu">
	<?=$render->render($_SESSION['tipo'],null);?>
	</div>
	<div id="centro">
		<table border="0" >
			<tr id="cabeza">
				<th width="40%">Nombre</th>
				<th width="40%">Ciudad</th>
				<th width="20">Entrar</th>
			</tr>
			<?php

				$res=$consultas->BuscarSedeEmpresa($_SESSION['empresa']);
				while ($fila=mysqli_fetch_array($res)) {
					echo '<tr>';
					echo '<td>'.$fila[1].'</td>';
					echo '<td>'.$fila[2].'</td>';
					echo '<td align="center"><a href="../Sede/home.php?s='.base64_encode($fila[0]).'"><button>Ir</button></a></td>';
					echo '</tr>';
				}

			?>
		</table>
	</div>
		
    
    
    
	<script src="../../lib/js/jquery-min.js"></script>
    <script src="../../js/funcionajax.js"></script>
    <script src="../../lib/js/bootstrap4/jquery-3.1.1.min.js"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>