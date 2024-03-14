<?php
session_start();
require_once('./conn/conn.php');

if(isset($_POST['delete_btn']))
{
    $lavagem_id = $_POST['delete_id'];

    $query = "DELETE FROM lavagem_seco WHERE lavagem_id='$lavagem_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Peça eliminada";
        $_SESSION['status_code'] = "success";
        header('Location: del.php'); 
    }
    else
    {
        $_SESSION['status'] = "Peça não foi eliminada";       
        $_SESSION['status_code'] = "error";
        header('Location: del.php'); 
    }    
}
?>