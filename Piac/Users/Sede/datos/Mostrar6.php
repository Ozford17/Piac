<table width="100%">
	<tr>
		<th width="30%;">Tipo</th>
		<th>Cantidad</th>
		<th>Peso</th>
		<th>Fecha subida</th>
	</tr>
<?php 
	require_once'../../../src/consultas.php';
	$consultas= new consultas();

	$resp=$consultas->fuentes_extintores_sede(base64_decode($_POST['s']));
	while ($fila=mysqli_fetch_array($resp)) {
		echo "
			<tr>
				<td>".$fila[1]."</td>
				<td>".$fila[2]."</td>
				<td>".$fila[5]."</td>
				<td>".$fila[6]."</td>
			</tr>
		";
	}
 ?>