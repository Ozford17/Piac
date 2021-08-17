<table>
	<tr>
		<th>Select</th>
		<th>#</th>
		<th>Placa</th>
		<th>Potencia</th>
		<th>Horas de carga</th>
		<th>Dias de uso</th>
		<th>Refrigerante</th>
		<th>Fecha de incorporación <br>a la flota</th>

	</tr>
	
		<?php
			require_once'../../../src/consultas.php';
			$consultas=new consultas();
			session_start();
			$cont=1;
			$res=$consultas->consultar_fuente_movil_electricas_sede(base64_decode($_POST['s']));
			while ($fila=mysqli_fetch_array($res)) {
				echo "<tr>
						<td><input type='checkbox' name='check_f_f_m_e' id='check_f_f_m_e".$fila[0]."' value='".$fila[0]."'></td>
						<th>".$cont."</th>
						<th>".$fila[2]."</th>
						<th>".$fila[3]."</th>
						<th>".$fila[4]."</th>
						<th>".$fila[5]."</th>
						<th>".$fila[6]."</th>
						<th>".$fila[7]."</th>


						
				</tr>";
				$cont++;
			}

		?>
	
</table>