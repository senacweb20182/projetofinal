<?php
    require_once 'conexao.php';

    function salvar($prod, $foto, $quant, $price, $custo, $desc, $rev) {
        $link = abreConexao();

        $query = "insert into tb_produtos(produto, foto, quantidade, preço, custo, descrição, review) values ('$prod', '$foto', '$quant', '$price', '$custo', '$desc', '$rev')";
        if(mysqli_query($link, $query)) {
            return true;            
        }
        
        return false;
        
    }  
    
    
    
    /*function salvar($nome, $numero) {
        $link = abreConexao();

        $query = "insert into tb_produtos(nome) values ('$nome')";
        mysqli_query($link, $query);
        
        $idContato = mysqli_insert_id($link);
        echo $query;

        if($idContato != 0) {
            
            $query = "insert into tb_telefones(numero, id_contato) values
            ($numero, $idContato)";
            mysqli_query($link, $query);
            
            echo $query;
            if(mysqli_insert_id($link) != NULL) {
                return true;
            }
        }
        return false;
    }

    function listar() {
        $link = abreConexao();

        $query = "select * from contato_full";
        
        $result = mysqli_query($link, $query);

        // array responsável por manter todos os contatos vindos do BD
        $arrayContatos = array();

        while($contato = mysqli_fetch_row($result)) {
            array_push($arrayContatos, $contato);
        }
        return $arrayContatos;
    }   

    /*
    chave candidata - atributos definidos como únicos
    
        create table aluno (
            cpf unique,
            matricula unique,
            nome 
        );
        chaves candidatas: cpf, matricula

        chave primaria - atributo definido como primary key
        create table aluno (
            cpf unique,
            matricula unique,
            nome,
            primary key(matricula)
        );
        chave primaria: matricula

        create table aluno (
            cpf unique,
            matricula unique,
            nome,
            primary key(matricula)
        );

        chave alternativa - atribudo unico opcional a chave primaria
        chave alternativa: cpf
    
    */

    /*function deletar($id) {
        $link = abreConexao();

        # deletar o telefone
        $query = "delete from tb_telefones where id_contato = $id";

        if(mysqli_query($link, $query)) {
            $query = "delete from tb_contatos where id = $id";
            mysqli_query($link, $query);
        }
    }

    function buscarPorId($telefone) {
        $link = abreConexao();

        # Query com filtro por ID
        $query = "select * from contato_full where numero = $telefone";

        $result = mysqli_query($link, $query);

        return mysqli_fetch_assoc($result);
    }

    function atualizar($nome, $telefone, $foto) {
        $link = abreConexao();

        $query = "update contato_full 
                    set nome = '$nome', foto = '$foto' 
                    where numero = $telefone";

        mysqli_query($link, $query);
    }

   function efetuarLogin($login, $senha){
       $link = abreConexao();
       $query = "select nome, foto from tb_admins where login = '{$login}' and senha = md5('{$senha}')";

       $result = mysqli_query($link, $query);

       if($user = mysqli_fetch_assoc($result)){
           return $user;
       }
       return NULL;

   }*/