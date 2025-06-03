<?php
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    if($_SESSION['autenticado'] === 'nao' || $_SESSION['autenticado'] === null)
    {
        header('Location: index.php?login=erro2');
    }
?>
