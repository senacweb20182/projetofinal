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
    $query = "call insere_contato('$nome', '$email', '$login', '$senha', '$data_nasc', '$cpf', '$telefone', '$cep', '$bairro', '$cidade', '$rua', '$numero', '$complemento')";
    if ($result = mysqli_query($link, $query)) {
        $result = mysqli_fetch_assoc($result);
        if(isset($result['FALSE'])){
            $_SESSION['cond_cli']['cadastro_existente'] = true;
            return false;
        }
        return true;
    }
    return false;
}
//pcod int(11), pnome varchar(45), pqtd int(11), pvenda float, pdesc varchar(100), pdescc varchar(200), pa varchar(4), pl varchar(4), pc varchar(4), pd varchar(4), pp varchar(4), pmarca varchar(50), pcategoria varchar(50))

function salvar($cod, $prod, $quant, $price, $desc, $rev, $alt, $larg, $comp, $diam, $peso, $marca, $cat) {
    $link = abreConexao();
    $query = "call insere_produto('$cod','$prod','$quant', '$price', '$desc', '$rev', '$alt', '$larg', '$comp', '$diam', '$peso', '$marca', '$cat')";
    if ($result = mysqli_query($link, $query)) {
        $result = mysqli_fetch_assoc($result);
        if(isset($result['FALSE'])){
            $_SESSION['cond_prod']['cadastro_existente'] = true;
            return false;
        }
        return true;
    }
    return false;
}

function buscar($prod) {
    $link = abreConexao();

    $query = "select * from tb_produtos where produto like '%$prod%'";
    $result = mysqli_query($link, $query);
    $arrayProduto = array();
    while($produto = mysqli_fetch_row($result)) {
        array_push($arrayProduto, $produto);
    }

    return $arrayProduto;
}

function buscarId($id) {
    $link = abreConexao();

    $query = "select * from tb_produtos where id = $id";
    $result = mysqli_query($link, $query);
    if(mysqli_error($link)) {
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
