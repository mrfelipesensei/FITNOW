<?php
    require_once '../src/databases/conexao.php';
    require_once '../src/dao/usuariodao.php';
    /*
    # solicita a conexão com o banco de dados e guarda na váriavel dbh.
    $dbh = Conexao::getConexao();

    # cria uma instrução SQL para selecionar todos os dados na tabela usuarios.
    $query = "SELECT * FROM fitnowbd.usuarios;"; 

    # prepara a execução da query e retorna para uma variável chamada stmt.
    $stmt = $dbh->query($query);

    # devolve a quantidade de linhas retornada pela consulta a tabela.
    $quantidadeRegistros = $stmt->rowCount();
    $perfis = $stmt->fetchAll();
    $dbh = null;*/

    $dao = new UsuarioDAO();
    $usuarios = $dao->getAll();
    $quantidadeRegistros = count($usuarios);
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
    <!-- <link rel="stylesheet" href="../assests/css/index_perfil.css"> -->
    <link rel="stylesheet" href="../assests/css/index_usuario.css">
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
                    <li><a href="index.php">Usuários</a></li>
                    <li><a href="../auth/index.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <h1>Usuários</h1>
        <section class="section__btn">
            <a class="btn" href="create.php">Novo Usuário</a>
        </section>
        <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
            <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
                <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
            </div>
        <?php endif; ?>
        <br>
        <div class="outcontainer" >
            <section class="container">
            <table class="center-table" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Senha</th>
                        <th>Telefone</th>
                        <th>Perfil</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($quantidadeRegistros == "0"): ?>
                        <tr>
                            <td colspan="7">Não existem usuários cadastrados.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?php echo $usuario['idUsuarios'];?></td>
                            <td><?= $usuario['nome'];?></td>
                            <td><?= $usuario['cpf'];?></td>
                            <td><?= $usuario['email'];?></td>
                            <td><?= $usuario['senha'];?></td>
                            <td><?= $usuario['telefone'];?></td>
                            <td><?= $usuario['perfil_id'];?></td>
                            <td class="td__operacao">
                                <a class="btns" href="edit.php?id=<?=$usuario['idUsuarios'];?>">Alterar</a>
                                <a class="btns" href="delete.php?id=<?=$usuario['idUsuarios'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
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