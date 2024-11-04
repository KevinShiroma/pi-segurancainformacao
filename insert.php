<?php
// Configurações do banco de dados
$servername = "pi4nads-si.mysql.database.azure.com";
$username = "piadmin";
$password = "admin123!";
$dbname = "usuarios";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar e vincular
    $stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
}

// Fechar conexão
$conn->close();
?>
