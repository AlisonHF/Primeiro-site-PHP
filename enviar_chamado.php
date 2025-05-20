<?php

    $dados = $_POST;

    foreach($dados as $id => $dado) {
        echo $id . " / " . $dado . "<br/>";
    }

?>