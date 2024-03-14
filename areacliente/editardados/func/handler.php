<?php
require_once('../conn/conn.php'); //ligação bd
session_start();
if(!isset($_SESSION['id_utilizador'])){
    header("Location: ../login/.php");
}
if(isset($_GET['editar_dados'])) {
    if($_GET['nome'] != "" and $_GET['email'] != ""){
        if($_GET['tel'] != ""){
            $sql_update = "UPDATE utilizadores set nome = '".$_GET['nome']."',email = '".$_GET['email']."',telemovel = '".$_GET['tel']."' WHERE utilizador_id = '".$_SESSION['id_utilizador']."'";
            $resultado = mysqli_query($conn, $sql_update);
            if($resultado){
                $_SESSION['nome_user']=$_GET['nome'];
                ?><script type="text/javascript">
                    alert('Atualização concluída.');
                    window.location = '../../pedidoservico/';
                </script><?php
            }else{
                ?><script type="text/javascript">
                    alert('Ocorreu um erro.');
                    window.location = '../';
                </script><?php
            }
        }
    }
}else if(isset($_GET['editar_pass'])) {
    if($_GET['old_pass'] != "" and $_GET['novpass'] != ""){
        if($_GET['conf'] != ""){
            //get password antiga
            $sql_get_pass = "SELECT password FROM utilizadores WHERE utilizador_id = '".$_SESSION['id_utilizador']."'";
            $resultado_get_pass = mysqli_query($conn, $sql_get_pass);
            $coluna_get_pass = mysqli_fetch_assoc($resultado_get_pass);
            if(strcmp($coluna_get_pass['password'], $_GET['old_pass']) == 0){
                if(strcmp($_GET['novpass'],$_GET['conf']) == 0){
                    $sql_update_pass = "UPDATE utilizadores set password = '".$_GET['novpass']."' WHERE utilizador_id = '".$_SESSION['id_utilizador']."' ";
                    $resultado_update_pass = mysqli_query($conn, $sql_update_pass);
                    if($resultado_update_pass){
                        ?><script type="text/javascript">
                            alert('Atualização concluída.');
                            window.location = '../../pedidoservico';
                        </script><?php
                    }else{
                        ?><script type="text/javascript">
                            alert('Ocorreu um erro.');
                            window.location = '../';
                        </script><?php
                    }
                }
            }
        }
    }
}else if(isset($_GET['editar_fat'])){
    if($_GET['nif'] != "" and $_GET['estrada'] != ""){
        if($_GET['cidade'] != "" and $_GET['cod_postal'] != ""){
            $sql_update_fat = "UPDATE utilizadores SET nif = '".$_GET['nif']."', estrada = '".$_GET['estrada']."', cidade = '".$_GET['cidade']."', cod_postal = '".$_GET['cod_postal']."' WHERE utilizador_id = '".$_SESSION['id_utilizador']."'";
            $resultado_update_fat = mysqli_query($conn, $sql_update_fat);
            if($resultado_update_fat){
                ?><script type="text/javascript">
                    alert('Atualização concluída.');
                    window.location = '../../pedidoservico/';
                </script><?php
            }else{
                ?><script type="text/javascript">
                    alert('Ocorreu um erro.');
                    window.location = '../';
                </script><?php
            }
        }
    }
}