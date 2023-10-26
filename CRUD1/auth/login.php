<?php
session_start();
require_once __DIR__ . '/../src/dao/usuariodao.php';

$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

$senhaCrypto = md5($senha);

$dao = new UsuarioDAO();
$usuario = $dao->login($email,$senhaCrypto);

if (!$usuario) {
    header("location: index.php?error=Login ou senha inválidos!");
    exit;
}
$_SESSION['usuarios'] = array(
    'id' => $usuario['idUsuarios'],
    'nome' => $usuario['nome'],
    'email' => $usuario['email'],
    'perfil' => $usuario['perfil_id'],
);


?>