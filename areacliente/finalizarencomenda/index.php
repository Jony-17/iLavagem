<?php
session_start();



if($_SESSION['nome_user'] != ""){


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Pagamento de encomenda</title>
    <link rel="shortcut icon" href="assets/img/IMG-20211130-WA0017.jpg">
    <link rel="stylesheet" type="text/css" href="../pedidoservico/pedidoservico.css" />
    <!-- tooltip -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/c95afec481.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
      href="https://fonts.googleapis.com/css?family=Merriweather"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>    

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        transition: all .2s linear;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 25px;
    }

    .container form {
        padding: 20px;
        width: 700px;
        background: #fff;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
        border-radius: 10px;
    }

    .container form .row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .container form .row .col {
        flex: 1 1 250px;
    }

    .container form .row .col .title {
        font-size: 20px;
        color: #333;
        padding-bottom: 5px;
        text-transform: uppercase;
    }

    .container form .row .col .inputBox {
        margin: 15px 0;
    }

    .container form .row .col .inputBox span {
        margin-bottom: 10px;
        display: block;
    }

    .container form .row .col .inputBox input {
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px 15px;
        font-size: 15px;
        text-transform: none;
    }

    .container form .row .col .inputBox input:focus {
        border: 1px solid #000;
    }

    .container form .row .col .flex {
        display: flex;
        gap: 15px;
    }

    .container form .row .col .flex .inputBox {
        margin-top: 5px;
    }

    .container form .row .col .inputBox img {
        height: 34px;
        margin-top: 5px;
        filter: drop-shadow(0 0 1px #000);
    }

    .container form .submit-btn {
        width: 100%;
        padding: 12px;
        font-size: 17px;
        background: #2B96D9;
        color: #fff;
        margin-top: 5px;
        border-radius: 10px;
        cursor: pointer;
        transition: .2s linear;
    }

    .container form .submit-btn:hover {
        letter-spacing: 2px;
        opacity: .8;
    }


    .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        visibility: hidden;
        width: 400px;
        height: 400px;
        background: white;
        border-radius: 3px;
        transition: .3s ease-in;
        box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .4);
    }

    #click {
        display: none;
    }

    .click-me {
        font-size: 16px;
        font-weight: 700;
        outline: none;
        border: none;
        background: #6e95d0;
        color: aliceblue;
        padding: 13px 30px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s ease;
        margin-left: 240px;
    }

    .click-me:hover {
        background: #2a91e6;
    }

    #click:checked~.content {
        opacity: 1;
        visibility: visible;
    }

    .header {
        height: 68px;
        background: #2a91e6;
        overflow: hidden;
        border-radius: 3px 3px 0 0;
        box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .2);
    }

    .header h2 {
        color: white;
        padding-left: 32px;
        font-weight: normal;
        margin: 20px;
        text-transform: uppercase;
    }

    .fa-times {
        position: absolute;
        right: 20px;
        top: 20px;
        color: #e8f7fc;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    .fa-check {
        font-size: 50px;
        color: #2a91e6;
        font-weight: bold;
        height: 80px;
        width: 80px;
        border: 2px solid #2a91e6;
        text-align: center;
        padding-top: 13px;
        border-radius: 50%;
        box-sizing: border-box;
        margin: 30px 0 0 160px;
    }

    p {
        padding-top: 10px;
        font-size: 19px;
        color: #1a1a1a;
        text-align: center;
        text-transform: uppercase;
    }

    h3 {
        color: #333;
        font-size: 20px;
        margin: 10px;
        text-align: center;
        text-transform: uppercase;
    }

    .line {
        position: absolute;
        bottom: 60px;
        width: 100%;
        height: 1px;
        background: silver;
    }

    .close-btn {
        position: absolute;
        bottom: 5px;
        right: 25px;
        border: 1px solid #2a91e6;
        border-radius: 3px;
        color: #2a91e6;
        padding: 8px 10px;
        font-size: 18px;
        cursor: pointer;
    }

    .close-btn:hover {
        background: #2a91e6;
        color: white;
        transition: .5s;
    }

    
    </style>

</head>

<body>
<div id="navbar">
        <div id="leftside">
            <div id="logo">
                <a href="../pedidoservico/">
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

    <div class="conteudo">

    <div class="container">

        <form action="finalizarencomenda.php" method="post">

            <div class="row">

            <div class="col">

                <h3 class="title">Pagamento no ato de entrega</h3>
           
            </div>
        </div>                             
        
            <input type="submit" id="click">
            <a href="payment.php"><button for="click" class="click-me" type="button" onClick="alert('Obrigado pela sua compra!');">Fazer pagamento</button></a>
        </form>
    </div>


    <div class="container">

        <form action="finalizarencomenda.php" method="post">

            <div class="row">

                <div class="col">

                    <h3 class="title">Pré-pagamento</h3>

                    <div class="inputBox">
                        <span>Cartões aceites :</span>
                        <img src="img/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>Nome no cartão :</span>
                        <input type="text" name="nome_cartao" id="nome_cartao" placeholder="Nome" required autofocus
                            value="<?php if ($_POST) {echo "$_POST[nome_cartao]";} ?>">
                    </div>
                    <div class="inputBox">
                        <span>Número no cartão :</span>
                        <input type="text" name="n_cartao" id="numero_cartao" placeholder="1111-2222-3333-4444"
                            data-mask="0000-0000-0000-0000" required
                            value="<?php if ($_POST) {echo "$_POST[n_cartao]";} ?>" autofocus>

                    </div>
                    <div class="inputBox">
                        <span>Data de expiração :</span>
                        <input type="text" name="data_validade" id="data_validade" placeholder="00/00"
                            data-mask="00 / 00" required autofocus
                            value="<?php if ($_POST) {echo "$_POST[data_validade]";} ?>">

                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="number" name="cvv" id="cvv" placeholder="123" data-mask="000" required
                                value="<?php if ($_POST) {echo "$_POST[cvv]";} ?>" autofocus>
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" id="click">
            <a href="payment.php"><button for="click" class="click-me" type="button" onClick="alert('Obrigado pela sua compra!');">Fazer pagamento</button></a>

            <div class="content">
                <div class="header">
                    <h2>Encomenda</h2>
                    <label for="click" class="fas fa-times"></label>
                </div>
                <label for="click" class="fas fa-check"></label>
                <h3> Pagamento concluído </h3>
                <p>Obrigado pela preferência!</p>
                <div class="line"></div>
                <a href="tracking.php">Consultar estado da encomenda</a>
                <label for="click" class="close-btn">Fechar</label>
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript"></script>
</div>
</body>
</html>
<?php
}else{
    header('Location: ../login/');
}
?>