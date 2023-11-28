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

    public function new($nome,$cnpj,$horarios,$modalidades,$valores,$cep,$bairro,$complemento,$numero){
        $query = 'INSERT INTO fitnow.academias (nome, cnpj, horarios, modalidades, valores, cep, bairro, complemento, numero)
        VALUES (:nome, :cnpj, :horarios, :modalidades, :valores, :cep, :bairro, :complemento, :numero);';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':horarios', $horarios);
        $stmt->bindParam(':modalidades', $modalidades);
        $stmt->bindParam(':valores', $valores);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':numero', $numero);

        
        $stmt->execute();
        $idAcademia =$this->dbh->lastInsertId();
        return  $idAcademia;
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

    public function newAcademiaByUser($idUsuario,$idAcademia){
        $query = 'INSERT INTO fitnow.usuario_academia (idUsuario, idAcademia)
        VALUES (:idUsuario, :idAcademia);';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':idAcademia', $idAcademia);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }
    
    public function getAcademiaByIdUser($idUsuario){
        $query = 'SELECT usuario_academia.idUsuario, usuario_academia.idAcademia, 
                    academias.cnpj, academias.nome as nomeAcademia,
                    academias.valores, academias.horarios, academias.modalidades, academias.cep, academias.bairro, academias.complemento, academias.numero,
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

    public function update($id, $nome, $cnpj, $horarios, $modalidades, $valores, $cep, $bairro, $complemento, $numero){
        $query = 'UPDATE fitnow.academias SET
        nome = :nome,
        cnpj = :cnpj,
        horarios = :horarios,
        modalidades = :modalidades,
        valores = :valores,
        cep = :cep,
        bairro = :bairro,
        complemento = :complemento,
        numero = :numero
        WHERE idAcademia = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam('cnpj',$cnpj);
        $stmt->bindParam(':horarios',$horarios);
        $stmt->bindParam(':modalidades',$modalidades);
        $stmt->bindParam(':valores',$valores);
        $stmt->bindParam(':cep',$cep);
        $stmt->bindParam(':bairro',$bairro);
        $stmt->bindParam(':complemento',$complemento);
        $stmt->bindParam(':numero',$numero);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }

    // public function getByModal($modalidades){
    //     $sql = "SELECT * FROM `academias` WHERE modalidades LIKE \'%Luta%\';";

    //     $stmt = $this->dbh->prepare($sql);
    //     $stmt->bindParam(':modalidades',$modalidades);
    //     $stmt->execute();

    //     $rows = $stmt->fetchAll();
    //     $this->dbh = null;
    //     return $rows;

    // }

    // public function getByModal($modalidades){
    //     // Constructing placeholders for the IN clause
    //     $placeholders = rtrim(str_repeat('?,', count($modalidades)), ',');
        
    //     $query = "SELECT * FROM `academias` WHERE modalidades LIKE \'%  $placeholders  %\';";
        
    //     $stmt = $this->dbh->prepare($query);
    //     $stmt->execute($modalidades); // Executing the prepared statement with the array of modalities
        
    //     $rows = $stmt->fetchAll();
    //     return $rows;
    // }

    public function getByModal($modalidades){
        // Construindo placeholders para a claúsula IN
        $placeholders = rtrim(str_repeat('?,', count($modalidades)), ',');
        
        // Construindo uma consulta com LIKE para cada substring nas modalidades
        $query = 'SELECT * FROM fitnow.academias WHERE modalidades LIKE ?';
        for ($i = 1; $i < count($modalidades); $i++) {
            $query .= ' OR modalidades LIKE ?';
        }
        
        // Preparando a query e criando array que receberá as variáveis
        $stmt = $this->dbh->prepare($query);
        $params = array();
        foreach ($modalidades as $mod) {
            $params[] = "%$mod%";
        }
        
        $stmt->execute($params); // Executando a instrução preparada com o array de modalidades
        
        $rows = $stmt->fetchAll();
        return $rows;
    }

    //Construindo lógica de consulta por bairro
    public function getByBairro($bairro){
        // Construindo placeholders para a claúsula IN
        $placeholders = rtrim(str_repeat('?,', count($bairro)), ',');
        
        // Construindo uma consulta com LIKE para cada substring nas modalidades
        $query = 'SELECT * FROM fitnow.academias WHERE bairro LIKE ?';
        for ($i = 1; $i < count($bairro); $i++) {
            $query .= ' OR bairro LIKE ?';
        }
        
        // Preparando a query e criando array que receberá as variáveis
        $stmt = $this->dbh->prepare($query);
        $params = array();
        foreach ($bairro as $bair) {
            $params[] = "%$bair%";
        }
        
        $stmt->execute($params); // Executando a instrução preparada com o array de modalidades
        
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    // public function getByValor($valor){
    //     // Construindo placeholders para a claúsula IN
    //     $placeholders = rtrim(str_repeat('?,', count($valor)), ',');
        
    //     // Construindo uma consulta com LIKE para cada substring nas modalidades
    //     $query = 'SELECT * FROM fitnow.academias WHERE valores LIKE ?';
    //     for ($i = 1; $i < count($valor); $i++) {
    //         $query .= ' OR valores LIKE ?';
    //     }
        
    //     // Preparando a query e criando array que receberá as variáveis
    //     $stmt = $this->dbh->prepare($query);
    //     $params = array();
    //     foreach ($valor as $val) {
    //         $params[] = "%$val%";
    //     }
        
    //     $stmt->execute($params); // Executando a instrução preparada com o array de modalidades
        
    //     $rows = $stmt->fetchAll();
    //     return $rows;
    // }

    public function getByIntervalo($min, $max){
        $query = 'SELECT * FROM fitnow.academias WHERE valores BETWEEN ? AND ?';
        
        $stmt = $this->dbh->prepare($query);
        $stmt->execute([$min, $max]);
        
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    public function getByNome($nome){
        // Construindo placeholders para a claúsula IN
        $placeholders = rtrim(str_repeat('?,', count($nome)), ',');
        
        // Construindo uma consulta com LIKE para cada substring nas modalidades
        $query = 'SELECT * FROM fitnow.academias WHERE nome LIKE ?';
        for ($i = 1; $i < count($nome); $i++) {
            $query .= ' OR nome LIKE ?';
        }
        
        // Preparando a query e criando array que receberá as variáveis
        $stmt = $this->dbh->prepare($query);
        $params = array();
        foreach ($nome as $nom) {
            $params[] = "%$nom%";
        }
        
        $stmt->execute($params); // Executando a instrução preparada com o array de modalidades
        
        $rows = $stmt->fetchAll();
        return $rows;
    }
}











