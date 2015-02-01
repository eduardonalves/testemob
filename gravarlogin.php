<?php
header('Access-Control-Allow-Origin: *');

session_start();
extract($_POST);

$password=  sha1($password);


$pdo= new PDO("mysql:host=mysql16.000webhost.com;dbname=a1537077_rma", "a1537077_rma","2610hpc");

if(!$pdo){

	echo "Erro de conexão";
	
}
try{

	$resultado = $pdo->prepare('SELECT * FROM users WHERE username = :username  AND password = :password');
	$resultado->bindParam(':username', $username, PDO::PARAM_STR);
	$resultado->bindParam(':password', $password, PDO::PARAM_STR);
	$executa = $resultado->execute();
	
	
	
	if($executa){
		
		$rs = $resultado->fetch(PDO::FETCH_OBJ);
		if(!$rs){
		
			
			
			//$logado = '{"resultado":"ErroLogin"}';
			//$obj = json_decode($logado);
			//echo json_encode($obj);
			echo "ErroLogin";
		
		} else {
			//$_SESSION['username']=$username;
			//$_SESSION['logado']="logado";
			//$logado = '{"resultado":"Logado"}';
			//$obj = json_decode($logado);
			//echo json_encode($obj);
			echo "logado";
			
		}
	
	} else {
	
		echo "Erro ao buscar dados";
	
	}

} catch(PDOException $e){

	echo $e->getMessage();

}
?>