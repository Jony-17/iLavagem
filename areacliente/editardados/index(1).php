<?php
session_start();
require_once('./conn/conn.php');
if(!isset($_SESSION['nome_user']))
{
    header("Location: ../login/");
}
$sql_get_user_info = "SELECT * FROM utilizadores WHERE utilizador_id = '".$_SESSION['id_utilizador']."'";
$resultado_get_info = mysqli_query($conn, $sql_get_user_info);
$coluna_get_user_info = mysqli_fetch_assoc($resultado_get_info);
?>
<html>
    <head>
        <title>Editar dados | ilavagem</title>
        <link rel="stylesheet" href="./css/editar_dados.css">
    </head>
    <body>
    <script>
        function myfunc1(nome,email,tele) {
            if (confirm("Confirma a edição dos dados?")) {
                location.href = './func/handler.php?editar_dados=1&nome='+nome+'&email='+email+'&tel='+tele;
            }else{
                alert("Alteração cancelada.")
            }
        }
        function myfunc2(oldpass,novpass,confpass) {
            if (confirm("Confirma a edição dos dados?")) {
                location.href = './func/handler.php?editar_pass=1&oldpass='+oldpass+'&novpass='+novpass+'&conf='+confpass;
            } else {
                alert("Eliminação cancelada.")
            }
        }
        function myfunc3(nif,estrada,cidade,cod_postal){
            if(confirm("Confirma esta operação?")){
                location.href="./func/handler.php?editar_fat=1&nif="+nif+'&estrada='+estrada+'&cidade='+cidade+'&cod_postal='+cod_postal;
            }else{
                alert("Operação cancelada");
            }
        }
    </script>
    <p style="font-size: 43px; text-align: center; color: black;">Editar Dados</p>
    <div class="row">
        <div class="column" style="background-color: #fff; border-top-left-radius: 12px; border-bottom-left-radius: 12px;">
            <h2>Olá,</h2>
            <p style="font-size: 40px; color:black;"><?php echo $coluna_get_user_info['nome']; ?></p>
            <p style="font-size:16px; color:black;"><?php echo $coluna_get_user_info['email']; ?></p>
            <p style="font-size:16px; color:black;"><?php echo $coluna_get_user_info['telemovel'];?></p>
        </div>
        <div class="column" style="border: 1px solid rgb(224, 224, 224);background-color:#fff; border-top-right-radius: 12px; border-bottom-right-radius: 12px;">
            <h2 class="title_box">Dados</h2>
            <button class="accordion">Dados de acesso</button>
            <div class="panel">
                <form action="./editar_dados.php">
                    <label for="fname">Nome:</label><br>
                    <input type="text" id="nome" name="nome" required value="<?php echo $coluna_get_user_info['nome']; ?>"><br><br>
                    <label for="lname">Email:</label><br>
                    <input type="text" id="email" name="email" required value="<?php echo $coluna_get_user_info['email'];?>"><br><br>
                    <label for="lname">Telemóvel:</label><br>
                    <input type="text" id="telemovel" name="telemovel" required value="<?php echo $coluna_get_user_info['telemovel']; ?>"><br><br>
                    <a class="button" onclick="myfunc1(document.getElementById('nome').value,document.getElementById('email').value,document.getElementById('telemovel').value)">Submeter</a>
                </form>
            </div>
            <br><br>
            <button class="accordion">Password</button>
            <div class="panel">
                <form action="./editar_dados.php">
                    <label for="fname">Password atual:</label><br>
                    <input type="text" id="password_atual" name="password_atual" required><br><br>
                    <label for="lname">Password nova:</label><br>
                    <input type="text" id="password_nova" name="password_nova" required><br><br>
                    <label for="lname">Repetir password nova:</label><br>
                    <input type="text" id="password_repetir" name="password_repetir" required><br><br>
                    <a class="button" onclick="myfunc2(document.getElementById('password_atual').value,document.getElementById('password_nova').value,document.getElementById('password_repetir').value)">Submeter</a>
                </form>
            </div>
            <br><br>
            <button class="accordion">Dados de faturação</button>
            <div class="panel">
                <form action="./editar_dados.php">
                    <label for="fname">NIF:</label><br>
                    <input type="text" id="nif" name="nif" required value="<?php echo $coluna_get_user_info['nif'];?>"><br><br>
                    <label for="lname">Estrada:</label><br>
                    <input type="text" id="estrada" name="estrada" value="<?php echo $coluna_get_user_info['estrada'];?>" required><br><br>
                    <label for="lname">Cidade:</label><br>
                    <input type="text" id="cidade" name="cidade" required value="<?php echo $coluna_get_user_info['cidade'];?>"><br><br>
                    <label for="lname">Código postal:</label><br>
                    <input type="text" id="cod_postal" name="cod_postal" required value="<?php echo $coluna_get_user_info['cod_postal']; ?>"><br><br>
                    <a class="button" onclick="myfunc3(document.getElementById('nif').value,document.getElementById('estrada').value,document.getElementById('cidade').value,document.getElementById('cod_postal').value)">Submeter</a>
                </form>
            </div>

            <br><br>
            <button class="accordion">Pontos</button>
            <div class="panel">
                <form action="./editar_dados.php">
                <?php
                $sql = "SELECT pontos FROM utilizadores WHERE utilizador_id = '".$_SESSION['id_utilizador']."' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                    <label for="lname">Pontos:</label><br>
                    <input type="text" id="pontos" name="pontos" readonly value="<?php echo $row['pontos']; ?>"><br><br>
                </form>
            </div>

            <a href="../pedidoservico/" id="voltar">Voltar atrás</a>



        </div>
    </div>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
    </body>
</html>