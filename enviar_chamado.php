<?php

    $arquivo = fopen('chamados.txt', 'a');

    $titulo = str_replace('|', '-', $_POST['titulo']);
    $tipo = str_replace('|', '-', $_POST['tipo']);
    $descricao = str_replace('|', '-', $_POST['descricao']);

    if ($titulo === '' || $tipo === '' || $descricao === '') {
        header("Location: abrir_chamado.php?status=0");
    }
    else {
        $chamado = $titulo . "|" . $tipo . "|" . $descricao . PHP_EOL;

        fwrite($arquivo, $chamado);

        fclose($arquivo);

        header("Location: abrir_chamado.php?status=1");
    }

?>
