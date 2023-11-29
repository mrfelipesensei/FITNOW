<?php
include("../login/protect.php");

$userId = $_SESSION['idUsuario'];
$userName = $_SESSION['nome'];

$userCPF = $_SESSION['cpf'];
$userEmail = $_SESSION['email'];


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
        h1{
            text-align: center;
            font-size: 30px;
            margin-top: 20px;
        }
        p{
            text-align: center;
            margin-top: 10px;
            font-size: 25px;
        }
        #qrcode {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
    </style>
    <title>QRCode</title>
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
    <h1>Agora é só mostrar seu QRCode!</h1>
    <div id="qrcode"></div>
    
    <p>Ótimo treino!</p>

    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
    <script>
        // Informações do usuário
        var nome = '<?php echo $userName; ?>';
        var cpf = '<?php echo $userCPF; ?>';
        var email = '<?php echo $userEmail; ?>';

        // Cria um objeto com as informações do usuário
        var usuario = {
            nome: nome,
            cpf: cpf,
            email: email
        };

        // Converte o objeto para uma string JSON
        var textoQR = JSON.stringify(usuario);

        // Cria um elemento canvas para o QR code
        var qrCanvas = document.createElement('canvas');
        qrCanvas.id = 'qrcodeCanvas';
        document.getElementById('qrcode').appendChild(qrCanvas);

        // Configuração e geração do QR code
        var qr = new QRious({
            element: qrCanvas,
            value: textoQR,
            size: 350
        });
    </script>
</body>
</html>