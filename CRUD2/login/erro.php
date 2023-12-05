<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <title>ERRO</title>
    <style>
        h1{
            text-align: center;
            font-size: 35px;
            margin-top: 20px;
        }
        h2{
            text-align: center;
            font-size: 25px;
            margin-top: 20px;
        }
        #gif{
            text-align: center;
            margin-top: 20px;
        }
        p{
            text-align: center;
            margin-top: 20px;
        }
        #btn2{
            color:white;
            font-size: 25px;
            padding: 10px 30px;
            border: none;
            border-radius: 10px;
            background-color: rgb(158, 20, 20);
        }
        #btn2:hover{
            cursor: pointer;
            background-color: rgb(80, 217, 30);
            color: black;
            font-size: 30px;
            transition: 1s;
        }
    </style>
</head>
<body>
    <h1>Usuário <span style="color:red">NÃO ENCONTRADO</span></h1>
    <div id="gif">
        <img src="../img/monkey-23.gif" alt="">
    </div>
    <h2>Seu email ou sua senha estão <span style="color:red">incorretos</span></h2>
    <h2>OU</h2>
    <h2>Ainda <span style="color:red">NÃO</span> foi cadastrado</h2>
    <div>
        <a href="index.php">
            <p><button id="btn2">Voltar</button></p>
        </a> 
    </div>
</body>
</html>