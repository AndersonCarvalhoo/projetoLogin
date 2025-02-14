<?php
session_start();

// Destruir a sessão
session_unset();
session_destroy();

// Apagar o cookie de "lembrar-me", se existir
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/'); // Definindo o cookie para o passado
}

// Redirecionar para a página de login
header("Location: index.php");
exit;
?>
