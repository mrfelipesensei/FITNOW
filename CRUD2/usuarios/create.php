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
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <title>Criar Usuário</title>
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
    <h1>Novo Usuário</h1>
    <br>
    <form action="save.php" method="post">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Informe seu nome" maxlength="40" required><br>
        </div>
        <br>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" placeholder="000.000.000-00" maxlength="15" required><br>
        </div>
        <br>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="" placeholder="Informe seu e-mail" required><br>
        </div>
        <br>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="" placeholder="Informe sua senha" required><br>
        </div>
        <br>
        <div>
            <label for="perfil">Perfil:</label>
            <input type="text" name="perfil" id="" placeholder="Informe o perfil" required>
        </div>
        <br><br>
        <p>
            <button type="submit">Salvar</button>
        </p>
    </form>
</body>