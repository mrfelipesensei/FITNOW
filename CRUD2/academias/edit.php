<?php
require_once __DIR__ . "/../src/dao/academiadao.php";
include_once __DIR__ . "/../src/databases/conexao.php";


$dbh = Conexao::getConexao();

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

$query = "SELECT * FROM fitnow.academias WHERE idAcademia = :id;";

$stmt = $dbh->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

$academia = $stmt->fetch(PDO::FETCH_BOTH);
$dbh = null;

if (!$academia) {
    header('location: index.php?error=Academia não encontrado!');
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
                <li><a href="nome.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->

<body>
    <div class="box_container" >
        <div  class="alterar" >
            <h1>Alterar Academia</h1>
            <br>
            <form action="update.php" method="post">
                <div>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="" value="<?= htmlspecialchars($academia['nome']) ?>"><br>
                    </div>
                    <br>
                    <div>
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" name="cnpj" id="" maxlength="15" value="<?= htmlspecialchars($academia['cnpj']) ?>"><br>
                    </div>
                    <br>
                    <div>
                        <label for="horarios">Horários:</label>
                        <input type="text" name="horarios" id="" value="<?= htmlspecialchars($academia['horarios']) ?>"><br>
                    </div>
                    <br>
                    <div>
                        <label for="modalidades">Modalidades:</label>
                        <input type="text" name="modalidades" id="" value="<?= htmlspecialchars($academia['modalidades']) ?>"><br>
                    </div>
                    <br>
                    <div>
                        <label for="valores">Valores:</label>
                        <input type="text" name="valores" id="" value="<?= htmlspecialchars($academia['valores']) ?>"><br>
                    </div>
                    <br>
                </div>
                <div>  
                    <div>
                        <label for="cep">CEP:</label>
                        <input type="number" name="cep" id="" value="<?= htmlspecialchars($academia['cep']) ?>">
                    </div>
                    <br>
                    <div>
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" id="" value="<?= htmlspecialchars($academia['bairro']) ?>">
                    </div>
                    <br>
                    <div>
                        <label for="complemento">Complemento:</label>
                        <input type="text" name="complemento" id="" value="<?= htmlspecialchars($academia['complemento']) ?>">
                    </div>
                    <br>
                    <div>
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" id="" value="<?= htmlspecialchars($academia['numero']) ?>">
                    </div>
                </div>
                <br>
                <p>
                    <button type="submit">Salvar</button>
                </p>
            </form>
        </div>
    </div>
</body>