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
include 'validar.php';
//$array = calculaFrete("PAC", '20080006', '09280580', '2', '20', '20', '20', '0');
//var_dump($array['valor']);
//echo $array['valor'];

//http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=20080006&sCepDestino=09280580&nVlPeso=1&nCdFormato=1&nVlComprimento=1&nVlAltura=1&nVlLargura=1&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=40215&nVlDiametro=0&StrRetorno=xml

?>