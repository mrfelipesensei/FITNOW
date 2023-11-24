<?php
    //Recebe o idAcademia
    $idAcademia = $_GET['idAcademia'];

    // var_dump($idAcademia);

    //Informações das Academias
    require_once '../src/databases/conexao.php';
    require_once '../src/dao/academiadao.php';

    //Associação para resgatar as informações de Academia Específica pelo idAcademia
    $dao = new AcademiaDAO();
    $academias = $dao->getById($idAcademia);
    

    // var_dump($academias);

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
    <title>Academia Tal</title>
    <style>
        .box_container{
            display: flex;
            justify-content: center;
            gap: 25px;
        }
        .box1{
            margin-top: 2%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box2{
            border: 9px solid rgb(158, 20, 20);
            border-radius: 45px;
            padding: 20px;
        }

        .academia-info {
            margin-bottom: 10px;
        }

        .info-key {
            font-size: 20px;
            font-weight: bold;
        }

        .info-value {
            font-size: 20px;
            color: #333; /* Cor do texto */
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
                <li><a href="cliente_academia.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div class="box_container">
        <div class="box1">
            <div class="box2">
                <?php
                    if (is_array($academias) && count($academias) > 0) {
                        $keys = array_keys($academias);

                        // Filtra apenas as chaves associativas
                        $associativeKeys = array_filter($keys, 'is_string');

                        foreach ($associativeKeys as $key) {
                            if ($key !== 'idAcademia') { // Ignora a chave 'idAcademia'
                                $formattedKey = ucfirst($key); // Formata a chave para iniciar com maiúscula
                                $value = $academias[$key]; // Obtém o valor correspondente

                                // Exibe apenas se o valor não for 'idAcademia'
                                echo "<p class='academia-info'><span class='info-key'>$formattedKey:</span> <span class='info-value'>$value</span></p>";
                            }
                        }
                    } else {
                        echo "Nenhuma informação encontrada para esta academia.";
                    }
                ?>
            </div>
        </div>
        <div class="box1">
            <div class="box2">
                    
            </div>
        </div>            
    </div>

</body>