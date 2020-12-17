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

$id = $_GET['id'];
$sql = "SELECT * FROM `horasalunos` WHERE `id_horas` = $id limit 1";
$horasalunos = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Complementares</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">

    <script>
        function verifica() {
            const select = document.getElementById('aprovado');
            const optionSelected = select.options[select.selectedIndex].value;
            if (optionSelected === 'Aprovado') {
                document.getElementById('horas').style.display = "block";
            } else {
                document.getElementById('horas').style.display = "none";
            }
        }
    </script>
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
                <h5 class="mt-n4">Dados da solicitação</h5>

                <?php while ($horas = mysqli_fetch_assoc($horasalunos)) {
                    $date = new dateTime($horas['dataCadastro']);
                    $arquivo = $horas['arquivo'];
                ?>
                    <div class="row d-flex justify-content-center">
                        <div class="card border-secondary mb-3" style="max-width: 30rem;">
                            <div class="card-body text-secondary">
                                <label for="">Código solicitação: <?php echo $horas['id_horas']; ?> </label><br>
                                <label for="">Data de abertura: <?php echo $date->format('d-m-Y H:i:s'); ?></label><br>
                                <label for="">Título solicitação: <?php echo $horas['titulo']; ?></label><br>
                                <label for="">Modalidade: <?php echo $horas['modalidade']; ?></label><br>
                                <label for="">Descrição: <?php echo $horas['descricao']; ?></label><br>
                                <label for="">Descrição: <?php echo $horas['arquivo']; ?></label><br>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <h5>Gerencie abaixo a solicitação:</h5>

                <form method="POST" action="reconsidera.php?id=<?php echo $id; ?>">

                    <div class="form-group">
                        <select id="aprovado" style="width: 480px;" name="status" class="custom-select" onchange="verifica()">
                            <option disabled selected>Selecione...</option>
                            <option value="Aprovado">Aprovar</option>
                            <option value="Revisão">Revisar</option>
                            <option value="Reprovado">Reprovar</option>
                        </select>
                    </div>

                    <div style="width: 480px;" class="form-group">
                        <input placeholder="Horas aprovadas" style="display:none;" type="number" name="horas" class="form-control" id="horas"></input>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div style="width: 480px;" class="form-group">
                            <textarea placeholder="Se desejar, adicione uma descrição" name="descricao" class="form-control" id="descricao" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button style="width:150px;" type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
     
</body>

</html>