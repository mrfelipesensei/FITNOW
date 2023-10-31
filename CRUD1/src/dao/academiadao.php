<?php
require_once __DIR__ . '/../databases/conexao.php';

class AcademiaDAO{
    private $dbh;

    public function __construct() {
        $this->dbh = Conexao::getConexao();
    }

    public function getAll(){
        $query = "SELECT * FROM fitnowbd.academia;";

        $stmt = $this->dbh->query($query);
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

    public function new($nome,$cnpj,$horarios,$modalidades,$valores,$fotos){
        $query = 'INSERT INTO fitnowbd.academia (nome, cnpj, horarios, modalidades, valores, fotos)
        VALUES (:nome, :cnpj, :horarios, :modalidades, :valores, :fotos);';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':cnpj',$cnpj);
        $stmt->bindParam(':horarios',$horarios);
        $stmt->bindParam(':modalidades',$modalidades);
        $stmt->bindParam(':valores',$valores);
        $stmt->bindParam(':fotos',$fotos);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }
}