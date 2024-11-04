document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita o envio do formulário padrão

    const email = event.target.email.value;
    const password = event.target.password.value;

    // Validação básica
    if (email === "" || password === "") {
        displayMessage("Por favor, preencha todos os campos.");
    } else {
        // Simulação de envio de dados
        displayMessage("Formulário enviado com sucesso!");
        // Aqui você poderia fazer uma chamada AJAX para enviar os dados para o servidor
    }

    // Limpa os campos após a submissão
    event.target.reset();
});

function displayMessage(msg) {
    const messageDiv = document.getElementById("message");
    messageDiv.textContent = msg;
    messageDiv.classList.remove("hidden");

    // Oculta a mensagem após 3 segundos
    setTimeout(() => {
        messageDiv.classList.add("hidden");
    }, 3000);
}
