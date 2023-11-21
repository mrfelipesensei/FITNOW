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

    // Atualiza o perfil no banco de dados
    $userId = $_SESSION['idUsuario'];
    $novoPerfil = $_SESSION['perfil'];

    // Conexão com o banco de dados (substitua com suas credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fitnow";

    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Query para atualizar o perfil na tabela de usuários
    $sql = "UPDATE usuarios SET perfil = '$novoPerfil' WHERE idUsuario = '$userId'";

    if ($conn->query($sql) === TRUE) {
        echo "Perfil atualizado no banco de dados com sucesso.";
    } else {
        echo "Erro ao atualizar perfil: " . $conn->error;
    }

    $conn->close();
    
    // Redireciona para esta mesma página ou outra página
    echo "ASSINOU!";
    // header("Location: esta_mesma_pagina.php"); // Altere para a página desejada
    exit();
}

$userPerfil = $_SESSION['perfil'];
// var_dump($userPerfil);
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