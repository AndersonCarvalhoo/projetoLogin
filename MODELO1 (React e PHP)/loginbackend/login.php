<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

session_start();

require 'config.php';

// Recebe os dado enviados pelo front
$data = json_decode(file_get_contents("php://input"));

// Verifica se recebeu os dados, email e senha. (O front sempre manda os dois no submit, essa condição é para caso não mande por algum motivo)
if (!$data || !isset($data->email) || !isset($data->password)) {
    echo json_encode(["success" => false, "message" => "Dados inválidos"]);
    exit;
}

//Armazena os dados de email e password nas variáveis
$email = $data->email;
$password = $data->password;

$stmt = $pdo->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user['senha'])) {
    echo json_encode(["success" => false, "message" => "Credenciais inválidas"]);
    exit;
}

$_SESSION['user_id'] = $user['id'];
echo json_encode(["success" => true]);
?>
