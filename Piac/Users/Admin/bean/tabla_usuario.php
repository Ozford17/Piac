
<?php
require_once"../../../src/consultas.php";
$consultas=new consultas();
session_start();
?>
<table aling="center" id="tabla"  style=" margin:6vw 0 0 5%;text-align: center; position: absolute; width: 95%;">
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
				<td><i class='fa fa-pencil-square fa-3x' style='color:#59b7c8;' id='edit_$fila[0]' aria-hidden='true'></i>  </td>
				<td>";
				if($fila[6]==0)
				{
					echo "<i id='elim_$fila[0]' style='color:red; cursor:pointer;' class='fa fa-ban fa-3x' title='Bloquear' aria-hidden='true'>";
				}
				else
				{
					echo "<i id='act_$fila[0]' style='color:#45619d; cursor:pointer;' class='fa fa-check fa-2x' title='Activar' aria-hidden='true'></i>";
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
						let codigo='".base64_encode($fila[0])."';
						Accion_usu(codigo,1);
					}
					else{
						alert('Cancelado');
					}

				});
				$('#act_$fila[0]').click(event=>{
					$.ajax({
						url:'bean/Activar_us.php',
						method:'POST',
						dataType:'html',
						data:{Codigo:$fila[0]},
						success:dato=>{
							let res=jQuery.parseJSON(dato);
							if(res.success=='true')
							{
								$('#todo').load('bean/tabla_usuario.php');
							}
							else
							{
								alert('Se produjo un error');
								console.log(res.mensaje);
							}
						}
					});
				});
			  </script>
		     ";
	}
	?>
</table>