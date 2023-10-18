<?php
    include_once '../src/conexao.php';

    $dbh = Conexao::getConexao();

    # cria a variavel $id com valor igual a 1. 
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    # cria o comando select filtrado pelo campo id e valor = $id
    $query = "SELECT * FROM escolabd.usuarios WHERE id = :id;";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_BOTH);
    $dbh = null;
    if (!$usuario) 
    {
        header('location: index.php?error=Usuário não encontrado!');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - Usuários</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <h1>CRUD - Básico</h1>
        <p>Exercício introdutório exemplificando o crud nas tabelas usuários e perfil. </p>
    </header>
    <nav>
        <a href="../index.php">Home</a>
        <a href="index.php">Usuários</a>
        <a href="../perfis/index.php">Perfil</a>
    </nav>
    <main>

        <h1>Novo Usuário</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?=$usuario['id']?>">
            <label>E-mail</label><br>
            <input 
                    type="email" 
                    name="email" 
                    placeholder="Informe seu e-mail." 
                    size="80" required autofocus
                    value="<?=$usuario['email']?>" ><br>
            <label>Nome</label><br>
            <input 
                type="text" 
                name="nome" 
                placeholder="Informe seu nome." 
                size="80" 
                required
                value="<?=$usuario['nome']?>"><br>
            <button class="btn" type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>