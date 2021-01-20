<?php
	require_once"../../../src/consultas.php";
	$consultas=new consultas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="./../../../src/js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="./../../../src/js/jquery.modal.min.css">
	<title>Document</title>
	<style>
		h2{
			text-align:center;
		}
		table {
			width:100%;
		}
		form input[type="submit"]
		{
			width: 30%;
    		height: 2vw;
    		background: #077ee3;
    		border-radius: 25px;
    		color: white;
    		font-size: 0.9vw;
		}

		#div_empresa table, #div_sede table
		{
			border-collapse:collapse;
		}
		#div_empresa table tr, #div_sede table tr 
		{
			height:5vw;
		}
		#Boton
		{
			width: 18%;
    		height: 3vw;
   			margin: 1.5vw 0 0 3%;
			position:relative;
			display:block;
			color: white;
		}
		#Boton:hover
		{
			border: #B6CF41 solid 1px;
    		border-radius: 25px;
			color:black;
			cursor:pointer;
		}
		

		#atras_1 
		{
			width: 22%;
    		height: 3vw;
    		margin-left: 5%;
			position:absolute;
		}
		#texto_btn
		{
			font-size:2vw;
			position:absolute;
			margin-left: 32%;
    		margin-top: 0.2vw;
		}

		
		
	</style>
	<script>
		
	</script>
</head>
<body>
	


<!----------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------->
<div style="
		background: #0295AB; 
		width: 100%;  
		height: 5vw; 
		margin-left: 0%; 
		padding-top:1.5vw;
		z-index: 4;">
	<!--<img src="../../images/agregar.png" id="agregar" style="cursor:pointer;
															width: 13%; 
															height: 4vw;
															margin:2vw 0 0 10%;">-->
	<div   style="cursor:pointer;
				display:block;
				border-radius:20px;
				background:#9ca913;
				width: 13%; 
				height: 3vw;
				padding-top:.7vw;
				margin-left:10%;
				" 
			id="agregar" >
				<span style="color: white; font-size:1.8vw; font-weight:600; margin-left:20%;">Agregar</span></div>															
	<div id="derecha">
		
	</div>
</div>

<!----------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------->
<div id="DAtos"style="width: 100%; z-index: 1; position:relative">
<br>
<h2>Empresas registradas en el sistema</h2>
<table id="tabla" aling="center" style=" margin:6vw 0 0 4%; width:96%; text-align: center; border-collapse:collapse; position:absolute">
<div id="mostrar" style="widht:100%; postion:absolute; margin-top:3vw;  "></div>

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
							$("#mostrar").append("<div id=\"div_nuevo\"></div>")
							$("#div_nuevo").css({		
								"width":"100%",
								"height":"30vw",
								"margin-left":"0%",
								"border-size":"1px",
								"border-style":"solid",
								"borde-color":"1px",
								"background-color":"#ffffff",
								"positon":"absolute",
								"border-radius":"15px",
								"display":"block"
				
							});
							$("#tabla").toggle(1000);
						
			
							$("#tabla").css({
								"visibility":"hidden"
							});
							
							
							$("#div_nuevo").animate({
									
									"transition":"5s",
									"width":"90%",
									"margin-left":"1%",
									"z-index":"2",
									"positon":"absolute"
						
								});
							var codigo=$("#codigo").val();
							$("#div_nuevo").append(" <div id=\'Boton\'> <img id=\'atras_'.$fila[0].'\' src=\'../../../images/atras.png\' width=\'5%\'> <span id=\'texto_btn\'>Atrás</span></div>");
							$("#atras").css({"margin-top":"2vw","margin-left":"1%","width":"4%","cursor":"pointer"});
				
							$("#div_nuevo").append("<div id=tabla_sede></div>");
							$(function(){
								$.get("bean/sedes.php",{cod:'.$fila[0].'},function(data){ 
									$("#tabla_sede").append(data);
								
								});
							});

							$("#atras_'.$fila[0].'").click(function(event){
									$("#div_nuevo").toggle(2000);
									$("#tabla_sede").toggle(2000,function(){
										$("#tabla").show();
										$("#tabla").css({"opacity":"1","visibility":"visible"}); 
										$("#div_nuevo").remove();
								});
					
								});
				});
			</script>';
		}
		?>
	
</table>
</div>


<br>
<br>
<br>
<br>

<script type="text/javascript">
		function agregar()
          {
            
            che= document.getElementById("rb_Empresa");
            chec=document.getElementById("rb_Sede");
            elemento=document.getElementById("div_sede");
            element=document.getElementById("div_empresa");
            
            if (che.checked) {
                element.style.display='block';
                elemento.style.display='none';
                

            }
            else if (chec.checked) {
                element.style.display='none';
                elemento.style.display='block';
                
            }
           
          }
	$("#agregar").click(function(e){
		e.preventDefault();
		if($("#agregar_s_e").length > 0)
		{
		}
		else
		{	
			$("#mostrar").append('<div id="agregar_s_e"></div>'); //Agregar el fomulario de agregar
			$("#tabla").animate({
				"opacity":"0",
				"transition":"2s"
			});
			$('#agregar_s_e').css({
				"border-style":"solid",
				"border-size":"1px",
				"border-color":"black",
				"width":"0%",
				"margin-left":"100%",
				"position":"absolute",
				"background":"white"
			});
			$('#agregar_s_e').animate({
				"margin-left":'5%',
				"width":"80%",
				'transition':'3s',
				'z-index':'3'

			});
			/*============================================================================================================================================*/
			/*======================================= div de agregar sede o empresa ======================================================================*/
			/*============================================================================================================================================*/

			$('#agregar_s_e').append("<img id='atras' src='../../../images/atras.png'>");
			$('#agregar_s_e').append('<div style="text-align:center;"><label>Selecione:</label><br> <br>'+
										'<label for="rb_Empresa">Empresa</label>'+
										'<input style="margin-right:5%; margin-left:2%;" type="radio" name="usuario" id="rb_Empresa" onchange="javascript:agregar();" value="Empresa">'+
										'<label for="rb_Sede">Sede</label>'+
										'<input style="margin-left:2%;" type="radio" name="usuario" id="rb_Sede" onchange="javascript:agregar();" value="Sede"> <br>'+
										'<br>'
										);
			$('#agregar_s_e').append("<div id='notificacion'></div>");
			/*Div del formulario de la empresa en ambos se ejecuta el script en el home*/
			$('#agregar_s_e').append('<div id="div_empresa" hidden="" >'+
					'<form style="text-align:center; margin-bottom:10vw; width: 50%; background: #d4eaef; margin-left: 23%;" id="formulario_empresa" action="javascript:enviar_empresa.focus();" method="post">'+

					'<table  style="margin-left: 20%;  width: 36%;  text-align: left;">'+
					'<tr>'+
						'<td colspan=4><h3 align="center">Formulario para empresa</h3></td>'+
					'</tr>'+
					'<tr>'+
						'<td><label for="NIT">Nit</label></td>'+
						'<td><input type="text" name="nit" id="NIT"></td>'+
					'</tr><tr>'+
						'<td><label for="Nombre">Nombre</label></td>'+
						'<td><input type="text" name="nombre" id="Nombre"><br></td>'+
					'</tr><tr>'+
						'<td width="10%"><label for="Representante">Representante</label></td>'+
						'<td><input type="text" name="representante" id="Representante"></td>'+
					'</tr><tr>'+
						'<td> <label for="ciiu">Codigo CIIU</label></td>'+
						'<td><select name="ciiu" id="ciiu">'+
						     '<option value="Seleccione">Seleccione</option>'+
						<?php 
							require_once'../../../src/consultas.php';
							$consultas= new consultas();

							$resp=$consultas-> Listar_codigos_ciiu();
							while($fila= mysqli_fetch_array($resp)){
								echo "'<option value=\'".$fila[0]."\' title=\'".$fila[2]."\'>".$fila[1]."</option>'+";
							}

						?>
						'</select></td>'+
					'</tr><tr>'+
						'<td><label for="Telefono">Telefono</label></td>'+
						'<td><input type="number" name="telefono" id="Telefono" min="999999" max="11111111111"></td>'+
					'</tr><tr>'+
						'<td><label for="Correo">Correo</label></td>'+
						'<td><input type="mail" name="correo" id="Correo"><br></td>'+
					'</tr><tr>'+
						'<td colspan=4 align="center"><input type="submit" name="enviar_empresa" id="enviar_empresa" value="Enviar"></td>'+
					'</tr>'+
					'</table>'+
					'</from>'+

				'</div>');
			$("#atras").click(function(event){

				$("#agregar_s_e").toggle(2000,function(){
					$("#tabla").show();
					$("#tabla").css({"opacity":"1","visibility":"visible"}); 
					$("#div_nuevo").remove();
				});
			});
			$('#enviar_empresa').click(function(event){
				$.ajax({
    				url: "bean/ingresar_empresa.php",
    				type: "POST",
    				dataType:"html",
    				data: $("#formulario_empresa").serialize(),
    				success: function (data) {
    				  console.log(data);
    				  $('#notificacion').html(data);
    				  $('#tabla').load('bean/empresa.php');
    				}
				
    			});
			});
			/*Div del formulario de la sede  en ambos se ejecuta el script en el home*/
			$('#agregar_s_e').append('<div id="div_sede" hidden="">'+
				'<form style="text-align:center;margin-bottom:10vw; width: 80%; background: #d4eaef; margin-left:15%;" id="formulario_sede" action="javascript:enviar_sede.focus();" method="post">'+

					'<table style="margin-left:2%">'+
					'<tr>'+
					'<td colspan=4><h3 align="center">Formulario para sede</h3></td>'+
					'</tr>'+
					'<tr >'+
					'<td colspan="4">'+
					'<select name="empresa" id="empresa">'+
					'<option value="select">Seleccione Empresa</option>'+
						<?php
    	                 require_once"../../../src/consultas.php";
    	                 $consultas=new consultas();
    	                 $respuesta=$consultas->Consultar_empresa_nombre();
    	                 while($fila=mysqli_fetch_array($respuesta))
    	                 {
    	                 	echo"'<option value=\"".$fila[0]."\">".$fila[1]."</option>'+";
    	                 }
						?>
					'</select></td>'+
					'</tr>'+
					'<tr>'+
					'<td><label for="Nombre">Nombre</label></td>'+ 
					'<td><input type="text" name="nombre" id="Nombre"  required=""><br></td>'+
					'<td><label for="Ciudad">Ciudad</label></td>'+
					'<td><input type="text" name="ciudad" id="Ciudad" required=""><br></td>'+
					'</tr><tr>'+
					'<td><label for="Direccion">Direccion</label></td>'+
					'<td><input type="text" name="direccion" id="Direccion" required=""></td>'+
					'<td><label for="Telefono">Telefono</label></td>'+
					'<td><input type="text" name="telefono" id="Telefono" required=""></td>'+				
					'</tr><tr>'+
					'<td><label for="Representante">Representante</label></td>'+
					'<td><input type="text" name="representante" id="Representante" required=""></td>'+
					'<td><label for="Correo">Correo</label></td>'+
					'<td><input type="mail" name="correo" id="Correo" required=""><br></td>'+
					'</tr><tr>'+
					'<td><label for="coordenadas">Coordenadas</label></td>'+
					'<td><input type="text" id="coordenadas" name="coordenadas" required=""></td>'+
					'</tr><tr>'+
					'<td colspan=4 align="center"><input type="submit" name="enviar_sede" id="enviar_sede" value="Enviar"></td></tr>'+
					'</table>'+
					'</from>'+
				'</div>');
			$('#formulario_sede').submit(function(event){
				if($('#empresa').val()=="select")
				{
					$('#notificacion').text("Empresa no seleccionada");
				}
				else
				{
					$.ajax({
    				url: "bean/ingresar_sede.php",
    				type: "POST",
    				dataType:"html",
    				data: $("#formulario_sede").serialize(),
    				success: function (data) {
    				  console.log(data);
    				  $('#notificacion').html(data);
    				}
				
    			});	
				}

			});
			$('#atras').css({"margin-top":"2vw","margin-left":"1%","width":"4%","cursor":"pointer"});
			$('#atras').click(function(event){
					$('#atras').remove();
					$('#agregar_s_e').html(" ");
					$('#agregar_s_e').toggle( "slow", function() {
						// Animation complete.
						$("#agregar_s_e").remove();
					});
			});
		}
	});
	

</script>

</body>
</html>