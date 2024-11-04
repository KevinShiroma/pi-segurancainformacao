<?php
// Configurações do banco de dados
$servername = "pi4nads-si.mysql.database.azure.com";
$username = "piadmin";
$password = "admin123!";
$dbname = "usuarios";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
$email = $_POST['email'];
$password = $_POST['password'];

// Prepara e vincula
$stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password);

// Executa a consulta
if ($stmt->execute()) {
    echo "Novo registro criado com sucesso.";
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
