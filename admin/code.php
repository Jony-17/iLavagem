<?php
session_start();
require_once('./conn/conn.php');

if(isset($_POST['inserirbtn']))
{
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    $nome_query = "SELECT * FROM lavagem_seco WHERE nome='$nome' ";
    $nome_query_run = mysqli_query($conn, $nome_query);
    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Peça já existente.";
        $_SESSION['status_code'] = "error";
        header('Location: inserir.php');  
    }
    else
    {
    if($nome && $preco)
    {
        $query = "INSERT INTO lavagem_seco (nome,preco) VALUES ('$nome','$preco')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Peça inserida com sucesso";
                $_SESSION['status_code'] = "success";
                header('Location: inserir_peca.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: inserir_peca.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Não foi inserida qualquer peça";
            $_SESSION['status_code'] = "warning";
            header('Location: inserir_peca.php');  
        }
    }
}

?>