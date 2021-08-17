<table>
	<tr>
		<th>Selec</th>
		<th>Nombre</th>
		<th>Cantidad</th>
		<th>Horas en el dia</th>
		<th>Dias en la semana</th>
		<th>Refrigerante</th>
		<th>Fecha <br> Funcionamiento</th>

		

	</tr>
	
		<?php
			require_once'../../../src/consultas.php';
			$consultas=new consultas();
			session_start();
			$res=$consultas->consultar_fuente_fijas_electricas_sede(base64_decode($_POST['s']));
			
			while ($fila=mysqli_fetch_assoc($res)) {
				echo "<tr>
				<th><input type='checkbox' name='check_f_f' id='check_f_f_".$fila["Cod"]."' value='".$fila["Cod"]."'></th>
						<th>".$fila["Nombre"]."</th>
						<th>".$fila["Cantidad"]."</th>
						<th>".$fila["Horas"]."</th>
						<th>".$fila["Dias"]."</th>
						<th>".$fila["Refrigerante"]."</th>
						<th>".$fila["Fecha"]."</th>
				</tr>";
			}
		?>
	
</table>