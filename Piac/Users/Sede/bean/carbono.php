<?php
	require_once"../../../src/consultas.php";
	$consultas= new consultas();
	session_start();
	$s=$_GET['s'];
	$cod=base64_decode($s);
	if ($_SESSION['sede']==0) {
		header('Location:../../index.php');
		exit();
	}
?>
<!DOCTYPE >
<html>
<head>
	<meta http-equiv="Content-type"  content="text/html;  charset=utf-8">
	<title>Huella de carbono</title>
	<link rel="shortcut icon" href="../../../images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="../../../css/sede.css">
	<link rel="stylesheet" type="text/css" href="../../../css/arriba.css">
	<script type="text/javascript">
	</script>
	<style>	
		a:link{
			text-decoration: none;
		}
		a{
			color: black;
		}
		span{
			color: red;
		}
	</style>
</head>
<body>
	<div class="arriba"><img src="../../../images/Logo.png"><p style="margin-left: 40%;">Huella de carbono</p><a href="https://piac.ecoblue.co/" > Cerrar sesion</a></p></div>
	<div id="menu">
		<a href="sede.php?s=<?php echo $s?>"><button><p>Datos de la Sede</p></button></a>
		<a href="solido.php?s=<?php echo $s?>"><button><p>Corriente de residuos</p></button></a>
		<a href="carbono.php?s=<?php echo $s?>"><button><p>Huella de Carbono</p></button></a>
		<a href="hidirico.php?s=<?php echo $s?>"><button><p>Huella Hidrica</p></button></a>
		<a href="informes.php?s=<?php echo $s?>"><button><p>Informes</p></button></a>
	</div>
	<div id="centro_huella">
		<center><p style="color:black;">Reporte de consumos.</p></center><br>	
		<p style="color: black; text-align:justify; font-size: 1.0vw; width: 90%; margin-left: 5%;">En esta sección debemos registrar mensualmente los consumos teniendo en cuenta los alcances uno y dos. <br>	
		A continuación, puedes escoger el mes en el cual vas a realizar el cargue de la información correspondiente, teniendo en cuenta los principios establecidos para la cuantificación de gases de efecto invernadero GEI: 
		Integridad, transparencia, precisión, consistencia y relevancia para garantizar un inventario coherente con las actividades realizadas.</p>
		<table width="100%" style="">
			<?php 	
			$meses= array();
			$datos=array();
			$mes=array();
			$subido=false;
				$resp=$consultas->consultar_grafica_co2_alcance1(base64_decode($s),"2019");
				while ($fila=mysqli_fetch_array($resp)) {
					$mes[]=$fila[0];
					$datos[]=$fila[1];
				}
				for ($b=0; $b <count($mes) ; $b++) { 
					if(isset($_GET['f'])) 
					{
						if ((base64_decode($_GET['f'])==$mes[$b])) {
							$subido=true;
							break;
						}
						else
						{
							$subido=false;
						}
						
					}
					else if (date('m')==$mes[$b]) {
						$subido=true;
						break;
					}
					else  {
						$subido=false;
					}
				}

					for ($i=1; $i <=12 ; $i++) { 
					$bandera=false;
							for ($a=0; $a <count($mes) ; $a++) { 

								if ($i==$mes[$a]) { 
									
									$ton="Ton CO2eq";
									$me= number_format($datos[$a]/1000, 2,'.','');
									$meses[]=$me.$ton;
									$bandera=true;
									break;
								}
							}
							if (!$bandera) {
								if($i<date("m")){
									if($i<10){

											$meses[]= '<a href="carbono.php?s='.$_GET["s"]."&f=".base64_encode("0".$i)."&a=".base64_encode(date("Y")).'"><span>'.'Pendiente'.'</span> </a>';
										}
										else{
											$meses[]= '<a href="carbono.php?s='.$_GET["s"]."&f=".base64_encode($i)."&a=".base64_encode(date("Y")).'"><span>'.'Pendiente'.'</span> </a>';
										}

								}
								else
								{
									$meses[]= '<span>'.'Pendiente'.'</span>';
								}
								
							}	
				}
			 ?>
			<tr>
				<a href=""></a>
				<td>Enero: <?=$meses[0];?></td>
				<td>Febrero: <?=$meses[1];?></td>
				<td>Marzo: <?=$meses[2];?></td>
				<td>Abril: <?=$meses[3];?></td>
			</tr>
			<tr>
				<td>Mayo: <?=$meses[4];?></td>
				<td>Junio: <?=$meses[5];?></td>
				<td>Julio: <?=$meses[6];?></td>
				<td>Agosto: <?=$meses[7];?></td>

			</tr>
			<tr>
				<td>Septiembre: <?=$meses[8];?></td>
				<td>Octubre: <?=$meses[9];?></td>
				<td>Noviembre: <?=$meses[10];?></td>
				<td>Diciembre: <?=$meses[11];?></td>
			</tr>

		</table>
	</div>
	<div id="centro_huella" style="">
		<div style="text-align: right!important; margin-right: 5%;"> Mes de registro: 
			<?php 
			if(isset($_GET['f'])){
				$fecha_registro= base64_decode($_GET['f']);

				$año_registro=base64_decode($_GET['a']);
				
				$fecha = DateTime::createFromFormat('!m', $fecha_registro);
				$mes = $fecha->format('F');
				
						$fechita=$año_registro."-".$fecha_registro."-01"; 	
				
				$fecha_total=$fechita;
				echo $mes;
			}else{
				echo date('F');
				$fecha_total=date('Y')."-".date('m')."-".date('d');
			}
			?>
			
		</div>
		<h3><p id="subtitulo">Huella de carbono</p></h3>
		<div>
			<h2>ALCANCE 1</h2>
			<p style="text-align: center; color:black; font-size: 1.2vw; width: 80%;margin-left: 10%;">Corresponde a las emisiones generadas por combustión.<br>Aquí debes registrar los consumos mensuales de combustibles (sólidos, líquidos o gaseosos) según sea el caso, de acuerdo a la actividad de tu empresa. </p>
			<br>	
			<form method="POST" action="prove/a_huella.php">
				<div style="">
					<h3 style="color:black;"><center>Fuentes Fijas</center></h3>
					<br>	
						<?php
						$elementos=array();
						$nombre=array();
						$cantidad=array();
						$unidades=array();
						$nom="";
						echo '<input type="date" value="'.$fecha_total.'" name="fecha_registro" hidden>';

						$nom="fuentes fijas";
						$resp=$consultas->fuentes_fijas_consulta(base64_decode($_GET['s']));
						while($fila=mysqli_fetch_array($resp)){
							$elementos[]=$fila[2];
							$nombre[]=$fila[3];
							$cantidad[]=$fila[4];
							$unidades[]=$fila[5];
							$nom =$nom.",".$fila[3];
						}
						for ($i=0; $i < count($elementos) ; $i++) { 
							if($i%2 ==0){
							echo "
							<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-right:9%; margin-bottom:2vw; display:inline-block; vertical-align:top;'>
							<h5 style='background:blue; border-radius: 25px 25px 0 0; height:2vw; padding-top:0.5vw; color:white;'>".$nombre[$i]."</h5>
							<br>
							<table align='center' style='margin-left:10%; width:80%;'>
										<tr>
											<th>Nombre <br> Maquina</th>
											<th>Cantidad</th>
										</tr>
									";
							$res=$consultas->fuentes_fijas_consulta_elemento($elementos[$i],base64_decode($_GET['s']));
							while($fil=mysqli_fetch_array($res)){
								echo "<tr>
										<td>".$fil[0]."</td>
										<td>".$fil[1]."</td>
									  </tr>";
							}
							echo "</table>
			
							
							<input style='text-align:center; width:30%;' type='number' min='0.001' step='0.001' max='10000' name='fuentes_fijas[]' id='Cantidad_".$nombre[$i]."' 			required=''><label for='Cantidad_".$nombre[$i]."'>".$unidades[$i]."</label>
							<br>
							<br>
								  </div>";
								}
								else
								{
									echo "
							<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-bottom:2vw; display:inline-block; vertical-align:top; margin-right:9%;'>
							<h5 style='background:blue; border-radius: 25px 25px 0 0;  height:2vw; padding-top:0.5vw; color:white;'>".$nombre[$i]."</h5>
							<br>
							<table align='center' style='margin-left:10%; width:80%;'>
										<tr>
											<th>Nombre <br> Maquina</th>
											<th>Cantidad</th>
										</tr>
									";
							$res=$consultas->fuentes_fijas_consulta_elemento($elementos[$i],base64_decode($_GET['s']));
							while($fil=mysqli_fetch_array($res)){
								echo "<tr>
										<td>".$fil[0]."</td>
										<td>".$fil[1]."</td>
									  </tr>";
							}
							echo "</table>
			
							
							<input style='text-align:center; width:30%;' type='number' min='0.001' step='0.001' max='10000' name='fuentes_fijas[]' id='Cantidad_".$nombre[$i]."' 			required=''><label for='Cantidad_".$nombre[$i]."'>".$unidades[$i]."</label>
							<br>
							<br>
								  </div>";
								}
						}
						?>
			</div>
			<div>
				<h3><center>Refrigerantes</center></h3>
				<p style="color: black; font-size: 1vw;">En esta sección ingrese la cantidad de refrigerante utilizado de los mencionados a continuación:</p>
				<br>	
				<br>	
				<div style="">
				<?php
					$nom=$nom.",refrigerante";
					$resp=$consultas->listado_refigerante_fuentes_fijas_sede(base64_decode($_GET['s']));
						while ($fi=mysqli_fetch_array($resp)) {
							
						
							if($fi[0]=="0"){}
							else{
								$nom =$nom.",".$fi[1];
								if(count($fi)%2 ==0){
									echo "
									<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-right:9%; 	margin-bottom:2vw; display:inline-block; vertical-align:top;'>
									    <h4 style='background:blue; border-radius: 25px 25px 0 0; height:2vw; padding-top:0.5vw; color:white;'>".trim($fi[1]).	"</h4>
									     <br>
									    <table align='center' style='margin-left:10%; width:80%;'>
											<tr>
												<th>Maquinas</th>
												
											</tr>
										    ";
										    $res=$consultas->listado_refigerante_fuentes_fijas_nombre($fi[1],base64_decode($_GET['s']));
									        while ($f=mysqli_fetch_array($res)) {
									    	    echo "<tr>	<td>".$f[0]."</td></tr>";
									        }
							
										echo "</table>
										<input style='text-align:center; width:30%;' type='number' min='0' step='0.001'max='10000' name='refrigerante[]' id='Cantidad_".trim($fi[1])."' 			required=''><label for='Cantidad_".trim($fi[1])."'>".$fi[2]."</label>
										<br>
										<br>
										</div>";
								}
								else
								{
									echo "
									<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-bottom:2vw; 	display:inline-block; vertical-align:top; margin-right:9%;'>
										<h4 style='background:blue; border-radius: 25px 25px 0 0;  height:2vw; padding-top:0.5vw;color:white;'>".trim(	$fi[1])."</h4>
										<br>
										<table align='center' style='margin-left:10%; width:80%;'>
											<tr>
												<th>Maquinas</th>
												
											</tr>
											";
											$res=$consultas->listado_refigerante_fuentes_fijas_nombre($fi[1]);
									    	while ($f=mysqli_fetch_array($res)) {
									    		echo "<tr>	<td>".$f[0]."</td></tr>";
											}
										echo "
										</table>
										<input style='text-align:center; width:30%;' type='number' min='0'max='10000' name='refrigerante[]' id='Cantidad_".trim($fi[1])."' 				required=''><label for='Cantidad_".trim($fi[1])."'>".$fi[2]."</label>
										<br>
										<br>
									</div>";
								}
							}
						}
						$resp=$consultas->listado_refigerante_fuentes_fijas_electricas_sede(base64_decode($_GET['s']));
						while ($fi=mysqli_fetch_array($resp)) {
							
						
							if($fi[0]=="0"){}
							else{
								$nom =$nom.",".$fi[1];
								if(count($fi)%2 ==0){
									echo "
									<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-right:9%; margin-bottom:2vw; display:inline-block; vertical-align:top;'>
										<h4 style='background:blue; border-radius: 25px 25px 0 0; height:2vw; padding-top:0.5vw; color:white;'>".trim($fi[1])."</h4>
										<br>
										<table align='center' style='margin-left:10%; width:80%;'>
											<tr>
												<th>Maquinas</th>
												
											</tr>
											";
											$res=$consultas->listado_refigerante_fuentes_fijas_electricas_nombre($fi[1]);
									    	while ($f=mysqli_fetch_array($res)) {
									    		echo "<tr>	<td>".$f[0]."</td></tr>";
									    	}
								
										echo "
										</table>
										<input style='text-align:center; width:30%;' type='number' min='0' step='0.001'max='10000' name='refrigerante[]' id='Cantidad_".trim($fi[1])."' 			required=''><label for='Cantidad_".trim($fi[1])."'>".$fi[2]."</label>
										<br>
										<br>
									 </div>";
								}
								else
								{
									echo "
									<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-bottom:2vw; display:inline-block; vertical-align:top; margin-right:9%;'>
										<h4 style='background:blue; border-radius: 25px 25px 0 0;  height:2vw; padding-top:0.5vw; color:white;'>".trim($fi[1])."</h4>
										<br>
										<table align='center' style='margin-left:10%; width:80%;'>
											<tr>
												<th>Maquinas</th>
												
											</tr>
											";
											$res=$consultas->listado_refigerante_fuentes_fijas_electricas_nombre($fi[1]);
									    	while ($f=mysqli_fetch_array($res)) {
									    		echo "<tr>	<td>".$f[0]."</td></tr>";
									    	}
										echo "
										</table>
										<input style='text-align:center; width:30%;' type='number' min='0' step='0.001' max='10000' name='refrigerante[]' id='Cantidad_".trim($fi[1])."' 			required=''><label for='Cantidad_".trim($fi[1])."'>".$fi[2]."</label>
										<br>
										<br>
									</div>";
								}
							}
						}
						$resp=$consultas->listado_refigerante_fuentes_mobiles_sede(base64_decode($_GET['s']));
						while ($fi=mysqli_fetch_array($resp)) {
							
						
							if($fi[0]=="0"){}
							else{
								$nom =$nom.",".$fi[1];
								if(count($fi)%2 ==0){
									echo "
									<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-right:9%; margin-bottom:2vw; display:inline-block; vertical-align:top;'>
										<h4 style='background:blue; border-radius: 25px 25px 0 0; height:2vw; padding-top:0.5vw; color:white;'>".trim($fi[1])."</h4>
										<br>
										<table align='center' style='margin-left:10%; width:80%;'>
											<tr>
												<th>Placa</th>
												
											</tr>
											";
											$res=$consultas->listado_refigerante_fuentes_mobiles_nombre($fi[1]);
									    	while ($f=mysqli_fetch_array($res)) {
									    		echo "<tr>	<td>".$f[0]."</td></tr>";
									    	}
								
										echo "
										</table>
										<input style='text-align:center; width:30%;' type='number' min='0' step='0.001' max='10000' name='refrigerante[]' id='Cantidad_".trim($fi[1])."' 			required=''><label for='Cantidad_".trim($fi[1])."'>".$fi[2]."</label>
										<br>
										<br>
									 </div>";
								}
								else
								{
									echo "
									<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-bottom:2vw; display:inline-block; vertical-align:top; margin-right:9%;'>
										<h4 style='background:blue; border-radius: 25px 25px 0 0;  height:2vw; padding-top:0.5vw; color:white;'>".trim($fi[1])."</h4>
										<br>
										<table align='center' style='margin-left:10%; width:80%;'>
											<tr>
												<th>Placa</th>
												
											</tr>
											";
											$res=$consultas->listado_refigerante_fuentes_mobiles_nombre($fi[1]);
									    	while ($f=mysqli_fetch_array($res)) {
									    		echo "<tr>	<td>".$f[0]."</td></tr>";
									    	}
										echo "
										</table>
										<input style='text-align:center; width:30%;' type='number'min='0' step='0.001' max='10000' name='refrigerante[]' id='Cantidad_".trim($fi[1])."' 			required=''><label for='Cantidad_".trim($fi[1])."'>".$fi[2]."</label>
										<br>
										<br>
									</div>";
								}
							}
						}
						$resp=$consultas->listado_refigerante_fuentes_mobiles_electricas_sede(base64_decode($_GET['s']));
						while ($fi=mysqli_fetch_array($resp)) {
							
						
							if($fi[0]=="0"){}
							else{
								$nom =$nom.",".$fi[1];
								if(count($fi)%2 ==0){
									echo "
									<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-right:9%; margin-bottom:2vw; display:inline-block; vertical-align:top;'>
										<h4 style='background:blue; border-radius: 25px 25px 0 0; height:2vw; padding-top:0.5vw; color:white;'>".trim($fi[1])."</h4>
										<br>
										<table align='center' style='margin-left:10%; width:80%;'>
											<tr>
												<th>Placa</th>
												<th>Tipo</th>
												
											</tr>
											";
											$res=$consultas->listado_refigerante_fuentes_mobiles_electricas_nombre($fi[1]);
									    	while ($f=mysqli_fetch_array($res)) {
									    		echo "<tr>	<td>".$f[0]."</td><td>Electrico</td></tr>";
									    	}
								
										echo "
										</table>
										<input style='text-align:center; width:30%;' type='number'min='0' step='0.001' max='10000' name='refrigerante[]' id='Cantidad_".trim($fi[1])."' 			required=''><label for='Cantidad_".trim($fi[1])."'>".$fi[2]."</label>
										<br>
										<br>
									 </div>";
								}
								else
								{
									echo "
									<div style='width:30%; border-radius:25px; border:black solid 1px; margin-left:10%; margin-bottom:2vw; display:inline-block; vertical-align:top; margin-right:9%;'>
										<h4 style='background:blue; border-radius: 25px 25px 0 0;  height:2vw; padding-top:0.5vw; color:white;'>".trim($fi[1])."</h4>
										<br>
										<table align='center' style='margin-left:10%; width:80%;'>
											<tr>
												<th>Placa</th>
												<th>Tipo</th>
											</tr>
											";
											$res=$consultas->listado_refigerante_fuentes_mobiles_electricas_nombre($fi[1]);
									    	while ($f=mysqli_fetch_array($res)) {
									    		echo "<tr>	<td>".$f[0]."</td><td>Electrico</td></tr>";
									    	}
										echo "
										</table>
										<input style='text-align:center; width:30%;' type='number' min='0' step='0.001' max='10000' name='refrigerante[]' id='Cantidad_".trim($fi[1])."' 			required=''><label for='Cantidad_".trim($fi[1])."'>".$fi[2]."</label>
										<br>
										<br>
									</div>";
								}
							}
						}
				?>
				<div>
					
				</div>
					<h3><center>Grasas y aceites</center></h3>
				<p style="color: black; font-size: 1vw;">En esta sección ingrese la cantidad de Grasas y aceites utilizados a continuación:</p>
				<br>	
				<br>	
				<div style="width: 100%; display: flex;">
					<div style='width: 40%; margin-left:5%; margin-right:5%; border-radius:25px; background:#D4EAEF; padding-bottom:2vw;'>
						<center><h3 style="color: black;margin-top: 2vw; margin-bottom: 2vw; ">Aceites</h3></center>
						<img style="width: 80%; height: 15vw; margin-bottom: 2vw;" src="../../../images/aceite.jpg" alt="Aceites"><br>
						<input type="number" name="aceite" step="1" max="200" min="0"><label>Gal</label>
					</div>
					<div style='width: 40%; margin-left:5%; margin-right:5%; border-radius:25px; background:#D4EAEF; padding-bottom:2vw;'>
						<center><h3 style="color: black;margin-top: 2vw; margin-bottom: 2vw; ">Grasas</h3></center>
						<img style="width: 80%; height: 15vw; margin-bottom: 2vw;" src="../../../images/grasas.jpeg" alt="Grasas"><br>
						<input type="number" name="grasas" step="1" max="2000" min="0"><label>KG</label></div>

				</div>

			</div>
			<br>	
			<br>	
			<div style="width: 100%;">
				<h3><center>Automoviles</center></h3>
				<table align="center" style="width: 80%; margin-left: 10%; ">
					<tr>
						<th>Placa</th>
						<th>Vehiculo</th>
						<th>Tipo</th>
						<th>Combustible</th>
						<th>Cantidad</th>
					</tr>
						
						<?php
						$nom=$nom.",automovil";
							$resp=$consultas->fuentes_automoviles_sede(base64_decode($_GET['s']));
							while ($fila=mysqli_fetch_array($resp)) {
								echo "
									<tr>
										<td>".$fila[1]."</td>
										<td>".$fila[0]."</td>
										<td>".$fila[2]."</td>
										<td>".$fila[3]."</td>
										<td><input style='width:50%; text-align:center;' type='text' name='automovil[]' spaceholder='Cantidad' min='0' required='' ><label>   ".$fila[4]."/Mes</label></td>

									</tr>
								";
							 $nom=$nom.",".$fila[5];
							}

						?>
					
				</table>
			</div>
			<br>
			<div>
				<br>
				<h3><center>Extintores</center></h3>
				<p style='color:black; font-size:1vw;'>Registre aqui la cantidad de extintores al cual se le hicieron recarga segun el tipo de agente extintor que se pide a continuación:</p>
				<br>
				<div style="display: flex; margin-bottom: 5vw;">
				<?php 
				
					$res=$consultas->fuentes__total_extintores_sede(base64_decode($_GET['s']));
					while ($fila=mysqli_fetch_array($res)) {
						echo "
							<div style='width: 40%; margin-left:5%; margin-right:5%; border-radius:25px; background:#D4EAEF; padding-bottom:2vw;'>
								<br>
								<p style='color:black; font-size:1.3vw;'>".$fila[1]."</p><br>
								<img style='width:80%; height:20vw;' src='../../../images/".$fila[2]."' alt='extintors'><br>
								<br>
								<label>Cantidad</label><br>
								<input style='width:50%; margin-left:5%;  border-radius:25px; text-align:center;	' type='number' min='0' max='".$fila[5]."' name='".$fila[3]."' value='0'><br> <label> Peso</label><br> 	
								<input style='width:20%;' type='number' name='Peso".$fila[3]."' min='0' max='".$fila[5]."' value='0'> <label>KG</label><br>
								<br>
							</div>


						";
					}
				 ?>
				</div>
			</div>
			<input type='text' value='<?=strval($nom)?>' name='nombres' hidden=''>
			<input type='text' value='<?=base64_decode($_GET["s"])?>' name='sede' hidden=''>
			
			
			
		</div>
		<hr>
		<div style="width: 80%; margin-left: 10%; margin-top: 5vw; margin-bottom: 2vw;">
			<h2>ALCANCE 2</h2>
			<br>
			
				<label>Ingrese el valor de la cantidad total en KW que se muestra en el recibo de este mes</label><br>
				<input style="text-align: center; border-radius: 25px; margin-top: 1vw; margin-bottom: 1vw;" type="number" name="Cantidad_luz" id="cantidad_luz" required=""><br>
				<input type='text' value='<?=base64_decode($_GET["s"])?>' name='sede' hidden=''>
				<input type="submit" name="Enviar_alance_1" id="Enviar_alance_1" <?php if ($subido){echo "disabled=''";}?>>
			</form>
		</div>
		<br>
		<br>
	</div>

<script src="../../../lib/js/jquery-min.js"></script>
<script src="../../../js/funcionajax.js"></script>
<script src="../../../lib/js/bootstrap4/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>
<?php
	if (isset($_GET['ok'])) {
		$ok=$_GET['ok'];
		if ($ok=="1") {
			echo "<script languaje='javascript'>alert('Se agrego corectamente')</script>";
		}
	}
?>
