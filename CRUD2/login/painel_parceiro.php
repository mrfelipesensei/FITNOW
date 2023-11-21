<?php
include("protect.php");

$userId = $_SESSION['idUsuario'];
// var_dump($userId);

const UPLOAD_DIR = "../img/usuarios/";
$foto_perfil = $_SESSION['usuario']['foto_perfil'];
$caminho_foto = UPLOAD_DIR . $foto_perfil;


//se não houver foto cadastrada então redireciona para uma foto
if (!file_exists($caminho_foto) || empty($foto_perfil)) {
    $caminho_foto = "../img/usuarios/user.png"; // Caminho para a foto padrão
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
    <link rel="stylesheet" href="assests/css/index_style.css">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <link rel="stylesheet" href="../assests/css/login_style.css">
    <link rel="stylesheet" href="../assests/css/admin.css">
    <script src="index.js" defer></script>
    <link rel="stylesheet" href="../assests/css/parceiro.css">
    <link rel="stylesheet" href="../assests/css/foto_perfil.css"> <!--foto perfil-->
    <title>Parceiro</title>
    <style>
        .item:hover{
            padding: 22px;
            border: 10px solid green;
            transition: 0.5s all;
        }
    </style>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="#" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div id="container_foto">
        <div id="foto">
            <img src="<?=$caminho_foto ?>" alt="imagem do Usuário" id="perfil_img">
        </div>
    </div>
    <div>
        <p id="bemvindo">
            Bem vindo ao Painel, <?php echo $_SESSION["nome"]; ?>.
        </p>
    </div>
    <div class="msg">
        <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
                <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
                    <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
                </div>
        <?php endif; ?>
    </div>
    <div class="box">
        <div class="item">
            <p>
                <a href="../view/parceiro_academia.php">
                    <img src="../img/gym.png" alt="">
                    <p class="text">Cadastrar Academia</p>
                </a>
            </p>
        </div>
        <div class="item">
            <p>
                <a href="../view/parceiro_list.php">
                    <img src="../img/minhagym.png" alt="">
                    <p class="text">Minhas Academias</p>
                </a>
            </p>
        </div>
        <div class="item" >
            <p>
                <a href="../view/parceiro_usuario.php">
                    <img src="../img/account.png" alt="">
                    <p class="text">Alterar meus Dados</p>
                </a>
            </p>
        </div>
    </div>
    <!-- <p>
        <a href="../view/parceiro_list.php">Minhas Academias</a>
    </p> -->
    <!-- <p>
        <a href="logout.php">Sair</a>
    </p> -->
</body>
</html>