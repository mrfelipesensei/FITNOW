<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <nav>
        <li><a aria-current="page" href="index.php">Home</a></li>
        <li><a aria-current="page" href="?page=novo">Novo Usuário</a></li>
        <li><a aria-current="page" href="?page=listar">Listar Usuário</a></li>
    </nav>
    <br>
    <div class="container">
        <?php
        switch (@$_REQUEST["page"]) {
            case "novo":
                include("novo_user.php");
                break;
            case "listar":
                include("listar_user.php");
                break;
            default:
                print '<h1>Bem vindos!</h1>';
                break;
        }
        ?>
    </div>
</body>

</html>