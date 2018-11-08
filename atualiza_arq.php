<?php

require_once 'crud.php';
require_once 'validar.php';
# inicia a sessão no arquivo



if ($_POST) {
    

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $senhaValidar = filter_input(INPUT_POST, "senhaValidar", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data_nasc = filter_input(INPUT_POST, "data_nasc", FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_NUMBER_INT);
    $ddd = filter_input(INPUT_POST, "ddd", FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, "celular", FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_STRING);
    $uf = filter_input(INPUT_POST, "uf", FILTER_SANITIZE_STRING);
    $rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT);
    $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if($senhaValidar != $senha){
        $_SESSION['cond_cli']['dpassword'] = false;
        header("Location:cadastro.php");
    }
    else{
        $_SESSION['cond_cli']['dpassword'] = true;
    }

    if (validarNome($nome)) {
        $_SESSION['cond_cli']['nome'] = true;
    } else {
        $_SESSION['cond_cli']['nome'] = false;
    }
    if (validarEmail($email)) {
        $_SESSION['cond_cli']['email'] = true;
    } else {
        $_SESSION['cond_cli']['email'] = false;
    }
    if (validarLogin($login)) {
        $_SESSION['cond_cli']['login'] = true;
    } else {
        $_SESSION['cond_cli']['login'] = false;
    }
    if (validarSenha($senha)) {
        $_SESSION['cond_cli']['senha'] = true;
    } else {
        $_SESSION['cond_cli']['senha'] = false;
    }
    if (validarData($data_nasc)) {
        $_SESSION['cond_cli']['data_nasc'] = true;
    } else {
        $_SESSION['cond_cli']['data_nasc'] = false;
    }
    if (validarCpf($cpf)) {
        $_SESSION['cond_cli']['cpf'] = true;
    } else {
        $_SESSION['cond_cli']['cpf'] = false;
    }
    if (validarDDD($ddd)) {
        $_SESSION['cond_cli']['ddd'] = true;
    } else {
        $_SESSION['cond_cli']['ddd'] = false;
    }
    if (validarTelefone($celular)) {
        $_SESSION['cond_cli']['celular'] = true;
    } else {
        $_SESSION['cond_cli']['celular'] = false;
    }

    if (validarCep($cep)) {
        $_SESSION['cond_cli']['cep'] = true;
    } else {
        $_SESSION['cond_cli']['cep'] = false;
    }
    if (validarTexto($bairro)) {
        $_SESSION['cond_cli']['bairro'] = true;
    } else {
        $_SESSION['cond_cli']['bairro'] = false;
    }
    if (validarUf($uf, $cidade)) {
        $_SESSION['cond_cli']['uf'] = true;
    } else {
        $_SESSION['cond_cli']['uf'] = false;
    }
    if (validarTexto($rua)) {
        $_SESSION['cond_cli']['rua'] = true;
    } else {
        $_SESSION['cond_cli']['rua'] = false;
    }
    if (validarNumeroEndereco($numero)) {
        $_SESSION['cond_cli']['numero'] = true;
    } else {
        $_SESSION['cond_cli']['numero'] = false;
    }
    if (validarTextoVazio($complemento)) {
        $_SESSION['cond_cli']['complemento'] = true;
    } else {
        $_SESSION['cond_cli']['complemento'] = false;
    }

    $telefone = $ddd . $celular;

    if (in_array(false, $_SESSION['cond_cli'])) {
        header("Location: atualizar.php");
    } 
    else{
        if (atualizarContato($_SESSION['user']['id'], $nome, $email, $login, $senha, $data_nasc, $cpf, $telefone, $cep, $bairro, $cidade, $rua, $numero, $complemento)) {
            $_SESSION['msg'] = true;
            header("location:atualizar.php");
        } else {
            if(!isset($_SESSION['cond_cli']['cadastro_existente'])){
                $_SESSION['msg'] = false;
            }
            header("location:atualizar.php");
        }
    }
}