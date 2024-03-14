<?php 
session_start(); 
require_once("./conn/conn.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $email = $_POST['emaill'];
    $password = $_POST['passwordd']; 

    if (empty($email)) {
        header("Location: index.php?error=Email necessário");
        exit();
    }else if(empty($password)){
        header("Location: index.php?error=Password necessária");
        exit();
    }else{
    $query = "SELECT * FROM utilizadores WHERE email='$email' AND password='$password'";
    $query_run = mysqli_query($conn, $query);
	if(mysqli_num_rows($query_run)===1){
		$row=mysqli_fetch_assoc($query_run);
		
		if($row['email']==$email && $row['password']==$password){
			$_SESSION['email']=$row['email'];
			$_SESSION['nome_user']=$row['nome'];
			$_SESSION['id_utilizador']=$row['utilizador_id'];
			$_SESSION['admin']=$row['admin'];

			if($_SESSION['admin'] == "1"){
        		header('Location: ../../admin/');
				exit();
    		}else if($_SESSION['admin'] == "0"){
        		header('Location: ../pedidoservico/');
				exit();
    		}
		}

	}else{
		header('Location: index.php?error=Credenciais Incorretas');
		exit();
	}

    
}
}
?>