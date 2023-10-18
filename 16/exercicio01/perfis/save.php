<?php
    header('Content-Type: text/html; charset=utf-8;');
    
    require_once '../src/conexao.php';

    # recebe os valores enviados do formulário via método post.
    $nome = strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));

    # solicita a conexão com o banco de dados e guarda na váriavel dbh.
    $dbh = Conexao::getConexao();

    # cria uma instrução SQL para inserir dados na tabela usuarios.
    $query = "INSERT INTO escolabd.perfis (nome) 
                VALUES (:nome);"; 
    
    # prepara a execução da query e retorna para uma variável chamada stmt.
    $stmt = $dbh->prepare($query);

    # com a variável stmt, usada bindParam para associar a cada um dos parâmetro
    # e seu tipo (opcional).
    $stmt->bindParam(':nome', $nome);
    
    # executa a instrução contida em stmt e se tudo der certo retorna uma valor maior que zero.
    $result= $stmt->execute();
    $dbh = null;
    
    if ($result) {
        header('location: index.php?msg=Perfil adicionado com sucesso!');
    } else {
        header('location: index.php?error=Não foi possível adicionar o perfil!');
    }
    
