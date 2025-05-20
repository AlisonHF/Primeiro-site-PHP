<?php

    $usuario_autenticado = false;
    session_start();
    $_SESSION['autenticado'] = 'nao';

    $contas_cadastradas = [
        ['email' => 'teste@helpdesk.com', 'senha' => 'admin'],
        ['email' => 'usuario@hotmail.com', 'senha' => '12345'],
        ['email' => 'usuarioteste@outlook.com', 'senha' => 'teste'],
    ];

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    foreach($contas_cadastradas as $id => $conta) {
        if ($conta['email'] == $email && $conta['senha'] == $senha) {
            $usuario_autenticado = true;
        }
    }

    if ($usuario_autenticado) {
        $_SESSION['autenticado'] = 'sim';
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'nao';
        header('Location: index.php?login=erro1');
    }

?>
