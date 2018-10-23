<?php
    require_once 'conexao.php';

    function salvar($prod, $foto, $quant, $price, $custo, $desc, $rev) {
        $link = abreConexao();

        $query = "insert into tb_produtos(produto, foto, quantidade, preco, custo, descricao, review) values ('$prod', '$foto', '$quant', '$price', '$custo', '$desc', '$rev')";
        if(mysqli_query($link, $query)) {
            return true;            
        }
        
        return false;
        
    }  
    
     function buscar($prod) {
        $link = abreConexao();

        
        $query = "select * from tb_produtos where produto like '%$prod%'";

        $result = mysqli_query($link, $query);

        $arrayProduto = array();

        while($produto = mysqli_fetch_row($result)) {
            array_push($arrayProduto, $produto);
        }
       
        return $arrayProduto;
    }   

    function buscarId($id) {
        $link = abreConexao();

        
        $query = "select * from tb_produtos where id = $id";

        $result = mysqli_query($link, $query);

        if(mysqli_error($link)) {
            $_SESSION['error'] = 'falha ao gravar';
        }
        return mysqli_fetch_assoc($result);
    }
    
    
    
    function atualizar($prod, $foto, $quant, $price, $custo, $desc, $rev, $id) {
        $link = abreConexao();

        $query = "update tb_produtos 
                    set produto = '$prod', foto = '$foto', quantidade = '$quant', preco = '$price', custo = '$custo', descricao = '$desc', review = '$rev'"
                . " where id='$id'"; 
                    

                if(mysqli_query($link, $query)) {
                    return true;            
                }
                
                return false;
                
            }  