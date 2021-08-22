<?php

if (is_array($_POST['fuentes_fijas'])  && is_array($_POST['automovil']) || isset($_POST['Extintor_co']) || isset($_POST['Extintor_HCFC'])) {
require_once'../../../../src/consultas.php';
$consultas= new consultas();
	/*
	for ($i=0; $i <count($_POST['fuentes_fijas']); $i++) { 
			//echo  $_POST['fuentes_fijas'][$i]."<br>	";
		}
	for ($i=0; $i <count($_POST['refrigerante']); $i++) { 
			//echo  $_POST['refrigerante'][$i]."<br>	";
		}
	for ($i=0; $i <count($_POST['automovil']); $i++) { 
			//echo  $_POST['automovil'][$i]."<br>	";
		}
	//echo "Extintores ".$_POST['Extintor_co']."<br>";
	//echo "Extintor dos ".$_POST['Extintor_HCFC']."<br>";
*/

if (isset($_POST['nombres']) && !empty($_POST['nombres'])) {
	$nombre=$_POST['nombres'];
	$sede=$_POST['sede'];

	$nombres=explode(",", $nombre);
	$f=0;
	$fm=0;
	$fr=0;
	$bandera=false;
	$bandera1=false;
	for ($i=0; $i <count($nombres) ; $i++) { 

		if (($nombres[$i]=="automovil") || ($bandera==true)) {
			$automovil[$fm]=$nombres[$i];
			$fm++;
			$bandera=true;
		}
		else if(($nombres[$i]=="refrigerante") || ($bandera1==true)){
			$refrigerante[$fr]=$nombres[$i];
			$fr++;
			$bandera1=true;
		}
		else{

				$fuentes[$f]=$nombres[$i];
				$f++;
		}
	}


	for ($a=0; $a <count($fuentes) ; $a++) { 
		//echo $fuentes[$a]."<br>	";
	}
	for ($b=0; $b <count($automovil) ; $b++) { 
		//echo $automovil[$b]."<br>	";
	}
	for ($c=0; $c <count($refrigerante) ; $c++) { 
		//echo $refrigerante[$c]."<br>	";

	}
	$ok_f_f=false;
	$ok_f_m=false;
	$ok_refri=false;
	$ok_extin=false;
	$fecha=date('Y')."-".date('m')."-".date('d');
	$fecha_registro=$_POST['fecha_registro'];

	//-----------------------------------------------fuentes fijas ----------------------------------------------///////

		for ($i=0; $i < count($_POST['fuentes_fijas']) ; $i++) { 
			$nombre_combustible_fuente_fija=$fuentes[$i+1];
			$valor_compustible_fuente_fija=$_POST['fuentes_fijas'][$i];
			 $nombre_combustible_fuente_fija." = ".$valor_compustible_fuente_fija."<br>	";

			$res= $consultas->Listado_t_elementos();
			while($fila=mysqli_fetch_array($res))
			{
				if ($nombre_combustible_fuente_fija==$fila[1]) {
					$ele=$fila[0];
					$CO2=$fila[4];
					$CH4=$fila[6];
					$N2O=$fila[8];
					$total_calculo_CO2=$CO2*$valor_compustible_fuente_fija;				
					$total_calculo_CH4=$CH4*$valor_compustible_fuente_fija;				
					$total_calculo_N2O=$N2O*$valor_compustible_fuente_fija;				
					$r=$consultas->Maximo_cod_huella_carbono_fuentes_fijas_combustible();
					if ($f=mysqli_fetch_array($r)) {
						$codigo=$f[0];
					}
					$codigo++;
					//echo "Codigo ". $codigo."<br>	";
					//echo "Elemento".$ele."<br>	";
					//echo "valor ".$valor_compustible_fuente_fija."<br>";
					//echo "CO2 del elemento ".$CO2."<br>	";
					//echo "total calculo ".$total_calculo."<br>	";
					//echo "fecha".$fecha."<br>	";					
					//echo "Sede". $sede."<br>	";
					//echo '**--------------------------------------------------- <br>	**'; 

					$consultas->insertar_huella_carbono_fuentes_fijas_combustible($codigo,$ele,$valor_compustible_fuente_fija,$total_calculo_CO2,$total_calculo_CH4,$total_calculo_N2O,$fecha_registro,$fecha,$sede);

				}
			}
			
		}
		//----------------------------------------------- GRASAS Y ACEITES ----------------------------------------------///////

		$aceite=$_POST['aceite'];
		$grasas=$_POST['grasas'];

		//echo $grasas."<br>	";
		//echo $aceite."<br>	";
		$fecha=date('Y')."-".date('m')."-".date('d');

		$res=$consultas->max_huella_lubricante();
		if ($fila=mysqli_fetch_array($res)) {
			$codigo_lubricante=$fila[0];
		}
		$codigo_lubricante++;
		$re=$consultas->listar_tipo_lubricante("1");
		if ($fil=mysqli_fetch_array($re)) {
			$factor_emision=$fil[2];
		}
		$total_aceite=$factor_emision*$aceite;
		$consultas->insertar_huella_lubricante($codigo_lubricante,$sede,"1",$aceite,$total_aceite,$fecha_registro,$fecha);
		$re=$consultas->listar_tipo_lubricante("2");
		if ($fil=mysqli_fetch_array($re)) {
			$factor_emision=$fil[2];
		}
		$codigo_lubricante++;
		$total_grasas=$factor_emision*$grasas;
		$consultas->insertar_huella_lubricante($codigo_lubricante,$sede,"2",$grasas,$total_grasas,$fecha_registro,$fecha);

		//-----------------------------------------------fuentes moviles ----------------------------------------------///////

		for ($i=0; $i < count($_POST['automovil']) ; $i++) { 
			$nombre_combustible_fuente_fija=$automovil[$i+1];
			$valor_compustible_fuente_fija=$_POST['automovil'][$i];
			//echo $nombre_combustible_fuente_fija." = ".$valor_compustible_fuente_fija."<br>	";

			$res= $consultas->consultar_fuente_moviles_cod($nombre_combustible_fuente_fija);
			while($fila=mysqli_fetch_array($res))
			{
				if ($nombre_combustible_fuente_fija==$fila[0]) {
					$placa=$fila[0];
					$CO2=$fila[4];					
					$CH4=$fila[5];
					$N2O=$fila[6];
					$total_calculo_CO2=$CO2*$valor_compustible_fuente_fija;				
					$total_calculo_CH4=$CH4*$valor_compustible_fuente_fija;				
					$total_calculo_N2O=$N2O*$valor_compustible_fuente_fija;					
					$fecha=date('Y')."-".date('m')."-".date('d');
					$r=$consultas->Maximo_cod_huella_carbono_fuentes_moviles();
					if ($f=mysqli_fetch_array($r)) {
						$codigo=$f[0];
					}
					$codigo++;
					//echo "Codigo ". $codigo."<br>	";
					//echo "Placa".$placa."<br>	";
					//echo "Valor ".$valor_compustible_fuente_fija."<br>	";
					//echo "CO2 del elemento ".$CO2."<br>	";
					//echo "total calculo ".$total_calculo."<br>	";
					//echo "fecha".$fecha."<br>	";					
					//echo "Sede". $sede."<br>	";
					//echo '**--------------------------------------------------- <br>	**';

					$consultas->insertar_huella_carbono_fuentes_moviles($codigo,$placa,$valor_compustible_fuente_fija,$total_calculo_CO2,$total_calculo_CH4,$total_calculo_N2O,$fecha_registro,$fecha);

				}
			}
			
		}
		//-----------------------------------------------  Refrigerantes ----------------------------------------------///////
		if(isset($_POST['refrigerante']) && is_array($_POST['refrigerante'])){
		for ($i=0; $i < count($_POST['refrigerante']) ; $i++) { 
			$nombre_combustible_fuente_fija=$refrigerante[$i+1];
			$valor_compustible_fuente_fija=$_POST['refrigerante'][$i];
			//echo $nombre_combustible_fuente_fija." = ".$valor_compustible_fuente_fija."<br>	";

			$res= $consultas->Listado_refrigerantes();
			while($fila=mysqli_fetch_array($res))
			{
					if ($nombre_combustible_fuente_fija==$fila[1]) {
						$refri=$fila[0];
						$CO2=$fila[3];					
						$total_calculo=$CO2*$valor_compustible_fuente_fija;				
						$fecha=date('Y')."-".date('m')."-".date('d');
						$r=$consultas->Maximo_cod_huella_carbono_refrigerante();
						if ($f=mysqli_fetch_array($r)) {
							$codigo=$f[0];
						}
						$codigo++;
						//echo "Codigo ". $codigo."<br>	";
						//echo "REfrigerante".$refri."<br>	";
						//echo "CO2 del elemento ".$CO2."<br>	";
						//echo "Valor ".$valor_compustible_fuente_fija."<br>	";
						//echo "total calculo ".$total_calculo."<br>	";
						//echo "fecha".$fecha."<br>	";					
						//echo "Sede". $sede."<br>	";
						//echo '**--------------------------------------------------- <br>	**';
						$consultas->insertar_huella_carbono_fuentes_fijas_refrigerante($codigo,$refri,$valor_compustible_fuente_fija,$total_calculo,$fecha_registro,$fecha,$sede);

					}
				}

			}
		}
		//------------------------------------------- Extintores --------------------------------------------------------/////////////


	
		echo "---------------------extintores ------------------------------------------------------------ <br>	";
		$co=$_POST['Extintor_co'];
		$hcfc=$_POST['Extintor_HCFC'];
		$pco=$_POST['PesoExtintor_co'];
		$phcfc=$_POST['PesoExtintor_HCFC'];



		echo $co."<br>	";
		echo $pco."<br>	";
		echo $hcfc."<br>	";
		echo $phcfc."<br>	";


		$codigo=0;
		$resp=$consultas->Maximo_cod_huella_carbono_extintores();
		if($fila=mysqli_fetch_array($resp))
		{
			$codigo=$fila[0];
		}
		$codigo++;
		$codigo_extintor=0;
		$res=$consultas->buscar_extintor_codigo_sede($sede,'Extintor_co');
		if ($fil=mysqli_fetch_array($res)) {
			$codigo_extintor=$fil[0];
			$Unidades=$fil[4];
			$CO2=$fil[3];
		}
		$total_co=$co*$CO2*$pco;
		$consultas->insertar_huella_carbono_extintores($codigo, $codigo_extintor,$co,$total_co,$fecha_registro,$fecha);
		$resp=$consultas->Maximo_cod_huella_carbono_extintores();
		if($fila=mysqli_fetch_array($resp))
		{
			$codigo=$fila[0];
		}
		$codigo++;
		$codigo_extintor=0;
		$res=$consultas->buscar_extintor_codigo_sede($sede,'Extintor_HCFC');
		if ($fil=mysqli_fetch_array($res)) {
			$codigo_extintor=$fil[0];
			$Unidades=$fil[4];
			$CO2=$fil[3];
		}
		$total_co=$pco*$CO2*$phcfc;
		$consultas->insertar_huella_carbono_extintores($codigo, $codigo_extintor,$pco,$total_co,$fecha_registro,$fecha);


		/* =========================================== Agregar la cantidad de la energia consumida =============================================*/
		if (isset($_POST['sede']) && !empty($_POST['sede']) && isset($_POST['Cantidad_luz']) && !empty($_POST['Cantidad_luz'])) {
			echo "Entro aqui";
			$sede= $_POST['sede'];
			$cantidad_energia=$_POST['Cantidad_luz'];
			
			$factor_emision=0.2096;
			$cantidad=$cantidad_energia*$factor_emision;
			$fecha=date('y')."-".date('m')."-".date('d');
	
			$resp= $consultas->max_huella_energia();
			if($fila= mysqli_fetch_array($resp)){
				$codigo= $fila[0];
			}
			$codigo++;
	
			$consultas->insertar_huella_energia($codigo,$sede,$factor_emision,$cantidad_energia,$cantidad,$fecha,$fecha);
		}

		echo '<script> alert("Se cargaron todos los datos de huella de carbono");</script>';
		//window.location="../carbono.php?s='.base64_encode($sede).'";
	}

	


}


?>