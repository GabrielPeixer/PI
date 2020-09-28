<?php
session_start();
include_once("conecta.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if ($btnLogin) {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    //echo "$usuario - $senha";
    if ((!empty($usuario)) and (!empty($senha))) {
        //Gerar a senha criptografa
        //echo password_hash($senha, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM `usuarios` WHERE `usuario` = '" . $usuario . "' limit 1";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            $row_resultado = mysqli_fetch_assoc($resultado);
            if (password_verify($senha, $row_resultado['senha'])) {
                $_SESSION['id_usuario'] = $row_resultado['id_usuario'];
                $_SESSION['nome'] = $row_resultado['nome'];
                $_SESSION['usuario'] = $row_resultado['usuario'];
                $_SESSION['nivel'] = $row_resultado['nivel'];

                if ($row_resultado['nivel'] == 0) {
                    header("Location: paginaUsuario.php");
                } else {
                    header("Location: paginaAdm.php");
                }
            } else {
                $_SESSION['msg'] = "Login ou senha incorretos.";
                header("Location: index.php");
            }
        }
    } else {
        $_SESSION['msg'] = "Login ou senha incorretos.";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: index.php");
}
