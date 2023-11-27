<?php
include ("../login/protect.php");

include_once  '../src/databases/conexao.php';
require_once '../src/dao/academiadao.php';

//Recebe o idAcademia
$idAcademia = $_GET['idAcademia'];

// var_dump($idAcademia);

$dao = new AcademiaDAO();
$academia = $dao->getById($idAcademia);

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
    <link rel="stylesheet" href="../assests/css/cliente_user.css">
    <link rel="stylesheet" href="../assests/css/foto_perfil.css"> <!--foto perfil-->
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <title>Alterar Usuário</title>
    <style>
        #form_atualizacao{
            display: flex;
            justify-content: center;
            font-size: larger;
        }
        #fto_btn{
            background-color: rgb(158, 20, 20);
            color:#fff;
            font-size: 20px;
            padding: 10px 40px;
            border-radius: 5px;
            border: none;
            margin-bottom: 5px;
        }
        #fto_btn:hover{
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
        <a href="home.html" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="parceiro_list.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div class="box_container">
        <div class="alterar">
            <h1>Alterar Academia</h1>
            <br>
    <form action="../academias/parceiro_update.php" method="post">
                <input type="hidden" name="id" value="<?= $idAcademia ?>">
                <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="" value="<?= htmlspecialchars($academia['nome']) ?>">
            </div>
            <br>
            <div>
                <label for="cnpj">CNPJ:</label>
                <input type="text" name="cnpj" id="" value="<?= htmlspecialchars($academia['cnpj']) ?>" readonly>
            </div>
            <br>
            <div>
                <label for="horarios">Horários</label>
                <input type="text" name="horarios" id="" value="<?= htmlspecialchars($academia['horarios']) ?>">
            </div>
            <br>
            <div>
                <label for="modalidades">Modalidades:</label>
                <input type="text" name="modalidades" id="" value="<?= htmlspecialchars($academia['modalidades']) ?>">
            </div>
            <br>
            <div>
                <label for="valores">Valores:</label>
                <input type="number" name="valores" value="<?= htmlspecialchars($academia['valores']) ?>">
            </div>
            <br>
            <div>
                <label for="cep">CEP:</label>
                <input type="number" name="cep" id="" value="<?= htmlspecialchars($academia['cep']) ?>">
            </div>
            <br>
            <div>
                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" id="" value="<?= htmlspecialchars($academia['bairro']) ?>"> 
            </div>
            <br>
            <div>
                <label for="complemento">Complemento:</label>
                <input type="text" name="complemento" value="<?= htmlspecialchars($academia['complemento']) ?>">
           </div>
            <br>
            <div>
                <label for="numero">Número:</label>
                <input type="number" name="numero" value="<?= htmlspecialchars($academia['numero']) ?>">
            </div>
            <br><br>
            <p>
            <button id="fto_btn" type="submit">Salvar</button>
            </p>
        </div>
    </form>
    </div>
</body>