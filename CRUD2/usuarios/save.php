<?php
    header("Content-Type: text/html; charset=utf-8;");

require_once __DIR__ . "/../src/dao/usuariodao.php";

#recebe os valores enviados do formulário via método post
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$perfil = filter_input(INPUT_POST,'perfil', FILTER_SANITIZE_SPECIAL_CHARS);

// var_dump($nome, $cpf, $email, $senha, $perfil);

$dao = new UsuarioDAO();
$result = $dao->new($nome, $cpf, $email, $senha, $perfil);

# solicita a conexão com o banco de dados e guarda na váriavel bdh
if ($result) {
    header('location: index.php?msg=Usuário adicionado com sucesso!');
} else {
    header('location: index.php?error=Não foi possível adicionar o usuário!');
}