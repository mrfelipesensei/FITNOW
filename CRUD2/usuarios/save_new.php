<?php
    header("Content-Type: text/html; charset=utf-8;");

require_once __DIR__ . "/../src/dao/usuariodao.php";
const UPLOAD_DIR = __DIR__ ."/../img/usuarios/";

#recebe os valores enviados do formulário via método post
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$perfil = filter_input(INPUT_POST,'perfil', FILTER_SANITIZE_SPECIAL_CHARS);

$foto_perfil = getImagem();

if ($foto_perfil == null) {
    $foto_perfil = filter_input(INPUT_POST, "foto_perfil", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

// var_dump($foto_perfil); exit;

// var_dump($nome, $cpf, $email, $senha, $perfil);

$dao = new UsuarioDAO();
$result = $dao->new($nome, $cpf, $email, $senha, $perfil, $foto_perfil);

# solicita a conexão com o banco de dados e guarda na váriavel bdh
if ($result) {
    header('location: new_user.php?msg=Usuário adicionado com sucesso!');
} else {
    header('location: new_user.php?error=Não foi possível adicionar o usuário!');
}


function getImagem() 
{
    if ($_FILES['foto_perfil']["tmp_name"] == "") {
        return null;
    }
    $tmp = $_FILES['foto_perfil']['tmp_name'];
    $type = explode('.', $_FILES['foto_perfil']['name'])[1];
    $filename = uniqid("", true) . '.'. $type;
    $filenamewithpath = UPLOAD_DIR . $filename;
    $success = move_uploaded_file($tmp, $filenamewithpath);
    if ($success) {
        return $filename;
    } else {
        return null;
    }
    
}