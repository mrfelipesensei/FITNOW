<?php
require_once __DIR__ ."/../src/dao/academiadao.php";

$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT) ?? 0;

$dao = new AcademiaDAO();
$result = $dao->delete($id);

if ($result > 0) {
    header('location: index.php?msg=Academia excluída com sucesso!');
} else {
    header('location: index.php?error=Não foi possível excluir Academia!');
}