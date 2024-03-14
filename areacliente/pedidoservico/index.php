<?php
session_start();



if($_SESSION['nome_user'] != ""){

require_once('../conn/conn.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pedido de serviço</title>
    <link rel="stylesheet" type="text/css" href="pedidoservico.css" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet" />
    <link rel="shortcut icon" href="../../assets/logo2_png.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
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
                <li><a href="./" class="active">Pedido de serviço</a></li>
                <li><a href="../tracking/">Tracking </a></li>
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
        <h1>Pedido de serviço</h1>
        <form action="acabarencomenda" method="POST">
            <div id="pack-lav-sec" class="servico">
                <label for="pack">Lavagem e secagem:</label>
                <select name="pack" id="pack">
                    <option value="0">---</option>
                    <option value="1">5kg a 9kg</option>
                    <option value="2">9kg a 15kg</option>
                    <option value="3">14kg a 19kg</option>
                </select>
            </div>

            <div id="engomaria" class="servico">
                <label for="engomaria">Engomaria:</label>
                <select name="engomaria" id="engomar">
                    <option value="0">---</option>
                    <option value="1">1 peça</option>
                    <option value="2">15 peças</option>
                    <option value="3">20 peças</option>
                    <option value="4">30 peças</option>
                    <option value="5">50 ou mais peças</option>
                </select>
            </div>

            <div id="lavagem-seco" class="servico">
                <label for="lavseco">Lavagem a seco:</label>
                <select name="lavseco" id="seco">
                <?php
                $query = "SELECT * FROM lavagem_seco";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    // Loop pelos resultados para gerar as opções
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo '<option value="' . $row["lavagem_id"] . '">' . $row["nome"] . '</option>';
                    }
                }
                    /*<option value="0">---</option>
                    <option value="1">Kispo</option>
                    <option value="2">Casaco com penas</option>
                    <option value="3">Casaco de malha</option>
                    <option value="4">Fato</option>
                    <option value="5">Vestido de noiva</option>
                    <option value="6">Vestido de cerimónia</option>
                    <option value="7">Camisola</option>
                    <option value="8">Camisa</option>
                    <option value="9">Calças</option>*/
                    ?>
                </select>
            </div>

            <div id="tinturaria" class="servico">
                <label for="qnttinturaria">Tinturaria:</label>
                <input type="text" name="qnttinturaria" id="qnttinturaria" placeholder="Quantidade: Ex(1)">
            </div>

            <div id="costura" class="servico">
                <label for="costura">Costura:</label>
                <a href="../../contacto/">Entre em contacto connosco para orçamento</a>
            </div>

            <div id="localrecolha" class="servico">
                <label for="localr">Local de recolha:</label>
                <input type="text" name="localr" id="localr">
                <input type="checkbox" id="mmrua" name="mmrua" value='1'>
                <label for="mmrua"> Mesmo local de entrega</label><br>
            </div>

            <div id="localentrega" class="servico">
                <label for="locale">Local de entrega:</label>
                <input type="text" name="locale" id="locale">
            </div>
        </form>
        <hr>

        <div id="pagamento">
            <p id="subtotal">Sub-total: </p>
            <button type="submit">Pagamento</button>
        </div>

    </div>



</body>

</html>


<?php
}else{
    header('Location: ../login/');
}


?>