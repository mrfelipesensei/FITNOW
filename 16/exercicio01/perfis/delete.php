<?php
    include_once '../src/conexao.php';

    $dbh = Conexao::getConexao();

    # usando funcionalidade nova do PHP 8 chamada null coalescing operatior
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;

    # cria o comando DELETE filtrado pelo campo id e valor = $id
    $query = "DELETE FROM escolabd.perfis WHERE id = :id;";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $dbh = null;
    
    if ($stmt->rowCount() > 0) {
        header('location: index.php?msg=Perfil excluído com sucesso!');
    } else {
        header('location: index.php?error=Não foi possível excluir o perfil!');
    }