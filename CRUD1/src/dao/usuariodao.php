<?php
require_once __DIR__ . '/../databases/conexao.php';

class UsuarioDAO
{
    private $dbh;

    public function __construct(){
        $this->dbh = Conexao::getConexao();
    }

    public function getAll(){
        $query = "SELECT * FROM fitnowbd.usuarios;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;
        return $rows;
    }

    public function getById($id){

        $query = "SELECT * FROM fitnowbd.usuarios WHERE idUsuarios = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;
        return $row;
    }

    public function delete($id){
        $query = 'DELETE FROM fitnowbd.usuarios WHERE idUsuarios = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $result = $stmt->rowCount();
        $this->dbh = null;
        return $result;
    }

    public function new($nome, $cpf, $email, $senha, $telefone, $perfilId){

        $query = 'INSERT INTO fitnowbd.usuarios (nome, cpf, email, senha, telefone, perfil_id)
        VALUES (:nome, :cpf, :email, :senha, :telefone, :perfil_id);';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':cpf',$cpf);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':senha',$senha);
        $stmt->bindParam(':telefone',$telefone);
        $stmt->bindParam(':perfil_id',$perfilId);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }

    public function update($id, $nome, $cpf, $email, $senha, $telefone, $perfilId){
       
        $query = 'UPDATE fitnowbd.usuarios SET
        nome = :nome,
        cpf = :cpf,
        email = :email,
        senha = :senha,
        telefone = :telefone,
        perfil_id = :perfil_id
        WHERE idUsuarios = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':cpf',$cpf);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':senha',$senha);
        $stmt->bindParam(':telefone',$telefone);
        $stmt->bindParam(':perfil_id',$perfilId);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }

    public function login($email, $senha){
        $query = 'SELECT idUsuarios, nome, email, perfil_id 
        FROM fitnowbd.usuarios
        WHERE email=:email
        AND senha = :senha;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':senha',$senha);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;
    }







}








?>