<?php
require_once "conecta.php";
session_start();

if (isset($_POST['btn-entrar'])) {
    $erros = array();
    $login = mysqli_escape_string($conexao, $_POST['login']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);

    if (empty($login) or empty($senha)) {
        $erros[] = "<li> Os campos precisam ser preenchidos </li>";
    } else {

        $sql = "SELECT `login` FROM `usuarios` WHERE `login` = '$login'";
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $senha = md5($senha);
            $sql = "SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha` = '$senha'";
            $resultado = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultado) == 1) {
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header("Location: paginaUsuario.php");
            } else {
                $erros[] = "<li> Usuário e/ou senha incorretos </li>";
            }
        } else {
            $erros[] = "<li> Usuário inexistente </li>";
        }
    }
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
    <div class="teste">
        <!-- <img class="logo" src="img/bg.jpg" > -->
        <!-- <p class="descricao py-3"> -->
        <!-- <h2 class="text-center" style="position: absolute; top: 20px">
            Plataforma para validação de atividades complementares
        </h2> -->
        <!-- </p> -->
    </div>
    <!-- style="opacity: 0.1; right: 0; bottom: 0; position: absolute;" -->
    <!-- topo-header my-5 -->
    <!-- class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top" -->

    <form class="centered mt-3" id="telalogin" method="POST" action="valida.php">
        <div class="card border-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header"><b>Login</b></div>
            <div class="card-body text-secondary">
                <span style="font-size: smaller;">
                    Plataforma para validação de atividades complementares
                </span>
                <?php if (isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                    ?>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10">
                            <input type="text" name="usuario" class="form-control" placeholder="Login">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                            <input type="password" name="senha" class="form-control" placeholder="Senha">
                        </div>

                        <button type="submit" id="logar" name="btnLogin" value="logar" class="mt-3 
                        btn btn-primary">Entrar</button>

                    </div>
            </div>
    </form>



</body>

</html>