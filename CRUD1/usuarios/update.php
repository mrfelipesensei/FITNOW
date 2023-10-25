<?php
header("Content-Type: text/html; charset=utf-8;");

require_once __DIR__ ."/../src/dao/usuariodao.php";

#recebe os valores enviados do formulário via método post

$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT) ?? 0;
$nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST,"cpf", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL);
$senha = md5(filter_input(INPUT_POST,"senha", FILTER_SANITIZE_SPECIAL_CHARS));
$telefone = filter_input(INPUT_POST,"telefone", FILTER_SANITIZE_SPECIAL_CHARS);
$perfilId = filter_input(INPUT_POST,"perfil", FILTER_SANITIZE_SPECIAL_CHARS);

$dao = new UsuarioDAO();
$result = $dao->update($id, $nome, $cpf, $email, $senha, $telefone, $perfilId);


if ($result) {
    header('location: index.php?msg=Usuário atualizado com sucesso!');
} else {
    header('location: index.php?error=Não foi possível atualizar o usuário!');
}

#NÃO ESTÁ ATUALIZANDO!

?>