<table>
	<tr>
		<th>Selec</th>
		<th>Nombre</th>
		<th>Cantidad</th>
		<th>Horas en el dia</th>
		<th>Dias en la semana</th>
		<th>Refrigerante</th>

		

	</tr>
	
		<?php
			require_once'../../../src/consultas.php';
			$consultas=new consultas();
			session_start();
			$res=$consultas->consultar_fuente_fijas_electricas_sede(base64_decode($_POST['s']));
			while ($fila=mysqli_fetch_array($res)) {
				echo "<tr>
				<th><input type='checkbox' name='check_f_f' id='check_f_f_".$fila[0]."' value='".$fila[0]."'></th>
						<th>".$fila[2]."</th>
						<th>".$fila[3]."</th>
						<th>".$fila[4]."</th>
						<th>".$fila[5]."</th>
						<th>".$fila[6]."</th>
						

				</tr>";
			}
		?>
	
</table>