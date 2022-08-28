<?php 

	include 'koneksi.php';
	$nama_pengguna = $_POST['nama_pengguna'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$level = 'karyawan';
	$query_karyawan = mysqli_query($conn,"SELECT * FROM pengguna WHERE nama_pengguna='$nama_pengguna' and level='$level'");
	$exec_query_karyawan = mysqli_num_rows($query_karyawan);

	if ($exec_query_karyawan == 0) {
	$query = "INSERT INTO pengguna (nama_pengguna, username,password,alamat,level) VALUES('$nama_pengguna','$username','$password','$alamat','$level')";
	$exec_query = mysqli_query($conn, $query);

			if ($exec_query) {
				echo "<script>alert('Data Karyawan Berhasil Di Tambah');window.location.href='karyawan.php';</script>";
			}else{
				echo "Gagal";
			}
	 }else{
	 	echo "<script>alert('Nama Karyawan Yang Anda Inputkan Sudah Ada');window.location.href='karyawan.php';</script>";
	 } 

	
?>








