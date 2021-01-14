<?php

$hostname="localhost";
$database="ecoblue_piac";
$username="ecoblue_piac";
$password="Ecoblue900*";

$json=array();
$json['success']=true;
	if (isset($_GET["Codigo"]) && isset($_GET["Nombre"]) && isset($_GET["Ciudad"]) && isset($_GET["Direccion"]) && isset($_GET["Telefono"]) && isset($_GET["Representante"]) && isset($_GET["Correo"]) && isset($_GET["Empresa"])) {
		$Codigo = $_GET['Codigo'];
		$Nombre = $_GET['Nombre'];
		$Ciudad = $_GET['Ciudad'];
		$Direccion = $_GET['Direccion'];
		$Telefono = $_GET['Telefono'];
		$Representante = $_GET['Representante'];
		$Correo = $_GET['Correo'];
		$Empresa = $_GET['Empresa'];

		$Conexion = mysqli_connect($hostname,$username,$password,$database);

		$Insert ="INSERT into Sede (Codigo,Nombre,Ciudad,Direccion,Telefono,Representante,Correo,Empresa) values('{$Codigo}','{$Nombre}','{$Ciudad}','{$Direccion}','{$Telefono}','{$Representante}','{$Correo}','{$Empresa}')";
		$ResultadoInsert = mysqli_query($Conexion, $Insert)or die(mysqli_error($Conexion));

		if($ResultadoInsert){
			$Consulta = "SELECT * FROM Sede WHERE Codigo ='{$Codigo}';"; 
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