<?php
    $usuario_autenticado = false;
    session_start();
    $_SESSION['autenticado'] = 'nao';

    $contas_cadastradas = 
    [
        ['id_usuario' => '0',  'email' => 'teste@helpdesk.com', 'senha' => 'admin', 'tipo_usuario' => '0'],
        ['id_usuario' => '1', 'email' => 'usuario@hotmail.com', 'senha' => '12345', 'tipo_usuario' => '1'],
        ['id_usuario' => '2', 'email' => 'usuarioteste@outlook.com', 'senha' => 'teste', 'tipo_usuario' => '1'],
    ];

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    foreach($contas_cadastradas as $id => $conta)
    {
        if ($conta['email'] == $email && $conta['senha'] == $senha) {
            $usuario_autenticado = true;
            $_SESSION['id_usuario'] = $conta['id_usuario'];
            $_SESSION['tipo_usuario'] = $conta['tipo_usuario'];
        }
    }

    if ($usuario_autenticado)
    {
        $_SESSION['autenticado'] = 'sim';
        header('Location: ..\home.php');
    } else
    {
        $_SESSION['autenticado'] = 'nao';
        header('Location: ..\index.php?login=erro1');
    }
?>
