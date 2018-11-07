<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST["quantity"])){
    $quant = $_POST["quantity"];
}
else{
    $quant = 1;
}

# Verifica se existe a sessão de carrinho, caso não exista é criada
if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

if(isset($_GET['acao'])) {

    # Adiciona o produto
    if($_GET['acao'] == 'add') {
        $id = intval($_POST['id_produto']);
        if(!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = $quant;
        } else {
            $_SESSION['carrinho'][$id] += $quant;
        }

        header("Location: cart.php");
        die();
    }

    # Remove o produto
    if($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);
        if(isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
        header("Location: cart.php");
        die();
    }

    # Altera quantidade
    if($_GET['acao'] == 'atu') {
        if(is_array($_POST['nome_produto'])) {
            foreach ($_POST['nome_produto'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if(!empty($qtd) || $qtd <> 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
        header("Location: product.php");
        die();
    }
}
