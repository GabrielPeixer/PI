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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- chamando CSS -->
    <link rel="stylesheet" href="estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
                <div class="link">
                    <a href="paginaAdm.php">Principal</a>
                </div>
                <div class="link">
                    <a href="acompanhamentoAdm.php">Acompanhamento de solicitações</a>
                </div>
                <div class="link">
                    <a href="gerenciamento.php">Gerenciamento de solicitações</a>
                </div>
                <div class="link active">
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
            <p><i>Nesta página você pode gerar os relatórios a fim de quantificar o status das solicitação dos alunos cadastrados na plataforma:</i></p>
            <form action="gera.php" method="POST">
                <div class="form-row">
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

                    <div style="margin-top: 24px;" class="form-group">
                        <label> </label>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>

                </div>
            </form>
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