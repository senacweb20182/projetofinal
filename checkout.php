<?php
include 'buscaidprod.php';
include_once 'carrinho.php';
#include_once 'frete.php';
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

//$data = 'email=seuemail@dominio.com.br&amp;token=95112EE828D94278BD394E91C4388F20&amp;currency=BRL&amp;itemId1=0001&amp;itemDescription1=Notebook Prata&amp;itemAmount1=24300.00&amp;itemQuantity1=1&amp;itemWeight1=1000&amp;itemId2=0002&amp;itemDescription2=Notebook Rosa&amp;itemAmount2=25600.00&amp;itemQuantity2=2&amp;itemWeight2=750&amp;reference=REF1234&amp;senderName=Jose Comprador&amp;senderAreaCode=11&amp;senderPhone=56273440&amp;senderEmail=comprador@uol.com.br&amp;shippingType=1&amp;shippingAddressStreet=Av. Brig. Faria Lima&amp;shippingAddressNumber=1384&amp;shippingAddressComplement=5o andar&amp;shippingAddressDistrict=Jardim Paulistano&amp;shippingAddressPostalCode=01452002&amp;shippingAddressCity=Sao Paulo&amp;shippingAddressState=SP&amp;shippingAddressCountry=BRA';
/*
Caso utilizar o formato acima remova todo código abaixo até instrução $data = http_build_query($data);
*/

$data['email'] = 'coletto.rafael@gmail.com';
$data['token'] = '4FE1CBE2DA114FA78AD2D80FB6FD5540';
$data['currency'] = 'BRL';
$i=1;
foreach ($_SESSION['carrinho'] as $id => $qtd){
		$ln = buscarId($id);





$data['itemId'.$i] = $ln['id_produto'];
$data['itemDescription'.$i] = ucfirst($ln['nome_produto']);
$data['itemAmount'.$i] = $ln['preco_venda'].'.00';
$data['itemQuantity'.$i] = $qtd;
$data['itemWeight'.$i] = '1000';
#$data['itemId2'] = '0002';
#$data['itemDescription2'] = 'Notebook Rosa';
#$data['itemAmount2'] = '20.00';
#$data['itemQuantity2'] = '2';
#$data['itemWeight2'] = '750';

$i++;
}
$data['extraAmount'] = $_SESSION['frete'].'.00';


$data['reference'] = 'REF1234';
$data['senderName'] = 'Jose Comprador';
$data['senderAreaCode'] = '11';
$data['senderPhone'] = '56273440';
$data['senderEmail'] = 'c09068073123772522826@sandbox.pagseguro.com.br';
$data['shippingType'] = '1';
$data['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
$data['shippingAddressNumber'] = '1384';
$data['shippingAddressComplement'] = '5o andar';
$data['shippingAddressDistrict'] = 'Jardim Paulistano';
$data['shippingAddressPostalCode'] = '01452002';
$data['shippingAddressCity'] = 'Sao Paulo';
$data['shippingAddressState'] = 'SP';
$data['shippingAddressCountry'] = 'BRA';
#$data['redirectURL'] = 'http://www.sounoob.com.br/paginaDeAgracedimento';

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);

if($xml == 'Unauthorized'){
    //Insira seu código de prevenção a erros
    header('Location: erro.php?tipo=autenticacao');
    exit;//Mantenha essa linha
}
curl_close($curl);

$xml= simplexml_load_string($xml);
if(count($xml -> error) > 0){
    //Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
    header('Location: erro.php?tipo=dadosInvalidos');
    exit;
}
header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);
