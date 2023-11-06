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
    Bem vindo ao Painel, <?php echo $_SESSION["nome"]; ?>.
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