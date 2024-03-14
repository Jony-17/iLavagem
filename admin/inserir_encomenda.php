<?php
session_start();
require_once('./conn/conn.php');

if(isset($_POST['inserir_encomenda_btn1']))
{
    $estado = $_POST['estado'];

    $query = "UPDATE encomenda SET estado='Em processamento'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Nome Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: encomenda.php');  
    }
    else
    {
    if($estado)
    {
        $query = "INSERT INTO encomenda (estado) VALUES ('$estado')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: encomenda.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: encomenda.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Encomenda em processamento";
            $_SESSION['status_code'] = "success";
            header('Location: encomenda.php');  
        }
    }
}

?>

<?php
session_start();
require_once('./conn/conn.php');

if(isset($_POST['inserir_encomenda_btn2']))
{
    $estado = $_POST['estado'];

    $query = "UPDATE encomenda SET estado='A ser entregue'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Nome Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: encomenda.php');  
    }
    else
    {
    if($estado)
    {
        $query = "INSERT INTO encomenda (estado) VALUES ('$estado')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: encomenda.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: encomenda.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Encomenda a ser entregue";
            $_SESSION['status_code'] = "success";
            header('Location: encomenda.php'); 
        }
    }
}
?>


<?php
session_start();
require_once('./conn/conn.php');

if(isset($_POST['inserir_encomenda_btn3']))
{
    $estado = $_POST['estado'];

    $query = "UPDATE encomenda SET estado='Concluída'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Nome Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: encomenda.php');  
    }
    else
    {
    if($estado)
    {
        $query = "INSERT INTO encomenda (estado) VALUES ('$estado')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: encomenda.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: encomenda.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Encomenda concluída";
            $_SESSION['status_code'] = "success";
            header('Location: encomenda.php'); 
        }
    }
}
?>