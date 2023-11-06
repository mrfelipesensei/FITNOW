<?php
include("protect.php");

$userId = $_SESSION['idUsuario'];
// var_dump($userId);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
            <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
                <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
            </div>
    <?php endif; ?>
    <p>Bem vindo ao Painel, <?php echo $_SESSION["nome"]; ?>.</p>
    <p>
        <a href="../view/parceiro_academia.php">Cadastrar Academia</a>
    </p>
    <p>
        <a href="#">Alterar Academia</a>
    </p>
    <p>
        <a href="#">Alterar meus Dados</a>
    </p>
    <p>
        <a href="logout.php">Sair</a>
    </p>

</body>
</html>