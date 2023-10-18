<?php
include_once '../src/dao/perfildao.php';

# cria a variavel $id com valor igual a 1. 
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;

# cria um objeto da classe PerfilDAO e chama método para realizar ação.
$dao = new PerfilDAO();
$perfil = $dao->getById($id);

if (!$perfil) {
    header('location: index.php?error=Perfil não encontrado!');
    exit;
}
?>
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
        <a href="../usuario/index.php">Usuários</a>
        <a href="index.php">Perfil</a>
    </nav>
    <main>

        <h1>Atualizar Perfil</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $perfil['id'] ?>">
            <label>Nome</label><br>
            <input type="text" name="nome" placeholder="Informe seu nome." size="80" required value="<?= $perfil['nome'] ?>" autofocus><br>
            <button class="btn" type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>