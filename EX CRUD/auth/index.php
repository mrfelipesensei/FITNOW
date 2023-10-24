<?php
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/nav.php";
?>
<main>

    <h1>Login</h1>

    <?php if (isset($_GET['msg']) || isset($_GET['error'])) : ?>
        <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
            <p><?= $_GET['msg'] ?? $_GET['error'] ?></p>
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label>E-mail</label><br>
        <input type="email" name="email" placeholder="Informe seu email." size="100" required autofocus><br>

        <label>Password</label><br>
        <input type="password" name="password" placeholder="Informe seu password." required><br>

        <button class="btn" type="submit">Log in</button>
    </form>
</main>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>