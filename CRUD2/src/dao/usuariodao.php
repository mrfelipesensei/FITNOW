<?php

require_once __DIR__ ."/../databases/conexao.php";

class UsuarioDAO{
    private $dbh;

    public function __construct(){
        $this->dbh = Conexao::getConexao();
    }

    public function getAll(){
        $query = "SELECT * FROM fitnow.usuarios;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;
        return $rows;
    }

    public function new($nome,$cpf,$email,$senha,$perfil){
        $query = 'INSERT INTO fitnow.usuarios (nome, cpf, email, senha, perfil)
        VALUES (:nome, :cpf, :email, :senha, :perfil);';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':cpf',$cpf);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':senha',$senha);
        $stmt->bindParam(':perfil',$perfil);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }

    public function getById($id){
        $query = 'SELECT * FROM fitnow.usuarios WHERE idUsuario = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;
        return $row;
    }

    public function delete($id){
        $query = 'DELETE FROM fitnow.usuarios WHERE idUsuario = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $result = $stmt->rowCount();
        $this->dbh = null;
        return $result;
    }
}