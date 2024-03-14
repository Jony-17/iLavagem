<?php
session_start();
require_once('./conn/conn.php');

if(isset($_POST['deletebtn_servico']))
{
    $nome = $_POST['delete_nome'];

    $query = "DELETE FROM servicos WHERE nome='$nome' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Serviço eliminado com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: inserir_servico.php'); 
    }
    else
    {
        $_SESSION['status'] = "Serviço não foi eliminado";       
        $_SESSION['status_code'] = "error";
        header('Location: inserir_servico.php'); 
    }    
}
?>
