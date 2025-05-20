const PARAMS = new URLSearchParams(window.location.search) /* Construtor que pega os valores vindo de GET e POST da página */;

campo_email = document.getElementById('email');
campo_senha = document.getElementById('senha')

if (PARAMS.get('login') === 'erro1' || PARAMS.get('login') === 'erro2') {
    campo_email.style = 'border: 2px solid red;'
    campo_senha.style = 'border: 2px solid red;'
}
