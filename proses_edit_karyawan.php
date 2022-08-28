<?php
	include 'koneksi.php';
	
	$id_pengguna = $_POST['id_pengguna']; 
	$nama_pengguna = $_POST['nama_pengguna'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
		
	$query = "UPDATE pengguna SET nama_pengguna = '$nama_pengguna',username = '$username',password = '$password',alamat = '$alamat' WHERE id_pengguna = '$id_pengguna' ";
	$exec_query = mysqli_query($conn, $query);

	if ($exec_query) {
		echo "<script>alert('Data Karyawan Berhasil Di Edit'); window.location.href='karyawan.php';</script>";
	}else{
		echo "Gagal";
	}
?>