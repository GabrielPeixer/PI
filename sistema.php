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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Complementares</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- chamando CSS -->
    <link rel="stylesheet" href="estilo.css">
    <script type="text/javascript" src="jquery-1.11.0.min.js"></script>

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
    <div class="topo-header">
        <img class="logo" src="img/logo.png">
        <p class="descricao">Plataforma para validação de atividades complementares</p>
    </div>
    <div>
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
            <p><i>Adicionar um novo usuario;</i></p>
            <form method="post" action="novoUsuario.php" class="dadosUsuario">
                <div class="form-group">
                    <input style="width: 500px;" type="nome" class="form-control" name="nome" placeholder="Nome completo">
                </div>
                <div class="form-group">
                    <input style="width: 500px;" type="nome" class="form-control" name="usuario" placeholder="Usuário">
                </div>
                <div class="form-group">
                    <input style="width: 500px;" type="password" class="form-control" name="senha" placeholder="Senha">
                </div>

                <div class="form-group">
                    <select id="adm" class="custom-select" style="width: 500px;" name="nivel" onchange="verifica()">
                        <option disabled selected>Selecione...</option>
                        <option value="0">Aluno</option>
                        <option value="1">Administrador</option>
                    </select>
                </div>

                <div class="form-group">
                    <input style="display:none; width: 500px;" id="turma"  type="text" class="form-control" name="turma" placeholder="Turma">
                </div>
                <button style="width:150px;" type="submit" class="btn btn-primary">Cadastrar</button>
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