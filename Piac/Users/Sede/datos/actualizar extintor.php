<?php 
if (isset($_POST['extintor']) && isset($_POST['sede']) && isset($_POST['peso'])&& isset($_POST['cantidad'])) {
	$tipo_extintor=$_POST['extintor'];
	$sede=$_POST['sede'];
	$Peso=$_POST['peso'];
	$cantidad=$_POST['cantidad'];
	$fecha=date('Y')."-".date('m')."-".date('d');
	require_once'../../../src/consultas.php';
	$consultas= new consultas();

	$r=$consultas->consultar_extintor($tipo_extintor,$sede,$Peso);
            if($fi=mysqli_fetch_array($r))
            {
              $cantidad_ante=$fi[2];
              $suma=$cantidad+$cantidad_ante;
              $consultas->actualizar_extintor($tipo_extintor,$sede,$suma,$Peso,$fecha);
              echo '<div style="color:white; 
           	         text-align:center;
           	         width:82%; 
           	         margin-left:5%; 
           	         background:#B6CF41; 
           	         font-size:1.5vw; 
           	         padding:1vw;">Se actualizo sistema</div>';
            }
}
 ?>