<?php
require_once __DIR__ ."/../src/dao/academiadao.php";

$academiaDAO = new AcademiaDAO();
$perfis = $perfilDAO->getAll();
?>