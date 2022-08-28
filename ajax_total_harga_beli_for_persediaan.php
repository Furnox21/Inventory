<?php

include 'koneksi.php';

$quantity = $_GET['quantity'];
$harga = $_GET['harga'];
$total_harga_beli = $quantity*$harga;
$total_harga_beli_text = "Rp " .number_format($total_harga_beli, 2);
$data = array(
            'total_harga_beli'      =>  @$total_harga_beli,
			'total_harga_beli_text' => @$total_harga_beli_text);

echo json_encode($data);
?>