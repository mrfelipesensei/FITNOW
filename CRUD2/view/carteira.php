<?php
session_start();
// Conectar ao banco de dados (substitua com suas credenciais)
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'fitnow';

$conn = new mysqli($host, $usuario, $senha, $banco);

include("../login/protect.php");

$userId = $_SESSION['idUsuario'];
$userName = $_SESSION['nome'];

//Verfica saldo do usuário
$queryCheck = "SELECT saldo FROM fitnow.carteira WHERE idUsuario = ?";
$stmtCheck = $conn->prepare($queryCheck);
$stmtCheck->bind_param("i", $userId);
$stmtCheck->execute();
$stmtCheck->bind_result($saldoAtual);
$stmtCheck->fetch();
$stmtCheck->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deposito = $_POST['deposito'];

    if ($deposito > 0) {
        // Verifica se o usuário já tem um saldo
        $queryCheck = "SELECT saldo FROM fitnow.carteira WHERE idUsuario = ?";
        $stmtCheck = $conn->prepare($queryCheck);
        $stmtCheck->bind_param("i", $userId);
        $stmtCheck->execute();
        $stmtCheck->bind_result($saldoAtual);
        $stmtCheck->fetch();
        $stmtCheck->close();

        if ($saldoAtual !== null) {
            // Se o usuário já tiver um saldo, atualize o saldo existente
            $novoSaldo = $saldoAtual + $deposito;
            $queryUpdate = "UPDATE carteira SET saldo = ? WHERE idUsuario = ?";
            $stmtUpdate = $conn->prepare($queryUpdate);
            $stmtUpdate->bind_param("di", $novoSaldo, $userId);
            $stmtUpdate->execute();
            $stmtUpdate->close();
        } else {
            // Se o usuário não tiver um saldo, insira o saldo depositado como saldo inicial
            $queryInsert = "INSERT INTO carteira (idUsuario, nome, saldo) VALUES (?, ?, ?)";
            $stmtInsert = $conn->prepare($queryInsert);
            $stmtInsert->bind_param("isd", $userId, $userName, $deposito);
            $stmtInsert->execute();
            $stmtInsert->close();
        }

        // Redireciona para a página de sucesso ou outra página conforme necessário
        header("Location: carteira.php");
        exit();
    } else {
        echo "O valor do depósito precisa ser maior que zero.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/style.css" rel="stylesheet"> <!--style.css-->
    <title>Assinatura Plus</title>
    <style>
        h1{
            text-align: center;
            font-size: 20px;
            margin-top: 15px;
        }
        #mercado{
            margin-top: 15px;
            text-align: center;
            margin-bottom: 50px;
        }
        #mercado img{
            width: 300px;
        }
        #mercado img:hover{
            transition: 0.5s all;
            width: 350px;
        }
        #saldo{
            margin-top: 20px;
            text-align: center;
            font-size: 30px;
        }
        #focus{
            font-size: larger;
        }
        .box{
            display: flex;
            justify-content: center;
        }
        #meuFormulario{
            margin-top: 20px;
            font-size: 22px;
        }
        #mostrarFormulario, #btn{
            background-color: rgb(158, 20, 20);
            color:#fff;
            font-size: 20px;
            padding: 10px 25px;
            border-radius: 5px;
            border: none;
        }
        #mostrarFormulario:hover, #btn:hover{
            background-color: rgb(80, 217, 30);
            color:black;
            cursor: pointer;
            font-size: 22px;
            transition: 1s;
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
                <li><a href="../login/painelplus.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div id="saldo">
        <p>Seu Saldo Atual é: <span id="focus" style="color: <?= $saldoAtual !== null ? ($saldoAtual > 0 ? 'green' : 'red') : 'red'; ?>">
            $<?= $saldoAtual !== null ? $saldoAtual : '0'; ?>
        </span></p>
    </div>
    <h1>Entre com sua Conta Mercado Pago</h1>
    <div id="mercado">
        <a href="https://www.mercadolivre.com/jms/mlb/lgz/msl/login/H4sIAAAAAAAEA5WRTU7DMBCF75IFK9IKFVpRKUJJQZWAlJ8KxG7k2mPHrR0H26kbUO-OXbgAy_fNvHnj8XemjJAt-KHDbJ7hoVOSSp-dZ50inhurQbJY0F1ETnr8k2qTWoglGj1al82_0yCBrMJoSqO87TH2kN43wJUJEZ2iIpMO8BBtLVEQcLOXmKqcKJccwkTReN-5-XgcQhhptJQw0xFhRtTo0caOOdoU3Xri8rRFvseWoR0r2e5yhpGJU9ncnGniPXhjVDG7ur6czq4mZ73X4ExvKRZLY4TCE9HIZK8Lh8TS5kQo0R2Roi3qxwrqZ1ijUvGxUD7BByyjTJ2wWkNlScsie4zxv4HBWPY_m6BKsmKxDQ-LUpZbPnxWTenuZCjzN_Z1_6zyy1XjJxXvZ6uLh-Uw2S-h5qKeDhdT3ldDTda71xrL9-37F9AZP7BFYxaHt_ql3N9CFe6y43m8sYvHsITusnn6oOMPO5OZ_gACAAA/user">
            <img src="../img/mercado-pago-logo.png" alt="">
        </a>
    </div>
    <div class="box">
        <button id="mostrarFormulario">Depositar Valor</button>
    </div>
    <div class="box">
        <div id="meuFormulario" style="display: none;">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Valor do depósito: <input type="number" name="deposito" required>
                <input id="btn" type="submit" value="Depositar">
            </form>
        </div>
    </div>


</body>
</html>
<script>
    document.getElementById('mostrarFormulario').addEventListener('click', function() {
    var formularioParaMostrar = document.getElementById('meuFormulario');
    formularioParaMostrar.style.display = 'block';
    });

</script>