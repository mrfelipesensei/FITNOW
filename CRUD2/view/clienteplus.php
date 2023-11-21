<?php
include("../login/protect.php");

$userId = $_SESSION['idUsuario'];
// var_dump($userId);

$userPerfil = $_SESSION['perfil'];
// var_dump($userPerfil);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['assinar'])) {
    // Verifica se o botão de assinar foi pressionado

    // Atualiza o perfil para Cliente Plus
    $_SESSION['perfil'] = 'Cliente+';
    
    // Redireciona para esta mesma página ou outra página
    echo "ASSINOU!";
    // header("Location: esta_mesma_pagina.php"); // Altere para a página desejada
    exit();
}

$userPerfil = $_SESSION['perfil'];
var_dump($userPerfil);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assinatura Plus</title>
</head>
<body>
    <h1>Faça sua assinatura Cliente Plus</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <button type="submit" name="assinar">Assinar</button>
    </form>
</body>
</html>