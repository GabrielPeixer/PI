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
    <div class="row">
        <div id="menu" class="menu col-3">
            <nav>
                <div class="link">
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
                <div class="link active">
                    <a href="dadosUsuario.php">Dados do usuário</a>
                </div>
                <div class="link">
                    <?php echo "<a href='sair.php'>Sair</a>"; ?>
                </div>

            </nav>
        </div>

        <div id="formUsuario" class="principal col-9">
            <p><i>Altere abaixo sua senha;</i></p>
            <form method="post" action="salvaDadosUsuario.php" class="dadosUsuario">

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