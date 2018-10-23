<?php
    require_once('crud.php');

    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

    if($_SESSION['user'] = efetuarLogin($login, $senha)['nome']){
        header('LOCATION: consulta.php');
    }
    else{
        $_SESSION['fail'] = true;
        header('LOCATION: form_login.php');
    }

?>
