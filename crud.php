<?php

if(!isset($_SESSION)){
    session_start();
}
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
function salvar($cod, $prod, $quant, $price, $desc, $rev, $alt, $larg, $comp, $diam, $peso, $marca, $cat, $foto) {
    $link = abreConexao();
    $query = "call insere_produto('$cod','$prod','$quant', '$price', '$desc', '$rev', '$alt', '$larg', '$comp', '$diam', '$peso', '$marca', '$cat', '$foto')";
    if ($result = mysqli_query($link, $query)) {
        $result = mysqli_fetch_assoc($result);
        if(isset($result['FALSE'])){
            $_SESSION['cond_prod']['cadastro_existente'] = false;
            return false;
        }
        return true;
    }
    return false;
}

function buscar($prod) {
    $link = abreConexao();

    $query = "select * from tb_produto where nome_produto like '%$prod%'";
    $result = mysqli_query($link, $query);
    $arrayProduto = array();
    while($produto = mysqli_fetch_row($result)) {
        array_push($arrayProduto, $produto);
    }

    return $arrayProduto;
}

function buscarId($id) {
    $link = abreConexao();

    $query = "select * from tb_produto where id_produto = $id";
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

function produto_index(){
    $link = abreConexao();

    $query = "select * from produto_index";
    $result = mysqli_query($link, $query);
    $arrayIndex = array();
    while($produto = mysqli_fetch_assoc($result)) {
        array_push($arrayIndex, $produto);
    }

    return $arrayIndex;

}

function produto_index_cat($cat){
    $link = abreConexao();

    $query = "select * from produto_index where categoria = '$cat'";
    $result = mysqli_query($link, $query);
    $arrayIndex = array();
    while($produto = mysqli_fetch_assoc($result)) {
        array_push($arrayIndex, $produto);
    }

    return $arrayIndex;

}

function getCategoria(){
    $link = abreConexao();

    $query = "select nome_cat from tb_categoria";
    $result = mysqli_query($link, $query);
    $arrayCat = array();
    while($categoria = mysqli_fetch_assoc($result)) {
        array_push($arrayCat, $categoria);
    }
    foreach($arrayCat as $key => $value){
        $arrayCat[$key] = ucfirst($value['nome_cat']);
    }
    array_multisort($arrayCat, SORT_ASC, SORT_STRING);
    return $arrayCat;
}
