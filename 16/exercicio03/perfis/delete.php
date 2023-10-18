<?php
include_once __DIR__. '/../src/dao/perfildao.php';

# cria a variavel $id com valor igual a 1. 
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;

# cria um objeto da classe PerfilDAO e chama método para realizar ação.
$dao = new PerfilDAO();
$result = $dao->delete($id);


if ($result > 0) {
    header('location: index.php?msg=Perfil excluído com sucesso!');
} else {
    header('location: index.php?error=Não foi possível excluir o perfil!');
}
