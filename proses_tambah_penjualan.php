<?php 

	include 'koneksi.php';
	$id_penjualan = $_POST['id_penjualan'];
	$kode_barang = $_POST['kode_barang']; 
	$quantity = $_POST['quantity']; 
	$tanggal_transaksi = $_POST['tanggal_transaksi'];

	$query_barang= mysqli_query($conn, "SELECT b.nama_barang,b.harga_jual,p.stok from barang b left join persediaan_barang p on b.kode_barang = p.kode_barang where b.kode_barang='$kode_barang'");
	$array = mysqli_fetch_array($query_barang); 

	$nama_barang = $array['nama_barang'];
	$harga_jual = $array['harga_jual']; 
	$stok = $array['stok']; 

	if ($stok < $quantity) {
		echo "<script>alert('Stok Barang Tidak Mencukupi');window.location.href='penjualan.php';</script>";
	}
	else{
	$stok_kurang_quantity= $stok - $quantity;

	$query_update_barang = "UPDATE persediaan_barang set stok = '$stok_kurang_quantity' where kode_barang = '$kode_barang'";
	$exec_query_update = mysqli_query($conn, $query_update_barang);

	$total_harga= $harga_jual*$quantity;

	$query_insert_penjualan = "INSERT INTO penjualan (id_penjualan, kode_barang, nama_barang, harga_jual, quantity, total_harga, tanggal_transaksi) VALUES('$id_penjualan','$kode_barang','$nama_barang','$harga_jual','$quantity','$total_harga','$tanggal_transaksi')";
	$exec_query_insert = mysqli_query($conn, $query_insert_penjualan);

	if ($exec_query_insert) {
		echo "<script>alert('Data Berhasil Di Tambah');window.location.href='penjualan.php';</script>";
	}else{
		echo "Gagal";
	}
}


