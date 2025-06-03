<?php
    require_once('bd_scripts.php');

    session_start();

    $id_usuario = $_SESSION['id_usuario'];
    $titulo = $_POST['titulo'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];

    $bd = new BD($id_usuario);
    $bd->adicionarChamado($titulo, $tipo, $descricao);

?>
