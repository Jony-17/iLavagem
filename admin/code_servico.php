<?php
session_start();
require_once('./conn/conn.php');

if(isset($_POST['inserirbtn_servico']))
{
    $nome = $_POST['nome'];

    $nome_query = "SELECT * FROM servicos WHERE nome='$nome' ";
    $nome_query_run = mysqli_query($conn, $nome_query);
    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Serviço já existente.";
        $_SESSION['status_code'] = "error";
        header('Location: inserir_servico.php');  
    }
    else
    {
    if($nome)
    {
        $query = "INSERT INTO servicos (nome) VALUES ('$nome')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Serviço inserido com sucesso";
                $_SESSION['status_code'] = "success";
                header('Location: inserir_servico.php');
            }   
        }
    }
}

?>