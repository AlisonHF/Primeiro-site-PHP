<!DOCTYPE html>

<html lang="pt-BR">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="styles.css">

        <title>Home</title>
        
    </head>

    <body>

        <?php
            include_once('valida_sessao.php');
            include_once('assets/navbar.php');
        ?>

        <h1 class="text-center m-5">Bem vindo ao Help Desk!</h1>

        <div class="container-flex" id='menu-opcoes'>
            <div class="container opcoes">
                <a href="abrir_chamado.php" class="btn btn-success">
                    <i class="bi bi-send-fill" style="font-size: 60px;"></i>
                    <p>Enviar chamado</p>
                </a>
            </div>
            <div class="container opcoes">
                <a href="consultar_chamado.php" class="btn btn-primary">
                    <i class="bi bi-book-half" style="font-size: 60px;"></i>
                    <p>Consultar chamados</p>
                </a>
            </div>
            <div class="container opcoes">
                <a href="index.php" class="btn btn-danger">
                    <i class="bi bi-door-open" style="font-size: 60px;"></i>
                    <p>Sair</p>
                </a>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    
    </body>

</html>
