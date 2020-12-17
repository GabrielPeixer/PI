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

$sql = "SELECT * FROM `horasalunos` INNER JOIN reconsidera ON horasalunos.id_horas = reconsidera.id_horas WHERE `id_usuario` = '$idLogado' AND `status`= 'Aprovado' ORDER BY `dataCadastro` DESC ";
$horaAluno = mysqli_query($conexao, $sql);

$sql = "SELECT SUM(horas) FROM `horasalunos` WHERE `id_usuario` = '$idLogado'";
$horaAprovadas = mysqli_query($conexao, $sql);

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
          <a class="nav-item nav-link " href="paginaUsuario.php">Principal<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="novasolicitacao.php">Cadastrar nova solicitação</a>
          <a class="nav-item nav-link " href="acompanhamentoSolicitacao.php">Acompanhamento de solicitações</a>
          <a class="nav-item nav-link active" href="aprovadas.php">Solicitações aprovadas</a>
          <a class="nav-item nav-link" href="dadosUsuario.php">Dados do usuário</a>
          <a class="nav-item nav-link" href="sair.php">Sair
          </a>
        </div>
      </div>
    </nav>

    <div id="principal" class="w-100">
      <div class="jumbotron text-center" style="height: 100vh;">
      <h5 class="mt-n4">Consulte abaixo o andamento de suas solicitações</h5>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Modalidade</th>
            <th scope="col">Descrição</th>
            <th scope="col">Horas aprovadas</th>
            <th scope="col"></th>
          </tr>
        </thead>

        <?php while ($hora = $horaAluno->fetch_array()) {
          $date = new dateTime($hora['dataCadastro']);
        ?>

          <tbody>
            <tr>
              <td> <?php echo $hora["titulo"]; ?> </td>
              <td> <?php echo $hora["modalidade"]; ?> </td>
              <td> <?php echo $hora["descricao"]; ?> </td>
              <td> <?php echo $hora["horas"]; ?>h </td>
            </tr>
          </tbody>
        <?php } ?>
      </table>

      <div>
        <?php while ($hora = $horaAprovadas->fetch_array()) { ?>
          <p>Total de horas aprovadas: <?php echo $hora['SUM(horas)']; ?>/60h </p>
        <?php } ?>

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