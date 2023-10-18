<?php
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/nav.php";

include_once __DIR__ . '/../src/dao/perfildao.php';

# cria a variavel $id com valor igual a 1. 
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;

# cria um objeto da classe PerfilDAO e chama método para realizar ação.
$dao = new PerfilDAO();
$perfil = $dao->getById($id);

if (!$perfil) {
    header('location: index.php?error=Perfil não encontrado!');
    exit;
}
?>

<main>

    <h1>Atualizar Perfil</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $perfil['id'] ?>">
        <label>Nome</label><br>
        <input type="text" name="nome" placeholder="Informe seu nome." size="80" required value="<?= htmlspecialchars($perfil['nome']) ?>" autofocus><br>
        <button class="btn" type="submit">Salvar</button>
    </form>
</main>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>