<?php

    $usuario = $_SESSION['usuarios'] ?? null;
    if (!$usuario) {
        session_destroy();
        header("location: ../auth/index.php?error=Usuário sem permissão!");
        exit;
    }
