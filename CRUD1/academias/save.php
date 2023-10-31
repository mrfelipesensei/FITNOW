<?php
header("Content-Type: text/html; charset=utf-8;");

require_once __DIR__ ."/../src/dao/academiadao.php";


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cnpj = filter_input(INPUT_POST,'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
$horarios = filter_input(INPUT_POST,'horarios', FILTER_SANITIZE_SPECIAL_CHARS);
$modalidades = filter_input(INPUT_POST,'modalidades', FILTER_SANITIZE_SPECIAL_CHARS);
$valores = filter_input(INPUT_POST,'valores', FILTER_SANITIZE_SPECIAL_CHARS);
$fotos = filter_input(INPUT_POST,'fotos', FILTER_SANITIZE_SPECIAL_CHARS);


$dao = new AcademiaDAO();
$result = $dao->new($nome, $cnpj, $horarios, $modalidades, $valores, $fotos) ;

if ($result) {
    header('location: index.php?msg=Academia adicionada com sucesso!');
} else {
    header('location: index.php?error=Não foi possível adicionar a academia!');
}