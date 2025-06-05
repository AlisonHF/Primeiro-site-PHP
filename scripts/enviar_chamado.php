<?php
    require_once('bd_scripts.php');

    $titulo = $_POST['titulo'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];

    $bd = new BD();
    $bd->adicionarChamado($titulo, $tipo, $descricao);

?>
