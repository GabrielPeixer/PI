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

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
$turma = $_POST['turma'];
$senhacriptografada = password_hash($senha, PASSWORD_DEFAULT);



if(empty($nome && $usuario && $senha)) { ?>

<script>
  alert('Todos os campos devem ser preenchidos');
  window.location.replace("sistema.php");
</script>

<?php } else{
$sql = "INSERT INTO `usuarios` (nome, usuario, senha, nivel, turma) VALUES ('$nome', '$usuario', '$senhacriptografada', '$nivel', '$turma')";
$usuario = mysqli_query($conexao, $sql);
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
                <div class="link">
                    <a href="acompanhamentoAdm.php">Acompanhamento de solicitações</a>
                </div>
                <div class="link">
                    <a href="gerenciamento.php">Gerenciamento de solicitações</a>
                </div>
                <div class="link">
                    <a href="relatorios.php">Relatorios</a>
                </div>
                <div class="link active">
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
          echo "Usuario ".$nome." cadastrado com sucesso!"; ?>
          <a class="form-control" href="sistema.php">OK</a>
        <?php
        } else {
          echo "Tente novamente";
        }
        ?>
      </div>

    </div>
  </div>
</body>

</html>