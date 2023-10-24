<?php
    require_once '../src/conexao.php';

    # solicita a conexão com o banco de dados e guarda na váriavel dbh.
    $dbh = Conexao::getConexao();

    # cria uma instrução SQL para selecionar todos os dados na tabela usuarios.
    $query = "SELECT * FROM fitnowbd.perfis;"; 

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/fonticon.css" rel="stylesheet"> <!--fonticon.css-->
    <link rel="stylesheet" href="../assests/css/modal.css"> <!--modal.css-->
    <link rel="stylesheet" href="../assests/css/login.css"> <!--login.css-->
    <link rel="stylesheet" href="../assests/css/styles.css">
    <link rel="stylesheet" href="../assests/css/index_perfil.css">
    <title>Perfil</title>
</head>
<body>
    <header class="main_header">
        <div class="main_header_content">
            <a href="home.html" class="logo">
                <img id="logofit" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                    title="FITNOW - A qualquer hora e qualquer lugar"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="../perfis/index.php">Perfil</a></li>
                    <li><a href="#">Usuários</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <h1>Perfil</h1>
        <section class="section__btn">
            <a class="btn" href="create.php">Novo Perfil</a>
        </section>
        <br><br><br>
        <hr>
        <div class="outcontainer" >
            <section class="container">
            <table>
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
                            <td><?php echo $perfil['idPerfil'];?></td>
                            <td><?= $perfil['nome'];?></td>
                            <td class="td__operacao">
                                <a class="btns" href="edit.php?id=<?=$perfil['idPerfil'];?>">Alterar</a>
                                <a class="btns" href="delete.php?id=<?=$perfil['idPerfil'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; $dbh = null; ?>
                </tbody>
            </table>
            </section>
        </div>
    </main>
</body>
</html>