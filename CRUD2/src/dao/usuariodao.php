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

    public function new($nome,$cpf,$email,$senha,$perfil,$foto_perfil){
        $query = 'INSERT INTO fitnow.usuarios (nome, cpf, email, senha, perfil, foto_perfil)
        VALUES (:nome, :cpf, :email, :senha, :perfil, :foto_perfil);';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':cpf',$cpf);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':senha',$senha);
        $stmt->bindParam(':perfil',$perfil);
        $stmt->bindParam(':foto_perfil',$foto_perfil);

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

    public function update($id, $nome, $cpf, $email, $senha, $perfil){
        $query = 'UPDATE fitnow.usuarios SET
        nome = :nome,
        cpf = :cpf,
        email = :email,
        senha = :senha,
        perfil = :perfil
        WHERE idUsuario = :id;';

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam('cpf',$cpf);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':senha',$senha);
        $stmt->bindParam(':perfil',$perfil);

        $result = $stmt->execute();
        $this->dbh = null;
        return $result;
    }

    public function atualizarFotoPerfil($userId, $foto_nome) {
        // Lógica para atualizar a foto do perfil no banco de dados
        // Substitua essas linhas pela lógica específica do seu banco de dados

        $query = "UPDATE usuarios SET foto_perfil = :foto WHERE idUsuario = :id";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':foto', $foto_nome);
        $stmt->bindParam(':id', $userId);
        
        return $stmt->execute();
    }
}
