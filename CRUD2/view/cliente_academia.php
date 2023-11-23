<?php
    require_once '../src/databases/conexao.php';
    require_once '../src/dao/academiadao.php';

    $dao = new AcademiaDAO();
    $academias = $dao->getAll();
    $quantidadeRegistros = count($academias);

    //Pegando o perfil do usuário
    include("../login/protect.php");
    $userPerfil = $_SESSION['perfil'];
    // var_dump($userPerfil);

    //botão Voltar Cliente Plus
    function getLinkVoltar() {
        if(isset($_SESSION['perfil'])) {
            $perfil = $_SESSION['perfil'];
            switch($perfil) {
                case 'Cliente':
                    return '../login/painel.php'; // Redirecionar para a página 1
                case 'Cliente+':
                    return '../login/painelplus.php'; // Redirecionar para a página 2
                // Adicione mais casos conforme necessário para outros perfis
                default:
                    return '../pagina_padrao.php'; // Redirecionar para uma página padrão se o perfil não for reconhecido
            }
        } else {
            return '../pagina_padrao.php'; // Redirecionar para uma página padrão se o perfil não estiver definido
        }
    }
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
        .box2{
            display: flex;
            justify-content: center;
            margin-right: 12px;
        }
        .box2 a{
            margin-left: 5px;
        }

    </style>
    <title>Academias</title>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="#" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="<?php echo getLinkVoltar(); ?>">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div class="box1">
        <h1>Academias</h1>
        <div>
            <p>
                <a href="#" id="especificarBusca"><button>Filtrar Busca</button></a>
            </p>
            <div id="outrosBotoes" style="display: none;">
                <div class="box2">
                    <p>
                        <a href="bairro.php"><button>Bairro</button></a>
                    </p>
                    <p>
                        <a href="modalidade.php"><button>Modalidades</button></a>
                    </p>
                    <p>
                        <a href="valores.php"><button>Valor</button></a>
                    </p>

                </div>
            </div>
        </div>
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
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Horários</th>
                        <th>Bairro</th>
                        <th>Modalidades</th>
                        <th>Valores</th>
                        <!-- <th>Parceiro</th> -->
                        <!-- <th>Ação</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php if ($quantidadeRegistros == "0"): ?>
                    <tr>
                        <td colspan="7">Não existem usuários cadastrados.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($academias as $academia) : ?>
                            <tr>
                                <td><?php echo $academia['idAcademia'];?></td>
                                <td><?= $academia['nome'];?></td>
                                <td><?= $academia['cnpj'];?></td>
                                <td><?= $academia['horarios'];?></td>
                                <td><?= $academia['bairro'];?></td>
                                <td><?= $academia['modalidades'];?></td>
                                <td><?= $academia['valores'];?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; $dbh = null; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
<script>
    document.getElementById('especificarBusca').addEventListener('click', function() {
        var outrosBotoes = document.getElementById('outrosBotoes');
        if (outrosBotoes.style.display === 'none') {
            outrosBotoes.style.display = 'block';
        } else {
            outrosBotoes.style.display = 'none';
        }
    });
</script>