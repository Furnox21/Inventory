<!DOCTYPE html>
<html>
<head>
	<title>Toko Wahana Tata Griya</title>
  <style>
    @page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>
</head>
<body class="A4">
 <section class="sheet padding-10mm">
  <center>
 
      <h2>DATA LAPORAN PENJUALAN</h2>
    <h4>Toko Wahana Tata Griya</h4>
  </center>
 
  <?php 
  include 'koneksi.php';
  ?>
 
  <table id="example1" class="table">
                   <thead>
                  <tr>
                          <th>No</th>
                          <th>No Penjualan</th>
                          <th>Tanggal Transaksi</th>
                          <th>Nama Barang</th>
                          <th>Harga</th>
                          <th>Quantity</th>
                          <th>Total Harga</th>
                  </tr>
                  </thead>
                 <tbody>
                    <?php
                        $no = 1;
                        $sql1 = mysqli_query($conn, "SELECT * FROM penjualan ORDER BY id_penjualan DESC");
                        while ($data = mysqli_fetch_array($sql1)) {
                      ?>
                  <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['id_penjualan']; ?></td>
                  <td><?php echo $data['tanggal_transaksi']; ?></td>
                  <td><?php echo $data['nama_barang']; ?></td>
                  <td><?php echo "Rp ".number_format($data['harga_jual'],2,',','.'); ?></td>
                  <td><?php echo $data['quantity']; ?></td>
                  <td><?php echo "Rp ".number_format($data['total_harga'],2,',','.'); ?></td>
                  </tr>
                  </tbody>
                  <?php } ?>
                <tfoot>
                <?php
                $get_total = mysqli_query($conn,"SELECT sum(total_harga) as total_keseluruhan FROM penjualan"); 
                $g =mysqli_fetch_array($get_total); 
                                           ?>
                <th colspan="6" style="text-align: center;">Total</th>
                <th><?php echo "Rp ".number_format($g['total_keseluruhan'],2,',','.'); ?></th>
                </tfoot>
                </table>
 
  <script>
    window.print();
  </script>
 </section>
</body>
</html>













