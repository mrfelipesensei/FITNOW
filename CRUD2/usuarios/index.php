<?php
    require_once '../src/databases/conexao.php';
    require_once '../src/dao/usuariodao.php';

    $dao = new UsuarioDAO();
    $usuarios = $dao->getAll();
    $quantidadeRegistros = count($usuarios);

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
    <style>
        .box1 h1{
            text-align: center;
            margin-top: 15px;
            font-size: 25px;
        }
        .box1 p{
            margin-top: 10px;
            text-align: center;
        }
        .box1 button{
            background-color: rgb(158, 20, 20);
            color:#fff;
            font-size: 20px;
            padding: 10px 25px;
            border-radius: 5px;
            border: none;
        }
        .box1 button:hover{
            background-color: rgb(80, 217, 30);
            color:black;
            cursor: pointer;
            font-size: 22px;
            transition: 1s;
        }
        #aviso{
            margin-top: 10px;
            font-size: 25px;
            text-align: center;
        }
    </style>
    <title>Usuários</title>
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
    <div class="box1">
        <h1>Usuários</h1>
        <div>
            <p>
                <a href="create.php"><button>Novo Usuário</button></a>
            </p>
        </div>
    </div>
    <div id="aviso">
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
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
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
                            <td><?php echo $usuario['idUsuario'];?></td>
                            <td><?= $usuario['nome'];?></td>
                            <td><?= $usuario['cpf'];?></td>
                            <td><?= $usuario['email'];?></td>
                            <td><?= $usuario['perfil'];?></td>
                            <td class="td__operacao">
                                <a class="btns" href="edit.php?id=<?=$usuario['idUsuario'];?>">Alterar</a>
                                <a class="btns" href="delete.php?id=<?=$usuario['idUsuario'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; $dbh = null; ?>
            </tbody>
            </table>
            
        </section>
    </div>
</body>