<?php
session_start();
// Conectar ao banco de dados (substitua com suas credenciais)
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'fitnow';

$conn = new mysqli($host, $usuario, $senha, $banco);

include ("../login/protect.php");

$userId = $_SESSION['idUsuario'];


$idAcademia = $_GET['idAcademia'];
$valor = $_GET['valor'];

$query = "SELECT saldo FROM fitnow.carteira WHERE idUsuario = ?";

$stmt = $conn->prepare($query);

// Supondo que $userId contenha o ID do usuário logado
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($saldo);
$stmt->fetch();
$stmt->close();



if ($saldo !== null) {
    // Agora você tem o saldo do usuário e pode prosseguir com a lógica de débito
    if ($saldo >= $valor) {
        // Debita o valor do saldo do usuário
        $novoSaldo = $saldo - $valor;
        // Atualiza o novo saldo do usuário no banco de dados
        $queryUpdate = "UPDATE carteira SET saldo = ? WHERE idUsuario = ?";
        $stmtUpdate = $conn->prepare($queryUpdate);
        $stmtUpdate->bind_param("di", $novoSaldo, $userId);
        $stmtUpdate->execute();
        $stmtUpdate->close();

        // Redireciona para a página de sucesso ou outra página conforme necessário
        header("Location: qrcode.php");
        exit();
    } else {
        echo "Saldo insuficiente para realizar o treinamento.";
    }
} else {
    echo "Se saldo é nulo";
    echo "<br>";
    echo "Erro ao buscar o saldo do usuário.";
}

$conn->close();










?>