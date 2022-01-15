<?php
require_once'../../src/consultas.php';
require_once'../bean/renderMenu.php';
$consultas= new consultas();
$render= new renderMenu();
session_start();
/*if ($_SESSION['sede']==0) {
	header('Location:../../index.php');
	exit();
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Datos de tu empresa</title>
	<link rel="shortcut icon" href="../../images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="../../css/empresa.css">
	<link rel="stylesheet" type="text/css" href="../../css/arriba.css">
	<script type='text/javascript' src="../../src/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function(){


			$.ajax({
	      				url: "bean/Datos_generales.php",
	      				type: "POST",
	     				 dataType:"html",
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informacion').html(data);
	      				}
	    				});
			$('#info_em').click(function(e){
				$.ajax({
	      				url: "bean/Datos_generales.php",
	      				type: "POST",
	     				 dataType:"html",
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informacion').html(data);
	      				}
	    				});
			});
			$('#info_p').click(function(e){
				$.ajax({
	      				url: "bean/info_produccion.php",
	      				type: "POST",
	     				 dataType:"html",
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informacion').html(data);
	      				}
	    				});

			});
			
						
		});

		function cargar(option){
			var h=option.split("_");
			
			var check=document.getElementById(option);
			if (check.checked) {
				
				$.ajax({
	      				url: "bean/actualizar_estado.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:{estado:1,codigo:h[1],servicio:h[0]},
	      				success: function (data) {
	      				  	
	        				
	      				}
	    				});
			}
			else
			{
				
				$.ajax({
	      				url: "bean/actualizar_estado.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:{estado:0,codigo:h[1],servicio:h[0]},
	      				success: function (data) {
	      				  	
	      				}
	    				});
			}

		}
			
			
		
	</script>
	<style type="text/css">
     .toogle{
     	display: none;
     }

		.toogle + label{
				display: block;
				width: 50%;
				height: 2vw;
				background: #DE282B;
				border-radius: 25px;
				background: rgba( 222,40, 43,.5);
				z-index: 1;

			}
		.toogle:checked + label{
					background: #069406 ;
					background:rgba( 6,148, 6,.5);
				
			}
			

		.toogle +label:before{
			display: block;
			content: " 0";
			width: 30%;
			height: 85%;
			padding-top: 5%;
			border-radius: 50%;
			background: #DE282B;
			z-index: 5;
			text-align: center;
			} 
		.toogle:checked + label:before{
			display: block;
			content: "|";
			width: 30%;
			height: 85%;
			padding-top: 5%;
			border-radius: 50%;
			background: #069406 ;
			left: 70%;
			position: relative;
			text-align: center;
		}

		
	

	</style>
</head>
<body>
	<div class="arriba"><img src="../../images/Logo.png"><p>Datos de tu empresa</p><a href="https://piac.ecoblue.co/index.php?c=1/"> Cerrar sesion</a></p></div>

	<div id="menu">
	<?=$render->render($_SESSION['tipo'],null,1);?>
	</div>
	<div id="centro">
			<div id="cuadro">
				<div id="titulo">
					<p>Informacion general</p>
				</div>
				<ul>
					<li id="info_em">Informacion de la empresa</li>
					<!--<li id="info_p">Informacion de Produccion</li>-->

				</ul>
				<div id="informacion" style="width: 100%;">
					
				</div>
				<div style="margin-bottom: 5vw;" id="servicios">
					<center><h3>Servicios Prestados a las Sedes</h3></center>
					<center>
						
						<table style="text-align: center;" id='tabla_mostrar'>
							<tr>
								<th>Nombre</th>
								<th>Ciudad</th>
								<th>Huella <br> carbono</th>
								<!--<th>Huella <br> hidrica</th>-->
							</tr>
						
						<?php
						$codigos="";
							$res=$consultas->BuscarSedeEmpresa($_SESSION['empresa']);
							while ($fila=mysqli_fetch_array($res)) {
								echo "<tr>
										<td>".$fila[1]."</td>
										<td>".$fila[2]."</td>";
										if ($fila[9]=="1") {
											echo "
										<td>
											<input type='checkbox' name='carbono_".$fila[0]."' value='carbono_".$fila[0]."' id='carbono_".$fila[0]."' class='toogle' checked=''onChange='cargar(value)'>
											<label style='margin-left:25%;'for='carbono_".$fila[0]."'></label>
										</td>";
										}
										else
										{
											echo "
												<td>
													<input type='checkbox' name='carbono_".$fila[0]."' value='carbono_".$fila[0]."' id='carbono_".$fila[0]."' class='toogle' onChange='cargar(value)'>
													<label style='margin-left:25%;'for='carbono_".$fila[0]."'></label>
												</td>";
										}/* habilitar para la huella hidrica
										if ($fila[10]=="1") {
											echo "<td>
													<input type='checkbox' name='hidrica_".$fila[0]."' id='hidrica_".$fila[0]."' class='toogle' value='hidrica_".$fila[0]."' checked='' onChange='cargar(value)'>
													<label style='margin-left:25%;'for='hidrica_".$fila[0]."'></label>
											</td>";
										}
										else{
											echo "<td>
													<input type='checkbox' name='hidrica_".$fila[0]."' id='hidrica_".$fila[0]."' class='toogle' value='hidrica_".$fila[0]."' onChange='cargar(value)'>
													<label style='margin-left:25%;'for='hidrica_".$fila[0]."'></label>
											</td>";
										}*/
										
										
								echo "</tr>";
								$codigos .=$fila[0].',';
							}
							echo"<input type='text' id='codigos' name='codigos' style='visibility:hidden;' value='".strval($codigos)."'>"
						?>
						</table>
				</div>
				
			</div>
	</div>
	
</body>
</html>