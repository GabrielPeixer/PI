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

$sql = "SELECT * FROM `usuarios` WHERE `nivel` = 0";
$usuario = mysqli_query($conexao, $sql);

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
                    <a class="nav-item nav-link" href="gerenciamento.php">Gerenciar Solicitações</a>
                    <a class="nav-item nav-link active" href="relatorios.php">Relatorios</a>
                    <a class="nav-item nav-link" href="sistema.php">Sistema</a>
                    <a class="nav-item nav-link" href="sair.php">Sair
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div id="principal" class="w-100">
        <div class="jumbotron text-center" style="height: 100vh;">
            <h5 class="mt-n4 pb-5">Nesta página você pode gerar os relatórios a fim de quantificar o status das solicitação dos alunos cadastrados na plataforma</h5>
            <div class="my-5">

                <form action="gera.php" method="POST">
                    <div class="d-flex justify-content-center">
                        <div class="form-group col-md-2">
                            <label class="text-modalidade"> <b>Status da solicitação</b> </label>

                            <label class="form-check">
                                <input type="radio" name="status" value="Aprovado"><span class="label label-success"> Aprovadas</span>
                            </label>

                            <label class="form-check">
                                <input type="radio" name="status" value="Revisão"><span class="label label-success"> Pendentes</span>
                            </label>

                            <label class="form-check">
                                <input type="radio" name="status" value="Reprovado"><span class="label label-success"> Negadas</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <select style="margin-top: 24px;" name="nome" class="form-control">
                                <option>Buscar por aluno</option>
                                <?php while ($usuarios = mysqli_fetch_assoc($usuario)) { ?>
                                    <option><?php echo $usuarios['nome']; ?> </option>

                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" style="width: 150%;" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
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