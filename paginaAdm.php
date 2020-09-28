<?php
session_start();
require_once "conecta.php";

if (!empty($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'];
} else {
    $_SESSION['msg'] = "Você precisa estar logado";
    header("Location: index.php");
}
$idLogado = $_SESSION['id_usuario'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Complementares</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- chamando CSS -->
    <link rel="stylesheet" href="estilo.css">
</head>


<body>
    <div class="topo-header">
        <img class="logo" src="img/logo.png">
        <p class="descricao">Plataforma para validação de atividades complementares</p>
    </div>
    <div>
    </div>
    <div class="row">
        <div id="menu" class="menu col-3">
            <nav>
                <div class="link active">
                    <a href="paginaAdm.php">Principal</a>
                </div>
                <div class="link">
                    <a href="acompanhamentoAdm.php">Acompanhamento de solicitações</a>
                </div>
                <div class="link">
                    <a href="gerenciamento.php">Gerenciamento de solicitações</a>
                </div>
                <div class="link">
                    <a href="relatorios.php">Relatorios</a>
                </div>
                <div class="link">
                    <a href="sistema.php">sistema</a>
                </div>
                <div class="link">
                    <?php echo "<a href='sair.php'>Sair</a>"; ?>
                </div>

            </nav>
        </div>

        <div id="principal" class="principal col-9">
            <h4 style="text-align: left;">
                <?php

                if (!empty($_SESSION['id_usuario'])) {
                    echo "Olá " . $_SESSION['nome'] . ",";
                } else {
                    $_SESSION['msg'] = "Você precisa estar logado";
                    header("Location: index.php");
                }
                ?>

            </h4><br>

            <p>Seja bem vindo à Plataforma de Validação de Atividades Complementares.
                Aqui você poderá gerenciar as solicitações de Atividades Acadêmicas Complementares (AAC) dos alunos da Graduação em Análise e Desenvolvimento de Sistemas.</p>

            <p>Acesse o menu lateral para acompanhar as Atividades Complementares cadastradas pelos alunos.</p>


        </div>
    </div>

    <footer>
        <p>
            Federação das Indústrias do Estado de Santa Catarina <br>
            Departamento Regional - Fone: 48 3231 4100 <br>
            Rod. Admar Gonzaga, 2765 - Florianópolis/SC - 88034-001
        </p>

    </footer>
</body>

</html>