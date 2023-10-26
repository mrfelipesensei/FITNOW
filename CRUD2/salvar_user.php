<?php
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $telefone = $_POST["telefone"];

            $sql = "INSERT INTO usuarios(nome, cpf, email, senha, telefone) VALUES
            ('{$nome},{$cpf},{$email},{$senha},{$telefone}')";

            $res = $conexao->query($sql);

            break;
        case 'editar':
            # code...
            break;
        case 'excluir':
            # code...
            break;

        default:
            # code...
            break;
    }





?>