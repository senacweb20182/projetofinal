<?php
  

    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DB", "db_projeto");

    function abreConexao() {

        $link = mysqli_connect(HOST, USER, PASS , DB, "3306");
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
