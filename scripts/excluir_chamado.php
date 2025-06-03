<?php

    require_once('bd_scripts.php');

    define('INDICE_EXCLUSAO', $_POST['excluir']);

    $bd = new BD();
    $excluir = $bd->excluirChamado(INDICE_EXCLUSAO);

    echo $excluir;

    if ($excluir)
    {
        header('Location: ../consultar_chamado.php?status=1');

    }
    else 
    {
        header('Location: ../consultar_chamado.php?status=0');
    }
    
?>