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
$modalidade = $_POST['modalidade'];
$titulo = $_POST['titulo'];
$upload = $_POST['upload'];
$descricao = $_POST['descricao'];

if (empty($modalidade && $titulo && $upload && $descricao)) { ?>

  <script>
    alert('Todos os campos devem ser preenchidos');
    window.location.replace("novasolicitacao.php");
  </script>

<?php } else {
  $sql = "INSERT INTO `horasalunos` (`id_usuario`, `modalidade`, `titulo`, `arquivo`, `descricao`, `status`, `dataCadastro`) VALUES ('$idLogado', '$modalidade', '$titulo', '$upload', '$descricao', 'aguardando', NOW())";
  $horasAluno = mysqli_query($conexao, $sql);
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
          <a class="nav-item nav-link active" href="paginaUsuario.php">Principal<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="novasolicitacao.php">Cadastrar nova solicitação</a>
          <a class="nav-item nav-link" href="acompanhamentoSolicitacao.php">Acompanhamento de solicitações</a>
          <a class="nav-item nav-link" href="aprovadas.php">Solicitações aprovadas</a>
          <a class="nav-item nav-link" href="dadosUsuario.php">Dados do usuário</a>
          <a class="nav-item nav-link" href="sair.php">Sair
          </a>
        </div>
      </div>
    </nav>
  </div>

  <div id="principal" class="principal col-12">

  <div class="row d-flex justify-content-center mt-5 p-5">
    <div id="cadastro" class=" card border-secondary mb-3" style=" max-width: 18rem; padding: 1.25rem; text-align: center;">
      <?php
      if ($horasAluno = true) {
        echo "A solicitação foi enviada com sucesso!"; ?>
        <a class="form-control" href="novasolicitacao.php">OK</a>
      <?php
      } else {
        echo "Tente novamente";
      }
      ?>
    </div>


  </div>

  </div>
  </div>
</body>

</html>