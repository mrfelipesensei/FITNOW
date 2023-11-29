<?php
include ("../login/protect.php");

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

        // Registrando a data, hora e userId
        $dataHoraClique = date('Y-m-d H:i:s'); // Obtém a data e hora atuais no formato MySQL

        // Query para inserir os dados na tabela de registro de cliques
        $sqlRegistro = "INSERT INTO fitnow.assinatura (idUsuario, data_hora_clique) VALUES ('$userId', '$dataHoraClique')";

        if ($conn->query($sqlRegistro) === TRUE) {
            echo "Registro de clique inserido com sucesso.";
        } else {
            echo "Erro ao inserir registro de clique: " . $conn->error;
        }
        
    } else {
        echo "Erro ao atualizar perfil: " . $conn->error;
    }

    $conn->close();
    
    // Redireciona para esta mesma página ou outra página
    header('location: ../login/painelplus.php?msg=Assinatura realizada com sucesso!'); 
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
            margin-top: 20px;
            font-size: 25px;
        }
        .box1{
            display: flex;
            justify-content: center;
        }
        #formContainer button{
            background-color: rgb(158, 20, 20);
            color:#fff;
            font-size: 20px;
            padding: 10px 25px;
            margin-left: 5px;
            border-radius: 5px;
            border: none;
            text-align: center;
        }
        #formContainer button:hover{
            background-color: rgb(80, 217, 30);
            color:black;
            cursor: pointer;
            transition: 1s;
        }
        .box_{
            margin-top: 20px;
            text-align: center;
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
                <li><a href="../login/painel.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <h1>Faça sua assinatura Cliente Plus</h1>
    <div class="box_">
        <h2>Entre com sua Conta Mercado Pago</h2>
        <br>
        <div id="mercado">
            <a href="https://www.mercadolivre.com/jms/mlb/lgz/msl/login/H4sIAAAAAAAEA5WRTU7DMBCF75IFK9IKFVpRKUJJQZWAlJ8KxG7k2mPHrR0H26kbUO-OXbgAy_fNvHnj8XemjJAt-KHDbJ7hoVOSSp-dZ50inhurQbJY0F1ETnr8k2qTWoglGj1al82_0yCBrMJoSqO87TH2kN43wJUJEZ2iIpMO8BBtLVEQcLOXmKqcKJccwkTReN-5-XgcQhhptJQw0xFhRtTo0caOOdoU3Xri8rRFvseWoR0r2e5yhpGJU9ncnGniPXhjVDG7ur6czq4mZ73X4ExvKRZLY4TCE9HIZK8Lh8TS5kQo0R2Roi3qxwrqZ1ijUvGxUD7BByyjTJ2wWkNlScsie4zxv4HBWPY_m6BKsmKxDQ-LUpZbPnxWTenuZCjzN_Z1_6zyy1XjJxXvZ6uLh-Uw2S-h5qKeDhdT3ldDTda71xrL9-37F9AZP7BFYxaHt_ql3N9CFe6y43m8sYvHsITusnn6oOMPO5OZ_gACAAA/user">
                <img src="../img/mercado-pago-logo.png" alt="">
            </a>
        </div>
    </div>
    <div class="box1">
        <div class="box2">
            <div>
                <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848bebed70018bfe9a58b30da3" name="MP-payButton" class='blue-ar-l-rn-none'>Assinar Plus</a>
            </div>
            <br>
            <div id="formContainer">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <button type="submit" name="assinar">Assinar Plus</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
   (function() {
      function $MPC_load() {
         window.$MPC_loaded !== true && (function() {
         var s = document.createElement("script");
         s.type = "text/javascript";
         s.async = true;
         s.src = document.location.protocol + "//secure.mlstatic.com/mptools/render.js";
         var x = document.getElementsByTagName('script')[0];
         x.parentNode.insertBefore(s, x);
         window.$MPC_loaded = true;
      })();
   }
   window.$MPC_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;
   })();
  /*
        // to receive event with message when closing modal from congrants back to site
        function $MPC_message(event) {
          // onclose modal ->CALLBACK FUNCTION
         // !!!!!!!!FUNCTION_CALLBACK HERE Received message: {event.data} preapproval_id !!!!!!!!
        }
        window.$MPC_loaded !== true ? (window.addEventListener("message", $MPC_message)) : null; 
        */
</script>