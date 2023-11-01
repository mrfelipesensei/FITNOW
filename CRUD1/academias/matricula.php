<?php
require_once '../src/dao/academiadao.php';
require_once '../src/dao/usuariodao.php';

$id = $_GET['id'] ?? 0;
$dao = new AcademiaDAO();
$academia = $dao->getById($id);
if (!$academia) {
    header('location: index.php?error=Academia não encontrada!');
    exit;
}
$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->getAll();
// var_dump($usuarios);


?>

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="../assests/css/tabela.css">
    <title>Academias</title>
</head>
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="logofit" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar" title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="../perfis/index.php">Perfil</a></li>
                <li><a href="index.php">Academias</a></li>
                <li><a href="../auth/index.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>
    <h1>Nova Matricula</h1>
    <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
        <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
            <p>
                <?= $_GET['msg'] ?? $_GET['error'] ?>
            </p>
        </div>
    <?php endif; ?>
    <br>
    <h2><b>Academia: </b><?= htmlspecialchars($academia['nome']) ?></h2>

    <form action="">
        <input type="hidden" name="idAcademia" value="<?= $academia['idAcademia'] ?? 0 ?>">

        <select name="idUsuario">
            <option value="0">Escolha um aluno</option>
            <?php foreach ($usuarios as $usuario) : ?>
                <option value="<?= $usuario['idUsuario'] ?>"><?= $usuario['nome'] ?></option>
            <?php endforeach ?>

        </select>

    </form>

</body>

</html>