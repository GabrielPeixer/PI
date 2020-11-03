<?php
//Conexao ao banco
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "validahoras";

$conexao = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()){
    echo "Falha na conexão \n".mysqli_connect_error();
}