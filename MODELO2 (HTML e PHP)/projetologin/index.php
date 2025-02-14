<?php
session_start();

// Se a sessão do usuário já estiver ativa, redireciona para o dashboard
if (isset($_SESSION['user_id'])) {
  header("Location: dashboard.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/js/bootstrap.min.js">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">Login</h3>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <div class="text-danger text-center">
                        <?php
                        if (isset($_SESSION['login_error'])) {
                            echo $_SESSION['login_error'];
                            unset($_SESSION['login_error']);
                        }
                        ?>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="lembrar" name="lembrar">
                        <label class="form-check-label" for="lembrar">Manter logado</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    <div class="text-center mt-3">
                        <span>Não possui conta? <a href="register.php">Registre-se</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
