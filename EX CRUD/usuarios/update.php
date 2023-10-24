<?php
header('Content-Type: text/html; charset=utf-8;');

require_once __DIR__ . '/../src/dao/usuariodao.php';


# recebe os valores enviados do formulário via método post.
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? 0;
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$perfilId = filter_input(INPUT_POST, 'perfil', FILTER_VALIDATE_INT) ?? 0;
$status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT) ?? 0;;

$dao = new UsuarioDAO();
$result = $dao->update($id, $nome, $email, $status, $perfilId);


if ($result) {
    header('location: index.php?msg=Usuário atualizado com sucesso!');
} else {
    header('location: index.php?error=Não foi possível atualizar o usuário!');
}
