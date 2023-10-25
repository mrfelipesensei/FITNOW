<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNOW - Users</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/fonticon.css" rel="stylesheet"> <!--fonticon.css-->
    <link rel="stylesheet" href="../assests/css/modal.css"> <!--modal.css-->
    <link rel="stylesheet" href="../assests/css/login.css"> <!--login.css-->
    <link rel="stylesheet" href="../assests/css/styles.css">
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
                    <li><a href="../usuarios/index.php">Usuários</a></li>
                    <li><a href="../auth/index.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <br>
<body>
    <main>
        <h1>Login</h1>
        <br>
        <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
        <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
            <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
        </div>
    <?php endif; ?>
    <form action="login.php" method="post" >
            <div>
                <label for="email">E-mail:</label><br>
                <input type="email" name="email" id="" placeholder="Informe seu email." size="80" required autofocus>
                <br><br>
                <label for="senha">Senha:</label><br>
                <input type="password" name="senha" id="" placeholder="Informe sua senha." required>
                <br><br>
                <button class="btn" type="submit">Entrar</button>
            </div>
    </form>
    </main>
</body>