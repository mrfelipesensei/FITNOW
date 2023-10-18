<?php
header('Content-Type: text/html; charset=utf-8;');

require_once __DIR__ . '/../src/dao/usuariodao.php';


# recebe os valores enviados do formulário via método post.
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$perfil = filter_input(INPUT_POST, 'perfil', FILTER_VALIDATE_INT) ?? 0;
$status = 1;

// echo '<pre>'; var_dump($nome, $email, $password, $status, $perfil); exit;
$dao = new UsuarioDAO();
$result = $dao->new($nome, $email, $password, $status, $perfil);

# solicita a conexão com o banco de dados e guarda na váriavel d
if ($result) {
    header('location: index.php?msg=Usuário adicionado com sucesso!');
} else {
    header('location: index.php?error=Não foi possível adicionar o usuário!');
}
