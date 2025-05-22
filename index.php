<!DOCTYPE html>

<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="styles.css">
        <script src="scripts.js"></script>

        <title>Login</title>
        
    </head>

    <body onload="verificaCamposLogin()">
        
        <?php
            include_once("assets/navbar.php");

            if (isset($_GET['login'])) {
                $erro_login = $_GET['login'];
            }
        ?>

        <div class="container mt-5" id="pagina-login">
            <form id="form-login" action="valida_formulario.php" method="POST">
                <h1 class="mb-5 text-center">Login</h1>
                <div class="row mt-2">
                    <label class="form-label">Email:</label>
                    <input id='email' name="email" type="email" class="form-control">
                </div>
                <div class="row mt-2">
                    <label class="form-label">Senha:</label>
                    <input id='senha' name="senha" type="password" class="form-control">
                </div>

                <?php if (isset($erro_login) && $erro_login === 'erro1'): ?>
                <div class="text-danger text-center mt-2" style="font-weight:bold;">Usuário ou senha incorretos!</div>

                <?php elseif(isset($erro_login) && $erro_login === 'erro2'): ?>
                <div class="text-danger text-center mt-2" style="font-weight:bold;">Faça login para continuar a acessar o site!</div>
                <?php endif; ?>

                <div class="row mt-2">
                    <button class="btn btn-success form-control mt-3 ">Login</button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    </body>

</html>
