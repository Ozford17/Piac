<?php 
require_once "../../../src/consultas.php";
$consultas=new consultas();
$cod=$_GET['cod'];
echo ' <table style="margin-left:3%; margin-top:2vw; width:90%; text-align:center;" aling="center" >
 	<tr>
 		<th width="20%">Nombre</th>
 		<th>Ciudad</th>
 		<th>Dirección</th>
 		<th>Telefono</th>
 		<th>Representante</th>
 		<th>Correo</th>
 		<th width="5%"></th>
 		<th width="5%"></th>
 	</tr>
 	';
 		$res=$consultas->BuscarSedeEmpresa($cod);
 		while ($fila=mysqli_fetch_array($res)) {
 			echo '<tr aling="center">
 						<td hidden="" id="codigo">'.$fila[0].'</td>
 						<td id="nombre">'.$fila[1].'</td>
 						<td id="ciudad">'.$fila[2].'</td>
 						<td id="direccion">'.$fila[3].'</td>
 						<td id="telefono">'.$fila[4].'</td>
 						<td id="representante">'.$fila[5].'</td>
 						<td id="correo">'.$fila[6].'</td>
 						<td ><img src="../../../images/editar.png" id="editar_'.$fila[0].'" style="cursor:pointer; cursor: pointer;  width: 80%; height: 3vw;"></td>';
 				if ($fila[0]!=1) {
 						echo'<td ><img src="../../../images/eliminar.png" id="eliminar_'.$fila[0].'" style="cursor:pointer; width:80%; cursor: pointer; width: 80%; height: 3vw;"</td>';
 					}
 				echo '</tr>';

 				echo '<script>	
						$("#editar_'.$fila[0].'").click(function(event){
 								/* Se saca los valores que guardan los td*/
 								var codigo='.$fila[0].';
 								var nombre=$(this).parents("tr").find("td").eq(1).text();	
 								var ciudad=$(this).parents("tr").find("td").eq(2).text();
 								var direccion=$(this).parents("tr").find("td").eq(3).text();
 								var telefono=$(this).parents("tr").find("td").eq(4).text();
 								var representante=$(this).parents("tr").find("td").eq(5).text();
 								var correo=$(this).parents("tr").find("td").eq(6).text();
 								$("#editar").off("click");
								 var Form=\'<form id="formulario" action="Javascript:Enviar.focus();" method="POST" aling="center">\'+
									 \'<h2>Editar datos de sede</h2>\'+
									 \'<br>\'+
 									\'<input type="text" name="codigo" hidden="" value="\'+codigo+\'" >\'+
 									\'<label for="Nombre">Nombre</label><br>\'+
 									\'<input type="text" value="\'+nombre+\'" name="Nombre" id="Nombre"><br>\'+
 									\'<label for="Ciudad">Ciudad</label><br>\'+
 									\'<input type="text" name="Ciudad" value="\'+ciudad+\'" id="Ciudad"><br>\'+
 									\'<label for="Dirección">Dirección</label><br>\'+
 									\'<input type="text" name="Dirección" value="\'+direccion+\'" id="Dirección"><br>\'+
 									\'<label for="Telefono">Teléfono</label><br>\'+
 									\'<input type="text" name="Telefono" value="\'+telefono+\'" id="Telefono"><br>\'+
 									\'<label for="Representante">Representante</label><br>\'+
 									\'<input type="text" name="Representante" value="\'+representante+\'" id="Representante"><br>\'+
 									\'<label for="Correo">Correo</label><br>\'+
									\'<input type="text" name="Correo" id="Correo"  value="\'+correo+\'" disabled="true"><br> <br>\'+
 									\'<input type="submit" name="Enviar" id="Enviar" value="Enviar"> \'+
									 \'</form>\';
									 $("#modal").html(" ");
									 $("#modal").append(Form);
									 $("#modal").modal(Form);
						
 									
 									$("#Enviar").on("click", function (e) {
	 			
    									$.ajax({
    									  url: "bean/Update.php",
    									  type: "POST",
    									  dataType:"html",
    									  data: $("#formulario").serialize(),
    									  success: function (data) {
    									    console.log(data);
								
    									    
    									  }
    									});
	    								$("#tabla_sede").remove();
	    								$("#div_nuevo").append("<div id=tabla_sede></div>");
										$(function(){
										$.get("bean/sedes.php",{cod:'.$cod.'},function(data){ 
											$("#tabla_sede").append(data);
										
											});
										});
						
						
										$("#formulario").remove();
										$("#editar").on("click");
						
	 								});

	 		

 					});
 				</script>';

 		}
 		
 		
 	
		 echo '</table> 
		 	<div id="modal" style="text-align:center;"></div>';


 ?>
 
