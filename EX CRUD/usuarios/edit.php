<?php
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/nav.php";

require_once __DIR__ . '/../src/dao/usuariodao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;
$dao = new UsuarioDAO();
$usuario = $dao->getById($id);

if (!$usuario) {
    header('location: index.php?error=Usuário não encontrado!');
    exit;
}
?>
<main>

    <h1>Novo Usuário</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <label>E-mail</label><br>
        <input type="email" name="email" placeholder="Informe seu e-mail." size="80" required autofocus value="<?= htmlspecialchars($usuario['email']) ?>"><br>
        <label>Nome</label><br>
        <input type="text" name="nome" placeholder="Informe seu nome." size="80" required value="<?= htmlspecialchars($usuario['nome']) ?>"><br>
        <label>Status</label><br>
        <select name="status">
            <option value="1">ATIVO</option>
            <option value="0">INATIVO</option>
        </select><br>
        <label>Perfil</label><br>
        <select name="perfil">
            <option value="1">ADMINISTRADOR</option>
            <option value="2">GERENTE</option>
        </select>
        <br>
        <button class="btn" type="submit">Salvar</button>
    </form>
</main>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>