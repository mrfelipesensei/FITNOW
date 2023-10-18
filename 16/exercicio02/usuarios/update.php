<?php
header('Content-Type: text/html; charset=utf-8;');

require_once '../src/databases/conexao.php';

# recebe os valores enviados do formulário via método post.
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? 0;
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

# solicita a conexão com o banco de dados e guarda na váriavel dbh.
$dbh = Conexao::getConexao();

# cria uma instrução SQL para inserir dados na tabela usuarios.
$query = "UPDATE escolabd.usuarios SET email = :email, nome = :nome 
                WHERE id = :id;";

# prepara a execução da query e retorna para uma variável chamada stmt.
$stmt = $dbh->prepare($query);

# com a variável stmt, usada bindParam para associar a cada um dos parâmetro
# e seu tipo (opcional).
$stmt->bindParam(':email', $email);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':id', $id);

# executa a instrução contida em stmt e se tudo der certo retorna uma valor maior que zero.
$result = $stmt->execute();
$dbh = null;

if ($result) {
    header('location: index.php?msg=Usuário atualizado com sucesso!');
} else {
    header('location: index.php?error=Não foi possível atualizar o usuário!');
}
