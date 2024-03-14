<?php
session_start();



if($_SESSION['nome_user'] != ""){

    $iduser=$_SESSION['id_utilizador'];

    include('../login/conn/conn.php');
    $query="SELECT pontos FROM utilizadores WHERE utilizador_id = '$iduser'";

    $result=mysqli_query($conn,$query);
    



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Encomenda</title>
    <link rel="stylesheet" type="text/css" href="../pedidoservico/pedidoservico.css" />
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/c95afec481.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet" />
    <link rel="shortcut icon" href="../../assets/logo2_png.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../pedidoservico/script.js"></script>

    <style>
    #carrinho {
        padding: 20px;
        text-transform: uppercase;
        text-align-last: center;
    }

    #cart-container {
        overflow-x: auto;
    }

    #cart-container table {
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
        white-space: nowrap;
    }

    #cart-container table thead {
        font-weight: 700;
    }

    #cart-container table thead td {
        background: #2a91e6;
        color: #fff;
        border: none;
        padding: 6px 0;
    }

    #cart-container table td {
        border: 1px solid #b6b3b3;
        text-align: center;
    }

    #cart-container table td:nth-child(1),
    #cart-container table td:nth-child(2),
    #cart-container table td:nth-child(3) {
        width: 100px;
    }

    hr {
        width: 30px;
        height: 2px;
        background-color: #2a91e6;
    }

    #cart-bottom .coupon>div,
    #cart-bottom .total>div {
        border: 19px solid white;
    }

    #cart-bottom .coupon h5,
    #cart-bottom .total h5 {
        background: #2a91e6;
        color: #fff;
        border: none;
        padding: 6px 12px;
        font-size: 18px;
        font-weight: 700;
    }

    #cart-bottom .coupon p,
    #cart-bottom .coupon input {
        padding: 0 12px;
    }

    #cart-bottom .coupon input {
        height: 44px;
        margin: 0 0 20px 12px;
    }

    #cart-bottom .total div>div {
        padding: 0 12px;
    }

    #cart-bottom .total h6 {
        font-size: 15px;
        margin: 5px;
        color: #2a2a2a;
    }

    .second-hr {
        background: #b8b7b3;
        margin-top: 20px;
        width: 100%;
        height: 1px;
    }

    #cart-bottom .total div>button {
        margin: 0 12px 20px 0;
        display: flex;
        justify-content: flex-end;
    }

    .btn-danger {
        padding: 10px;
        margin-left: 10px;
        margin-bottom: 10px;
        font-size: 0.8rem;
        outline: none;
        border: none;
        background: #d22424;
        color: aliceblue;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #d22424;
    }

    .button {
        display: flex;
        height: 50px;
        padding: 0;
        margin: 20px;
        background: #6e95d0;
        border: none;
        outline: none;
        border-radius: 5px;
        overflow: hidden;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
    }

    .button:hover {
        background: #2a91e6;
    }

    .button:active {
        background: #006e58;
    }

    .button__text,
    .button__icon {
        display: inline-flex;
        align-items: center;
        padding: 0 15px;
        color: #fff;
        height: 100%;
    }

    .button__icon {
        font-size: 1.5em;
        background: rgba(0, 0, 0, 0.08);
    }

    a {
        text-decoration: none;
    }

    .cart-header {
        font-weight: bold;
        font-size: 1.25em;
        color: #333;
    }

    .cart-column {
        display: flex;
        align-items: center;
        border-bottom: 1px solid black;
        margin-right: 1.5em;
        padding-bottom: 10px;
        margin-top: 10px;
    }

    .cart-row {
        display: flex;
        margin: 20px;
    }

    .cart-item {
        width: 50%;
    }

    .cart-price {
        width: 50%;
        font-size: 1.2em;
        color: #333;
    }

    .cart-row:last-child {
        border-bottom: 1px solid black;
    }

    .cart-row:last-child .cart-column {
        border: none;
    }

    .contact-form-textarea {
        width: 1000px;
        height: 130px;
        color: #000;
        border: 1px solid #bcbcbc;
        border-radius: 10px;
        outline: none;
        margin-top: 20px;
        margin-left: 20px;
    }

    .contact-form-textarea::placeholder {
        color: #aaa;
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
                <li><a href="../pedidoservico/" class="active">Pedido de serviço</a></li>
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


    <!-- End of Navigation -->
    <div id="conteudo">
        <main>
            <section id="carrinho" class="mt-5 container">

            </section>
            <?php
            $subtotal = 0;
          ?>
            <?php
            $total = 0;
          ?>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">SERVIÇO</span>
                <span class="cart-price cart-header cart-column">PREÇO</span>
                <span class="cart-quantity cart-header cart-column"></span>
            </div>




            <div class="cart-items">
                <?php 
                if($_SESSION['servico1'] != ""){
                ?>
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <?php echo $_SESSION['servico1'];?><br>
                        </a>
                    </div>
                    <span class="cart-price cart-column"><?php echo $_SESSION['ppack']; ?>€</span>
                    <div class="cart-quantity cart-column">
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>
                
                
                <?php 
                if($_SESSION['servico2'] != ""){
                ?>
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <?php echo $_SESSION['servico2'];?><br>
                        </a>
                    </div>
                    <span class="cart-price cart-column"><?php echo $_SESSION['pengomaria']; ?>€</span>
                    <div class="cart-quantity cart-column">
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>
                
                
                <?php 
                if($_SESSION['servico3'] != ""){
                ?>
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <?php echo $_SESSION['servico3'];?><br>
                        </a>
                    </div>
                    <span class="cart-price cart-column"><?php echo $_SESSION['plavseco']; ?>€</span>
                    <div class="cart-quantity cart-column">
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>
                
                <?php 
                if($_SESSION['servico4'] != ""){
                ?>
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <?php echo $_SESSION['servico4'];?><br>
                        </a>
                    </div>
                    <span class="cart-price cart-column"><?php echo $_SESSION['ptinturaria']; ?>€</span>
                    <div class="cart-quantity cart-column">
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>

            </div>


            <section id="cart-bottom" class="container">
                <div class="row">

                    <div class="coupon col-lg-6 col-md-6 col-12 mb-4">
                        <div>
                            <h5>Observações (Opcional)</h5>
                            <textarea
                                placeholder="Notas sobre a sua encomenda (por exemplo, informações especiais sobre a entrega)."
                                name="mensagem" class="contact-form-textarea" required></textarea>
                        </div>
                    </div>

                    <!--<div class="coupon col-lg-6 col-md-6 col-12 mb-4">
                        <div>
                            <h5>Pontos</h5>
                            <p>Aplique os pontos, caso os possua.</p>
                            <input type="text" placeholder="Pontos">
                            <button>Aplicar</button>
                        </div>
                    </div>-->

                    <?php while($row = mysqli_fetch_assoc($result)){  ?>
                        
                    <div class="total col-lg-6 col-md-6 col-12">
                        <div>
                            <h5>Carrinho</h5>
                            <div class="d-flex justify-content-between">
                                <h6>Subtotal</h6>
                                <p><?php echo($_SESSION['ptotal'])?>€</p>
                            </div>
                            <div class="d-flex justify-content-between text-success">
                                <h6 class="d-flex justify-content-between text-success">Pontos</h6>
                                <strong>-<?php echo $row['pontos'];?>€</strong>
                            </div>
                            
                            <hr class="second-hr">
                            <div class="d-flex justify-content-between">
                                <h6>Total</h6>
                                <p><?php echo($_SESSION['ptotal'])-($row['pontos'])?>€</p>
                            </div>
                            <?php } ?>
                            <a href="./"><button type="button" class="button">
                                    <span class="button__text">Continuar as compras</span>
                                    <span class="button__icon">
                                        <ion-icon name="cart-outline"></ion-icon>
                                    </span>
                                </button></a>

                            <a href="../finalizarencomenda/"><button type="button" class="button">
                                    <span class="button__text">Proceder ao pagamento</span>
                                    <span class="button__icon">
                                        <ion-icon name="arrow-forward-outline"></ion-icon>
                                    </span>
                                </button></a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>
<?php
}else{
    header('Location: ../login/');
}


?>