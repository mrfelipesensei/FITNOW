<?php
    header("Content-Type: text/html; charset=utf-8;");

require_once __DIR__ ."/../src/dao/academiadao.php";

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
$horarios = filter_input(INPUT_POST, 'horarios', FILTER_SANITIZE_SPECIAL_CHARS);

$modalidades = filter_input(INPUT_POST,'modalidades', FILTER_SANITIZE_SPECIAL_CHARS);
$valores = filter_input(INPUT_POST,'valores', FILTER_SANITIZE_SPECIAL_CHARS);

// var_dump($nome, $cnpj, $horarios, $bairro, $modalidades, $valores);

$dao = new AcademiaDAO();
$result = $dao->new($nome, $cnpj, $horarios, $modalidades, $valores);


if ($result) {
    header('location: index.php?msg=Usuário adicionado com sucesso!');
} else {
    header('location: index.php?error=Não foi possível adicionar o usuário!');
}