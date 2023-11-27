<?php
include("conexao.php");

if (isset($_POST["email"]) || isset($_POST["senha"])) {
    
    if (strlen($_POST["email"]) == 0) {
        echo "Preencha seu E-mail";
    } else if (strlen($_POST["senha"]) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST["email"]);
        $senha = $mysqli->real_escape_string($_POST["senha"]);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
                $_SESSION['usuario'] = array(
                    'id' => $usuario["idUsuario"],
                    'nome' => $usuario["nome"],
                    'perfil' => $usuario["perfil"],
                    'foto_perfil' => $usuario["foto_perfil"],

                );
                $_SESSION["idUsuario"] = $usuario["idUsuario"];
                $_SESSION["nome"] = $usuario["nome"];
                $_SESSION["perfil"] = $usuario["perfil"];

                if ($usuario["perfil"] == "Admin") {
                    header("Location: admin_painel.php");
                }elseif ($usuario["perfil"] == "Cliente") {
                    header("Location: painel.php");
                }else if ($usuario["perfil"] == "Cliente+") {
                    header("Location: painelplus.php");
                }else if($usuario["perfil"] == "Parceiro"){
                    header("Location: painel_parceiro.php");
                }
                // header("Location: painel.php");
            }
        }else{
            if (!isset($_SESSION)) {
                session_start();

                header("Location: erro.php");   
            }
        }

    }
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
    <link rel="stylesheet" href="assests/css/index_style.css">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <link rel="stylesheet" href="../assests/css/login_style.css">
    <script src="index.js" defer></script>
    <title>Login</title>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="../index.html" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="../index.html">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div class="login_container">
        <div class="login">
            <h1>Acesse sua conta</h1>
            <form action="" method="post">
                <div class="item">
                    <label for="">Email:</label>
                    <input type="text" name="email" id="">
                </div>
                <div class="item" >
                    <label for="">Senha:</label>
                    <input type="password" name="senha" id="senha">
                </div>
                <p class="btn" >
                    <button type="submit">Entrar</button>
                </p>
            </form>
        </div>
    </div>
    <br>
    <section class="cadastro_container">
        <div class="cadastro">
            <h1>Ainda não é cadastrado?</h1>
            <p>Não perca mais tempo, venha treinar com nossa ajuda.</p>
            <br>
            <p class="btn2">
                <a href="../usuarios/new_user.php"><button>Cadastre-se</button></a>
            </p>
        </div>
    </section>
</body>
</html>
<!--Rodapé-->
<footer>
    <section class="flex-container">
        <div>
            <h1>Quer saber mais?</h1>
            <div>
                <h2>Nossas Páginas</h2>
                <ul>
                    <li><a href="#">Cliente</a></li>
                    <li><a href="#">Cliente Plus</a></li>
                    <li><a href="#">Parceiros</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
        </div>   
        <div>
            <h2>Links Úteis</h2>
            <li><a href="#">Política de Privacidade</a></li>
            <li><a href="#">Aviso Legal</a></li>
            <li><a href="#">Termos de Uso</a></li>
        </div>
    </section>
    <div id="last">
        <p>FITNOW © - Todos os direitos reservados</p>
    </div>
</footer>



