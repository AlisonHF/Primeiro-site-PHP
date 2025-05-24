<?php
    session_start();

    $arquivo = fopen('../bd/chamados.txt', 'a');
    
    $id_usuario = $_SESSION['id_usuario'];
    $titulo = str_replace('|', '-', $_POST['titulo']);
    $tipo = str_replace('|', '-', $_POST['tipo']);
    $descricao = str_replace('|', '-', $_POST['descricao']);

    if ($titulo === '' || $tipo === '' || $descricao === '') {
        header("Location: ../abrir_chamado.php?status=0");
    }
    else {
        $chamado = $titulo . "|" . $tipo . "|" . $descricao . "|". $id_usuario .PHP_EOL;

        fwrite($arquivo, $chamado);

        fclose($arquivo);

        header("Location: ../abrir_chamado.php?status=1");
    }

?>
