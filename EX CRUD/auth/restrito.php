<?php

    $usuario = $_SESSION['usuario'] ?? null;
    if (!$usuario) {
        session_destroy();
        header("location: ../auth/index.php?error=Usuário sem permissão!");
        exit;
    }