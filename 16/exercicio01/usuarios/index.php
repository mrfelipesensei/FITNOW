<?php
    require_once '../src/conexao.php';

    # solicita a conexão com o banco de dados e guarda na váriavel dbh.
    $dbh = Conexao::getConexao();

    # cria uma instrução SQL para selecionar todos os dados na tabela usuarios.
    $query = "SELECT * FROM escolabd.usuarios;"; 

    # prepara a execução da query e retorna para uma variável chamada stmt.
    $stmt = $dbh->query($query);

    # devolve a quantidade de linhas retornada pela consulta a tabela.
    $quantidadeRegistros = $stmt->rowCount();
    # busca todos os dados da tabela usuário.
    $usuarios = $stmt->fetchAll();
    $dbh = null;
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
        <h1>Usuários</h1>
        <section class="section__btn">
            <a class="btn" href="create.php">Novo</a>
        </section>

        <hr>

        <section>
            <table >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($quantidadeRegistros == "0"): ?>
                        <tr>
                            <td colspan="4">Não existem usuários cadastrados.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($usuarios as $usuario): ?>
                        <tr>
                            <?php $status =  $usuario['status'] =="1"? "ATIVO" : "INATIVO"; ?>
                            <td><?php echo $usuario['id'];?></td>
                            <td><?= $usuario['nome'];?></td>
                            <td><?= $usuario['email'];?></td>
                            <td><?= $status;?></td>
                            <td class="td__operacao">
                                <a class="btnalterar" href="edit.php?id=<?=$usuario['id'];?>">Alterar</a>
                                <a class="btnexcluir" href="delete.php?id=<?=$usuario['id'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>