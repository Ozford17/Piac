<table>
	<tr>
		<th>Selec</th>
		<th></th>
		<th>Marca Vehiculo</th>
		<th>Tipo</th>
		<th>Placa</th>
		<th>Combustible</th>
		<th>Fecha de incorporacion <br>	a la flota</th>
		<th>Refrigerante</th>

	</tr>
	
		<?php
			require_once'../../../src/consultas.php';
			$consultas=new consultas();
			session_start();
			$cont=1;
			$res=$consultas->consultar_fuente_movil_sede(base64_decode($_POST['s']));
			while ($fila=mysqli_fetch_array($res)) {
				echo "<tr>
						<td><input type='checkbox' name='check_f_f_m' id='check_f_f_m_".$fila[0]."' value='".$fila[0]."'></td>
						<td>".$cont."</td>
						<th>".$fila[2]."</th>";
						if ($fila[3]=="1") {
							echo "<th>Combustible fosil</th>";
						}
						else{
							echo "<th> Hibrido</th>";
						}
						echo "
						<th>".$fila[4]."</th>
						<th>".$fila[5]."</th>
						<th>".$fila[6]."</th>
						<th>".$fila[7]."</th>
				</tr>";
				$cont++;
			}
		?>
	
</table>