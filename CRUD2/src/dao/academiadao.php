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

    public function new($nome,$cnpj,$horarios,$modalidades,$valores){
        $query = 'INSERT INTO fitnow.academias (nome, cnpj, horarios, modalidades, valores)
        VALUES (:nome, :cnpj, :horarios, :modalidades, :valores);';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':horarios', $horarios);
        $stmt->bindParam(':modalidades', $modalidades);
        $stmt->bindParam(':valores', $valores);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }

    public function getById($id){
        $query = 'SELECT * FROM fitnow.academias WHERE idAcademia = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;
        return $row;
    }

    public function getAcademiaByIdUser($idUsuario){
        $query = 'SELECT usuario_academia.idUsuario, usuario_academia.idAcademia, 
                    academias.cnpj, academias.nome as nomeAcademia,
                    academias.valores, academias.horarios, academias.modalidades,
                    usuarios.nome as nomeUsuario, usuarios.cpf
                    FROM `usuario_academia` 
                    INNER JOIN academias ON academias.idAcademia = usuario_academia.idAcademia
                    INNER JOIN usuarios ON usuarios.idUsuario = usuario_academia.idUsuario
                    WHERE usuarios.idUsuario = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$idUsuario);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        $this->dbh = null;
        return $rows;
    }

    public function delete($id){
        $query = 'DELETE FROM fitnow.academias WHERE idAcademia = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $result = $stmt->rowCount();
        $this->dbh = null;
        return $result;
    }

    public function update($id, $nome, $cnpj, $horarios, $modalidades, $valores){
        $query = 'UPDATE fitnow.academias SET
        nome = :nome,
        cnpj = :cnpj,
        horarios = :horarios,
        modalidades = :modalidades,
        valores = :valores
        WHERE idAcademia = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam('cnpj',$cnpj);
        $stmt->bindParam(':horarios',$horarios);
        $stmt->bindParam(':modalidades',$modalidades);
        $stmt->bindParam(':valores',$valores);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }
}











