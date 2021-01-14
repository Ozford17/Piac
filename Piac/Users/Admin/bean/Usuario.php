<?php
require_once"../../../src/consultas.php";
$consultas=new consultas();
session_start();
?>
<div style="width: 80%;">
<table align="center" id="tabla"  style=" margin:6vw 0 0 5%;text-align: center; position: absolute;">
	<tr>
		<th width="15%">nombre</th>
		<th>correo</th>
		<th width="15%">tipo usuario</th>
		<th>sede</th>
		<th width="5%" >Editar</th>
		<th width="5%" >Eliminar</th>
	</tr>
	<?php 
	$respuesta=$consultas->BuscarUsuario();
	while ($fila=mysqli_fetch_array($respuesta)) {
		echo "<tr >
				<td>".$fila[1]."</td>
				<td>".$fila[2]."</td>
				<td>".$fila[3]."</td>
				<td>".$fila[4]."</td>
				<td><img src='../../images/editar.png' style='cursor:pointer; width:15%;'></td>
				<td><img src='../../images/eliminar.png'style='cursor:pointer; width:15%; margin-left:0;'></td>
			  </tr>
		     ";
	}
	?>
</table>
</div>
<div style="background: #0295AB; width: 20%;  height: 100%; margin-left: 80%; position: absolute; z-index: 4;">
	<img src="../../images/agregar.png" id="agregar" style="cursor:pointer;width: 50%; margin:5vw 0 0 20%">
</div>
<br>
<br>
<br>
<br>
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
					"width":"0%",
					"margin-left":"99%",
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

