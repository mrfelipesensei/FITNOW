<?php
    require_once '../src/conexao.php';

    # solicita a conexão com o banco de dados e guarda na váriavel dbh.
    $dbh = Conexao::getConexao();

    # cria uma instrução SQL para selecionar todos os dados na tabela usuarios.
    $query = "SELECT * FROM escolabd.perfis;"; 

    # prepara a execução da query e retorna para uma variável chamada stmt.
    $stmt = $dbh->query($query);

    # devolve a quantidade de linhas retornada pela consulta a tabela.
    $quantidadeRegistros = $stmt->rowCount();
    $perfis = $stmt->fetchAll();
    $dbh = null;
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
        <a href="../index.php">Home</a>
        <a href="../usuarios/index.php">Usuários</a>
        <a href="index.php">Perfil</a>
    </nav>

    <main>
        <h1>Perfil</h1>
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
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($quantidadeRegistros == "0"): ?>
                        <tr>
                            <td colspan="3">Não existem dados cadastrados.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($perfis as $perfil) : ?>
                        <tr>
                            <td><?php echo $perfil['id'];?></td>
                            <td><?= $perfil['nome'];?></td>
                            <td class="td__operacao">
                                <a class="btnalterar" href="edit.php?id=<?=$perfil['id'];?>">Alterar</a>
                                <a class="btnexcluir" href="delete.php?id=<?=$perfil['id'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; $dbh = null; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>