<?php 
	include 'koneksi.php';

	$kode_barang = $_POST['kode_barang'];

	$query = "DELETE FROM barang WHERE kode_barang = '$kode_barang'";
	$exec_query = mysqli_query($conn, $query);
	if ($exec_query) {
		echo "<script>alert('Data Barang Telah Di Hapus');</script>";
		header('location: barang.php');
	}else{
		
		echo "<script>alert('Data Tidak bisa dihapus karena berelasi');</script>";
	}
?>