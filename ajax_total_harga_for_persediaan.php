<?php

include 'koneksi.php';

$quantity = $_GET['quantity'];
$harga = $_GET['harga'];
$total_harga = $quantity*$harga;
$data = array(
            'total_harga'      =>  @$total_harga);

echo json_encode($data);
?>