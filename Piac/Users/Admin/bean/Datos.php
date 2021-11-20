<?php
require_once '../../../src/consultas.php'; 
$consultas= new consultas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script>
				
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
		.titulo
		{
			font-size:2vw;
			color: white;
		}
		#centro_huella
		{
			overflow:scroll;
			width:90%;
			height:94vw;
		}
		
		.BT_Empresa
		{
			border:black solid 1px;
			width: 90%;
			height:2vw;
			border-radius:25px;
			background:#1A95D5;
			margin-left:5%;
			margin-bottom:1vw;
			padding-top:0.5vw;
			position:relative;
			cursor:pointer;
		}
		
		.BT_Empresa span
		{
			color: white;
			margin-left:5%;
			text-transform: capitalize;
		}
		.BT_Empresa i
		{
			position:absolute;
			right:5%;
		}
		.div_empresa_{
			margin-bottom: 5vw;
		}
		.div_empresa{
			border-radius: 25px;
    		
		}.div_empresa table{
			margin: 5px 10px 9px 10px;
		}
		.empresa_titulo{
			width: 100%;
    		border-radius: 25px 25px 0 0;
    		padding: 5px 0px;
    		text-align: center;
    		background: #1a95d5;

		}

    </style>
</head>
<body>
    

<div id="centro_huella">
		<center><h2 style="color:black;">Reporte de consumos.</h2></center><br>	
		<p style="color: black; text-align:justify; font-size: 1.0vw; width: 90%; margin-left: 5%; margin-bottom:2vw;">En esta sección debemos registrar mensualmente los consumos teniendo en cuenta los alcances uno y dos para el año <b><?=date("Y")?></b>. <br>	
		A continuación, puedes escoger el mes en el cual vas a realizar el cargue de la información correspondiente, teniendo en cuenta los principios establecidos para la cuantificación de gases de efecto invernadero GEI: 
		Integridad, transparencia, precisión, consistencia y relevancia para garantizar un inventario coherente con las actividades realizadas.</p>
		
			<?php 
            $R=$consultas->BuscarEmpresa();
            while($fila=mysqli_fetch_assoc($R))
            {	
				$s=$fila['Codigo'];
			 	?>
                <div class="BT_Empresa" id="BT_Empresa_<?=$fila['Codigo']?>">
					<span><?=$fila['Nombre'];?></span>
					<i class="fa fa-sort-desc" aria-hidden="true"></i>
				</div>
				<div id="div_empresa_<?=$s?>"  class="div_empresa_">
                	<?php
					$resp_sedes=$consultas->BuscarSedeEmpresa($s);
					
					while($fi=mysqli_fetch_assoc($resp_sedes))
					{
						$meses= array();
						$datos=array();
						$mes=array();
						$codigo=array();
						$subido=false;
						
						$resp=$consultas->consultar_grafica_co2_alcance1($fi["Codigo"],date("Y"));
						while ($fil=mysqli_fetch_array($resp)) {
							$mes[]=$fil[0];
							$datos[]=$fil[1];
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
							for ($a=0; $a <count($mes) ; $a++)
							{ 
								if ($i==$mes[$a]) { 
									
									$ton="Ton CO2eq" ;
									$me= number_format($datos[$a]/1000, 2,'.','');
									$meses[]=$me.$ton;
									$codigo[]=
									$bandera=true;
									break;
								}
							}
							if (!$bandera) {
								
									$meses[]= '<span>'.'Pendiente'.'</span>';
									$codigo[]=0;
								
								
							}	
						}
			 			?>
						 
						<div style="border:black solid 1px; margin-top:5vw; margin-left:15%; margin-right:10%; "  class="div_empresa">
						<div class="empresa_titulo">
							<span class=titulo><?=$fi['Nombre'];?></span>
						</div>	
						
                			<table width="100%" style="">
								<tr>
									<td>Enero: <?=$meses[0];?> </td>
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
						<?php 
					}
					?>
				</div>
				<script>
					$('#div_empresa_<?=$s?>').hide();
					$('#BT_Empresa_<?=$s?>').click(()=>
					{
						
						$("#div_empresa_<?=$s?>").toggle();
					});
				</script>
				
        		<?php
            }
       	 	?>
	</div>
</body>
</html>