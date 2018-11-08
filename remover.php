<?php
require_once 'crud.php';

if(isset($_GET['prodid'])){
    if(removeProduto($_GET['prodid'])){
        header("Location: Categoria.php");
    }
    else{
        $_SESSION['cond_prod']['remove'] = true;
        header("Location: atualizar_prod.php?prodid=".$_GET['prodid']);
    }
}

?>