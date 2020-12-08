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
                    <a class="nav-item nav-link active" href="paginaUsuario.php">Principal<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="novasolicitacao.php">Cadastrar nova solicitação</a>
                    <a class="nav-item nav-link" href="acompanhamentoSolicitacao.php">Acompanhamento de solicitações</a>
                    <a class="nav-item nav-link" href="aprovadas.php">Solicitações aprovadas</a>
                    <a class="nav-item nav-link" href="dadosUsuario.php">Dados do usuário</a>
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

                    <p class="lead my-5">Seja bem vindo à Plataforma de Validação de Atividades Complementares.
                        Aqui você poderá cadastrar solicitações para validar Atividades Acadêmicas Complementares (AAC) elegíveis à graduação em Análise e Desenvolvimento de Sistemas. É possível cadastrar as seguintes modalidades:</p>

                    <h3>1) Ensino</h3>
                    <h3>2) Pesquisa</h3>
                    <h3>3) Extensão</h3>
                    <br>

                    <p class="lead my-5">Acesse o menu lateral para cadastrar uma nova solicitação e anexar os documentos. Lembre-se que, apesar da plataforma aceitar arquivos em formato de imagens (JPEG, PNG e TIFF), será aceito apenas um arquivo por solicitação. Se a sua documentação possuir mais de uma página, converta elas para um único pdf.
                        Acompanhe o status de suas solicitações pelo menu lateral.
                        Lembre-se que não é possível reabrir solicitações: se necessário, cadastre uma nova.</p>
                    <p class="lead my-5"><strong>Em caso de dúvidas, contate a coordenação do curso através do email tiago.asp@senai.com.br.
                        </strong></p>
                    <hr class="my-4">
                    <a class="btn btn-primary btn-lg" style="width: 30%;" href="novasolicitacao.php"
                        role="button">Cadastrar nova solicitação</a>
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