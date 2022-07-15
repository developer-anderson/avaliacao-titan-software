<?php
require_once('db.php');
$data_atual = date("Y-m-d");
$time = date("H:i:s");
$resultado = array();
$mes = date("m");
$dia = date("d");
$ano = date("Y");

if(isset($_GET['product_id']))
{
    $sql = "delete from produtos where product_id = ".$_GET['product_id'];
    $db->query( $sql);
  
}

echo json_encode( '1');
