<?php
    require_once 'crud.php';
    # inicia a sessão no arquivo
    session_start();


    if($_POST) {

        $prod = filter_input(INPUT_POST, "prod", FILTER_SANITIZE_STRING);
        $foto = filter_input(INPUT_POST, "foto", FILTER_SANITIZE_STRING);
        $desc = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_STRING);
        $rev = filter_input(INPUT_POST, "rev", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
        $custo = filter_input(INPUT_POST, "custo", FILTER_SANITIZE_NUMBER_INT);
        $quant = filter_input(INPUT_POST, "quant", FILTER_SANITIZE_NUMBER_INT);
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        
       

       
        
        if (atualizar($prod, $foto, $quant, $price, $custo, $desc, $rev, $id)){
            // cria a sessão e define valor a ela
            $_SESSION['msg'] = true;
        }else {
            $_SESSION['msg'] = false;
        }
        
        header("location:consulta.php");
    }
    