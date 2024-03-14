<?php 
$nome=$email=$assunto=$mensagem="";

function vervar($data){
    $data = trim($data);   
    $data = stripslashes($data);
 	$data = htmlspecialchars($data);
  	return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome=vervar($_POST['nome']);
    $email=vervar($_POST['email']);
    $assunto=vervar($_POST['assunto']);
    $mensagem=vervar($_POST['mensagem']);

    echo "Enviado com sucesso!";
}



?>