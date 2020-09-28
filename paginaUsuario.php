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
                    <a href="paginaUsuario.php">Principal</a>
                </div>
                <div class="link">
                    <a href="novasolicitacao.php">Cadastrar nova solicitação</a>
                </div>
                <div class="link">
                    <a href="acompanhamentoSolicitacao.php">Acompanhamento de solicitações</a>
                </div>
                <div class="link">
                    <a href="aprovadas.php">Solicitações Aprovadas</a>
                </div>
                <div class="link">
                    <a href="dadosUsuario.php">Dados do usuário</a>
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
                    echo "Olá " . $_SESSION['nome']. ",";
                } else {
                    $_SESSION['msg'] = "Você precisa estar logado";
                    header("Location: index.php");
                }
                ?>

            </h4><br>

            <p>Seja bem vindo à Plataforma de Validação de Atividades Complementares.
                Aqui você poderá cadastrar solicitações para validar Atividades Acadêmicas Complementares (AAC) elegíveis à graduação em Análise e Desenvolvimento de Sistemas. É possível cadastrar as seguintes modalidades:</p>

            <h6>1) Ensino;</h6>
            <h6>2) Pesquisa;</h6>
            <h6>3) Extensão;</h6><br>

            <p>Acesse o menu lateral para cadastrar uma nova solicitação e anexar os documentos. Lembre-se que, apesar da plataforma aceitar arquivos em formato de imagens (JPEG, PNG e TIFF), será aceito apenas um arquivo por solicitação. Se a sua documentação possuir mais de uma página, converta elas para um único pdf.
                Acompanhe o status de suas solicitações pelo menu lateral.
                Lembre-se que não é possível reabrir solicitações: se necessário, cadastre uma nova.</p>
            <p><strong>Em caso de dúvidas, contate a coordenação do curso através do email tiago.asp@senai.com.br.
                </strong></p>

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