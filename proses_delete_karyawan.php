<?php 
	include 'koneksi.php';

	$id_pengguna = $_POST['id_pengguna'];

	$query = "DELETE FROM pengguna WHERE id_pengguna = '$id_pengguna'";
	$exec_query = mysqli_query($conn, $query);
	if ($exec_query) {
		echo "<script>alert('Data Karyawan Telah Di Hapus');</script>";
		header('location: karyawan.php');
	}else{
		
		echo "<script>alert('Data Tidak bisa dihapus karena berelasi');</script>";
	}
?>