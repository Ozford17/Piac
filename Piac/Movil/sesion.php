<?PHP
require_once'../src/consultas.php';
$consultas=new consultas();

$json=array();
	if(isset($_GET["user"]) && isset($_GET["pwd"])){
		$user=$_GET['user'];
		$pwd=$_GET['pwd'];
		
		
		
		$resp=$consultas->verificarUsuario($user,$pwd);
		if($fila=mysqli_fetch_array($resp))
		{

		

		if($fila){
		
			
				$json['datos'][]=$fila;

				echo json_encode($json);
				}



			else{
					$results["usuario"]='';
					$results["contraseña"]='';
					$results["tipo"]='';
					$results["sede"]='';
					$json['datos'][]=$results;
					echo json_encode($json);
				}		
		
	
		
	}
}
	else{
		   	$results["usuario"]='';
			$results["contraseña"]='';
			$results["tipo"]='';
			$results["sede"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>