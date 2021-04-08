<?php
require_once"../../../src/consultas.php";
$consultas=new consultas();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuarios</title>
	<link rel="stylesheet" href="../../src/js/jquery.modal.min.css">
	
	<script type="text/javascript" src="../../src/js/jquery.modal.min.js">
	<script type="text/javascript" src="../../src/js/jquery-3.4.1.min.js">
	<script>
		

		$("#agregar").click(function(event){
			if ($('#agregar_u').length >0) {
				
			}
			else
			{
				$("#mostrar").append('<div id="agregar_u"></div>');
				$("#tabla").animate({
					"opacity":"0",
					"transition":"2s"
				});
				$('#agregar_u').css({
					"border-style":"solid",
					"border-size":"1px",
					"border-color":"black",
					"width":"100%",
					"margin-left":"0%",
					"position":"absolute",
					"background":"white"
				});
				$('#agregar_u').animate({
					'margin-left':'5%',
					"width":"80%",
					'transition':'3s',
					'z-index':'3'
					
				});

				var imagen = $('<img src="../../../images/atras.png" alt="atras" id="atras" style="width:5%;" >');
				var notificacion=$("<div id='notificacion'></div>");
				var div_formulario=$('<form action="javascript:Crear.focus();" id="formulario-crear-us" style="margin-bottom:5vw;">'+
										'<table width="90%;"style="margin-left:5%;" align="center">'+	
											'<h2>Creación de usuario</h2>'+
											'<tr>'+
												'<td colspan="4"><label for="">Sede</label><br />'+
												 
														'<select name="Sede" id="codigo_sede">'+
															'<option value="Select">Seleccione</option>'+
															<?php
																
																$resp=$consultas->Buscarsede();
																while($fila=mysqli_fetch_array($resp)){
																echo '\'<option value="'.$fila[0].'">'.$fila[1].'</option>\'+';
																}
															?>
														'</select></td>'+
											'</tr>'+
											'<tr>'+
												'<td>'+
														'<label for="">Nombre</label>'+
												'</td>'+
												'<td>'+'<input type="text" name="nombre" required="" >'+
												'</td>'+
												'<td>'+
														'<label for="">Correo</label>'+
												'</td>'+
												'<td>'+'<input type="mail" name="correo" required="" autocomplete="false" >'+
												'</td>'+				
											'</tr>'+
											'<tr>'+
												'<td>'+
														'<label for="">Contraseña</label>'+
												'</td>'+
												'<td>'+
														'<input type="password" name="constrasena" id="contrasena" required="" >'+
												'</td>'+
												'<td>'+
														'<label for="">Confirmar contraseña</label>'+
												'</td>'+
												'<td>'+
														'<input type="password" name="con_contrasena" id="con_contrasena" required="" >'+
												'</td>'+				
											'</tr>'+
											'<tr>'+												
												'<td>'+
														'<label for="">Tipo de <br > usuario</label>'+
												'</td>'+
												'<td>'+
														'<select name="tipo" id="tipo">'+
															'<option value="sele">Seleccione</option>'+
															'<option value="1">Admin</option>'+
															'<option value="2">Empresa</option>'+
															'<option value="3">Sede</option>'+
														'</select>'+
												'</td>'+
																
											'</tr>'+
											'<tr> <td colspan="4"> <input type="submit" name="Crear" id="Crear"  value="Crear"  /></td></tr>'+
										'</table>'+
									'</form>');
			}

			$('#agregar_u').append(imagen);
			$('#agregar_u').append(notificacion);
			$('#agregar_u').append(div_formulario);
			$("#atras").css({"margin-top":"2vw","margin-left":"1%","width":"4%","cursor":"pointer"});
			$("#atras").click(function(event){
									
				$("#agregar_u").toggle(1000,function(){
					$("#tabla").show();
					$("#tabla").css({"opacity":"1","visibility":"visible"}); 
					$("#agregar_u").remove();
					});
				});
			$('#formulario-crear-us').submit(function(e){
				if($('#contrasena').val()==$('#con_contrasena').val())
				{
					alert('son iguales');
					if($("#codigo_sede").val()=="Select"){
						$('#notificacion').html("<p align='center' style='color:darkred;'>Sede no seleccionada</p>");
					}
					else
					{
						if ($('#tipo').val()=="sele") {
							$('#notificacion').html("<p align='center' style='color:darkred;'>tipo de usuario no seleccionado</p>");		
						}
						else
						{
							alert("Todo bien por aqui");
							$('#notificacion').html("");
						}

					}
				}
				else{
					$('#notificacion').html("<p align='center' style='color:darkred;'>No coinciden las contraseñas</p>");
				}
			});


		});
	</script>
	<style>
		
		form h2{
			display:flex;
			justify-content:center;
		}
		label
		{
			margin-top:1vw;
		}
		input[type=text], input[type=password]
		{
			height:2vw;
			border-radius: 6px;
   			padding-left: 3%;
		}
		input[type=submit]
		{
			width: 20%;
			height:2vw;
    		padding-left: 0.5%;
    		margin-top: 1vw;
			margin-left: 70%;
    		background: #65c3d3;
    		color: white;
    		border: #0295ab solid 2.5px;
			border-radius: 6px;
			
		}
		
	</style>

</head>
<body>
	

<div style="
		background: #0295AB; 
		width: 100%;  
		height: 5vw; 
		margin-left: 0%; 
		padding-top:1.5vw;
		z-index: 4;">
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
<div style="width: 80%;">
<div id="mostrar" style="widht:100%; postion:absolute; margin-top:3vw;  "></div>
<table aling="center" id="tabla"  style=" margin:6vw 0 0 5%;text-align: center; position: absolute;">
	<tr>
		<th width="15%">Nombre</th>
		<th>Correo</th>
		<th width="15%">Tipo usuario</th>
		<th>Sede</th>
		<th width="15%" >Editar</th>
		<th width="15%" >Block/Desblock</th>
	</tr>
	<?php 
	$respuesta=$consultas->BuscarUsuario();
	while ($fila=mysqli_fetch_array($respuesta)) {
		echo "<tr >
				<td>".$fila[1]."</td>
				<td>".$fila[2]."</td>
				<td>".$fila[3]."</td>
				<td>".$fila[4]."</td>
				<td><img id='edit_$fila[0]' src='../../images/editar.png' style='cursor:pointer;  width: 40%; height: 3vw;'></td>
				<td>";
				if($fila[6]==0)
				{
					echo "<i id='elim_$fila[0]' style='color:red; cursor:pointer;' class='fa fa-ban fa-3x' title='Bloquear' aria-hidden='true'>";
				}
				else
				{
					echo "<i style='color:#45619d; cursor:pointer;' class='fa fa-check fa-2x' title='Activar' aria-hidden='true'></i>";
				}
				 
			  echo "</td></tr>
			  <script>
				$('#edit_$fila[0]').click(function(event){
					let datos =$(\"<form id='fomulario_usuario' action='javascript:Enviar_usu.focus();' method='post'>\"+
								\"	<h2>Editar usuario</h2>\"+
								\"	<input name='Codigo' value='". base64_encode($fila[0])."' hidden>\"+	
								\"	<label>Nombre:</label><br>\"+
								\"	<input type='text' name='Nombre' value='$fila[1]' ><br>\"+
								\"	<label>Correo:</label><br>\"+
								\"	<input type='text' name='Correo' value='$fila[2]' ><br>\"+
								\"	<label>Contraseña:</label><br>\"+
								\"	<div><input type='password' name='Contrasena' id='Contrasena'><i class='fa fa-eye fa-border fa-lg' aria-hidden='true'></i></div>\"+
								\"	<label>Confirmar Contraseña:</label><br>\"+
								\"	<input type='password' name='Con_Contrasena' id='Con_Contrasena'><br>\"+
								\"	<input type='submit' name='Enviar_usu' id='Enviar_usu' value='Enviar'><br>\"+
								
								\" </form>\");
					
					$('#mostrar').html(datos);
					$('#mostrar').modal();
					$('.fa-eye').click(e=>{
						let Con= document.getElementById('Contrasena');
						if(Con.type=='password'){
							Con.type='text';
						}
						else{
							Con.type='password';
						}
					})
					$('#Enviar_usu').click(function(event){
						event.preventDefault();
						let Con= document.getElementById('Contrasena').value;
						let Con_con= document.getElementById('Con_Contrasena').value;

						if(Con!=Con_con)
						{
							alert('Las contraseñas no coinciden');
						}
						else
						{
							$('#fomulario_usuario').submit();
						}

					})
					$('#fomulario_usuario').submit(e=>{
						$.ajax({
							url:'bean/actualizar_usuario.php',
							method:'POST',
							dataType:'html',
							data:$('#fomulario_usuario').serialize(),
							success:dato=>{
								let res= jQuery.parseJSON(dato);
								if(res.success=='true')
								{
									$('#mostrar').html('Datos Actualizados');
									$('#mostrar').modal();
								}
								else
								{
									$('#mostrar').html(res.mensaje);
									$('#mostrar').modal();
								}
							}
						})
					});
					
				});
				$('#elim_$fila[0]').click(event=>{
					let con=confirm('Seguro de querer bloquear este usuario?');
					if(con==true){
						$.ajax({
							url:'bean/block_us.php',
							method:'POST',
							dataType:'html',
							data:{codigo:'".base64_encode($fila[0])."'},
							success:dato=>{
								let res= jQuery.parseJSON(dato);
								if(res.success=='true')
								{
									$('#mostrar').html('Usuario actualizado');
									$('#mostrar').modal();
								}
								else
								{
									$('#mostrar').html(res.mensaje);
									$('#mostrar').modal();
								}
							}
						})
					}
					else{
						alert('Cancelado');
					}

				});
			  </script>
		     ";
	}
	?>
</table>
</div>

<br>
<br>
<br>
<br>
</body>
</html>


