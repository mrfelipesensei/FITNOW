<?php

require_once __DIR__ ."/../databases/conexao.php";

class AcademiaDAO{
    private $dbh;

    public function __construct(){
        $this->dbh = Conexao::getConexao();
    }

    public function getAll(){
        $query = "SELECT * FROM fitnow.academias;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;
        return $rows;
    }

    public function new($nome,$cnpj,$horarios,$bairro,$modalidades,$valores){
        $query = 'INSERT INTO fitnow.academias (nome, cnpj, horarios, bairro, modalidades, valores)
        VALUES (:nome, :cnpj, :horarios, :bairro, :modalidades, :valores);';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':horarios', $horarios);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':modalidades', $modalidades);
        $stmt->bindParam(':valores', $valores);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }
}










