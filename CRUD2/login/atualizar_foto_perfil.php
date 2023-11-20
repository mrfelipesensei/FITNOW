<?php
session_start();
include("protect.php");
require_once "../src/dao/usuariodao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['idUsuario'];
    define('UPLOAD_DIR', "../img/usuarios/");

    if (isset($_FILES['nova_foto_perfil']) && $_FILES['nova_foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $foto_nome = $_FILES['nova_foto_perfil']['name'];
        $temp_name = $_FILES['nova_foto_perfil']['tmp_name'];

        move_uploaded_file($temp_name, UPLOAD_DIR . $foto_nome);

        $_SESSION['usuario']['foto_perfil'] = $foto_nome;

        // Aqui você deve realizar a atualização no banco de dados com o nome da nova foto
        // Use a lógica de atualização do banco de dados adequada para o seu sistema
        // Por exemplo:
        // $dao = new SeuDAO();
        // $dao->atualizarFotoPerfil($userId, $foto_nome);

        $dao = new UsuarioDAO();
        $dao->atualizarFotoPerfil($userId,$foto_nome);

        header("Location: painel.php");
        exit();
    } else {
        echo "Ocorreu um erro no upload da imagem.";
    }
}
?>

