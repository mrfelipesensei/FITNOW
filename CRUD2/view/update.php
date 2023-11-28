<?php

header("Content-Type: text/html; charset=utf-8;");

require_once __DIR__ ."/../src/dao/usuariodao.php";

include("../login/protect.php");

$userId = $_SESSION['idUsuario'];
// var_dump($userId);

$userPerfil = $_SESSION['perfil'];
//var_dump($userPerfil);

#recebe os valores enviados do formulário via método post
// $userId = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT)?? 0;
$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST,'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_SPECIAL_CHARS);
// $perfil = filter_input(INPUT_POST,'perfil', FILTER_SANITIZE_SPECIAL_CHARS);

var_dump($userId, $nome, $cpf, $email, $senha, $userPerfil);

$dao = new UsuarioDAO();
$result = $dao->update($userId, $nome, $cpf, $email, $senha, $userPerfil);

if ($result) {
    if ($userPerfil == "Parceiro") {
        header('location: ../login/painel_parceiro.php?msg=Usuário atualizado com sucesso!');
    }else if($userPerfil == "Cliente"){
        header('location: ../login/painel.php?msg=Usuário atualizado com sucesso!');
    }else if($userPerfil == "Cliente+"){
        header('location: ../login/painelplus.php?msg=Usuário atualizado com sucesso!');
    }
    
    
} else {
    header('location: ../login/painel.php?error=Não foi possível atualizar o usuário!');
}