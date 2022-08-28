<?php 

	include 'koneksi.php';
	$nama_supplier = $_POST['nama_supplier'];
	$id_supplier = $_POST['id_supplier'];
	$no_telepon = $_POST['no_telepon'];
	$alamat = $_POST['alamat'];
	$kontak = $_POST['kontak'];
	$query_supplier = mysqli_query($conn,"SELECT * FROM supplier WHERE nama_supplier='$nama_supplier'");
	$exec_query_supplier = mysqli_num_rows($query_supplier);

	if ($exec_query_supplier == 0) {
	$query = "INSERT INTO supplier (id_supplier,nama_supplier, alamat,no_telepon,kontak) VALUES('$id_supplier','$nama_supplier','$alamat','$no_telepon','$kontak')";
	$exec_query = mysqli_query($conn, $query);

			if ($exec_query) {
				echo "<script>alert('Data Supplier Berhasil Di Tambah');window.location.href='supplier.php';</script>";
			}else{
				echo "Gagal";
			}
	 }else{
	 	echo "<script>alert('Nama Supplier Yang Anda Inputkan Sudah Ada');window.location.href='supplier.php';</script>";
	 } 

	
?>








