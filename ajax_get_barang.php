<?php

include 'koneksi.php';

$kode_barang = $_GET['kode_barang'];

$query = mysqli_query($conn, "select * from barang where kode_barang='$kode_barang'");
$barang = mysqli_fetch_array($query);
$data = array(
            'harga_beli'      =>  @$barang['harga_beli'],);

echo json_encode($data);
?>