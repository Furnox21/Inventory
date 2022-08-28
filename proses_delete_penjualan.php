<?php 
	include 'koneksi.php';

	$id_penjualan = $_POST['id_penjualan'];


	$query = "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'";
	$exec_query = mysqli_query($conn, $query);
	if ($exec_query) {
		echo "<script>alert('Data Penjualan Telah Di Hapus');</script>";
		header('location: penjualan.php');
	}else{
		
		echo "<script>alert('Data Tidak bisa dihapus karena berelasi');</script>";
	}
    
?>