<?php
require_once __DIR__ . "/../src/dao/perfildao.php";

$perfilDAO = new PerfilDAO();
$perfis = $perfilDAO->getAll();

require __DIR__ . "/../app/login.php";
use App\Session\Login;

//Obriga o usuário a estar logado
Login::requireLogin();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <style>
        main h1 {
            margin-top: 5px;
            text-align: center;
            font-size: 25px;
        }

        .form_center {
            display: flex;
            justify-content: center;
        }

        form label {
            margin-right: 5px;
        }

        form input {
            width: 30%;
        }

        .btn {
            background-color: grey;
            color: black;
            border-radius: 5px;
            border: none;
            padding: 10px 20px;
            position: absolute;
            right: 45%;
        }

        .btn:hover {
            background-color: green;
            color: white;
            transition: 1s;
        }
    </style>
    <title>Criar Usuário</title>
</head>
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="logofit" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="../perfis/index.php">Perfil</a></li>
                <li><a href="index.php">Usuários</a></li>
            </ul>
        </nav>
    </div>
</header>
<br>

<body>
    <h1>Novo Usuário</h1>
    <br>
    <form action="save.php" method="post">
        <div class="form_center">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" placeholder="Informe seu nome." size="80" required><br>
        </div>
        <br>
        <div class="form_center">
            <label for="cpf">CPF:</label><br>
            <input type="text" name="cpf" id="" placeholder="Informe seu CPF." maxlength="15" required><br>
        </div>
        <br>
        <div class="form_center">
            <label for="email">E-mail:</label><br>
            <input type="email" name="email" placeholder="Informe seu e-mail." size="80" required autofocus><br>
        </div>
        <br>
        <div class="form_center">
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="" placeholder="Informe sua senha." required><br>
        </div>
        <br>
        <div class="form_center">
            <label for="telefone">Telefone:</label><br>
            <input type="number" name="telefone" id="" placeholder="Informe seu telefone." maxlength="11" required><br>
        </div>
        <br>
        <div class="form_center">
            <label for="perfil">Perfil:</label><br>
            <select name="perfil" id="">
                <?php foreach ($perfis as $perfil): ?>
                    <option value="<?= $perfil['idPerfil'] ?>">
                        <?= $perfil['nome'] ?>
                    </option>
                <?php endforeach ?>
            </select><br>
        </div>
        <br><br><br>
        <button class="btn" type="submit">Salvar</button>
    </form>
    <br><br><br>
    <a href="index.php"><button class="btn">Voltar</button></a>
</body>

</html>


<!--FALTA COLOCAR OS CAMPOS SEGUNDO O BANCO DE DADOS: nome, cpf, ..., perfil -->