<!DOCTYPE html>

<html lang="pt-BR">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="assets/styles.css">

        <script>
            function criaModal(titulo, descricao)
            {
                const modal = new bootstrap.Modal(document.getElementById('modal'));
                document.getElementById('titulo-modal').innerHTML = titulo;
                document.getElementById('corpo-modal').innerHTML = descricao;
                return modal;
            }
        </script>
        
        <title>Editar chamado</title>
        
    </head>

    <body onload="verificaCamposAbrirChamado()">

        <?php
            require_once('scripts/bd_scripts.php');
            require_once('scripts/valida_sessao.php');
            include_once('assets/navbar.php');
            include_once('assets/modal.php');

            $bd = new BD();
            
            if(isset($_GET['indice'])) // Pega o indice do chamado selecionado, caso não existir volta para a página de consulta de chamados
            {
                define('INDICE_SELECIONADO', $_GET['indice']);

                $chamado_selecionado = $bd->selecionarChamado(INDICE_SELECIONADO);
            }
            else 
            {
                header('Location: consultar_chamado.php?status=2');
            }
            
            if(isset($_GET['status'])) // Verifica se foi redirecionado para essa página e qual é o status do redirecionamento
            {
                $status = $_GET['status'];
            }

        ?>
        
        <form action="scripts/editar_chamado.php" method="POST" class="container mt-5 form-control p-5 bg-light text-dark">
            <h1 class="mb-3">Edição de chamado</h1>
            <input id="indice" class="form-control" name="indice" style="display: none;">
            <label class="form-label">Titulo</label>
            <input id="titulo" class="form-control" name="titulo" type="text" placeholder="Ex: Impressora não liga">
            <label class="form-label">Tipo</label>
            <select id="tipo" class="form-control" name="tipo" required>
                <option disabled="disabled" selected="selected" option="">Selecione uma opção</option>
                <option value="Hardware">Hardware</option>
                <option value="Impressora">Impressora</option>
                <option value="Rede">Rede</option>
                <option value="Outros">Outros</option>
            </select>
            <label class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="5" placeholder="Ex: Ao apertar o botão de ligar, a impressora não liga..." required></textarea>
            <button class="btn btn-success mt-3" type="submit">Alterar chamado</button>
        </form>

        <?php if (isset($_GET['indice'])): // Coloca os valores dos campos correspondentes do chamado ?>
            <script>
                document.addEventListener('DOMContentLoaded', function ()
                {
                    document.getElementById('indice').value = "<?= $chamado_selecionado[0][0] ?>";
                    document.getElementById('titulo').value = "<?= $chamado_selecionado[0][1] ?>";
                    document.getElementById('tipo').value = "<?= $chamado_selecionado[0][2] ?>";
                    document.getElementById('descricao').value = "<?= $chamado_selecionado[0][3] ?>";
                })
            </script>
        
        <?php endif ?>

        <?php if (isset($status)): // Se foi redirecionado para essa página, mostra um modal por status ?>
            <?php if ($status === '0'): ?> 
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        modal = criaModal('Erro ao salvar', 'Preencha todos os campos antes de enviar o chamado!');
                        modal.show();
                    })
                </script>
            <?php endif; ?>
        <?php endif; ?> 

    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="assets/scripts.js"></script>

</html>
