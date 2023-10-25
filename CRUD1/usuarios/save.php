<?php
header("Content-Type: text/html; charset=utf-8;");

require_once __DIR__ . "/../src/dao/usuariodao.php";

#recebe os valores enviados do formulário via método post
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS));
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
$perfil = filter_input(INPUT_POST, 'perfil', FILTER_VALIDATE_INT) ?? 0;

// echo '<pre>'; var_dump($nome,$cpf,$email,$senha,$telefone,$perfil); exit;

$dao = new UsuarioDAO();
$result = $dao->new($nome, $cpf, $email, $senha, $telefone, $perfil);

# solicita a conexão com o banco de dados e guarda na váriavel d
if ($result) {
    header('location: index.php?msg=Usuário adicionado com sucesso!');
} else {
    header('location: index.php?error=Não foi possível adicionar o usuário!');
}

