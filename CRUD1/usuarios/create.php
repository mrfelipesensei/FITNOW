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
<body>
    <h1>Novo Usuário</h1>
    <form action="save.php" method="post">
        <label for="email">E-mail:</label><br>
        <input type="email" name="email" placeholder="Informe seu e-mail." size="80" required autofocus><br>
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" placeholder="Informe seu nome." size="80" required><br>
        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" id="" placeholder="Informe sua senha." required><br>
        <label for="perfil">Perfil</label><br>
        <select name="perfil" id="">
            <option value="1">Administrador</option>
            <option value="2">Cliente Comum</option>
            <option value="3">Cliente Plus</option>
            <option value="4">Parceiro</option>
        </select><br>
        <button class="btn" type="submit">Salvar</button>
    </form>
</body>
</html>
