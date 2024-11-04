<?php
// Configurações do banco de dados
$servername = "pi4nads-si.mysql.database.azure.com";
$username = "piadmin";
$password = "admin123!";
$dbname = "usuarios";

// Habilitar exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die(json_encode(['error' => "Conexão falhou: " . $conn->connect_error]));
}

// Definir o cabeçalho para JSON
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash da senha
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

    // Preparar e vincular
    $stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
    
    if (!$stmt) {
        die(json_encode(['error' => "Erro na preparação da declaração: " . $conn->error]));
    }

    $stmt->bind_param("ss", $email, $hashed_password);

    // Executar a consulta
    if ($stmt->execute()) {
        echo json_encode(['message' => 'Dados inseridos com sucesso!']);
    } else {
        echo json_encode(['error' => 'Erro ao inserir dados: ' . $stmt->error]);
    }

    // Fechar a declaração
    $stmt->close();
}

// Fechar conexão
$conn->close();
?>
