<?php
session_start();

unset($_SESSION['id_usuario'], $_SESSION['nome'], $_SESSION['usuario']);

$_SESSION['msg'] = "Você foi deslogado.";

header('location: index.php');
?>



