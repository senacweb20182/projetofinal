<?php
    require_once 'crud.php';
    # inicia a sessão no arquivo

        if($_POST) {

        $id = $_GET['id'];
        
           
        if(buscarId($id)) {
            // cria a sessão e define valor a ela
            $_SESSION['id'] = buscarId($id);
            
            header("location:atualizar.php");
            exit;
        } else {
            $_SESSION['msg'] = false;
        }
        #$_SESSION['msg'] = salvar($nome, $numero) ? 'Salvo com sucesso' : 'Erro ao gravar';
        
        # função responsavel por redirecionar a página
        header("location:consulta.php");
        exit;
    }