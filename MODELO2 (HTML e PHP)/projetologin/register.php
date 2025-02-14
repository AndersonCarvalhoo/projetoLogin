<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Validar se os campos foram preenchidos
    if (empty($email) || empty($senha)) {
        $mensagem = "Preencha todos os campos.";
    } else {
        // Gerar o hash da senha usando BCRYPT
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

        // Verificar se o e-mail já está cadastrado
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);

        if ($stmt->fetch()) {
            $mensagem = "Já existe uma conta cadastrada com esse email";
        } else {
            // Inserir no banco
            $sql = "INSERT INTO usuarios (email, senha) VALUES (:email, :senha)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute(['email' => $email, 'senha' => $senha_hash])) {
                $mensagem = "Conta criada com sucesso";
            } else {
                $mensagem = "Erro ao criar conta, entre em contato com o suporte";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">Criar Conta</h3>
                <?php if (isset($mensagem)) : ?>
                    <div class="alert alert-info text-center"><?php echo $mensagem; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                    <div class="text-center mt-3">
                        <span>Já possuí conta? <a href="index.php">Logar-se</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>