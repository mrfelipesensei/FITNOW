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

    include ("../login/protect.php");
    $userPerfil = $_SESSION['perfil'];
    // var_dump($userPerfil);

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
    <title><?= $academias['nome']; ?></title>
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
        .item img{
            width: 450px;
        }
        #btns{
            text-align: center;
            width: 100%;
        }
        #btns p{
            font-size: 30px;
            margin-bottom: 5px;
        }
        #btns button{
            background-color: rgb(158, 20, 20);
            color:#fff;
            font-size: 25px;
            padding: 10px 25px;
            border-radius: 5px;
            border: none;
        }
        #btns button:hover{
            background-color: rgb(80, 217, 30);
            color:black;
            cursor: pointer;
            font-size: 30px;
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
                <div class="item">
                    <?php
                        // Verifica se a descrição da modalidade contém a palavra "Luta" para exibir a imagem correspondente
                        if (stripos($academias['modalidades'], 'Luta') !== false) {
                            echo "<img src='../img/academias/luta.jpeg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Musculação') !== false) {
                            echo "<img src='../img/academias/musculacao.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Pilates') !== false) {
                            echo "<img src='../img/academias/pilates.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Corrida') !== false) {
                            echo "<img src='../img/academias/corrida.png' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Jiu-Jitsu') !== false) {
                            echo "<img src='../img/academias/jiu.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Box') !== false) {
                            echo "<img src='../img/academias/boxing.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Natação') !== false) {
                            echo "<img src='../img/academias/natacao.png' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Yoga') !== false) {
                            echo "<img src='../img/academias/yoga.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Funcional') !== false) {
                            echo "<img src='../img/academias/funcional.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Crossfit') !== false) {
                            echo "<img src='../img/academias/crossfit.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Judô') !== false) {
                            echo "<img src='../img/academias/judo.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Spinning') !== false) {
                            echo "<img src='../img/academias/spinning.jpg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
                <div class="item">
                    <?php
                        if (stripos($academias['modalidades'], 'Dança') !== false) {
                            echo "<img src='../img/academias/danca.jpeg' alt='Imagem de luta'>";
                        }
                               
                        if (stripos($academias['modalidades'], 'Zumba') !== false) {
                            echo "<img src='../img/academias/danca.jpeg' alt='Imagem de luta'>";
                        }
                    ?>
                </div>
            </div>
        </div>            
    </div>
    <br>
    <div id="btns">
        <?php
            if ($userPerfil == 'Cliente+') {
                echo '<a href="pagina_matricula.php"><button>Treinar Já!</button></a>';
            } else if ($userPerfil == 'Cliente') {
                echo '<p>Quer treinar?</p>';
                echo '<a href="clienteplus.php"><button>Seja Plus</button></a>';
            }
        ?>
    </div>
    <br><br>
</body>