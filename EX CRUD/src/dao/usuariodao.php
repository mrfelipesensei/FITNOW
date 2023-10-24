<?php
require_once __DIR__ . '/../databases/conexao.php';

class UsuarioDAO
{

    private $dbh;

    public function __construct()
    {
        $this->dbh =  Conexao::getConexao();
    }

    public function getAll()
    {
        $query = "SELECT * FROM escolabd.usuarios;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;

        return $rows;
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM escolabd.usuarios WHERE id = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;

        return $row;
    }

    public function delete(int $id): int
    {
        $query = "DELETE FROM escolabd.usuarios WHERE id = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = (int) $stmt->rowCount();
        $this->dbh = null;

        return $result;
    }

    public function new(string $nome, string $email, string $password, int $status, int $perfilId): int
    {
        $query = "INSERT INTO escolabd.usuarios (nome, email, password, status, perfil_id) 
            VALUES (:nome, :email, :password, :status, :perfil_id);";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':perfil_id', $perfilId);
        
        $result = (int) $stmt->execute();
        $this->dbh = null;

        return $result;
    }

    public function update(int $id, string $nome, string $email, int $status, int $perfilId): int
    {
        $query = "UPDATE escolabd.usuarios SET 
            nome = :nome,
            email = :email,
            `status` = :status,
            perfil_id = :perfil_id 
            WHERE id = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':perfil_id', $perfilId);
        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }

    public function login($email, $password)
    {
        $query = "SELECT id, nome, email, perfil_id 
            FROM escolabd.usuarios 
            WHERE email = :email
            AND password = :password;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;

        return $row;
    }
}
