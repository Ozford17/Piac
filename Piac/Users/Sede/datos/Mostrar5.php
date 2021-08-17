<table>
	<tr>
		
		<th>Tipo</th>
		<th>Cantidad</th>
		<th>Potencia</th>
		<th>Horas de uso</th>
		<th>Dias de uso</th>
		
		


	</tr>
	
		<?php
			require_once'../../../src/consultas.php';
			$consultas=new consultas();
			session_start();
			$res=$consultas->consultar_fuente_luminaria_sede(base64_decode($_POST['s']));
			while ($fila=mysqli_fetch_array($res)) {
				echo "<tr>
						<th>".$fila[2]."</th>
						<th>".$fila[3]."</th>
						<th>".$fila[4]."</th>
						<th>".$fila[5]."</th>
						<th>".$fila[6]."</th>";
						
						
						
						
				echo "</tr>";
			}
		?>
	
</table>