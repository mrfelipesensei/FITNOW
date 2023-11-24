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
    <title>Assinatura Plus</title>
</head>
<body>
    <h1>Faça sua assinatura Cliente Plus</h1>
    <div>
        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848bebed70018bfe9a58b30da3" name="MP-payButton" class='blue-ar-l-rn-none'>Assinar Plus</a>
    </div>
    <br>
    <div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit" name="assinar">Assinar Plus</button>
        </form>
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