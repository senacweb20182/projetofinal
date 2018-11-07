<?php
//gambiarra para remover categorias vazias do banco

/*include 'conexao.php';
include 'crud.php';


$arrayCat = getCategoria();
foreach($arrayCat as $cat){
    if(count(produto_index_cat($cat)) == 0){
        $query = "delete from tb_categoria where nome_cat = '$cat'";
        $result = mysqli_query($conexao, $query);
    }
}*/
include 'crud.php';
var_dump(produto_index());
die();


?>