<?php
    require_once '../src/databases/conexao.php';
    require_once '../src/dao/academia_usuariodao.php';
    require_once '../src/dao/usuariodao.php';

    $dao = new AcademiaUsuarioDAO();
    $academias_user = $dao->getAll();
    $quantidadeRegistros = count($academias_user);

    $dao = new UsuarioDAO();
    $usuarios = $dao->getAll();
    $quantidadeRegistros1 = count($usuarios);

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/style.css" rel="stylesheet"> <!--style.css-->
    <link rel="stylesheet" href="../assests/css/table.css"> <!--estilo tabela-->
    <link rel="stylesheet" href="assests/css/index_style.css">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <title>Academias</title>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="../login/admin_painel.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <h1>Academias</h1>
    <div>
        <p>
            <a href="create.php">Nova Academia</a>
        </p>
    </div>
    <div>
    <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
            <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
                <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
            </div>
    <?php endif; ?>
    </div>
    <br>
    <div>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>idAcademia</th>
                        <th>idUsuario</th>
                        <th>Nome</th>
                        <!-- <th>Parceiro</th> -->
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($quantidadeRegistros == "0"): ?>
                    <tr>
                        <td colspan="7">Não existem usuários cadastrados.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($academias_user as $academia_user) : ?>
                            <tr>
                                <td><?php echo $academia_user['idAcademiaUsuario'];?></td>
                                <td><?= $academia_user['idAcademia'];?></td>
                                <td><?= $academia_user['idUsuario'];?></td>
                                <section>
                                    
    
                                        <?php foreach ($usuarios as $usuario) : ?>
                                                
                                                    <td><?= $usuario['nome'];?></td>
                                                
                                        <?php endforeach; ?>
                        
                                </section>
                              
                                <td class="td__operacao">
                                    <a class="btns" href="edit.php?id=<?=$academia['idAcademia'];?>">Alterar</a>
                                    <a class="btns" href="delete.php?id=<?=$academia['idAcademia'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; $dbh = null; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>