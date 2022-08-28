<?php 

include 'koneksi.php';
$hari_kerja = 355;
$kode_barang = $_POST['kode_barang']; 
$harga_beli = $_POST['harga_beli']; 
$stok = $_POST['stok']; 
$tanggal_input = date('Y-m-d');

$query_barang = mysqli_query($conn,"SELECT * from barang where kode_barang='$kode_barang'");
$array_barang = mysqli_fetch_array($query_barang); 

$nama_barang = $array_barang['nama_barang']; 

$query_persediaan_barang =mysqli_query($conn,"SELECT nama_barang from persediaan_barang where nama_barang ='$nama_barang'");
$exec_query_persediaan_barang = mysqli_num_rows($query_persediaan_barang);

if ($exec_query_persediaan_barang == 0) {
	$query_insert_persediaan = "INSERT INTO persediaan_barang (kode_barang,nama_barang, stok, harga_beli, tanggal_input ) VALUES('$kode_barang','$nama_barang','$stok','$harga_beli','$tanggal_input')";
	$exec_query_insert = mysqli_query($conn, $query_insert_persediaan);
	if ($exec_query_insert) {
		echo "<script>alert('Data Persediaan Barang Berhasil Di Tambah');window.location.href='persediaan_barang.php';</script>";
	}else{
		echo "Gagal";
	}
}
else{
	echo "<script>alert('Data Barang Sudah Ada');window.location.href='persediaan_barang.php';</script>";
}












