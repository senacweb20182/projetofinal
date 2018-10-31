<?php

session_start();
require_once 'conexao.php';

function cadastroCliente($nome,$email,$login,$senha,$data_nasc,$cpf, $telefone) {
    
    $link = abreConexao();
    $query = "insert into tb_usuarios(nome,email, login, senha, data_nasc,cpf, celular) values ('$nome', '$email', '$login', '$senha', '$data_nasc', '$cpf', '$telefone')";

    if (mysqli_query($link, $query)) {
        return true;
    }

    return false;
}

function buscar($prod) {
    $link = abreConexao();


    $query = "select * from tb_produtos where produto like '$prod'";

    $result = mysqli_query($link, $query);

    if (mysqli_error($link)) {
        $_SESSION['error'] = 'falha ao gravar';
    }
    return mysqli_fetch_assoc($result);
}

function atualizar($prod, $foto, $quant, $price, $custo, $desc, $rev, $id) {
    $link = abreConexao();

    $query = "update tb_produtos 
                    set produto = '$prod', foto = '$foto', quantidade = '$quant', preco = '$price', custo = '$custo', descricao = '$desc', review = '$rev'"
            . " where id='$id'";


    if (mysqli_query($link, $query)) {
        return true;
    }

    return false;
}
