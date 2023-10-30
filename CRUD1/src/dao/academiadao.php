<?php
require_once __DIR__ ."/../databases/conexao.php";

class AcademiaDAO{
    private $dbh;

    public function __construct() {
        $this->dbh = Conexao::getConexao();
    }

    public function getAll(){
        $query = "SELECT * FROM fitnowbd.academia;";

        $stmt = $this->dbh->prepare($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;
        return $rows;
    }

    public function getById($id){
        $query = "SELECT * FROM fitnowbd.academia WHERE idAcademia = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;
        return $row;

    }

}