
<table>
	<tr>
		<th>Selec</th>
		<th></th>
		<th>Nombre</th>
		<th>Cantidad</th>
		<th>Combustible</th>
		<th>Fecha <br>funcionamiento</th>
		<th>Fecha de subida <br>al sistema</th>
		<th>Refrigerante</th>
	</tr>
	
		<?php
			require_once'../../../src/consultas.php';
			$consultas=new consultas();
			session_start();
			
			$res=$consultas->consultar_fuente_fijas_sede(base64_decode($_POST['s']));
			$cont=0;
			while ($fila=mysqli_fetch_array($res)) {
				$cont++;
				echo "<tr>
						<td><input type='checkbox' name='check_f_f' id='check_f_f_".$fila[0]."' value='".$fila[0]."'></td>
						<td>".$cont."</td>
						<td>".$fila[2]."</td>
						<td>".$fila[3]."</td>
						<td>".$fila[4]."</td>
						<td>".$fila[5]."</td>
						<td>".$fila[6]."</td>
						<td>".$fila[7]."</td>
				</tr>";
			}
		?>
	
</table>