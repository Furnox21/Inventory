<?php 
	include 'koneksi.php';

	$id_kategori = $_POST['id_kategori'];

	$query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
	$exec_query = mysqli_query($conn, $query);
	if ($exec_query) {
		echo "<script>alert('Data Kategori Barang Telah Di Hapus');</script>";
		header('location: kategori_barang.php');
	}else{
		
		echo "<script>alert('Data Tidak bisa dihapus karena berelasi');</script>";
	}
?>