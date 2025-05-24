<?php 

    session_start();

    // Limpa a variável de sessão
    session_destroy();

    header("Location: ../index.php");

?>
