<?php 

	include 'koneksi.php';
	$nama_kategori = $_POST['nama_kategori'];
	$query_kategori_barang = mysqli_query($conn,"SELECT * FROM kategori WHERE nama_kategori='$nama_kategori'");
	$exec_query_kategori_barang = mysqli_num_rows($query_kategori_barang);

	if ($exec_query_kategori_barang == 0) {
	$query = "INSERT INTO kategori (nama_kategori) VALUES('$nama_kategori')";
	$exec_query = mysqli_query($conn, $query);

			if ($exec_query) {
				echo "<script>alert('Data Kategori Barang Berhasil Di Tambah');window.location.href='kategori_barang.php';</script>";
			}else{
				echo "Gagal";
			}
	 }else{
	 	echo "<script>alert('Barang Yang Anda Inputkan Sudah Ada');window.location.href='kategori_barang.php';</script>";
	 } 

	
?>








