<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/fonticon.css" rel="stylesheet"> <!--fonticon.css-->
    <link rel="stylesheet" href="../assests/css/modal.css"> <!--modal.css-->
    <link rel="stylesheet" href="../assests/css/login.css"> <!--login.css-->
    <link rel="stylesheet" href="../assests/css/styles.css">
    <style>
        main h1 {
            margin-top: 5px;
            text-align: center;
            font-size: 25px;
        }

        .form_center {
            display: flex;
            justify-content: center;
        }

        form label {
            margin-right: 5px;
        }

        form input {
            width: 30%;
        }

        .btn {
            background-color: grey;
            color: black;
            border-radius: 5px;
            border: none;
            padding: 10px 20px;
            position: absolute;
            right: 45%;
        }

        .btn:hover {
            background-color: green;
            color: white;
            transition: 1s;
        }
    </style>
    <title>Criando Perfil</title>
</head>
    <header class="main_header">
        <div class="main_header_content">
            <a href="home.html" class="logo">
                <img id="logofit" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                    title="FITNOW - A qualquer hora e qualquer lugar"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="../perfis/index.php">Perfil</a></li>
                    <li><a href="#">Usuários</a></li>
                </ul>
            </nav>
        </div>
    </header>
<body>
    <main>
        <h1>Novo Perfil</h1>
        <form action="save.php" method="post">
        <div class="form_center" >
            <label>Nome</label><br>
            <input type="text" name="nome" placeholder="Informe seu nome." size="80" required autofocus><br>
        </div>    
            <br>
            <button class="btn" type="submit">Salvar</button>
        </form>
        <br><br><br>
        <a href="index.php"><button class="btn">Voltar</button></a>
    </main>
</body>

</html>