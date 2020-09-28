<?php
require_once "conecta.php";


// if (!empty($_SESSION['id_usuario'])) {
//   $_SESSION['id_usuario'];
// } else {
//   $_SESSION['msg'] = "Você precisa estar logado";
//   header("Location: index.php");
// }

$id = $_GET['id'];
$status = $_POST['status'];
$descricao = $_POST['descricao'];
$horas = $_POST['horas'];

if (empty($status)) { ?>
    <script>
      alert('O campo status deve ser preenchido');
      window.location.replace("acompanhamentoAdm.php");
    </script>
<?php } else{
$sql = "UPDATE horasalunos SET status = '$status' WHERE id_horas = $id";
$reconsidera = mysqli_query($conexao, $sql);

$sql = "UPDATE `horasalunos` SET `horas` = '$horas' WHERE (`id_horas` = '$id');";
$horas = mysqli_query($conexao, $sql);

$sql = "INSERT INTO `reconsidera` (`motivo`, `id_horas`) VALUES ('$descricao', '$id')";
$motivo = mysqli_query($conexao, $sql);
}    

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
            <div id="cadastro" class="card border-secondary mb-3" style="left: 450px; top: 190px; max-width: 18rem; padding: 1.25rem; text-align: center;">
                <?php
                if ($horasAluno = true) {
                    echo "A solicitação foi encaminhada"; ?>
                    <a class="form-control" href="acompanhamentoAdm.php">OK</a>
                <?php
                } else {
                    echo "Tente novamente";
                }
                ?>
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