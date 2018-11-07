<?php
    include_once 'crud.php';
    include_once 'validar.php';
    $senha = $_POST['senha'];
    $login = $_POST['login'];
    if(!(validarLogin($login) && validarSenha($senha))){
        $_SESSION['login_error'] = true;
        header("Location: login.php");
    }
    else{
        if($_SESSION['user'] = efetuarLogin($login, $senha)){
                header("Location: pagadmin.php");
        }
        else{
            $_SESSION['login_error'] = true;
            header("Location: login.php");
        }
    }
?>