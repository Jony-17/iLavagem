<?php
require_once('./conn/conn.php');
if(isset($_POST['email']) and isset($_POST['password']))
{
    if(!empty($_POST['nome']) and !empty($_POST['email']))
    {
        if(!empty($_POST['telemovel']) and !empty($_POST['cod_postal']))
        {
            if(!empty($_POST['repeat_password']))
            {
                //protege contra sqlinjection
                $nome = mysqli_real_escape_string($conn, $_POST['nome']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $password_repeat = mysqli_real_escape_string($conn, $_POST['repeat_password']);
                $telemovel = mysqli_real_escape_string($conn, $_POST['telemovel']);
                $nif = mysqli_real_escape_string($conn, $_POST['nif']);
                $morada = mysqli_real_escape_string($conn, $_POST['morada']);
                $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
                $cod_postal = mysqli_real_escape_string($conn,$_POST['cod_postal']);

                //verifica se email ou telemóvel já estão registados na base de dados
                $sql_verifica_email_telemovel = "SELECT COUNT(*) as 'users_same_email_phone' FROM utilizadores WHERE email = '".$email."' or telemovel = '".$telemovel."'";
                $resultado_verificar_email_telemovel = mysqli_query($conn, $sql_verifica_email_telemovel);
                $coluna_verifica_email_telemovel = mysqli_fetch_assoc($resultado_verificar_email_telemovel);
                if($coluna_verifica_email_telemovel['users_same_email_phone'] == 0)
                {
                    
                        //verifica telemóvel
                        if(is_numeric($telemovel) and is_numeric($nif))
                        {
                            //compara se as duas password são iguais
                            if(strcmp($password,$password_repeat) == 0)
                            {
                                $sql_inserir_utilizador = "INSERT INTO utilizadores (nome,email,telemovel,password,nif,estrada,cidade,cod_postal,data_criacao) VALUES ('".$nome."', '".$email."', '".$telemovel."','".$password."','".$nif."','".$morada."','".$cidade."','".$cod_postal."','".date('Y-m-d H:i:s')."')";
                                $resultado_inserir_utilizador = mysqli_query($conn, $sql_inserir_utilizador);
                                if($resultado_inserir_utilizador)
                                {
                                    //inseriu o utilizador com sucesso
                                    ?><script type="text/javascript">
                                    alert('Utilizador inserido com sucesso.');
                                    window.location = '../login/';
                                </script><?php
                                }
                                else{
                                    //não conseguiu inserir o utilizador
                                    ?><script type="text/javascript">
                                        alert('Não foi possível adicionar a sua conta. Tente mais tarde!');
                                        window.location = './';
                                    </script><?php
                                }
                            }else{
                                ?><script type="text/javascript">
                                    alert('As passwords não são iguais.');
                                    window.location = './';
                                </script><?php
                            }
                        }else{
                            ?><script type="text/javascript">
                                alert('Número de telemóvel incorreto.');
                                window.location = './';
                            </script><?php
                        }
                    }else
                    {
                        //já existem utilizadores com mesmo número ou email
                        ?><script type="text/javascript">
                        alert('Email inválido.');
                        window.location = './';
                    </script><?php
                    }
                }else
                {
                    //já existem utilizadores com mesmo número ou email
                    ?><script type="text/javascript">
                    alert('Já existem utilizadores com este email ou telemóvel.');
                    window.location = './';
                </script><?php
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registo - ilavagem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/registo.css">
</head>
<body>
<table>
    <tr>
        <td><p class="title">Registo</p></td>
        <td><img src="./img/logo_png.png" class="titleimg" ></td>
    </tr>
</table>
<div class="container">
    <form method="post" action="./" name="form1" id="form1">
        <div class="row">
            <div class="col-25">
                <label for="fname">Nome</label>
            </div>
            <div class="col-75">
                <input type="text" id="nome" required name="nome" placeholder="Nome">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Email</label>
            </div>
            <div class="col-75">
                <input type="email" id="email" required name="email" placeholder="Email">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Password</label>
            </div>
            <div class="col-75">
                <input type="password" id="password" required name="password" placeholder="Password">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Repetir Password</label>
            </div>
            <div class="col-75">
                <input type="password" id="repeat_password" required name="repeat_password" placeholder="Repetir Password">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Telemóvel</label>
            </div>
            <div class="col-75">
                <input type="text" id="telemovel" name="telemovel" minlength="9" required placeholder="Telemóvel">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">NIF</label>
            </div>
            <div class="col-75">
                <input type="number" required id="nif" name="nif" placeholder="NIF">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Morada</label>
            </div>
            <div class="col-75">
                <input type="text" id="morada" name="morada" required placeholder="Morada">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Cidade</label>
            </div>
            <div class="col-75">
                <input type="text" id="cidade" name="cidade" required placeholder="Cidade">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Código Postal</label>
            </div>
            <div class="col-75">
                <input type="text" id="cod_postal" name="cod_postal" required placeholder="Código Postal">
            </div>
        </div>
        <br>
        <center>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </center>
    </form>
</div>

</body>
</html>
