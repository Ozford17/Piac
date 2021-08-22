
<?php 
	require_once '../../../src/consultas.php';
	$consultas= new consultas();
	$s=$_GET['s'];


	function MostrarDatos_auto($datos, $d){
		$consultas= new consultas();
		$s=$_GET['s'];
		$año=date("Y");
		if(isset($_GET['fecha']))
		{
			$año=$_GET['fecha'];
		}
		
		 if($datos=="label_Gasolina"){
				$total_co_moviles_gasolina= "";
				$resp=$consultas->consultar_grafica_co2_automovil(base64_decode($s),$año);
				$cont=0;
				while($fila=mysqli_fetch_array($resp))
				{
					if ($fila[1]==$d) {
						$cont++;
						if ($cont==1) {
							$total_co_moviles_gasolina="'".$fila[0]." (Ton CO2eq/Gal)'";	
						}
						else
						{
							$total_co_moviles_gasolina=$total_co_moviles_gasolina.",'".$fila[0]." (Ton CO2eq/Gal)'";
						}
					}
					
				}
				echo $total_co_moviles_gasolina;
			}
			else if($datos=="vehiculos_Gasolina"){
				$total_co_moviles_gasolina="";
				$resp=$consultas->consultar_grafica_co2_automovil(base64_decode($s),$año);
				$cont=0;
				while($fila=mysqli_fetch_array($resp))
				{
					if ($fila[1]==$d) {
						$cont++;
						if ($cont==1) {
							$total_co_moviles_gasolina="".number_format($fila[2]/1000, 2, '.', '')."";
						}
						else
						{
							$total_co_moviles_gasolina=$total_co_moviles_gasolina.",".number_format($fila[2]/1000, 2, '.', '')."";
								
						
					}
						}
					
				}
				echo $total_co_moviles_gasolina;
			}

	}

	


		function MostrarDatos_tipo($data)
		{
			require_once '../../../src/consultas.php';
			$consultas= new consultas();
			$s=$_GET['s'];
			$año=date("Y");
			if(isset($_GET['fecha']))
			{
				$año=$_GET['fecha'];
			}
			if ($data=="Alcance1") {
					$calcance1 = 0;
					$mes= array();
					$dato=  array();
					$resp=$consultas->consultar_grafica_co2_alcance1(base64_decode($s),$año);
					while ($fila=mysqli_fetch_array($resp)) {
							$mes[]=$fila[0];
							$dato[]=number_format($fila[1]/1000, 2, '.', '');
					}
					for ($i=1; $i <=12 ; $i++) { 
						$bandera=false;
								for ($a=0; $a <count($mes) ; $a++) { 
									if ($i==$mes[$a]) {
										echo $dato[$a];
										$bandera=true;
										break;
									}
								}
								if (!$bandera) {
									echo "0";
								}
								if ($i!=12) {
									echo ",";
								}
							
						}
			}
			else if ($data=="Alcance2") {
				$calcance1 = 0;
				$mes= array();
				$dato=  array();
				$resp=$consultas->consultar_grafica_co2_tipos(base64_decode($s),$año);
				while ($fila=mysqli_fetch_array($resp)) {
						$mes[]=$fila[0];
						$dato[]=number_format(($fila[1]*28)/1000, 2, '.', '');
				}
				for ($i=1; $i <=12 ; $i++) { 
					$bandera=false;
							for ($a=0; $a <count($mes) ; $a++) { 
								if ($i==$mes[$a]) {
									echo $dato[$a];
									$bandera=true;
									break;
								}
							}
							if (!$bandera) {
								echo "0";
							}
							if ($i!=12) {
								echo ",";
							}
						
					}
			}
		
			else if ($data=="Alcance3") {
				$calcance1 = 0;
				$mes= array();
				$dato=  array();
				$resp=$consultas->consultar_grafica_co2_tipos(base64_decode($s),$año);
				while ($fila=mysqli_fetch_array($resp)) {
						$mes[]=$fila[0];
						$dato[]=number_format(($fila[2]*265)/1000, 2, '.', '');
				}
				for ($i=1; $i <=12 ; $i++) { 
					$bandera=false;
							for ($a=0; $a <count($mes) ; $a++) { 
								if ($i==$mes[$a]) {
									echo $dato[$a];
									$bandera=true;
									break;
								}
							}
							if (!$bandera) {
								echo "0";
							}
							if ($i!=12) {
								echo ",";
							}
						
					}
			}
		}

		

	
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-type"  content="text/html;  charset=utf-8">
	<title>Informes de  carbono</title>
	<link rel="shortcut icon" href="../../../images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="../../../css/sede.css">
	<link rel="stylesheet" type="text/css" href="../../../css/arriba.css">
	<script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
	<script type="text/javascript" src="../../../src/js/jquery-3.4.1.min.js"></script>
	
	<script type="text/javascript">
		
		$(document).ready(function(){

				$("#ano_informe").change(function(e){
					window.location=("informes.php?s=<?php echo $s;?>&fecha="+$(this).val());
				});

				<?php 
					if(isset($_GET['fecha'])){ 
						$fecha=$_GET['fecha']; 
						echo $fecha;
					} 
					else{
						$fecha="2000";
					}
				?>


			


				/*###################################### PRIMER DIAGRAMA DE BARRAS ###########################################*/
        		var color=Chart.helpers.color; 
        		
        		<?php include '../datos/mostrar_datos2.php'  ?>
        		var ctx = document.getElementById('diseño1').getContext('2d');
        		var BarChartData={
        			labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        			datasets:[{
        				label:"Alcance 1-Combustibles",
        				backgroundColor: '#FF9EB3',
        				borderColor: "red",
        				borderWidth:1,
        				data:[<?php mostrar_datos($s,$fecha,"Alcance1")?>]
        			},{
        				label:"Alcance 2-Energía",
        				backgroundColor: '#82CDFF',
        				borderColor: "blue",
        				borderWidth:1,
        				data:[<?php mostrar_datos($s,$fecha,"Alcance2")?>]
        			}]
        		};
        		var myBar = new Chart(ctx, {
					type: 'bar',
					data: BarChartData,
					options: {
						responsive: true,
						legend: {
							position:'top',
						},
						title: {
							display: true,
							text: 'Discriminación mensual de GEI por alcance Ton CO2eq'
						},
						scales:{
							xAxes: [{stacked:true}],
							yAxes: [{stacked:true}],
						},
						tooltips:{
							mode:'index',
							intersect:false
						},
						onAnimationComplete: function() {
	
  							var ctx = this.chart.ctx;
  							ctx.font = this.scale.font;
  							ctx.fillStyle = this.scale.textColor
  							ctx.textAlign = "center";
  							ctx.textBaseline = "bottom";
	
  							this.datasets.forEach(function(dataset) {
  							  dataset.bars.forEach(function(bar) {
  							        ctx.fillText(bar.value, bar.x, bar.y - 5);
  							  		});
  							})
  							
						}	
					}
				});

        		
				
				/*################################################################################################################*/
			
			
			/*************************************************************************************************************************
								Mostrar los valores de los tipos de factores de emision co2 CH4 N2O 
		********************************************************************************************************************/


		var color=Chart.helpers.color; 
        		var BarChartData_tipo={
        			labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        			datasets:[{
        				label:"Alcance 1 CO2",
        				backgroundColor: '#FF9EB3',
        				borderColor: "red",
        				borderWidth:1,
        				data:[
        					<?php 	
        					MostrarDatos_tipo("Alcance1");
        					 ?>
        				]
        			},{
        				label:"Alcance 1 CH4",
        				backgroundColor: '#82CDFF',
        				borderColor: "blue",
        				borderWidth:1,
        				data:[
        					<?php 	
        					MostrarDatos_tipo("Alcance2");
        					 ?>
        				]


        			},{
        				label:"Alcance 1 N2O",
        				backgroundColor: '#E2FF51',
        				borderColor: "green",
        				borderWidth:1,
        				data:[
        					<?php 	
        					MostrarDatos_tipo("Alcance3");
        					 ?>
        				]


        			}]
        		};



        	
        	
			var ctx1 = document.getElementById('tipo_e').getContext('2d');
			
			ctx1.height="90%";
			console.log(BarChartData_tipo);
			window.myBar = new Chart(ctx1, {
				type: 'bar',
				data: BarChartData_tipo,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Discriminación mensual de GEI por alcance Ton eq del año <?php echo date('Y')?>'
					},
					scales:{
						xAxes: [{stacked:true}],
						yAxes: [{stacked:true}],
					},
					tooltips:{
						mode:'index',
						intersect:false
					},
					onAnimationComplete: function() {

  						var ctxs = this.chart.ctx;
  						ctxs.font = this.scale.font;
  						ctxs.fillStyle = this.scale.textColor
  						ctxs.textAlign = "center";
  						ctxs.textBaseline = "bottom";

  						this.datasets.forEach(function(dataset) {
  						  dataset.bars.forEach(function(bar) {
  						        ctx1.fillText(bar.value, bar.x, bar.y - 5);
  						  		});
  						})
  						
					}	
				}
			});	
		

			//**************************************************** VEHICULOS *******************************************************//	


			var barChartData={
        			labels: [<?php 	mostrar_datos($s,$fecha,'label_'); ?>],
        			datasets:[{
        				label:" CO2",
        				backgroundColor: '#82CDFF',
        				borderColor: "blue",
        				borderWidth:1,
        				data:[
        					<?php 	
        						mostrar_datos($s,$fecha,"Moviles");
        					 ?>
        				]
        			}]
        		};

				
				var ctx = document.getElementById('vehiculos').getContext('2d');
				ctx.height="90%";
				window.myBar = new Chart(ctx, {
					type: 'horizontalBar',
					data: barChartData,
					options: {
						responsive: true,
						legend: {
							position: 'top',
						},
					title: {
						display: true,
						text: 'Cantidad de Co2 total de los vehiculos registrados (Ton CO2eq/Gal)'
					},
					scales: {
    				    xAxes: [{
    				        maxBarThickness: 2,
    				        minBarLength: 1
    				        
    				    }]
    				},
    				layout: {
            			padding: {
            			    left: 50,
            			    right: 0,
            			    top: 0,
            			    bottom: 50
            			}
            		},
					tooltips:{
						mode:'index',
						intersect:false
					},
					onAnimationComplete: function() {

  						var ctx = this.chart.ctx;
  						ctx.font = this.scale.font;
  						ctx.fillStyle = this.scale.textColor
  						ctx.textAlign = "center";
  						ctx.textBaseline = "bottom";

  						this.datasets.forEach(function(dataset) {
  						  dataset.bars.forEach(function(bar) {
  						        ctx.fillText(bar.value, bar.x, bar.y - 5);
  						  		});
  						})
  						
					}	
				}
			});
			
		
		});

		function Cargar_vehiculo(value){
			<?php
				$res=$consultas->consultar_grafica_co2_automovil_combustible(base64_decode($s));
				while ($f=mysqli_fetch_array($res)) {
					$codigos_combu[]=$f[0];
					$nombres_combu[]=$f[1];
				} 
				for ($i = 0; $i < count($codigos_combu); $i++) {
					
					$a=$i+1;
					echo ' var radio'.$a.'= document.getElementById("'.$codigos_combu[$i].'");';		
				}
			 ?>
			var radio = document.getElementById('Todos');
			

			if (radio.checked) {
				var barChartData={
        			labels: [<?php 	mostrar_datos($s,$fecha,'label_'); ?>],
        			datasets:[{
        				label:" CO2",
        				backgroundColor: '#82CDFF',
        				borderColor: "blue",
        				borderWidth:1,
        				data:[
        					<?php 	
        						mostrar_datos($s,$fecha,"Moviles");
        					 ?>
        				]
        			}]
        		};

				
				var ctx = document.getElementById('vehiculos');
				ctx.remove();
				var ct= document.createElement('Canvas');
				ct.id='vehiculos';
				var prin=document.getElementById('vehi');
				prin.append(ct);
				window.myBar = new Chart(ct, {
					type: 'horizontalBar',
					data: barChartData,
					options: {
						responsive: true,
						legend: {
							position: 'top',
						},
					title: {
						display: true,
						text: 'Cantidad de Co2 total de los vehiculos registrados(Ton CO2/Gal)'
					},
					scales: {
    				    xAxes: [{
    				        maxBarThickness: 2,
    				        minBarLength: 1
    				        
    				    }]
    				},
    				layout: {
            			padding: {
            			    left: 50,
            			    right: 0,
            			    top: 0,
            			    bottom: 50
            			}
            		},
					tooltips:{
						mode:'index',
						intersect:false
					},
					onAnimationComplete: function() {

  						var ctx = this.chart.ctx;
  						ctx.font = this.scale.font;
  						ctx.fillStyle = this.scale.textColor
  						ctx.textAlign = "center";
  						ctx.textBaseline = "bottom";

  						this.datasets.forEach(function(dataset) {
  						  dataset.bars.forEach(function(bar) {
  						        ctx.fillText(bar.value, bar.x, bar.y - 5);
  						  		});
  						})
  						
					}	
				}
			});
				

		
			}
			<?php

			for ( $i = 0; $i < count($codigos_combu) ; $i++) {
				$a=$i+1;
				echo 'else if(radio'.$a.'.checked){';
			 	 
				
			 ?>
				var barChartData={
        			labels: [<?php 	MostrarDatos_auto('label_Gasolina',$codigos_combu[$i]); ?>],
        			datasets:[{
        				label:<?php echo '"'.$nombres_combu[$i].'"'; ?>,
        				backgroundColor: '#82CDFF',
        				borderColor: "blue",
        				borderWidth:1,
        				data:[
        					<?php 	
        					MostrarDatos_auto("vehiculos_Gasolina",$codigos_combu[$i]);
        					 ?>
        				]
        			}]
        		};

				console.log(barChartData);
				var ctx = document.getElementById('vehiculos');
				ctx.remove();
				var ct= document.createElement('Canvas');
				ct.id='vehiculos';
				var prin=document.getElementById('vehi');
				prin.append(ct);

				ctx.height="90%";
				window.myBar = new Chart(ct, {
					type: 'horizontalBar',
					data: barChartData,
					options: {
						responsive: true,
						legend: {
							position: 'top',
						},
						title: {
							display: true,
							text: 'Cantidad de Co2 total de los vehiculos registrados(Ton CO2/Gal)'
						},
						scales: {
    					    xAxes: [{
    					        maxBarThickness: 2,
    					        minBarLength: 1
    					        
    					    }]
    					},
    					layout: {
            				padding: {
            				    left: 50,
            				    right: 0,
            				    top: 0,
            				    bottom: 50
            				}
            			},
						tooltips:{
							mode:'index',
							intersect:false
						},
						onAnimationComplete: function() {
	
  							var ctx = this.chart.ctx;
  							ctx.font = this.scale.font;
  							ctx.fillStyle = this.scale.textColor
  							ctx.textAlign = "center";
  							ctx.textBaseline = "bottom";
	
  							this.datasets.forEach(function(dataset) {
  							  dataset.bars.forEach(function(bar) {
  							        ctx.fillText(bar.value, bar.x, bar.y - 5);
  							  		});
  							})
  							
						}	
					}
				});
				<?php 
					echo '}';	
				}
				 ?>
			
			
			
		}

		

	
		
	</script>
	<style>
		#centro_huella {
			text-align: left;
		}
		#centro_huella input[type="radio"]{
			margin-left: 15%; 

		}
	</style>
</head>
<body>

	<div class="arriba"><img src="../../../images/Logo.png"><p style="margin-left: 40%;">informes de carbono</p><a href="https://piac.ecoblue.co/" > Cerrar sesion</a></p></div>
	<div id="menu">
		<a href="sede.php?s=<?php echo $s?>"><button><p>Datos de la Sede</p></button></a>
		<a href="solido.php?s=<?php echo $s?>"><button><p>Corriente de residuos</p></button></a>
		<a href="carbono.php?s=<?php echo $s?>"><button><p>Huella de Carbono</p></button></a>
		<a href="hidirico.php?s=<?php echo $s?>"><button><p>Huella Hidrica</p></button></a>
		<a href="informes.php?s=<?php echo $s?>"><button><p>Informes</p></button></a>
	</div>

	<div id="centro_huella" style="">
		<div style="width: 95%;">	
			<p style="color:black;">Seleccione el año en el que quiere que se le muestre los informes <select name="ano_informe" id="ano_informe"><option value="Selecc">Año</option><?php 
					$resp=$consultas->Listar_ano_informe(base64_decode($s));
					while($Fila=mysqli_fetch_array($resp))
					{
						echo '<option value="'.$Fila[0].'">'.$Fila[0].'</option>';
					}
				 ?></select></p>
			<canvas id="diseño1" style="background: white; height: 30vw; margin-top: 20px; width: 90%;"></canvas>
		</div>
		<br>	
		<hr>	
		<br>	
		<div >
			<center><h2 style="color:black;">Escoja el tipo de combustible</h2></center><br>
			<input type="radio" name="com" value="Todos" id="Todos" checked="" onLoad="Cargar_vehiculo(value)" onChange="Cargar_vehiculo(value)"><label for="Todos">Todos</label><br>
			<?php  

				$res=$consultas->consultar_grafica_co2_automovil_combustible(base64_decode($s));
				while ($f=mysqli_fetch_array($res)) {
					
					echo '<input type="radio" name="com" value="'.$f[0].'" id="'.$f[0].'" onChange="Cargar_vehiculo(value)"><label for="'.$f[0].'">'.$f[1].'</label> <br>';
				}
					?>
			<div id='vehi'style="width: 95%;">	
				<canvas id="vehiculos"></canvas>	
			</div>
			<div id="tipo">
				<canvas id="tipo_e"></canvas>
			</div>
			</div>

	</div>
	
</body>
</html>