<?php
session_start();

// Se não estiver logado, redireciona para a página de login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./bootstrap/js/bootstrap.min.js">
  <title>Document</title>
</head>
<body>
  <header>
    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        Painel do sistema de LOGIN
      </a>
    </div>
    </nav>
  </header>
  <div class="container">
    <h2>Bem vindo, <?php echo $_SESSION['user_email'];?></h2>
    <form action="logout.php">
    <button type="submit" class="btn btn-danger">Logout</button>
  </form>
  </div>
</body>
</html>