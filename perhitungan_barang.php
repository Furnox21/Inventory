<?php 
include 'koneksi.php';

$tahun_sebelum = date("Y", strtotime('-1 year'));
	$sql_persediaan_barang = mysqli_query($conn, "SELECT * from persediaan_barang");
		while ($row = mysqli_fetch_array($sql_persediaan_barang)) {
			$kode_barang = $row['kode_barang'];
			$sqlrop2 = mysqli_query($conn, "SELECT p.kode_barang, SUM(p.quantity) AS jumlah_terjual,MAX(p.quantity) AS max_jumlah_terjual,AVG(p.quantity) AS avg_jumlah_terjual FROM penjualan p WHERE Year(p.tanggal_transaksi) = '$tahun_sebelum' and p.kode_barang = '$kode_barang' GROUP BY p.kode_barang asc");
  			while($row2 = mysqli_fetch_array($sqlrop2)){


  			$jumlah_terjual = $row2['jumlah_terjual'];
  			$max_jumlah_terjual = $row2['max_jumlah_terjual'];
  			$avg_jumlah_terjual = $row2['avg_jumlah_terjual'];
  			$lead_time = 2;
			$safety_stock = ($max_jumlah_terjual - $avg_jumlah_terjual) * $lead_time;
			$rop = ($lead_time*$avg_jumlah_terjual)+$safety_stock;


			
			$sql_update = "UPDATE persediaan_barang SET rop='$rop',safety_stock='$safety_stock' where kode_barang = '$kode_barang' ";
			$query = mysqli_query($conn, $sql_update);
			echo '<script>alert("Perhitungan Berhasil Dilakukan");
			window.location.href="persediaan_barang.php"
			</script>
			';

  			}
}
?>