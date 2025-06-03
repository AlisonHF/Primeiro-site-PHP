<!DOCTYPE html>

<html lang="pt-BR">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="assets/styles.css">

        <title>Consultar chamados</title>

        <script>
            function criaModal(titulo, descricao)
            {
                const modal = new bootstrap.Modal(document.getElementById('modal'));
                document.getElementById('titulo-modal').innerHTML = titulo;
                document.getElementById('corpo-modal').innerHTML = descricao;
                return modal;
            }

        </script>
        
    </head>

    <body>

        <?php 
            require_once('scripts/valida_sessao.php');
            include_once('assets/navbar.php');
            include_once('assets/modal.php');
            require_once('scripts/bd_scripts.php');

            $bd = new BD($_SESSION['id_usuario']);

            if(isset($_GET['status']))
            {
                $status = $_GET['status'];
            } 

            $chamados_filtrados = $bd->pegarListaChamados(true, $_SESSION['tipo_usuario']);
            
        ?>

        <h1 class="text-center m-5">Consulta de chamados</h1>

        <hr class="linha-divisoria">

        <main>

            <?php if (empty($chamados_filtrados)): ?>
                <h4 class="text-center"><p class="mt-3"><i class="bi bi-emoji-smile-fill" style="font-size: 48px"></i></p> Sem chamados em aberto...</h4>
            
            <?php else: ?>

                <?php foreach($chamados_filtrados as $chamado): ?>
                    <section>
                        <form method="POST" action="scripts/excluir_chamado.php">
                            <div class="card m-3 bg-dark" data-bs-theme="dark">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $chamado[1] ?></h5>
                                    <h6 class="card-subtitle mb-2"><?= $chamado[2] ?></h6>
                                    <p class="card-text"><?= $chamado[3] ?></p>
                                    <button name='excluir' value=<?= $chamado[0] ?> class="btn btn-danger mt-2"><i class="bi bi-x-octagon" style="font-size: 20px;"></i></button>
                                </div>
                            </div>
                        </form>
                    </section>
                <?php endforeach ?>
            
            <?php endif ?>

        </main>

        <?php if (isset($status)): ?>
            <?php if ($status === '0'): ?> 
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        modal = criaModal('Erro ao excluir', 'Ocorreu um erro ao excluir, reinicie a página e realize a exclusão novamente');
                        modal.show();
                    })
                </script>
            <?php elseif ($status === '1'): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        modal = criaModal('Exclusão confirmada','O seu chamado foi excluido com sucesso!' );
                        modal.show()
                    })
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    
        <script src="assets/scripts.js"></script>
    </body>

</html>
