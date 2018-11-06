<?php

// Host	er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com
// Username	o1fznc6tpz06fr23
// Password	vk8q4jxv45pw42su
// Port	3306
// Database	eat5kphk6ver00sk

define("HOST", "er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com");
define("USERNAME", "o1fznc6tpz06fr23");
define("DATABASE", "eat5kphk6ver00sk");

function abreConexao() {
    $link = mysqli_connect(HOST, USERNAME, "vk8q4jxv45pw42su", DATABASE, "3306");
    mysqli_set_charset($link, "utf8");
    return $link;
}

$conexao = abreConexao();

if (!$conexao) {
    echo "Falha ao abrir a conexão sob erro número" . PHP_EOL;
    echo "Código do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "A mensagem do erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
