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
                    <a class="nav-item nav-link " href="gerenciamento.php">Gerenciar Solicitações</a>
                    <a class="nav-item nav-link" href="relatorios.php">Relatorios</a>
                    <a class="nav-item nav-link active" href="sistema.php">Sistema</a>
                    <a class="nav-item nav-link" href="sair.php">Sair
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div id="principal" class=" jumbotron d-flex justify-content-center col-12 p-5 mt-5">

      <div id="cadastro" class="card border-secondary mb-3" style="max-width: 18rem; padding: 1.25rem; text-align: center;">
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