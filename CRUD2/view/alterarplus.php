<?php
include("../login/protect.php");

$userId = $_SESSION['idUsuario'];
// var_dump($userId);

$userPerfil = $_SESSION['perfil'];
// var_dump($userPerfil);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {
    // Verifica se o botão de assinar foi pressionado

    // Atualiza o perfil para Cliente Plus
    $_SESSION['perfil'] = 'Cliente';

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
    header('location: ../login/painel.php?msg=Assinatura cancelada com sucesso!'); 
    exit();
}

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
    <link href="../assests/css/style.css" rel="stylesheet"> <!--style.css-->
    <link href="../assests/css/alterplus.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <title>Cliente+</title>
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
    <div class="box1">
        <h1>Alterar Assinatura Plus</h1>
        <div>
            <!--Aqui vai entrar os dados da API-->
        </div>
        <div>
            <p>
                <a href="#" id="cancelar_btn"><button>Cancelar Assinatura Plus</button></a>
            </p>
            <div id="outrosBtns" style="display: none;">
                <div class="box2">
                    <p>
                        <a href="#" id="cancelarplus"><button>Certeza?</button></a>
                    </p>
                    <p>
                        <a href="../login/painelplus.php"><button>Voltar</button></a>
                    </p>
                </div>
                <div class="box3">
                    <!-- <div id="prosseguir" style="display: none;">
                        <a href="#"><button>Cancelar Plus</button></a>
                    </div> -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div id="prosseguir" style="display: none;">
                            <button type="submit" name="cancelar">Cancelar Plus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    document.getElementById('cancelar_btn').addEventListener('click', function() {
        var outrosBtns = document.getElementById('outrosBtns');
        if (outrosBtns.style.display === 'none') {
            outrosBtns.style.display = 'block';
        } else {
            outrosBtns.style.display = 'none';
        }
    });

    document. getElementById('cancelarplus').addEventListener('click', function(){
        var prosseguir = document.getElementById('prosseguir');
        if (prosseguir.style.display == 'none') {
            prosseguir.style.display = 'block';
        } else{
            prosseguir.style.display = 'none';
        }
    });
</script>