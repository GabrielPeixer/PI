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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="display: flex; justify-content: center;">
                <div class="navbar-nav text-center">
                    <a class="nav-item nav-link " href="paginaUsuario.php">Principal<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="novasolicitacao.php">Cadastrar nova solicitação</a>
                    <a class="nav-item nav-link " href="acompanhamentoSolicitacao.php">Acompanhamento de solicitações</a>
                    <a class="nav-item nav-link" href="aprovadas.php">Solicitações aprovadas</a>
                    <a class="nav-item nav-link active" href="dadosUsuario.php">Dados do usuário</a>
                    <a class="nav-item nav-link" href="sair.php">Sair
                    </a>
                </div>
            </div>
        </nav>




        <div id="principal" class="w-100">
            <div class="jumbotron text-center" style="height: 100vh;">
                <div id="formUsuario" class="mt-5 col-12">
                    <div class="row d-flex justify-content-center">
                        <h5 class="mt-n4 text-center col-12">Consulte abaixo o andamento de suas solicitações</h5>

                        <form method="post" action="salvaDadosUsuario.php" class="mt-5">

                            <div class="form-group">
                                <input style="width: 500px;" type="password" class="form-control" name="senha" placeholder="Senha atual">
                            </div>
                            <div class="form-group">
                                <input style="width: 500px;" type="password" class="form-control" name="senha" placeholder="Nova senha">
                            </div>

                            <button style="width:150px;" type="submit" class="btn btn-primary">Alterar</button>
                        </form>
                    </div>


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

<?php


?>