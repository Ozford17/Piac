<?php
	require_once"../../../src/consultas.php";
	$consultas= new consultas();
	session_start();
	$cod=$_GET['s'];
	$cod=base64_decode($cod);
	$fecha_hoy=date('Y')."-".date('m');

	function cargar_m(){
		require_once"../../../src/consultas.php";
	$consultas= new consultas();
		$resp=$consultas->listar_material();
		$i=0;
		echo "<script languaje='javascript'>\n ";
		while ($fila=mysqli_fetch_array($resp)) {
			
			echo "id_material[".$i."]=".$fila[0].";\n";
			echo "nombre_material[".$i."]='".$fila[1]."';\n";
			echo "tipo_material[".$i."]=".$fila[2].";\n";
			$i++;
		}
		echo "</script>";
	}
	if ($_SESSION['sede']==0) {
		header('Location:../../index.php');
		exit();
	}
?>
<!DOCTYPE >
<html>
<head>
	<title>Registro de residuos solidos</title>
	<link rel="shortcut icon" href="../../../images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="../../../css/sede.css">
	<link rel="stylesheet" type="text/css" href="../../../css/arriba.css">
	<script type="text/javascript">
		var id_material= new Array();
		var nombre_material= new Array();
		var tipo_material= new Array();
		
		function destruir(){
		$_SESSION['sede']=0;
	}
		function oprimir(){
			var reciclar= document.getElementById("reciclable");
			var reci = document.getElementById("reci");
			var texto=document.getElementById("reci_text");
			
			if (reciclar.checked) {
				reci.style.background="#0292AB";
				texto.style.color="white";
				texto.style.opacity="1";
				reci.style.opacity="1"
			}
			else{
				reci.style.background="white";
				texto.style.color="gray";
				texto.style.opacity="0.5";
				reci.style.opacity="1"
			}
			var reciclar= document.getElementById("Peligroso");
			var reci = document.getElementById("Peli");
			var texto=document.getElementById("Peli_text");
			if (reciclar.checked) {
				reci.style.background="#0292AB";
				texto.style.color="white";
				texto.style.opacity="1";
				reci.style.opacity="1"
			}
			else{
				reci.style.background="white";
				texto.style.color="gray";
				texto.style.opacity="0.5";
				reci.style.opacity="1"
			}
			var reciclar= document.getElementById("Escombros");
			var reci = document.getElementById("ESc");
			var texto=document.getElementById("Esc_text");
			if (reciclar.checked) {
				reci.style.background="#0292AB";
				texto.style.color="white";
				texto.style.opacity="1";
				reci.style.opacity="1"
			}
			else{
				reci.style.background="white";
				texto.style.color="gray";
				texto.style.opacity="0.5";
				reci.style.opacity="1"
			}
			var reciclar= document.getElementById("Raes");
			var reci = document.getElementById("R");
			var texto=document.getElementById("R_text");
			if (reciclar.checked) {
				reci.style.background="#0292AB";
				texto.style.color="white";
				texto.style.opacity="1";
				reci.style.opacity="1"
			}
			else{
				reci.style.background="white";
				texto.style.color="gray";
				texto.style.opacity="0.5";
				reci.style.opacity="1"
			}
			var reciclar= document.getElementById("Ordinarios");
			var reci = document.getElementById("Ord");
			var texto=document.getElementById("Ord_text");
			if (reciclar.checked) {
				reci.style.background="#0292AB";
				texto.style.color="white";
				texto.style.opacity="1";
				reci.style.opacity="1"
			}
			else{
				reci.style.background="white";
				texto.style.color="gray";
				texto.style.opacity="0.5";
				reci.style.opacity="1"
			}
			var reciclar= document.getElementById("Especiales");
			var reci =document.getElementById("Esp");
			var texto=document.getElementById("Esp_text");
			if (reciclar.checked) {
				reci.style.background="#0292AB";
				texto.style.color="white";
				texto.style.opacity="1";
				reci.style.opacity="1"
			}
			else{
				reci.style.background="white";
				texto.style.color="gray";
				texto.style.opacity="0.5";
				reci.style.opacity="1"
			}
		}
		function eliminar(){
			var Material= document.Resi.Material;
			var cantidad= Material.options.length;
			Material.options.length=0;
			var selec= document.createElement("option");
			selec.text="Seleccione";
			selec.value="Seleccione";
			Material.add(selec);
		}
		function limpiar_material()
		{
			eliminar();
			var ctrl=document.Resi.Reciduos;
			for(i=0;i<ctrl.length;i++)
		        if(ctrl[i].checked) {
		       		cargar_materiales(ctrl[i].value);
		       		break;
		        }

		}
		

		function cargar_materiales(valor){
			var Material= document.Resi.Material;
			
			j=1;
			for(i=0;i<id_material.length;i++) {
				if (tipo_material[i]==valor) {
					var Option=document.createElement("option");
					Option.text=nombre_material[i];
					Option.value=nombre_material[i];
					Material.add(Option);
					j++;
				}
			}

			

		}

		
			
		

	</script>
		<?php cargar_m();?>
</head>
<body>
	<div class="arriba"><img src="../../../images/Logo.png"><p >Corriente de residuos solidos</p><a href="https://piac.ecoblue.co/" onClick="d"> Cerrar sesion</a></div>
	<div id="Grande">
	<div id="div_1" style=" width: 40%;  margin-left: 5%; ">
		<div id="div_grande" style="">
			<div id="div_prove" style=" width: 95%;margin-left: 3%;">
				<div id="subtitulos"><h3>Incripcion de proveedores</h3></div>
				<form id="formulario_prove"action="prove/agregar.php" method="POST"> <!--Javascript:Agregar.focus();-->
				<table width="100%"style="text-align: center;" >
					<tr>
						<td colspan="2">
							<label>Nombre de la empresa	</label><br>
							<input type="text" name="nombre" id="nombre" required="">
						</td>	
					</tr>
					<tr>
						<td>
							<label>NIT</label><br>
							<input type="text" name="nit" id="nit" required="">
						</td>
						<td>
							<label>Direccion</label><br>
							<input type="text" name="direccion" id="direccion" required="">
						</td>
					</tr>
					<tr>
						<td>
							<label>Area de residuos</label><br>
							<input type="text" name="area" id="area" required="">
						</td>
						<td>
							<label>Ciudad</label><br>
							<input type="text" name="ciudad" id="ciudad" required="">
						</td>
					</tr>
					<tr>
						<td hidden=""><input type="text" name="sede" id="sede" value="<?php echo $cod?>" hidden=""></td>
						<td colspan="2"><input type="submit" name="Agregar" id="Agregar" value="Agregar"></td>
						

					</tr>	
					</table>
				</form>
			</div>
			<div id="div_doc" style=" width: 95%; margin-left: 3%; margin-top: 2vw;">
				<div id="subtitulos"><h3>Documentacion</h3></div>
				<form action="prove/subir.php" method="POST" enctype='multipart/form-data'>
					<table>
						<tr>
							<td colspan="2">
								<label>Nombre del Proveedor</label>
								<select name="id" id="name">
									<option value="0">Seleccione</option>
									<?php
											$resp=$consultas->consultar_proveedor_sede($cod);
											while ($fila=mysqli_fetch_array($resp)) {
												echo '<option value="'.$fila[0].'">'.$fila[2]."- ".$fila[4].'</option>';
											}
										?>
								</select>
								<input type="text" name="s" value="<?echo $cod?>" hidden="">
							</td>
						</tr>
					<tr>
						<td><label>Camara de comercio</label></td>
						<td width="30%">
							<div id="file">
								<p id="texto">Add file</p>
								<input type="file" name="camara_comercio" class="boton_archivo" >
							</div>
						</td>

					</tr>
					<tr>
						<td><label>Rut</label></td>
						<td>
							<div id="file">
								<p id="texto">Add file</p>
								<input type="file" name="Rut" class="boton_archivo" >
							</div>
						</td>	
					</tr>
					<tr>
						<td><label>Cedula Representate</label></td>	
						<td>
							<div id="file">
								<p id="texto">Add file</p>
							    <input type="file" name="cedula" class="boton_archivo" >
							</div>
						</td>
					</tr>
					<tr>
						<td><label>Permisos</label></td>
						<td>
							<div id="file">
								<p id="texto">Add file</p>
								<input type="file" name="permisos" class="boton_archivo" >
							</div>
						</td>
					</tr>
					<tr>
						<td><label>Certificaciones</label></td>
						<td>
							<div id="file">
								<p id="texto">Add file</p>
								<input type="file" name="certificado" class="boton_archivo" >
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="color:black;font-size: 0.9vw;text-align: left;">**En caso de poseer varias certificaciones y permisos subirlo	comprimido**</p>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input  type="submit" name="Agregar_doc" value="Subir">
						</td>
					</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
		<div id="div_2" style=" width: 40%;margin-left: 5%;">
			<div id="div_grande">
				<div id="residuo">
					<h3 id="subtitulos">Ingreso de residuos</h3>
					<form name="Resi" action="Agregar.php" method="POST" enctype="multipart/form-data">
						<table width="100%" >
							<tr>
								<td colspan="3"><label for=mes_ano>Mes y Año</label><br>
								     <input type="month" name="mes_ano" id="mes_ano" min="2010-01" max="<? echo $fecha_hoy?>" required=""></td>
								
							</tr>
							<tr>
								<td colspan="3"><label aling="left">Seleccione su residuo</label></td>
							</tr>
							<tr>
								<td><div class="tabla_residuos" onClick="oprimir()"  id="reci">
									<input onChange="limpiar_material()" value="1" type="radio" name="Reciduos" id="reciclable">
									<label id="reci_text" for="reciclable">Reciclable</label></div>
								</td>
								<td>
									<div class="tabla_residuos" onClick="oprimir()"  id="Peli">
										<input onChange="limpiar_material()" value="2" type="radio" name="Reciduos" id="Peligroso">
										<label for="Peligroso" id="Peli_text">Peligroso</label>
									</div>
								</td>
								<td>
									<div class="tabla_residuos" onClick="oprimir()"  id="ESc">
										<input onChange="limpiar_material()" value="3" type="radio" name="Reciduos" id="Escombros">
										<label for="Escombros" id="Esc_text">Escombros</label>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="tabla_residuos" onClick="oprimir()"  id="R">
										<input onChange="limpiar_material()" value="4" type="radio" name="Reciduos" id="Raes">
										<label for="Raes" id="R_text">Raes</label>
									</div>
								</td>
								<td>
									<div class="tabla_residuos" onClick="oprimir()"  id="Esp">
										<input onChange="limpiar_material()" value="5" type="radio" name="Reciduos" id="Especiales">
										<label for="Especiales" id="Esp_text">Especiales</label>
									</div>
								</td>
								<td>
									<div class="tabla_residuos" onClick="oprimir()"  id="Ord">
										<input onChange="limpiar_material()" value="6" type="radio" name="Reciduos" id="Ordinarios">
										<label for="Ordinarios" id="Ord_text">Ordinarios</label>
									</div>
								</td>
							</tr>
						</table>
						<table width="100%" style="margin-top: 2vw;">
							<tr>
								<td><label for="Material">Tipo de material</label><br>
									<select name="Material" id="material">
										<option value="seleccione">Seleccione...</option>

									</select>
								</td>
								<td><label for="provee">Seleccione Proveedor</label><br>
									<select name="provee" id="provee">
										<option value="selec">Seleccione</option>
										<?php
											$resp=$consultas->consultar_proveedor_sede($cod);
											while ($fila=mysqli_fetch_array($resp)) {
												echo '<option value="'.$fila[0].'">'.$fila[2].'</option>';
											}
										?>
									</select></td>
							</tr>
							<tr>
								<td>
									<label for="cantidad">Cantidad Kg</label><br>
									<input type="text" name="cantidad" id="cantidad" required="">
								</td>
								<td>
									<label for="kilo">Precio Kilo</label><br><input type="text" name="Kilo" id="Kilo" required="">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label for="descripcion">Descripción (Tipo)</label><br>
									<textarea id="descripcion" name="descripcion" required=""></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label for="observacion">Observación</label><br>
									<textarea id="observacion" name="observacion" required="" placeholder="Estado del residuo"></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label for="cargue">Cargue de certificado</label><br>
									<div id="file">
										<p id="texto">Insertar Aquí</p>
										<input type="file" name="certificado_residuo" id="cargue" class="boton_archivo" required="">
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="text" name="sede" value="<?echo $cod?>" hidden="">
									<input type="submit" name="Finalizar" value="Finalizar"></td>

							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	
<script src="../../../lib/js/jquery-min.js"></script>
<script src="../../../js/funcionajax.js"></script>
<script src="../../../lib/js/bootstrap4/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>

<?php
	if (isset($_GET['ok'])) {
		$ok=$_GET['ok'];
		if ($ok=="1") {
			echo "<script languaje='javascript'>alert('Se agrego el proveedor')</script>";
		}
		else if ($ok=="2") {
			echo "<script languaje='javascript'>alert('Se subieron los archivos')</script>";
		}
		else if ($ok=="3") {
			echo "<script languaje='javascript'>alert('Se cargo el residuo')</script>";
		}
		else if ($ok=="0") {
			echo "<script languaje='javascript'>alert('ya hay un proveedor registrado con ese Nit y del mismo area')</script>";
		}

	}
	if (isset($_GET['err'])) {
		$error=$_GET['err'];
		echo "<script languaje='javascript'>alert('".base64_decode($error)."')</script>";
	}
?>

