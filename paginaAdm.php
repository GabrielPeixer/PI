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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
</head>


<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup"
                style="display: flex; justify-content: center;">
                <div class="navbar-nav text-center">
                    <a class="nav-item nav-link active" href="paginaAdm.php">Principal<span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="acompanhamentoAdm.php">Acompanhar Solicitações</a>
                    <a class="nav-item nav-link" href="gerenciamento.php">Gerenciar Solicitações</a>
                    <a class="nav-item nav-link" href="relatorios.php">Relatorios</a>
                    <a class="nav-item nav-link" href="sistema.php">Sistema</a>
                    <a class="nav-item nav-link" href="sair.php">Sair
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div id="principal" class="w-100">
            <div class="jumbotron text-center" style="height: 100vh;">
                <h1 class="display-4">
                    <?php
                    if (!empty($_SESSION['id_usuario'])) {
                        echo "Olá " . $_SESSION['nome'] . ",";
                    } else {
                        $_SESSION['msg'] = "Você precisa estar logado";
                        header("Location: index.php");
                    }
                    ?>
                </h1>
                <p class="lead my-5">Seja bem vindo à Plataforma de Validação de Atividades Complementares.
                    Aqui você poderá gerenciar as solicitações de Atividades Acadêmicas Complementares (AAC) dos alunos
                    da Graduação em Análise e Desenvolvimento de Sistemas.</p>
                <hr class="my-4">
                <p>Acesse o menu ou clique no botão abaixo para acompanhar as Atividades Complementares cadastradas
                    pelos alunos.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" style="width: 20%;" href="acompanhamentoAdm.php"
                        role="button">Acompanhar Solicitações</a>
                </p>
            </div>
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