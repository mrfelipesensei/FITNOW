<?php
require_once __DIR__ ."/../databases/conexao.php";


class AcademiaUsuarioDAO{
    private $dbh;

    public function __construct(){
        $this->dbh = Conexao::getConexao();
    }

    public function getAll(){
        $query = "SELECT * FROM fitnow.academia_usuario;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;
        return $rows;
    }

    public function show(){
        $query = "SELECT * FROM fitnow.academias, academia_usuario
        WHERE academias.idAcademia = academia_usuario.idacademia
        ORDER BY nome";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;
        return $rows;
    }
    
}
