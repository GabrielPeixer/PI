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

$sql = "SELECT * FROM `horasalunos` INNER JOIN usuarios ON horasalunos.id_usuario = usuarios.id_usuario where `status` = 'aguardando' ORDER BY `dataCadastro` DESC";
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
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-center">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="display: flex; justify-content: center;">
        <div class="navbar-nav text-center">
          <a class="nav-item nav-link" href="paginaAdm.php">Principal<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active" href="acompanhamentoAdm.php">Acompanhar Solicitações</a>
          <a class="nav-item nav-link" href="gerenciamento.php">Gerenciar Solicitações</a>
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
      <h5 class="mt-n4">
        Consulte abaixo o andamento de solicitacoes dos alunos do SENAI
        </h5>

      <table class="table my-5">
        <thead>
          <tr>
            <th scope="col">Aluno</th>
            <th scope="col">Turma</th>
            <th scope="col">Data da abertura</th>
            <th scope="col">Dados</th>
          </tr>
        </thead>
        <?php while ($horas = mysqli_fetch_assoc($horasalunos)) {
          $date = new dateTime($horas['dataCadastro']);

        ?>
          <tbody>
            <tr>
              <td> <?php echo $horas['nome']; ?> </td>
              <td> <?php echo $horas['turma']; ?> </td>
              <td> <?php echo $date->format('d-m-Y H:i:s');  ?> </td>
              <td>
                <?php
                $id = $horas['id_horas'];
                echo "<a href=abrirSolicitacao.php?id=" . $id . ">Abrir solicitação</a>"
                ?>
              </td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
      <div>
        <hr class="my-4">
        <p class="lead">
          <a class="btn btn-primary btn-lg" style="width: 20%;" href="gerenciamento.php" role="button">Gerenciar Solicitações</a>
        </p>
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