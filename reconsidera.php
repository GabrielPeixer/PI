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
<?php } else {
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
            <?php
            if ($horasAluno = true) {
                echo "A solicitação foi encaminhada"; ?>
                <div class="row d-flex p-5 justify-content-center" >

                    <a class="form-control " style="width: 20%" href="acompanhamentoAdm.php">OK</a>
                </div>
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