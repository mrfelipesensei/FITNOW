<?php
    header("Content-Type: text/html; charset=utf-8;");
include("../login/protect.php");
$idUsuario = $_SESSION['idUsuario'];

require_once __DIR__ ."/../src/dao/academiadao.php";

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
$horarios = filter_input(INPUT_POST, 'horarios', FILTER_SANITIZE_SPECIAL_CHARS);
$modalidades = filter_input(INPUT_POST,'modalidades', FILTER_SANITIZE_SPECIAL_CHARS);
$valores = filter_input(INPUT_POST,'valores', FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST,'cep', FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST,'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
$complemento = filter_input(INPUT_POST,'complemento', FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST,'numero', FILTER_SANITIZE_SPECIAL_CHARS);

// var_dump($nome, $cnpj, $horarios, $bairro, $modalidades, $valores);

$dao = new AcademiaDAO();
$idAcademia = $dao->new($nome, $cnpj, $horarios, $modalidades, $valores,$cep, $bairro, $complemento, $numero);
if ($idAcademia) {
    $dao->newAcademiaByUser($idUsuario, $idAcademia);
}

if ($idAcademia) {
    header('location: ../login/painel_parceiro.php?msg=Academia cadastradada com sucesso!');
} else {
    header('location: parceiro_academia.php?error=Não foi possível cadastrar academia!');
}