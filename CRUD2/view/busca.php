<?php
    require_once '../src/databases/conexao.php';
    require_once '../src/dao/academiadao.php';

    $dao = new AcademiaDAO();
    $academias = $dao->getAll();
    $quantidadeRegistros = count($academias);
?>
<?php
$busca = filter_input(INPUT_GET,'busca',FILTER_SANITIZE_SPECIAL_CHARS);

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
        .box1 h1{
            text-align: center;
            margin-top: 15px;
            font-size: 25px;
        }
        .box1 p{
            margin-top: 10px;
            text-align: center;
        }
        .box1 button{
            background-color: rgb(158, 20, 20);
            color:#fff;
            font-size: 20px;
            padding: 10px 25px;
            border-radius: 5px;
            border: none;
        }
        .box1 button:hover{
            background-color: rgb(80, 217, 30);
            color:black;
            cursor: pointer;
            font-size: 22px;
            transition: 1s;
        }
    </style>
    <title>Academias</title>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="#" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="../login/cliente_academia.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
<div class="box1">
        <h1>Pesquisar Academias por:</h1>
        <br>
        <!-- <div>
            <p>
                <a href="#"><button>Bairro</button></a>
            </p>
            <p>
                <a href="#"><button>Valor</button></a>
            </p>
            <p>
                <a href="#"><button>Modalidades</button></a>
            </p>
        </div> -->
        <div>
            <form action="" method="get">
                <label for="">Buscar por Bairro:</label>
                <input type="text" name="busca" value="<?= $busca ?>">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </div>
</body>
