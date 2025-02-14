<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST['email']);
  $senha = trim($_POST['senha']);

  // Consulta para retornar o usuário caso o email inserido exista
  $sql = "SELECT * FROM usuarios WHERE email = :email";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['email' => $email]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Verificar se a senha inserida é == a senha do registro encontrado no banco de dados
  if ($user && password_verify($senha, $user['senha'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];

    if (isset($_POST['lembrar'])) {
      $token = bin2hex(random_bytes(16)); 
      setcookie("remember_token", $token, time() + (86400 * 30), "/"); 

      $sql = "UPDATE usuarios SET token_persistente = :token WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['token' => $token, 'id' => $user['id']]);
    }
    header("Location: dashboard.php");
    } else {
      $_SESSION['login_error'] = 'E-mail ou senha incorretos!';
      header("Location: index.php");
    }
}
?>

