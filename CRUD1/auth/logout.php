<?php
  session_start();

  $usuario = $_SESSION['usuarios'] ?? null;
  if (!$usuario) {
    unset($_SESSION['usuarios']);  
  }
  session_destroy();
  exit;