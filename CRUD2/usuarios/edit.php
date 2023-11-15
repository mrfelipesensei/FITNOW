<?php
require_once __DIR__ ."/../src/dao/usuariodao.php";
include_once __DIR__ ."/../src/databases/conexao.php";


$dbh = Conexao::getConexao();

$id = isset($_GET["id"]) ? (int) $_GET["id"] :0;

$query = "SELECT * FROM fitnow.usuarios WHERE idUsuario = :id;";

$stmt = $dbh->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_BOTH);
$dbh = null;

if (!$usuario) {
    header('location: index.php?error=Usuário não encontrado!');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/style.css" rel="stylesheet"> <!--style.css-->
    <link rel="stylesheet" href="../assests/css/table.css"> <!--estilo tabela-->
    <link rel="stylesheet" href="assests/css/index_style.css">
    <link rel="stylesheet" href="../assests/css/cliente_user.css">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <title>Alterar Usuário</title>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="index.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div class="box_container" >
        <div  class="alterar" >
            <h1>Alterar Usuário</h1>
            <br>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="" value="<?= htmlspecialchars($usuario['nome']) ?>"><br>
                </div>
                <br>
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="" maxlength="15" value="<?= htmlspecialchars($usuario['cpf']) ?>"><br>
                </div>
                <br>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="" value="<?= htmlspecialchars($usuario['email']) ?>"><br>
                </div>
                <br>
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="" value="<?= htmlspecialchars($usuario['senha']) ?>"><br>
                </div>
                <br>
                <div>
                    <label for="perfil">Perfil:</label>
                    <!-- <input type="text" name="perfil" id="" placeholder="Informe o perfil" required> -->
                    <select name="perfil">
                        <option value="Admin">Admin</option>
                        <option value="Cliente" selected>Cliente</option>
                        <option value="Cliente+">Cliente+</option>
                        <option value="Parceiro">Parceiro</option>
                    </select>
                </div>
                <br><br>
                <p>
                    <button type="submit">Salvar</button>
                </p>
            </form>
        </div>
    </div>
</body>