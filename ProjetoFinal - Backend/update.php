<?php
    require_once 'crud.php';
    # inicia a sessão no arquivo
    session_start();

    if($_POST) {

        $prod = filter_input(INPUT_POST, "prod", FILTER_SANITIZE_STRING);
        $file = $_FILES['foto'];
        $desc = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_STRING);
        $rev = filter_input(INPUT_POST, "rev", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
        $custo = filter_input(INPUT_POST, "custo", FILTER_SANITIZE_NUMBER_INT);
        $quant = filter_input(INPUT_POST, "quant", FILTER_SANITIZE_NUMBER_INT);
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        
       // if(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT)) {
         //   $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        //}
        if($file['error']) {
            //throw new Exception('Error: ' . $file['error']);
            $_SESSION['msg'] = false;
            exit;
        }
        
        $dirUploads = 'uploads';
        
        if(!is_dir($dirUploads)) {
            mkdir($dirUploads);
        }
        
        // http://php.net/manual/pt_BR/function.move-uploaded-file.php
        #move_uploaded_file(filename, destination) // essa função retorna um booleano
        if(move_uploaded_file($file['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . $file['name'])) {
            
        } else {
            //throw new Exception('Falha ao efetuar o upload.');
            $_SESSION['msg'] = false;
            exit;
        }
        
        $foto=$file['name'];

        
   
        
        if (atualizar($prod, $foto, $quant, $price, $custo, $desc, $rev, $id)){
            // cria a sessão e define valor a ela
            $_SESSION['upd'] = true;
        }
        else {
            $_SESSION['upd'] = false;
        }
        
        
      header("location:consulta.php");
    }
    
    