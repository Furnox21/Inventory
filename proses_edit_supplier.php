<?php
	include 'koneksi.php';
	
	$id_supplier = $_POST['id_supplier']; 
	$nama_supplier = $_POST['nama_supplier'];
	$alamat = $_POST['alamat'];
	$no_telepon = $_POST['no_telepon'];
	$kontak = $_POST['kontak'];
		
	$query = "UPDATE supplier SET nama_supplier = '$nama_supplier',alamat = '$alamat',no_telepon = '$no_telepon',kontak = '$kontak' WHERE id_supplier = '$id_supplier' ";
	$exec_query = mysqli_query($conn, $query);

	if ($exec_query) {
		echo "<script>alert('Data Supplier Berhasil Di Edit'); window.location.href='supplier.php';</script>";
	}else{
		echo "Gagal";
	}
?>