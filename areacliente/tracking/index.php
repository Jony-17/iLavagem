<?php 
session_start();
if($_SESSION['nome_user'] != ""){
    
    $iduser=$_SESSION['id_utilizador'];


    include('../login/conn/conn.php');
    $query="SELECT encomenda_id,estado,pontos_atribuidos,destino, origem FROM encomenda WHERE utilizador_id = '$iduser'";

    $result=mysqli_query($conn,$query);

    


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tracking</title>
    <link rel="stylesheet" type="text/css" href="tracking.css" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet" />
</head>

<body>
    <div id="navbar">
        <div id="leftside">
            <div id="logo">
                <a href="./">
                    <h1><span class="cinza">i</span>Lavagem</h1>
                </a>
            </div>
        </div>
        <div id="mid">
            <ul>
                <li><a href="../pedidoservico/">Pedido de serviço</a></li>
                <li><a href="./" class="active">Tracking </a></li>
            </ul>
        </div>
        <div id="rightside">
            <ul>
                <li><a href="../editardados/"><?php echo $_SESSION['nome_user']; ?> </a></li>
                <li><a href="../login/func/logout.php">Sair</a></li>
            </ul>
        </div>
    </div>
    <div id="conteudo">
        
        <?php if(mysqli_num_rows($result)!=0){?>

        <div id="tabela-tracking">
            <table id="servicos">
                <tr>
                    <th>Id do serviço</th>
                    <th>Origem</th>
                    <th>Destino</th>
                    <th>Pontos atribuídos</th>
                    <th>Estado</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)){  ?>
                <tr>
                    <td><?php echo $row['encomenda_id'];?> </td>
                    <td><?php echo $row['origem'];?> </td>
                    <td><?php echo $row['destino'];?></td>
                    <td><?php echo $row['pontos_atribuidos'];?></td>
                    <td><?php echo $row['estado'];?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        
        <?php }else{  ?>
            <div id="sem-pedido">
                <h2 id="um">Ainda não realizou nenhum pedido de serviço</h2>
                <h2 id="dois"><a href="../pedidoservico/">Fazer o meu pedido!</a></h2>
            </div>
        <?php }?>

    </div>



</body>

</html>

<?php 

}else{
    header('Location: ../login/');
}
?>