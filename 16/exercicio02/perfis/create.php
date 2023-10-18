<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - Perfil</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <h1>CRUD - Básico</h1>
        <p>Exercício introdutório exemplificando o crud nas tabelas usuários e perfil. </p>
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="../usuarios/index.php">Usuários</a>
        <a href="index.php">Perfil</a>
    </nav>
    <main>

        <h1>Novo Perfil</h1>
        <form action="save.php" method="post">
            <label>Nome</label><br>
            <input type="text" name="nome" placeholder="Informe seu nome." size="80" required autofocus><br>

            <button class="btn" type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>