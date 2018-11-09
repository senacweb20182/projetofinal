<?php
include 'crud.php';

if($_POST){
    $data = date("Y-m-d");
    $idp = $_SESSION['prod']['id_produto'];
    Coment($_SESSION['user']['id'], $idp, $_POST['coment'], $data);
    header("Location:buscaidprod.php?id=$idp");
}

var_dump($_SESSION);
var_dump($_POST);
?>