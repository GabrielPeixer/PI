<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once "conecta.php";

if (!empty($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'];
} else {
    $_SESSION['msg'] = "Você precisa estar logado";
    header("Location: index.php");
}
$idLogado = $_SESSION['id_usuario'];

$status = $_POST['status'];
$nome = $_POST['nome'];

$sql = "SELECT * FROM `horasalunos` INNER JOIN usuarios ON horasalunos.id_usuario = usuarios.id_usuario WHERE `status` = '$status' AND `nome` = '$nome'";
$relatorio = mysqli_query($conexao, $sql);
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
                    <a class="nav-item nav-link " href="paginaAdm.php">Principal<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="acompanhamentoAdm.php">Acompanhar Solicitações</a>
                    <a class="nav-item nav-link active" href="gerenciamento.php">Gerenciar Solicitações</a>
                    <a class="nav-item nav-link" href="relatorios.php">Relatorios</a>
                    <a class="nav-item nav-link" href="sistema.php">Sistema</a>
                    <a class="nav-item nav-link" href="sair.php">Sair
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div id="principal" class="w-100">
        <div class="jumbotron text-center" style="height: 100vh;">
            <h5 class="mt-n4">Solicitações <?php echo $_POST['status']; ?> do aluno <?php echo $_POST['nome']; ?></h5>

            <table class="table my-5">
                <thead>
                    <tr>
                        <th scope="col">Código solicitação</th>
                        <th scope="col">Data de abertura</th>
                        <th scope="col">Título solicitação</th>
                        <th scope="col">Modalidade</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Arquivo</th>
                        <th scope="col">Horas aprovadas</th>

                    </tr>
                </thead>
                <?php while ($horas = mysqli_fetch_assoc($relatorio)) {
                    $date = new dateTime($horas['dataCadastro']);
                ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $horas['id_horas']; ?> </td>
                            <td> <?php echo $date->format('d-m-Y H:i:s'); ?> </td>
                            <td> <?php echo $horas['titulo']; ?> </td>
                            <td> <?php echo $horas['modalidade']; ?> </td>
                            <td> <?php echo $horas['descricao']; ?> </td>
                            <td> <?php echo $horas['arquivo'];   ?> </td>
                            <td> <?php echo  $horas['horas']; ?> </td>

                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            <div>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" style="width: 20%;" href="acompanhamentoAdm.php" role="button">Acompanhar Solicitações</a>
                </p>
            </div>

        </div>


</body>

</html>