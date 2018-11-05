<?php
    require_once 'thumbnail.php';
    require_once 'crud.php';
    # inicia a sessão no arquivo
    if($_POST) {
        $cod = filter_input(INPUT_POST, "cod_ref", FILTER_SANITIZE_NUMBER_INT);
        $prod = filter_input(INPUT_POST, "prod", FILTER_SANITIZE_STRING);
        $file = $_FILES['fileUpload'];
        $cat = filter_input(INPUT_POST, "cat", FILTER_SANITIZE_STRING);
        $marca = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_STRING);
        $desc = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_STRING);
        $rev = filter_input(INPUT_POST, "rev", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
        $custo = filter_input(INPUT_POST, "custo", FILTER_SANITIZE_NUMBER_INT);
        $quant = filter_input(INPUT_POST, "quant", FILTER_SANITIZE_NUMBER_INT);
        $peso = filter_input(INPUT_POST, "peso", FILTER_SANITIZE_NUMBER_INT);
        $alt = filter_input(INPUT_POST, "alt", FILTER_SANITIZE_NUMBER_INT);
        $comp = filter_input(INPUT_POST, "comp", FILTER_SANITIZE_NUMBER_INT);
        $diam = filter_input(INPUT_POST, "diam", FILTER_SANITIZE_NUMBER_INT);



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

        createThumbnail($foto);
        createThumbnail2($foto);


        if (salvar($cod, $prod, $quant, $price, $desc, $rev, $alt, $larg, $comp, $diam, $peso)){
            // cria a sessão e define valor a ela
            $_SESSION['msg'] = true;
        }
        else {
            $_SESSION['msg'] = false;
        }


      header("location:cadastro.php");
    }
