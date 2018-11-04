<?php

session_start();
require_once 'conexao.php';

function efetuarLogin($login, $senha){ //já funcional com o banco on-line
    $link = abreConexao();

    $query = "select nome, permissao from perfil_usuario where login = '$login' and senha = '$senha'";
    $result = mysqli_query($link, $query);
    
    $result = mysqli_fetch_assoc($result);
    
    return $result;
}

function cadastroCliente($nome, $email, $login, $senha, $data_nasc, $cpf, $telefone, $cep, $bairro, $cidade, $rua, $numero, $complemento){
//necessita atualização com o banco online
    
    $link = abreConexao();
    $query = "call insere_contato('$nome', '$email', '$login', '$senha', '$data_nasc', '$cpf', '$telefone', '$cep', '$bairro', '$cidade', '$rua', '$numero', '$complemento'");

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
