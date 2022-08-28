<?php
	include 'koneksi.php';
	
	$kode_barang = $_POST['kode_barang']; 
	$id_kategori = $_POST['id_kategori']; 
	$nama_barang = $_POST['nama_barang'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];
		
	$query = "UPDATE barang SET nama_barang = '$nama_barang',harga_beli = '$harga_beli',harga_jual='$harga_jual', id_kategori='$id_kategori' WHERE kode_barang = '$kode_barang' ";
	$exec_query = mysqli_query($conn, $query);

	if ($exec_query) {
		echo "<script>alert('Data Barang Berhasil Di Edit'); window.location.href='barang.php';</script>";
	}else{
		echo "Gagal";
	}
?>