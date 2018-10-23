<?php
    session_start();

    function abreConexao() {
        $link = mysqli_connect("localhost", "root", "" , "projeto", "3306");
        mysqli_set_charset($link, "utf8");
        return $link;
    }

    $conexao = abreConexao();

    if(!$conexao) {
        echo "Falha ao abrir a conexão sob erro número" . PHP_EOL; 
        echo "Código do erro: " . mysqli_connect_errno() . PHP_EOL;
        echo "A mensagem do erro: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
