<?php
session_start();
require_once "conecta.php";

if (!empty($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'];
} else {
    $_SESSION['msg'] = "Você precisa estar logado";
    header("Location: index.php");
}
$idLogado = $_SESSION['id_usuario'];


?>

<!DOCTYPE html>
<html lang="en">

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
            const select = document.getElementById('adm');
            const optionSelected = select.options[select.selectedIndex].value;
            if (optionSelected == 0) {
                document.getElementById('turma').style.display = "block";
            } else {
                document.getElementById('turma').style.display = "none";
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
                Adicionar um novo usuario
            </h5>

            <div class="py-5  container" style="max-width: 500px;">
                <form method="post" action="novoUsuario.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <input type="nome" class="form-control" name="nome" placeholder="Nome completo">
                        </div>
                        <div class="form-group col-12">
                            <input type="nome" class="form-control" name="usuario" placeholder="Usuário">
                        </div>
                        <div class="form-group col-12">
                            <input type="password" class="form-control" name="senha" placeholder="Senha">
                        </div>

                        <div class="form-group col-12">
                            <select id="adm" class="custom-select" name="nivel" onchange="verifica()">
                                <option disabled selected>Selecione...</option>
                                <option value="0">Aluno</option>
                                <option value="1">Administrador</option>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <input style="display:none; width: 500px;" id="turma" type="text" class="form-control" name="turma" placeholder="Turma">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary text-center" style="width:150px;" type="submit" >Cadastrar</button>
                        </div>
                    </div>
                </form>
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