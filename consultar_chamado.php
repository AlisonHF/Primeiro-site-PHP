<!DOCTYPE html>

<html lang="pt-BR">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="styles.css">

        <title>Consultar chamados</title>
        
    </head>

    <body>

        <?php 
            include_once('valida_sessao.php');
            include_once('assets/navbar.php');
        ?>

        <h1 class="text-center m-5">Consulta de chamados</h1>

        <?php
            $arquivo = fopen('chamados.txt', 'r'); // Abre o arquivo 
            $chamados = array();

            while(!feof($arquivo)){
                $registro = fgets($arquivo); // Função que pega uma linha do documento
                $chamados[] = $registro;
            }

            fclose($arquivo); // Fecha o arquivo

            foreach($chamados as $chamado){
                $chamado_array = array();
                $chamado_array = explode('|', $chamado); // Divide a linha nos | e coloca cada valor em um array
                if (count($chamado_array) < 3) { // Para pular a linha em branco
                    continue;
                }
                else {
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $chamado_array[0] ?></h5>
                <h6 class="card-subtitle mb-2"><?= $chamado_array[1] ?></h6>
                <p class="card-text"><?= $chamado_array[2] ?></p>
            </div>
        </div>
        <?php }} ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    
    </body>

</html>
