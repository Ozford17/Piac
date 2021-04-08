<?php
	require_once"../../../src/consultas.php";
	$consultas=new consultas();
?>
<table id="tabla"  aling="center" style="">
	<tr>
		<th>Nit</th>
		<th>Nombre</th>
		<th>Representante</th>
		<th width='15%'>Teléfono</th>
		<th>Correo</th>
		<th>CIIU</th>
		<th width="10%">Ver</th>
	</tr>
		<?php
		$res=$consultas->BuscarEmpresa();
		while($fila=mysqli_fetch_array($res))
		{
			echo "
			<tr style=' border-bottom:black solid 1px; padding-top:1vw;'>
				<td style='height: 5vw;' hidden=''><input type='text' id='codigo' value='".$fila[0]."''></td>
				<td style='height: 5vw;' width='10%'> ".$fila[1]."</td>
				<td style='height: 5vw;'>".$fila[2]."</td>
				<td style='height: 5vw;'>".$fila[3]."</td>
				<td style='height: 5vw;'>".$fila[4]."</td>
				<td style='height: 5vw;'>".$fila[5]."</td>
				<td style='height: 5vw;'>".$fila[6]."</td>
				<td id='sedes_".$fila[0]."' style='height: 5vw;' width='20%'>
					<div   style='cursor:pointer; display:block;
					border-radius:10px;	background:transparent;
					width: 80%; height: 2vw;
					padding-top:.7vw;	margin-left:10%;
					border:#30a446 solid 1px;' 
					id='agregar' >
					<span style='color: #30a446; font-size:1.3vw; font-weight:600; margin-left:4%;' >Sedes</span></div>
				</td>
			</tr>
			";

			echo '<script>	
				$("#sedes_'.$fila[0].'").click(function(event){
							$("#mensaje").css({
								"display":"block",
								"width":"100%",
								"height":"30vw",
								"background-color":"trasnparent",
								"padding-top":"2vw"
							})
							
							$("#mostrar").append("<div id=\"div_nuevo\"></div>")
							$("#mostrar").css({		
								"margin-left":"5%",
								"background-color":"white",
								"positon":"absolute",
								"border-radius":"15px",
								"display":"block"	
							});

							$("#tabla").toggle(1000);

							$("#tabla").css({
								"display":"none"
							});

							$("#div_nuevo").animate({
									"transition":"5s",
									"width":"90%",
									"margin-left":"2%",
									"z-index":"2",
									"positon":"absolute"
								});

							var codigo=$("#codigo").val();
							
							$("#div_nuevo").append("<div id=tabla_sede></div>");
							$(function(){
								$.get("bean/sedes.php",{cod:'.$fila[0].',nom:'.$fila[1].'},function(data){ 
									$("#tabla_sede").append(data);
								});
							});
					});
			</script>';
		}
		?>
	
</table>