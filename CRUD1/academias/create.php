<?php
require_once __DIR__ ."/../src/dao/academiadao.php";

$academiaDAO = new AcademiaDAO();
$academias = $academiaDAO->getAll();

require __DIR__ . "/../app/login.php";
use App\Session\Login;

//Obriga o usuário a estar logado
Login::requireLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/fonticon.css" rel="stylesheet"> <!--fonticon.css-->
    <link rel="stylesheet" href="../assests/css/modal.css"> <!--modal.css-->
    <link rel="stylesheet" href="../assests/css/login.css"> <!--login.css-->
    <link rel="stylesheet" href="../assests/css/styles.css">
    <link rel="stylesheet" href="../assests/css/index_perfil.css">
    <title>Nova Academia</title>
</head>
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="logofit" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="../academias/index.php">Academias</a></li>
                <li><a href="index.php">Usuários</a></li>
            </ul>
        </nav>
    </div>
</header>
<br>
<body>
    <h1>Nova Academia</h1>
    <br>
    <form action="save.php" method="post">
        <div class="form_center">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Informe o nome da academia" size="40" required><br>
        </div>
        <br>
        <div>
            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" placeholder="00.000.000/0001-00" maxlength="18" required><br>
        </div>
        <br>
        <div>
            <label for="horarios">Horários:</label>
            <input type="text" name="horarios" id="" placeholder="Ex:7h às 22h" maxlength="9" required><br>
        </div>
        <br>
        <div>
            <label for="modalidades">Modalidades:</label>
            <input type="text" name="modalidades" id="" placeholder="Ex:Musculação/Pilates/Funcional" maxlength="80" required><br>
        </div>
        <br>
        <div>
            <label for="valores">Valores:</label>
            <input type="text" name="valores" id="" placeholder="Valor Diária Ex: $25" maxlength="6" required><br>
        </div>
        <br>
        <!-- <div>
            <label for="fotos">Fotos:</label>
            <input type="file" name="" id=""><br>
        </div>
        <br><br> -->
        <button class="btn" type="submit">Salvar</button>
    </form>
    <br>
    <a href="index.php"><button class="btn">Voltar</button></a>
    <br>
</body>
</html>