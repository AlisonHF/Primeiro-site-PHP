<!DOCTYPE html>

<html lang="pt-BR">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="styles.css">

        <title>Login</title>
        
    </head>

    <body>

        <?php
            include_once('valida_sessao.php');
        ?>
        
        <nav class="navbar navbar-expand-sm" style="background-color: #DCDCDC;">
            <div class="container-fluid">

                <ul class="navbar-nav">
                    <a class="navbar-brand"><i class="bi bi-tools" href="home.php"></i> HelpDesk</a>
                    <li class="nav-item">
                        <a class="nav-link" href="abrir_chamado.php">Enviar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="consultar_chamado.php">Consultar</a>
                    </li>
                    <li class="nav-item" id="logoff">
                        <a class="nav-link" href="sair_sessao.php" style="font-weight: bold;"><i class="bi bi-box-arrow-right"></i> Sair</a>
                    </li>
                </ul>

            </div>
        </nav>

        <div>
            
            <form action="enviar_chamado.php" method="POST" class="container mt-3 form-control p-5">
                <h1 class="mb-3">Formulário de chamado</h1>
                <label class="form-label">Titulo</label>
                <input class="form-control" name="titulo" type="text" placeholder="Ex: Impressora não liga">
                <label class="form-label">Tipo</label>
                <select class="form-control" name="tipo">
                    <option disabled="disabled" selected="selected">Selecione uma opção</option>
                    <option value="Hardware">Hardware</option>
                    <option value="Impressora">Impressora</option>
                    <option value="Rede">Rede</option>
                    <option value="Outros">Outros</option>
                </select>
                <label class="form-label">Descrição</label>
                <textarea name="descricao" type="text" class="form-control" rows="5" placeholder="Ex: Ao apertar o botão de ligar, a impressora não liga..."></textarea>
                <button class="btn btn-success mt-3" type="submit">Enviar chamado</button>
            </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    
    </body>

</html>
