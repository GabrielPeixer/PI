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

$sql = "SELECT * FROM `horasAlunos` INNER JOIN usuarios ON horasAlunos.id_usuario = usuarios.id_usuario where `status` = 'Aprovado' ORDER BY `dataCadastro` DESC";
$horasAlunos = mysqli_query($conexao, $sql);
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

        <div id="principal" class="w-100">
            <div class="jumbotron text-center" style="height: 100vh;">
                <h5 class="mt-n4">Consulte abaixo os processos disponiblizados pela coordenação </h5>


                <table class="table my-5">
                    <thead>
                        <tr>
                            <th scope="col">Aluno</th>
                            <th scope="col">Modalidade</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Horas</th>
                        </tr>
                    </thead>

                    <?php while ($horas = mysqli_fetch_assoc($horasAlunos)) {
                        $date = new dateTime($horas['dataCadastro']);

                    ?>

                        <tbody>
                            <tr>
                                <td> <?php echo $horas['nome']; ?> </td>
                                <td> <?php echo $horas['modalidade']; ?> </td>
                                <td> <?php echo $horas['titulo']; ?> </td>
                                <td> <?php echo $horas['horas']; ?> </td>
                            </tr>
                        </tbody>

                    <?php } ?>
                </table>
                <div>
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" style="width: 20%;" href="acompanhamentoSolicitacao.php" role="button">Acompanhar Solicitações</a>
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