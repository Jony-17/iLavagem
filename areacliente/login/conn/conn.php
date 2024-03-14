<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$servername="localhost";
$username="root";
$password="";
$dbname="ilavagem"; //Gestão de avarias de um sistema escola
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	die("Erro ao estabalecer ligação à base de dados, " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
?>
