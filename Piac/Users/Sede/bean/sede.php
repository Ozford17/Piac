<?php	
	$s=$_GET['s'];
	require_once '../../bean/renderMenu.php';
	$render= new renderMenu();
	
			session_start();
			function Mostrar()
			{
				require_once '../../../src/consultas.php';
				$consultas= new consultas();

				$res=$consultas->consultar_sede_codigo(base64_decode($_GET['s']));	
				if($fila=mysqli_fetch_array($res)){
				
					if ($fila[9]=="1") {
						
						echo '
								$.ajax({
					      				url: "../datos/huella_carbono.php",
					      				type: "POST",
					     				 dataType:"html",
					     				 data: {s:"'.$_GET["s"].'"},
					      				success: function (data) {
					      				  	console.log(data);
					        				$("#huellita").html(data);
					      				}
					    			});';
						}
						else
						{
							
							if ($_SESSION['tipo']=="2") {
								echo '$("#huellita").html("Para esta sede no esta activado el servicio de huella de carbono, cambie esta opcion en la ventana de datos empresa:https://piac.ecoblue.co/Users/Empresa/DatosPersonales.php.");';
								}
								else if ($_SESSION['tipo']=="3") {
										echo '$("#huellita").html("Para esta sede no esta activado el servicio de huella de carbono, comuniquese con el administrador de su empresa. ");';
								}	
							

						}
							
				}
				else
				{
					echo "entro aqui";
				}
			}
				
?>

<!DOCTYPE>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Datos de la sede</title>
	<link rel="stylesheet" type="text/css" href="../../../css/arriba.css">
	<link rel="stylesheet" type="text/css" href="../../../css/sede.css">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../../../js/head.js" ></script>
	<style type="text/css">
		#tabla_d tr td
		{
			padding-top: 2vw;
		}
		hr{
			height: 0.1vw;
			background: black;
		}
		#huellita
		{
			margin-top: 2vw;
			margin-bottom: 2vw;
		}
		#huellita table
		{
			width: 100%;
		}
		#huellita input[type='submit']
		{
			width: 20%;
		}
		#huellita label
		{
			color: black !important;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){

			<?php Mostrar();?>
		});

	</script>
</head>
<body>
	<div class="arriba">
		<img src="../../../images/Logo.png">
		<p>Datos de la sede</p>
		<p class="Cerrar1"> Cerrar sesion</p>
	</div>
	<div id="menu">
		<?=$render->render($_SESSION['tipo'],$s,2);?>
	</div>	
	<div id="centro">
		<div id="datos_personales" style="background: white;padding-top: 2vw;">
			<center><h3>Datos registrados de la sede</h3></center>
			<?php 
			
			require_once'../../../src/consultas.php';
			$consultas= new consultas();

			$res=$consultas->consultar_sede_codigo(base64_decode($_GET['s']));	
			if($fila=mysqli_fetch_array($res)){
				
				echo '
				<table width="100%" id="tabla_d">
						<tr>
							<td>
								<span>Nombre de la empresa:</span><br>
								<span>'.$fila[1].'</span>
							</td>
							<td>
								<span>Ciudad:</span><br>
								<span>'.$fila[2].'</span>
							</td>
							<td>
								<span>Direccion:</span><br>
								<span>'.$fila[3].'</span>
							</td>

							
						</tr>
						<tr>
							<td colspan="3"><hr></td>
						</tr>

						<tr>
							<td>
								<span>Telefono:</span><br>
								<span>'.$fila[4].'</span>
							</td>
							<td>
								<span>Representante:</span><br>
								<span>'.$fila[5].'</span>
							</td>
							<td>
								<span>Correo:</span><br>
								<span>'.$fila[6].'</span>
							</td>

							
						</tr>
						<tr>
							<td colspan="3"><hr></td>
						</tr>

						<tr>
							<td>
								<span>Coordenadas:</span><br>
								<span>'.$fila[8].'</span>
							</td>
							<td>
								<span>Huella Carbono:</span><br>
								<span>'; if ($fila[9]=="1"){echo "Si"; }else{echo "No";}echo '</span>
							</td>
							<td>
								<span>Huella Hidrica:</span><br>
								<span>';if ($fila[10]=="1"){echo "Si";}else{echo "No";} echo'</span>
							</td>

							
						</tr>
						<tr>
							<td colspan="3"><hr></td>
						</tr>

				</table>';
			}?>
		</div>
		<div id="huellita">

			
		</div>
		<div id="hidrica">
			
		</div>
		
	</div>
	
</body>
</html>