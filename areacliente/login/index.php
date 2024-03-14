<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login | ilavagem</title>
    <link rel="shortcut icon" href="assets/img/IMG-20211130-WA0017.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/login.min.css">
    <link rel="stylesheet" href="assets/css/login.min.css">
</head>

<body>
    <section class="login-clean" style="background: #6385bb;">
        <form action="login.php" method="post" name="form1" id="form1" style="border-radius: 12px;">
            <h3 class="text-center"><strong>Bem-vindo à ilavagem</strong></h3>
            <div class="illustration"><img src="assets/img/IMG-20211130-WA0017.jpg" style="width: 100%;height: 100%;">
            </div>
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="mb-3"><input class="form-control"  type="email" name="emaill" placeholder="Email">

                <div class="mb-3"><input class="form-control" type="password" name="passwordd" placeholder="Palavra-passe">

                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit"
                            style="background: #2b91e4;border-radius: 8px;" name="login_btn">Entrar</button></div>
                    <div class="mb-3"></div><a class="forgot" href="../registo/">Não tem conta criada? Crie aqui!</a>
                    <br>
                    <div class="mb-3"><a class="forgot" href="../../">Voltar à página principal</a></div>
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>