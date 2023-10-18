<?php
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/nav.php";

require_once __DIR__ . '/../src/dao/perfildao.php';

# cria um objeto da classe PerfilDAO e chama método para realizar ação.
$dao = new PerfilDAO();
$perfis = $dao->getAll();

$quantidadeRegistros = count($perfis);
?>
<main>
    <h1>Perfil</h1>
    <section class="section__btn">
        <a class="btn" href="create.php">Novo</a>
    </section>

    <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
        <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
            <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
        </div>
    <?php endif; ?>

    <section>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($quantidadeRegistros == "0") : ?>
                    <tr>
                        <td colspan="3">Não existem dados cadastrados.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($perfis as $perfil) : ?>
                        <tr>
                            <td><?php echo $perfil['id']; ?></td>
                            <td><?= htmlspecialchars($perfil['nome']); ?></td>
                            <td class="td__operacao">
                                <a class="btnalterar" href="edit.php?id=<?= $perfil['id']; ?>">Alterar</a>
                                <a class="btnexcluir" href="delete.php?id=<?= $perfil['id']; ?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif;
                $dbh = null; ?>
            </tbody>
        </table>
    </section>
</main>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>