<?php

$hostname="localhost";
$database="ecoblue_piac";
$username="ecoblue_piac";
$password="Ecoblue900*";

$json=array();
$json['success']=true;
	if (isset($_GET["Codigo"]) && isset($_GET["Nit"]) && isset($_GET["Nombre"]) && isset($_GET["Direccion"]) && isset($_GET["Area_residuos"]) && isset($_GET["Sede"])) {
		$Codigo = $_GET['Codigo'];
		$Nit = $_GET['Nit'];
		$Nombre = $_GET['Nombre'];
		$Direccion = $_GET['Direccion'];
		$Area = $_GET['Area_residuos'];
		$Sede = $_GET['Sede'];

		$Conexion = mysqli_connect($hostname,$username,$password,$database);

		$Insert ="INSERT into Proveedores (Codigo,Nit,Nombre,Direccion,Area_residuos,Sede) values('{$Codigo}','{$Nit}','{$Nombre}','{$Direccion}','{$Area}','{$Sede}')";
		$ResultadoInsert = mysqli_query($Conexion, $Insert)or die(mysqli_error($Conexion));

		if($ResultadoInsert){
			$Consulta = "SELECT * FROM Proveedores WHERE Codigo ='{$Codigo}';"; 
			$Resultado = mysqli_query($Conexion, $Consulta) or die(mysqli_error($Conexion));

			if (($Registro = mysqli_fetch_array($Resultado))!=null) {
				$json['mensaje'] = "Se agrego satisfactoriamente";
				$json['error']=false;
			}
			else
			{
				$json['error']=true;
				$json['mensaje']="no registro";
			}
			mysqli_close($Conexion);
			echo json_encode($json);
		}
		else{
			$Resulta["Codigo"]=0;
			$Resulta["Nit"]='No Registro';
			$Resulta["Nombre"]='No Registro';
			$Resulta["Direccion"]='No Registro';
			$Resulta["Area_residuos"]='No Registro';
			$Resulta["Sede"]='No Registro';
			$json['Proveedores'][]= $Resulta;
			echo json_encode($json);
		}
	}
	else{
		$Resulta["Codigo"]=0;
		$Resulta["Nit"]='No Retorno';
		$Resulta["Nombre"]='No Retorno';
		$Resulta["Direccion"]='No Retorno';
		$Resulta["Area_residuos"]='No Retorno';
		$Resulta["Sede"]='No Retorno';
		$json['Proveedores'][]= $Resulta;
		echo json_encode($json);
	}
?>