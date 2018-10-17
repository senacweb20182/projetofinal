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
        
        

        // expressão regular - regex "PRÓXIMA AULA"

        // call da função salvar e teste com o retorno dela
        if(salvar($prod, $foto, $quant, $price, $custo, $desc, $rev)) {
            // cria a sessão e define valor a ela
            $_SESSION['msg'] = true;
        } else {
            $_SESSION['msg'] = false;
        }
        #$_SESSION['msg'] = salvar($nome, $numero) ? 'Salvo com sucesso' : 'Erro ao gravar';
        
        # função responsavel por redirecionar a página
      header("location:index.php");
    }