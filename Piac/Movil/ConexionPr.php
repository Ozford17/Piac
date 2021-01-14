<?php

$hostname='localhost';
$database='ecoblue_piac';
$username='ecoblue_piac';
$password='Ecoblue900*';

$Conexion=new mysqli($hostname,$username,$password,$database);
if($Conexion->connect_errno) {
	echo "No hay conexion con la base de datos";
}

?>