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
    <link rel="stylesheet" href="../assests/css/new_user.css">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <style>
        #aviso{
            text-align: center;
            font-weight: bolder;
            font-size: 35px;
            color: white;
            margin-bottom: 10px;
        }
    </style>
    <title>Criar Usuário</title>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../login/index.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div class="box_container" >
        <div id="aviso_box">
            <div id="aviso">
                <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
                    <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
                        <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="alterar" >
            <h1>Novo Usuário</h1>
            <br>
            <form action="save_new.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder="Informe seu nome" maxlength="40" required><br>
                </div>
                <br>
                <div>
                    <label for="">Foto Perfil:</label>
                    <input type="file" name="foto_perfil">
                </div>
                <br>
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" placeholder="000.000.000-00" maxlength="15" required><br>
                </div>
                <br>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="" placeholder="Informe seu e-mail" required><br>
                </div>
                <br>
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="" placeholder="Informe sua senha" required><br>
                </div>
                <br>
                <div>
                    <label for="perfil">Perfil:</label>
                    <!-- <input type="text" name="perfil" id="" placeholder="Informe o perfil" required> -->
                    <select name="perfil">
                        <!-- <option value="admin">Admin</option> -->
                        <option value="Cliente" selected>Cliente</option>
                        <option value="Cliente+">Cliente+</option>
                        <option value="Parceiro">Parceiro</option>
                    </select>
                </div>
                <br>
                <p>
                    <button type="submit">Salvar</button>
                </p>
            </form>
        </div>
        <br>
    </div>
</body>
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
</html>