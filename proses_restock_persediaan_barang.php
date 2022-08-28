<?php 

	include 'koneksi.php';
	$kode_pembelian = $_POST['kode_pembelian']; 
	$kode_barang = $_POST['kode_barang']; 
	$id_supplier = $_POST['id_supplier']; 
	$harga_beli = $_POST['harga_beli'];
	$jumlah_pembelian = $_POST['jumlah_pembelian'];
	$tanggal_pembelian = date('Y-m-d');


	$query_barang= mysqli_query($conn, "SELECT * FROM persediaan_barang where kode_barang='$kode_barang'");
	$array = mysqli_fetch_array($query_barang); 
	$stok = $array['stok'];
	$stok_update = $stok+$jumlah_pembelian;

	$query = "UPDATE persediaan_barang SET stok = '$stok_update' WHERE kode_barang = '$kode_barang' ";
	$exec_query = mysqli_query($conn, $query);

	$query = "INSERT INTO pembelian (id_pembelian, id_supplier,kode_barang,harga_beli,jumlah_pembelian,tanggal_pembelian) VALUES('$kode_pembelian','$id_supplier','$kode_barang','$harga_beli','$jumlah_pembelian','$tanggal_pembelian')";
	$exec_query = mysqli_query($conn, $query);

			if ($exec_query) {
				echo "<script>alert('Data Pembelian Berhasil Di Tambah');window.location.href='persediaan_barang.php';</script>";
			}else{
				echo "Gagal";
			}


?>








