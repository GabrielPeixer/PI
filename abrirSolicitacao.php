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
$horasAlunos = mysqli_query($conexao, $sql);
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
    <div class="topo-header">
        <img class="logo" src="img/logo.png">
        <p class="descricao">Plataforma para validação de atividades complementares</p>
    </div>
    <div class="row">

        <div id="menu" class="menu col-3">
            <nav>
                <div class="link">
                    <a href="paginaAdm.php">Principal</a>
                </div>
                <div class="link active">
                    <a href="acompanhamentoAdm.php">Acompanhamento de solicitações</a>
                </div>
                <div class="link">
                    <a href="gerenciamento.php">Gerenciamento de solicitações</a>
                </div>
                <div class="link">
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
            <h7>Dados da solicitação</h7>

            <?php while ($horas = mysqli_fetch_assoc($horasAlunos)) {
                $date = new dateTime($horas['dataCadastro']);
                $arquivo = $horas['arquivo'];
            ?>
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

                <div style="width: 480px;" class="form-group">
                    <textarea placeholder="Se desejar, adicione uma descrição" name="descricao" class="form-control" id="descricao" rows="3"></textarea>
                </div>

                <div class="btn-group">
                    <button style="width:150px;" type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
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