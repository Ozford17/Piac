<?php

if (is_array($_POST['codigo']) && isset($_GET['f'])) {
	require_once'../../../src/consultas.php';
	$consultas=new consultas();

	/*----------------------------***************** Fuenetes Fijas ************************---------------------------------------------*/
	if ($_GET['f']=="f_f") {
		echo "<script>
	
		$('#formulario_el_f_f').submit(function(e){
					$.ajax({
	      				url: \"../datos/eliminar_f_f.php\",
	      				type: \"POST\",
	     				 dataType:\"html\",
	     				 data: $('#formulario_el_f_f').serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	      				  	$('#div_de_eliminacion').html(data);
	        				$('#div_de_eliminacion').modal();
	        				$('#tabla_fuente_fija').load(\"../datos/Mostrar1.php\",{s:'".$_POST['s']."'});
	      				}
	    				});
			});	
		</script>";

		$codigo=$_POST['codigo'];
		echo "<form id='formulario_el_f_f' method='POST' action='javascript:Enviar_eliminar_f_f.focus;'><table width='100%'> 
				<tr>
					<th>Nombre equipo</th>
					<th>Cantidad equipos<br> a eliminar</th>
					<th>Observación</th>
				</tr>
		";
		for ($i=0; $i <count($codigo) ; $i++) { 
		
			$res=$consultas->consultar_fuente_fijas_sede(base64_decode($_POST['s']));
			while ($fila=mysqli_fetch_array($res)) {
				if ($fila[0]==$codigo[$i]) {
					echo ' 
					<tr>
						<td colspan="2">  <input type="number" name="codigo[]" value="'.$fila[0].'" hidden></td>
					</tr>
					<tr>
						
						<td>'.$fila[2].'</td>
						<td><input type="number" name="cantidad[]" placeholder="0" max="'.$fila[3].'" min="0" required></td>
						<td><input type="text" name="observacion[]" required></td>
					</tr>';
				}
			}		
			
		}
		echo '<tr><td colspan="2"><input s type="submit" name="Enviar_eliminar_f_f" id="Enviar_eliminar_f_f" Value="Eliminar"></td></tr>';
		echo "</table></form>";
	}
	/*--------------------------------------------************** FUENTES FIJAS ELECTRICAS *********************------------------------*/
	else if($_GET['f']=="f_f_e"){
		echo "<script>
	
		$('#Enviar_eliminar_f_f').click(function(e){
					$.ajax({
	      				url: \"../datos/eliminar_f_f_e.php\",
	      				type: \"POST\",
	     				 dataType:\"html\",
	     				 data: $('#formulario_el_f_f_e').serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	      				  	$('#div_de_eliminacion').html(data);
	        				$('#div_de_eliminacion').modal();
	        				$('#tabla_fuente_fija_electrica').load(\"../datos/Mostrar2.php\",{s:'".$_POST['s']."'});
	      				}
	    				});
			});	
		</script>";

		$codigo=$_POST['codigo'];
		echo "<form id='formulario_el_f_f_e' method='POST' action='javascript:Enviar_eliminar_f_f.focus;'><table width='100%'> 
				<tr>
					<th>Nombre equipo</th>
					<th>Cantidad equipos<br> a eliminar</th>
					<th>Observación</th>
				</tr>
		";
		for ($i=0; $i <count($codigo) ; $i++) { 
		
			$res=$consultas->consultar_fuente_fijas_electricas_sede(base64_decode($_POST['s']));
			while ($fila=mysqli_fetch_array($res)) {
				if ($fila[0]==$codigo[$i]) {
					echo ' 
					<tr>
						<td colspan="2">  <input type="number" name="codigo[]" value="'.$fila[0].'" hidden></td>
					</tr>
					<tr>
						
						<td>'.$fila[2].'</td>
						<td><input type="number" name="cantidad[]" placeholder="0" max="'.$fila[3].'" min="0"></td>
						<td><input type="text" name="observacion[]"></td>
					</tr>';
				}
			}		
			
		}
		echo '<tr><td colspan="2"><input s type="submit" name="Enviar_eliminar_f_f" id="Enviar_eliminar_f_f" Value="Eliminar"></td></tr>';
		echo "</table></form>";
	}
	/*---------------------------******************* FUENTES MOVILES **********************---------------------------------------------*/
	else if($_GET['f']=="f_m"){
		$codigo=$_POST['codigo'];
		echo "<script>
	
		$('#Enviar_eliminar_f_m').click(function(e){
			var cuantos=".count($codigo).";
			var ok='false';
			for( i=0; i<cuantos; i++){
				var observacion = $('#observacion'+i).val();			
				if(observacion ==''){				
					ok='true';
					break;
					alert('entro aqui=');
				}	
			}

			if(ok=='false'){
			alert(ok);	
			
					$.ajax({
	      				url: \"../datos/eliminar_f_m.php\",
	      				type: \"POST\",
	     				 dataType:\"html\",
	     				 data: $('#formulario_el_f_m').serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	      				  	$('#div_de_eliminacion').html(data);
	        				$('#div_de_eliminacion').modal();
	        				$('#tabla_fuente_movil').load(\"../datos/Mostrar3.php\",{s:'".$_POST['s']."'});
	        				$('#tabla_fuente_movil_electrico').load(\"../datos/Mostrar4.php\",{s:'".$_POST['s']."'});
	      				}
	    				});
	    	}
		});	
		
		</script>";

		
		echo "<form id='formulario_el_f_m' method='POST' action='javascript:Enviar_eliminar_f_m.focus;'><table width='100%'> 
				<tr>
					<th>Placa</th>
					<th>Razon del la eliminacion</th>
				</tr>
		";
		for ($i=0; $i <count($codigo) ; $i++) { 
		
			$res=$consultas->consultar_fuente_moviles_placa_c($codigo[$i]);
			while ($fila=mysqli_fetch_array($res)) {
				echo ' 
					<tr>
						<td colspan="2">  <input type="number" name="codigo[]" value="'.$fila[0].'" hidden></td>
					</tr>
					<tr>
						
						<td>'.$fila[4].'</td>
						<td><input type="text" name="observacion[]" required="" id="observacion'.$i.'"></td>
					</tr>';
				
			}		
			
		}
		echo '<tr><td colspan="2"><input s type="submit" name="Enviar_eliminar_f_m" id="Enviar_eliminar_f_m" Value="Eliminar"></td></tr>';
		echo "</table></form>";
	}
	/*---------------------------******************* FUENTES MOVILES **********************---------------------------------------------*/
	else if($_GET['f']=="f_m_e"){
		$codigo=$_POST['codigo'];
		echo "<script>
	
		$('#Enviar_eliminar_f_m_e').click(function(e){
			var cuantos=".count($codigo).";
			var ok='false';
			for( i=0; i<cuantos; i++){
				var observacion = $('#observacion'+i).val();			
				if(observacion ==''){				
					ok='true';
					break;
					alert('entro aqui=');
				}	
			}

			if(ok=='false'){
			alert(ok);	
			
					$.ajax({
	      				url: \"../datos/eliminar_f_m_e.php\",
	      				type: \"POST\",
	     				 dataType:\"html\",
	     				 data: $('#formulario_el_f_m_e').serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	      				  	$('#div_de_eliminacion').html(data);
	        				$('#div_de_eliminacion').modal();
	        				$('#tabla_fuente_movil').load(\"../datos/Mostrar3.php\",{s:'".$_POST['s']."'});
	        				$('#tabla_fuente_movil_electrico').load(\"../datos/Mostrar4.php\",{s:'".$_POST['s']."'});
	      				}
	    				});
	    	}
		});	
		
		</script>";

		
		echo "<form id='formulario_el_f_m_e' method='POST' action='javascript:Enviar_eliminar_f_m.focus;'><table width='100%'> 
				<tr>
					<th>Placa</th>
					<th>Razon del la eliminacion</th>
				</tr>
		";
		for ($i=0; $i <count($codigo) ; $i++) { 
		
			$res=$consultas->consultar_fuente_movil_electricas_placa($codigo[$i]);
			while ($fila=mysqli_fetch_array($res)) {
				echo ' 
					<tr>
						<td colspan="2">  <input type="number" name="codigo[]" value="'.$fila[0].'" hidden></td>
					</tr>
					<tr>
						
						<td>'.$fila[4].'</td>
						<td><input type="text" name="observacion[]" required="" id="observacion'.$i.'"></td>
					</tr>';
				
			}		
			
		}
		echo '<tr><td colspan="2"><input s type="submit" name="Enviar_eliminar_f_m_e" id="Enviar_eliminar_f_m" Value="Eliminar"></td></tr>';
		echo "</table></form>";
	}
}
?>