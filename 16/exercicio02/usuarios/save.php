<?php
header('Content-Type: text/html; charset=utf-8;');

require_once '../src/databases/conexao.php';

# recebe os valores enviados do formulário via método post.
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$perfil = filter_input(INPUT_POST, 'perfil', FILTER_VALIDATE_INT) ?? 0;
$status = 1;

# solicita a conexão com o banco de dados e guarda na váriavel dbh.
$dbh = Conexao::getConexao();

# cria uma instrução SQL para inserir dados na tabela usuarios.
$query = "INSERT INTO escolabd.usuarios (email, password, nome, status, perfil_id) 
                VALUES (:email, :password, :nome, :status, :perfil_id);";

# prepara a execução da query e retorna para uma variável chamada stmt.
$stmt = $dbh->prepare($query);

# com a variável stmt, usada bindParam para associar a cada um dos parâmetro
# e seu tipo (opcional).
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':perfil_id', $perfil);

# executa a instrução contida em stmt e se tudo der certo retorna uma valor maior que zero.
$result = $stmt->execute();
$dbh = null;

if ($result) {
    header('location: index.php?msg=Usuário adicionado com sucesso!');
} else {
    header('location: index.php?error=Não foi possível adicionar o usuário!');
}
