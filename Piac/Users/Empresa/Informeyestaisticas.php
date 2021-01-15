<?php
require_once'../../src/consultas.php';
$consultas= new consultas();
session_start();

if ($_SESSION['sede']==0) {
	header('Location:../../index.php');
	exit();
}
$sede=$_SESSION['sede'];
?>
<!DOCTYPE>
<html>
<head>
	<title>Informe y estadisticas </title>
	<link rel="shortcut icon" href="../../images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="../../css/empresa.css">
  <link rel="stylesheet" type="text/css" href="../../css/arriba.css">
	<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
     	google.charts.setOnLoadCallback(Chart);
     	google.charts.setOnLoadCallback(hidrica);

		function Cargar_sede(){
			var tipo=document.form.tipo_informe;
			var sede=document.form.sede;
			if (tipo.value=="E") {
				sede.hidden=false;
				sede.style.display="inline"
			}
			else{
				sede.style.display="none";
			}
		}

		function Cargar_mes(){
			var periodo= document.form.periodo;
			var mes= document.form.mes;
			if (periodo.value=="m") {
				mes.style.display="inline";
			}
			else{
				mes.style.display="none";
			}
		}
		function Chart(){
			var campo=document.getElementById('cr');
        		var diseño1=document.createElement("div");
        		diseño1.setAttribute("id","torta");
        		diseño1.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px;;" );
        		campo.appendChild(diseño1);

        		var data = google.visualization.arrayToDataTable([
          				['Tipo', 'Cantidad material'],
          				<?php
            				$resp= $consultas->Grafica_residuo_solidos();
            				while ($fila=mysqli_fetch_array($resp)) {
              					echo "['".$fila[0]."',".$fila[1]."],";
            				}
          				?>
        		]);

        		var options = {
          		title: 'Cantidad de materiales reciclados'
        		};

        		var chart = new google.visualization.PieChart(document.getElementById('torta'));

        		chart.draw(data, options);
      /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/  					
        		
		}

		function hidrica(){
				dibujar_ha();
				dibujar_hv();
				dibujar_hg();
		}
		function dibujar_ha()
		{
			var valor="Azul";

			var campo=document.getElementById('cha');
        		var diseño3=document.createElement("div");
        		diseño3.setAttribute("id","barra_hidrica_azul");
        		diseño3.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px;border-radius:25px" );
        		campo.appendChild(diseño3);

        		var data = google.visualization.arrayToDataTable([
          				['huella '+valor, 'Cantidad'],
          				<?php 
          					$mes= array();		
          					$cantidad= array();
          					$codigo_empresa=0;
          					$resp=$consultas->BuscarEmpresa_sede($sede);
							if ($fila=mysqli_fetch_array($resp)) {
								$codigo_empresa=$fila[0];
							}
            				$resp= $consultas->Grafica_residuo_solidos_2019("Azul",$codigo_empresa);
            				while ($fila=mysqli_fetch_array($resp)) {
              						$mes[]=$fila[0];
              						$cantidad[]=$fila[2];
            				}
            				for ($i=1; $i <=12 ; $i++) {
            						$bandera=0; 
            						$suma=0;
            						$contador=0;
            					for ($a=0; $a <count($mes) ; $a++) { 
            						
            						if ($i==$mes[$a]) {
            							$contador++;
            							$suma=$cantidad[$a]+$suma;
            							$bandera=1;
            						}            					
            					}
            					if ($bandera==0) {
            						echo "['".$i."',0],";
            					}
            					else{
            						echo "['".$i."','".$suma."'],";
            					}

            					
            				}
          				?>
        		]);

        		var options = {
          		title: 'huella hidrica azul mes del 2019'
        		};

        		var chart = new google.visualization.ColumnChart(document.getElementById('barra_hidrica_azul'));

        		chart.draw(data, options);
        		
		}
		function dibujar_hv()
		{
			var valor="verde";
			var campo=document.getElementById('chv');
        		var diseño2=document.createElement("div");
        		diseño2.setAttribute("id","barra_hidrica_chv");
        		diseño2.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px;border-radius:25px" );
        		campo.appendChild(diseño2);

        		var data = google.visualization.arrayToDataTable([
          				['huella '+valor, 'Cantidad'],
          				<?php 
          					$mes= array();		
          					$cantidad= array();
          					$codigo_empresa=0;
          					$resp=$consultas->BuscarEmpresa_sede($sede);
							if ($fila=mysqli_fetch_array($resp)) {
								$codigo_empresa=$fila[0];
							}
            				$resp= $consultas->Grafica_residuo_solidos_2019("verde", $codigo_empresa);
            				while ($fila=mysqli_fetch_array($resp)) {
              						$mes[]=$fila[0];
              						$cantidad[]=$fila[2];
            				}
            				for ($i=1; $i <=12 ; $i++) {
            						$bandera=0; 
            						$suma=0;
            						$contador=0;
            					for ($a=0; $a <count($mes) ; $a++) { 
            						
            						if ($i==$mes[$a]) {
            							$contador++;
            							$suma=$cantidad[$a]+$suma;
            							$bandera=1;
            						}            					
            					}
            					if ($bandera==0) {
            						echo "['".$i."',0],";
            					}
            					else{
            						echo "['".$i."','".$suma."'],";
            					}

            					
            				}
          				?>
        		]);

        		var options = {
          		title: 'huella hidrica verde mes del 2019'
        		};

        		var chart = new google.visualization.ColumnChart(document.getElementById('barra_hidrica_chv'));

        		chart.draw(data, options);
        		
		}
		function dibujar_hg()
		{
			var valor="gris";
			var campo=document.getElementById('chg');
        		var diseño2=document.createElement("div");
        		diseño2.setAttribute("id","barra_hidrica_chg");
        		diseño2.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px; border-radius:25px;" );
        		campo.appendChild(diseño2);

        		var data = google.visualization.arrayToDataTable([
          				['huella '+valor, 'Cantidad'],
          				<?php 
	          				$mes= array();		
          					$cantidad= array();
          					$codigo_empresa=0;
          					$resp=$consultas->BuscarEmpresa_sede($sede);
							if ($fila=mysqli_fetch_array($resp)) {
								$codigo_empresa=$fila[0];
							}
            				$resp= $consultas->Grafica_residuo_solidos_2019("gris",$codigo_empresa);
            				while ($fila=mysqli_fetch_array($resp)) {
              						$mes[]=$fila[0];
              						$cantidad[]=$fila[2];
            				}
            				for ($i=1; $i <=12 ; $i++) {
            						$bandera=0; 
            						$suma=0;
            						$contador=0;
            					for ($a=0; $a <count($mes) ; $a++) { 
            						
            						if ($i==$mes[$a]) {
            							$contador++;
            							$suma=$cantidad[$a]+$suma;
            							$bandera=1;
            						}            					
            					}
            					if ($bandera==0) {
            						echo "['".$i."',0],";
            					}
            					else{
            						echo "['".$i."','".$suma."'],";
            					}

            					
            				}
          				?>
        		]);

        		var options = {
          		title: 'huella hidrica Gris mes del 2019'
        		};

        		var chart = new google.visualization.ColumnChart(document.getElementById('barra_hidrica_chg'));

        		chart.draw(data, options);
        		
		}

	</script>
</head>
<body>
<div class="arriba"><img src="../../images/Logo.png"><p>Informe y estadisticas</p><a href="https://piac.ecoblue.co/index.php?c=1/"> Cerrar sesion</a></p></div>
<div id="menu">
	<a href="home.php"><button><p>Sedes</p></button></a>
	<a href="Informeyestaisticas.php"><button><p>Informe y Estadisticas</p></button></a>
</div>
<div id="centro">
	<div id="informe">
		<h2>Informes de emision de CO2</h2>
		<form name="form" action="bean/Descargar.php">
			<label>Descargar informe por: </label>
			<select name="tipo_informe" onChange="Cargar_sede()">
				<option value="S">Seleccione</option>
				<option value="G">General</option>
				<option value="E">Sede</option>
			</select>
			<select name="sede" hidden="" >
				<option value="s">Seleccione</option>
				<?php
					$resp=$consultas->BuscarEmpresa_sede($sede);
					if ($fila=mysqli_fetch_array($resp)) {
						$codigo_empresa=$fila[0];
					}
					$re=$consultas->BuscarSedeEmpresa($codigo_empresa);
					while ($f=mysqli_fetch_array($re)) {
						echo "<option value='".$f[0]."'>".$f[1]."</option>";
					}

				?>
			</select><br>
			<label for="per">Periodo</label>
			<select name="periodo" id="per" onChange="Cargar_mes()">
				<option value="s">Seleccione</option>
				<option value="a">Anual</option>
				<option value="m">Mensual</option>
			</select>
			<select name="mes" style="display: none;">
				<option value="S">Seleccione</option>
				<?php
					for($i=1;$i<=12;$i++){
						echo "<option value='".$i."'>".$i."</option>";
					}
				?>
			</select><br>
			<input type="submit" name="Enviar" value="Enviar">
		</form>
		
	</div>

	<div id="estadisticas" style="position: relative;">
		<div id="cr" style="width: 40%; float: left; margin-left: 8%; ">

		</div>
		<div id="cre" style="width: 40%; float: left; margin-left: 20%; ">

		</div>
		<div id="cha" style="width: 40%; float: left; margin-left: 8%; ">

		</div>	
		<div id="chv" style="width: 40%; float: left; margin-left: 8%; ">

		</div>	
		<div id="chg" style="width: 40%; float: left; margin-left:8%; ">

		</div>	
	</div>

	
</div>
</body>
</html>