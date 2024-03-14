<?php
session_start();
require_once('./conn/conn.php');

if(isset($_POST['updatebtn']))
{
    $lavagem_id = $_POST['edit_id'];
    $nome = $_POST['edit_nome'];
    $preco = $_POST['edit_preco'];

    $query = "UPDATE lavagem_seco SET nome='$nome', preco='$preco' WHERE lavagem_id='$lavagem_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Peça atualizada";
        $_SESSION['status_code'] = "success";
        header('Location: add.php'); 
    }
    else
    {
        $_SESSION['status'] = "Peça não foi atualizada";
        $_SESSION['status_code'] = "error";
        header('Location: add.php'); 
    }
}

?>
