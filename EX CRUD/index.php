<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício - Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <h1>CRUD - Básico</h1>
        <p>Exercício introdutório exemplificando o crud nas tabelas usuários e perfil. </p>
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="usuarios/index.php">Usuários</a>
        <a href="perfis/index.php">Perfil</a>
        <?php session_start();
        if (isset($_SESSION['usuario'])) : ?>
            <a href="auth/logout.php">Log out</a>
        <?php endif; ?>
    </nav>


</body>

</html>