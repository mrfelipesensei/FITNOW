<?php
session_start();
require_once __DIR__ . '/../src/dao/usuariodao.php';

$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

$senhaCrypto = md5($senha);

$dao = new UsuarioDAO();
$usuarios = $dao->login($email,$senhaCrypto);

if (!$usuarios) {
    header("location: index.php?error=Login ou senha inválidos!");
    exit;
}
$_SESSION['usuarios'] = array(
    'id' => $usuarios['idUsuarios'],
    'nome' => $usuarios['nome'],
    'email' => $usuarios['email'],
    'perfil' => $usuarios['perfil_id'],
);

var_dump($usuarios);

?>