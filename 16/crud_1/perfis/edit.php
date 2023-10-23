<?php
    include_once '../src/conexao.php';

    $dbh = Conexao::getConexao();

    # cria a variavel $id com valor igual a 1. 
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    # cria o comando select filtrado pelo campo id e valor = $id
    $query = "SELECT * FROM fitnowbd.perfis WHERE idPerfil = :id;";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $perfil = $stmt->fetch(PDO::FETCH_BOTH);
    $dbh = null;
    if (!$perfil) 
    {
        header('location: index.php?error=Perfil não encontrado!');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Perfil</title>
</head>
<body>
    <nav>
        <a href="#">Home</a>
        <a href="index.php">Perfil</a>
        <a href="#">Usuários</a>
    </nav>
    <main>
        <h1>Atualizar Perfil</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?=$perfil['idPerfil']?>">
            <label>Nome</label><br>
            <input 
                type="text" 
                name="nome" 
                placeholder="Informe seu nome." 
                size="80" 
                required
                value="<?=$perfil['nome']?>"
                autofocus><br>
            <button class="btn" type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>