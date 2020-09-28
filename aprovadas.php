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
          <a href="paginaUsuario.php">Principal</a>
        </div>
        <div class="link">
          <a href="novasolicitacao.php">Cadastrar nova solicitação</a>
        </div>
        <div class="link">
          <a href="acompanhamentoSolicitacao.php">Acompanhamento de solicitações</a>
        </div>
        <div class="link active">
          <a href="aprovadas.php">Solicitações Aprovadas</a>
        </div>
        <div class="link">
          <a href="dadosUsuario.php">Dados do usuário</a>
        </div>
        <div class="link">
          <?php echo "<a href='sair.php'>Sair</a>"; ?>
        </div>

      </nav>
    </div>

    <div id="principal" class="principal col-9">
      <p><i>Consulte abaixo o andamento de suas solicitações;</i></p>

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