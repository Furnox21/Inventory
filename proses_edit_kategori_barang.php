<?php
	include 'koneksi.php';
	
	$id_kategori = $_POST['id_kategori']; 
	$nama_kategori = $_POST['nama_kategori'];
		
	$query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori' ";
	$exec_query = mysqli_query($conn, $query);

	if ($exec_query) {
		echo "<script>alert('Data kategori Barang Berhasil Di Edit'); window.location.href='kategori_barang.php';</script>";
	}else{
		echo "Gagal";
	}
?>