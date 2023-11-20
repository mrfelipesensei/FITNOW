<?php
    require_once '../src/databases/conexao.php';
    require_once '../src/dao/academiadao.php';

    $dao = new AcademiaDAO();
    // $academias = $dao->getAll();
    

    $inicio = filter_input(INPUT_GET,'inicio',FILTER_SANITIZE_SPECIAL_CHARS);
    $fim = filter_input(INPUT_GET,'fim',FILTER_SANITIZE_SPECIAL_CHARS);
    
    $val = $inicio;
    $val2 = $fim;
    // $academias = $dao->getByModal($modal);
    // var_dump($academias);

    //modalidades recebe a busca do get
    $valor = [$inicio];
    $valor2 = [$fim];
    $academias = $dao->getByIntervalo($val, $val2);

    $quantidadeRegistros = count($academias);
    


    //Condições SQL
    // $condicoes = [
    //     strlen($busca) ? 'bairro LIKE "%'.$busca.'%" ' : null
    // ];

    // print_r($condicoes);

    //Claúsula WHERE
    // $where = implode('AND',$condicoes);
    // echo $where;


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
        .box1 form{
            text-align: center;
        }
        .box1 label{
            font-size: 25px;
        }
        .box1 input{
            padding: 5px;
            font-size: larger;
        }
        #focus{
            font-size: 20px;
            color: green;
            font-weight: bolder;
            cursor: pointer;
        }
        #focus:hover{
            font-size: 24px;
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
                <li><a href="cliente_academia.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
<div class="box1">
        <h1>Digite os Valores Desejados:</h1>
        <br>
        <div>
            <form action="" method="get">
                <label for="">Valores De:</label>
                <input type="text" name="inicio" value="<?= $inicio ?>">
                <label for=""> Até </label>
                <input type="text" name="fim" value="<?= $fim ?>">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <br>
    </div>
    <div>
    <section>
            <table>
                <thead>
                    <tr>
                        <th>Valores</th>
                        <th>Nome</th>
                        <th>Horários</th>
                        <th>Modalidades</th>
                        <th>CEP</th>
                        <th>Bairro</th>
                        <th>Complemento</th>
                        <th>Número</th>
                        <!-- <th>Ação</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php if ($quantidadeRegistros == "0"): ?>
                    <tr>
                        <td colspan="13">Não existem academias com esses valores.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($academias as $academia) : ?>
                            <tr>
                                <td id="focus"><?= $academia['valores'];?></td>
                                <td><?= $academia['nome'];?></td>
                                <td><?= $academia['horarios'];?></td>
                                <td><?= $academia['modalidades'];?></td>
                                <td><?= $academia['cep'];?></td>
                                <td><?= $academia['bairro'];?></td>
                                <td><?= $academia['complemento'];?></td>
                                <td><?= $academia['numero'];?></td>
                                <!-- <td class="td__operacao">
                                    <a class="btns" href="edit.php?id=<?=$academia['idAcademia'];?>">Alterar</a>
                                    <br><br>
                                    <a class="btns" href="delete.php?id=<?=$academia['idAcademia'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; $dbh = null; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>