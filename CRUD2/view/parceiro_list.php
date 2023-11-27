<?php
include("../login/protect.php");

$userId = $_SESSION['idUsuario'];
// var_dump($userId);

    require_once '../src/databases/conexao.php';
    require_once '../src/dao/academiadao.php';

    $dao = new AcademiaDAO();
    $academiasUsuario = $dao->getAcademiaByIdUser($userId);
    $quantidadeRegistros = count($academiasUsuario);

    // var_dump( $academiasUsuario);
    
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
    <link rel="stylesheet" href="../assests/css/parceiro_list.css">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <title>Academias</title>
    <style>
        #aviso{
            margin-top: 20px;
            font-size: 35px;
            color: green;
            font-weight: bolder;
            text-align: center;
        }
    </style>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="../login/painel_parceiro.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <h1>Minhas Academias</h1>
    <div>
        <p>
            <a href="parceiro_academia.php"><button class="newbtn">Nova Academia</button></a>
        </p>
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
                        <th>CNPJ</th>
                        <th>Horários</th>
                        <th>Modalidades</th>
                        <th>Valores</th>
                        <th>CEP</th>
                        <th>Bairro</th>
                        <th>Complemento</th>
                        <th>Número</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!isset($academiasUsuario)): ?>
                    <tr>
                        <td colspan="7">Não existem academias cadastradas.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($academiasUsuario as $academia) : ?>
                            <tr>
                                <td><?php echo $academia['idAcademia'];?></td>
                                <td><?= $academia['nomeAcademia'];?></td>
                                <td><?= $academia['cnpj'];?></td>
                                <td><?= $academia['horarios'];?></td>
                                <td><?= $academia['modalidades'];?></td>
                                <td><?= $academia['valores'];?></td>
                                <td><?= $academia['cep'];?></td>
                                <td><?= $academia['bairro'];?></td>
                                <td><?= $academia['complemento'];?></td>
                                <td><?= $academia['numero'];?></td>
                                <td class="td__operacao">
                                    <a class="btns" href="parceiro_edit.php?idAcademia=<?=$academia['idAcademia'];?>">Alterar</a>
                                    <!-- <a class="btns" href="delete.php?id=<?=$academia['idAcademia'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a> -->
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; $dbh = null; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>