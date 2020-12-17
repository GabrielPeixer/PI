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

$sql = "SELECT * FROM `horasalunos` INNER JOIN reconsidera ON horasalunos.id_horas = reconsidera.id_horas WHERE `id_usuario` = '$idLogado' AND `status`!= 'Aprovado' ORDER BY `dataCadastro` DESC ";
$horaAluno = mysqli_query($conexao, $sql);

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
          <a class="nav-item nav-link active" href="acompanhamentoSolicitacao.php">Acompanhamento de solicitações</a>
          <a class="nav-item nav-link" href="aprovadas.php">Solicitações aprovadas</a>
          <a class="nav-item nav-link" href="dadosUsuario.php">Dados do usuário</a>
          <a class="nav-item nav-link" href="sair.php">Sair
          </a>
        </div>
      </div>
    </nav>

    <div id="principal" class="w-100">
      <div class="jumbotron text-center" style="height: 100vh;">
        <h5 class="mt-n4">Consulte abaixo o andamento de suas solicitações</h5>

        <table class="table my-5">
          <thead>
            <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Modalidade</th>
              <th scope="col">Data da abertura</th>
              <th scope="col">Status</th>
              <th scope="col">Situação</th>
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
                <td> <?php echo $date->format('d-m-Y H:i:s'); ?> </td>
                <td>
                  <select id="status" disabled style="width: 130px;" class="custom-select">
                    <option value=""><?php echo $hora["status"]; ?></option>
                  </select>
                </td>
                <td> <textarea class="form-control" name="motivo" disabled rows="2"><?php echo $hora['motivo']; ?></textarea></td>
                <td>
                  <?php
                  $id = $hora['id_horas'];
                  echo "<a href=revisaSolicitacao.php?id=" . $id . ">Reencaminhar solicitação</a>"
                  ?>
                </td>
              </tr>
            </tbody>
          <?php } ?>
        </table>

      </div>
    </div>

</body>

</html>