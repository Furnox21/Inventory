<?php 

	include 'koneksi.php';
	$kode_barang = $_POST['kode_barang']; 
	$id_kategori = $_POST['id_kategori']; 
	$nama_barang = $_POST['nama_barang'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];

	if($harga_beli<=$harga_jual){
	$query_barang = mysqli_query($conn,"SELECT * FROM barang WHERE kode_barang='$kode_barang' or nama_barang='$nama_barang'");
	$exec_query_barang = mysqli_num_rows($query_barang);

	if ($exec_query_barang == 0) {
	$query = "INSERT INTO barang (kode_barang, nama_barang,harga_beli,harga_jual,id_kategori) VALUES('$kode_barang','$nama_barang','$harga_beli','$harga_jual','$id_kategori')";
	$exec_query = mysqli_query($conn, $query);

			if ($exec_query) {
				echo "<script>alert('Data Barang Berhasil Di Tambah');window.location.href='barang.php';</script>";
			}else{
				echo "Gagal";
			}
	 }else{
	 	echo "<script>alert('Barang Yang Anda Inputkan Sudah Ada');window.location.href='barang.php';</script>";
	 } 

}
else{
	echo "<script>alert('Harga Jual Tidak Boleh Lebih Kecil Dari Harga Beli');window.location.href='barang.php';</script>";
}
	
?>








