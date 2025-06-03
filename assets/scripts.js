// Verifica e muda de cor os campos de login
function verificaCamposLogin() {
    const PARAMS_LOGIN = new URLSearchParams(window.location.search); /* Construtor que pega os valores vindo de GET e POST da página */;

    campo_email = document.getElementById('email');
    campo_senha = document.getElementById('senha');

    if (PARAMS_LOGIN.get('login') === 'erro1' || PARAMS_LOGIN.get('login') === 'erro2') {
        campo_email.style = 'border: 2px solid red;';
        campo_senha.style = 'border: 2px solid red;';
    }
}

// Verifica e muda de cor os campos de chamado
function verificaCamposAbrirChamado() {
    const PARAMS_CHAMADO = new URLSearchParams(window.location.search);

    campo_titulo = document.getElementById('titulo');
    campo_tipo = document.getElementById('tipo');
    campo_descricao = document.getElementById('descricao');

    if (PARAMS_CHAMADO.get('status') === '0') {
        campo_titulo.style = 'border: 2px solid red;';
        campo_tipo.style = 'border: 2px solid red;';
        campo_descricao.style = 'border: 2px solid red;';
    }

    console.log(`${campo_titulo}, ${campo_tipo}, ${campo_descricao}`);
}


// Destaca a seção atual na navbar
function destacaSecaoNavbar() {
    janela_atual = window.location.pathname;

    secoes = {
        home: document.getElementById('link-home'),
        abrir: document.getElementById('link-enviar'),
        consultar: document.getElementById('link-consultar'),
    }

    if (janela_atual === '/Primeiro-site-PHP/home.php') {
        secoes.home.className += ' selecionado';
    }
    else if (janela_atual === '/Primeiro-site-PHP/abrir_chamado.php') {
        secoes.abrir.className += ' selecionado';
    }
    else if (janela_atual === '/Primeiro-site-PHP/consultar_chamado.php') {
        secoes.consultar.className += ' selecionado';
    }


    console.log('Script destacasecao ativado');
    console.log(janela_atual);
}
