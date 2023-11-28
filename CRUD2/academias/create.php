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
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <title>Criar Academia</title>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="nome.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div class="box_container">
        <div class="alterar">
            <h1>Nova Academia</h1>
            <br>
            <form action="save.php" method="post">
                <div>
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" placeholder="Nome da Academia" maxlength="40" required><br>
                    </div>
                    <br>
                    <div>
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" name="cnpj" id="" placeholder="52147189000143" maxlength="14" required><br>
                    </div>
                    <br>
                    <div>
                        <label for="horarios">Horários:</label>
                        <input type="text" name="horarios" id="" placeholder="7h às 20h" maxlength="20" required><br>
                    </div>
                    <br>
                    <div>
                        <label for="modalidades">Modalidades:</label>
                        <input type="text" name="modalidades" id="" placeholder="Musculação/Box" maxlength="80" required><br>
                    </div>
                    <br>
                    <div>
                        <label for="valores">Valores:</label>
                        <input type="number" name="valores" id="" placeholder="35" maxlength="6" required><br>
                    </div>
                    <br>
                </div>
                <div>
                    <div>
                        <label for="cep">CEP:</label>
                        <input type="number" name="cep" id="" placeholder="00000000" maxlength="8" required><br>
                    </div>
                    <br>
                    <div>
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" id="" placeholder="Informe o Bairro" maxlength="30" required><br>
                    </div>
                    <br>
                    <div>
                        <label for="complemento">Complemento:</label>
                        <input type="text" name="complemento" placeholder="Informe o Complemento" maxlength="40" required><br>
                    </div>
                    <br>
                    <div>
                        <label for="numero">Número:</label>
                        <input type="number" name="numero" placeholder="000" maxlength="3" required>
                    </div>
                </div>
                <br>
                <p>
                    <button type="submit">Salvar</button>
                </p>
            </form>
        </div>
    </div>
</body>