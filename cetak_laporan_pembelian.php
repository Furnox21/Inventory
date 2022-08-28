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
 
      <h2>DATA LAPORAN PEMBELIAN</h2>
    <h4>Toko Wahana Tata Griya</h4>
    <h5> <?php
                    $tanggal_awal = $_POST['tanggal_awal'];
                    $tanggal_akhir = $_POST['tanggal_akhir'];
                    echo $tanggal_awal." - ". $tanggal_akhir;

                      ?> </h5>
  </center>
 
  <?php 
  include 'koneksi.php';
  ?>
 
  <table id="example1" class="table">
                   <thead>
                  <tr>
                    <th>No</th>
                    <th>No Pembelian</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Nama Supplier</th>
                    <th>Harga Beli</th>
                    <th>Jumlah Beli</th>
                    <th>Total Harga</th>
                  </tr>
                  </thead>
                 <tbody>
                    <?php
                    $tanggal_awal = $_POST['tanggal_awal'];
                      $tanggal_akhir = $_POST['tanggal_akhir'];
                        $no = 1;
                        $sql1 = mysqli_query($conn, "SELECT p.id_pembelian,p.harga_beli,p.jumlah_pembelian,p.harga_beli*p.jumlah_pembelian as total_pembelian,p.tanggal_pembelian,s.nama_supplier,b.nama_barang FROM pembelian p left join supplier s on p.id_supplier = s.id_supplier left join barang b on p.kode_barang = b.kode_barang where DATE(p.tanggal_pembelian) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY id_pembelian DESC");
                        while ($data = mysqli_fetch_array($sql1)) {
                      ?>
                  <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['id_pembelian']; ?></td>
                  <td><?php echo $data['tanggal_pembelian']; ?></td>
                  <td><?php echo $data['nama_barang']; ?></td>
                  <td><?php echo $data['nama_supplier']; ?></td>
                  <td><?php echo "Rp ".number_format($data['harga_beli'],2,',','.'); ?></td>
                  <td><?php echo $data['jumlah_pembelian']; ?></td>
                  <td><?php echo "Rp ".number_format($data['total_pembelian'],2,',','.'); ?></td>
                  </tr>
                  </tbody>
                  <?php } ?>
                <tfoot>
                <?php
                $get_total = mysqli_query($conn,"SELECT sum(p.harga_beli*p.jumlah_pembelian) as total_keseluruhan FROM pembelian p where DATE(p.tanggal_pembelian) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'"); 
                $g =mysqli_fetch_array($get_total); 
                                           ?>
                <th colspan="7" style="text-align: center;">Total</th>
                <th><?php echo "Rp ".number_format($g['total_keseluruhan'],2,',','.'); ?></th>
                </tfoot>
                </table>
 
  <script>
    window.print();
  </script>
 </section>
</body>
</html>













