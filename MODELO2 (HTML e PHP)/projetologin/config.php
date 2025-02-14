<?php
// Dados de servidor local
$host = "localhost";
$port = "5432";
$dbname = "anderson";
$user = "postgres";
$password = "admin3107";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>