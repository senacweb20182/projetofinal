<?php

# conjunto de funções q tanto validam, qndo transformam um string
# em um formato mais amigavel ao banco de dados

function validarCep(&$cep){
    preg_match_all('/^(\d{2})(\.|\-)?(\d{3})(\.|\-)?(\d{3})$/m', $cep, $matches, PREG_SET_ORDER, 0);
    if($matches){
        $cep = preg_replace('(\.|\-)', '', $cep);
        return true;
    }
    else{
        return false;  
    }
}

function validarTelefone(&$telefone){ //tanto celular como residencial
    preg_match_all('/^[1-9]{1}\d{3,4}(\.|\-)?\d{4}$/m', $telefone, $matches, PREG_SET_ORDER, 0);
    if($matches){
        $telefone = preg_replace('(\.|\-)', '', $telefone);
        return true;
    }
    else{
        return false;  
    }
}

function validarNome(&$nome){ //apenas letras e espaços simples entre elas
    preg_match_all('/^[a-zA-Z]+(\s+[a-zA-Z]+)*$/m', $nome, $matches, PREG_SET_ORDER, 0);
    if($matches){
        $nome = preg_replace('(\s+)', ' ', $nome);
        return true;
    }
    else{
        return false;  
    }
}

function validarEmail($email){
    preg_match_all('/^[a-zA-Z0-9._%+-]+@{1}([a-zA-Z0-9-]+)(\.{1}[a-zA-Z]+)+$/m', $email, $matches, PREG_SET_ORDER, 0);
    if($matches){
        return true;
    }
    else{
        return false;  
    }
}

function validarLogin($login){ //aceita 3 ou mais caracteres alfa-numericos
    preg_match_all('/^\w{3,}$/m', $login, $matches, PREG_SET_ORDER, 0);
    if($matches){
        return true;
    }
    else{
        return false;  
    }
}

function validarSenha($senha){ //aceita uma senha com no minimo 8 caracteres e no maximo 8
    preg_match_all('/^[A-Za-z0-9@\+\-\.\_\@\&\#\=\*\$]{8,30}$/m', $senha, $matches, PREG_SET_ORDER, 0);
    if($matches){
        return true;
    }
    else{
        return false;  
    }
}

function bissexto($ano){ //verifica se o ano é bissexto
    if(($ano%4 == 0 and !($ano%100 == 0)) or $ano%400 == 0){
        return true;
    }
    else{
        return false;
    }
}

function validarData($data){ //aceita qualquer data valida entre 1900 e o dia de hoje
    preg_match_all('/^\d{4}\-{1}\d{2}\-{1}\d{2}$/m', $data, $matches, PREG_SET_ORDER, 0);
    if($matches){
        if($data < date("Y-m-d")){
            $ano = substr($data, 0, 4);
            $mes = substr($data, 5, 2);
            $dia = substr($data, 8, 2);
            if($ano >= 1900){
                if($mes <= 12){
                    if($mes == 4 or $mes == 6 or $mes == 9 or $mes == 11){
                        if($dia <= 30){
                            return true;
                        }
                    }
                    else if($mes == 1 or $mes == 3 or $mes == 5 or $mes == 7 or $mes == 8 or $mes == 10 or $mes == 12){
                        if($dia <= 31){
                            return true;
                        }
                    }
                    else{
                        if(bissexto($ano)){
                            if($dia <= 29){
                                return true;
                            }
                        }
                        else{
                            if($dia <= 28){
                                return true;
                            }
                        }
                    }

                }
            }
        }
    }
    return false;  
}

//função para validar o cpf não só ira verificar se o formato é valido mas se o digito verificador é valido

//função para validar ddd ira verificar se o ddd existe, opção de usar um json disponivel online

?>