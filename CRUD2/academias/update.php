<?php

header("Content-Type: text/html; charset=utf-8;");

require_once __DIR__ ."/../src/dao/academiadao.php";

#recebe os valores enviados do formulário via método post
$id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT)?? 0;
$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cnpj = filter_input(INPUT_POST,'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
$horarios = filter_input(INPUT_POST,'horarios', FILTER_SANITIZE_SPECIAL_CHARS);
$modalidades = filter_input(INPUT_POST,'modalidades', FILTER_SANITIZE_SPECIAL_CHARS);
$valores = filter_input(INPUT_POST,'valores', FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST,'cep', FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST,'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
$complemento = filter_input(INPUT_POST,'complemento', FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST,'numero', FILTER_SANITIZE_SPECIAL_CHARS);

// var_dump($id, $nome, $cnpj, $horarios, $bairro, $modalidades, $valores);

$dao = new AcademiaDAO();
$result = $dao->update($id, $nome, $cnpj, $horarios, $modalidades, $valores, $cep, $bairro, $complemento, $numero);

if ($result) {
    header('location: index.php?msg=Academia atualizada com sucesso!');
} else {
    header('location: index.php?error=Não foi possível atualizar Academia!');
}