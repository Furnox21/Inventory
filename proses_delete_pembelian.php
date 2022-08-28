<?php 
	include 'koneksi.php';

	$id_pembelian = $_POST['id_pembelian'];


	$query = "DELETE FROM pembelian WHERE id_pembelian = '$id_pembelian'";
	$exec_query = mysqli_query($conn, $query);
	if ($exec_query) {
		echo "<script>alert('Data pembelian Telah Di Hapus');</script>";
		header('location: pembelian.php');
	}else{
		
		echo "<script>alert('Data Tidak bisa dihapus karena berelasi');</script>";
	}
    
?>