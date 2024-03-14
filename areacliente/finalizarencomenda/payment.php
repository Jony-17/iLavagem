<?php
session_start();

if($_SESSION['nome_user'] != ""){

    $iduser=$_SESSION['id_utilizador'];
    $origem=$_SESSION['localrecolha'];
    $recolha=$_SESSION['localentrega'];

    include('../login/conn/conn.php');
    $query="INSERT INTO encomenda (utilizador_id, estado, pontos_atribuidos, origem, destino) VALUES ('$iduser', 'Em processamento', pontos_atribuidos, '$origem', '$recolha');";
    $result=mysqli_query($conn,$query);
    
    if($query){ 
        header ('Location: ../tracking/');
    }else{
        //echo "Compra não concluída";
        header ('Location: finalizarencomenda.php');
    }
}
?>