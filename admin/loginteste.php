<?php
session_start();
if(empty($_SESSION["login"]))// se nao houver login
{header("Location: /ilavagem/login.php?erro=1");} //volta para a pagina de login
?>
