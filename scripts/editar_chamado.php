<?php
    require_once('bd_scripts.php');

    $bd = new BD();

    $indice = $_POST['indice'];
    $titulo = $_POST['titulo'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];

    if (empty($indice) || empty($titulo) || empty($tipo) || empty($descricao)) // Se algum campo estiver vazio, retorne para a página de edição
    {
        header("Location: ../alterar_chamado.php?status=0&indice=$indice");
    }
    else 
    {
        $alterar_registro = $bd->editarChamado($indice, $titulo, $tipo, $descricao);

        echo $alterar_registro;

        if ($alterar_registro) // Verifica se foi possível realizar a alteração e retorna para a página de consulta com o status da operação
        {
            header('Location: ../consultar_chamado.php?status=3');
        }
        else
        {
            header('Location: ../consultar_chamado.php?status=2');
        }
    }

?>
