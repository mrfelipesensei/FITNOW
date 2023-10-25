<?php
require_once __DIR__ ."/../databases/conexao.php";

class PerfilDAO{

    private $db;

    public function __construct(){
        $this->dbh = Conexao::getConexao();
    }

    public function getAll(){
        $query = "SELECT * FROM fitnowbd.perfis;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;
        return $rows;
    }

    public function getById($id){
        $query = "SELECT * FROM fitnowbd.perfis WHERE idPerfil = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;
        return $row;
    }

    public function delete($id){
        $query = "DELETE FROM fitnowdb.perfis WHERE idPerfil = :id";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->rowCount();
        $this->dbh = null;
        return $result;

    }

    public function new($nome) {
        $query = "INSERT INTO fitnowbd.perfis (nome) 
        VALUES (:nome);";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(":nome", $nome);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }

    public function update($id, $nome){
        $query = "UPDATE fitnowbd.perfis SET nome = :nome WHERE idPerfil = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":id", $id);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }








}
