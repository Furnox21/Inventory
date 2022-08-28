<?php 

include 'koneksi.php';


$query_barang = mysqli_query($conn,"SELECT kode_barang, nama_barang from barang");
 while ($array = mysqli_fetch_array($query_barang)) {

 	$kode_barang = $array['kode_barang'];
 	$nama_barang = $array['nama_barang'];
 	var_dump($nama_barang);

 	$query = "UPDATE penjualan SET nama_barang = '$nama_barang' WHERE kode_barang = '$kode_barang' ";
	$exec_query = mysqli_query($conn, $query);



}












