<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "laporan pembelian";
 include 'layout/header_table.php';
 include 'layout/sidebar.php';
?>
      
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Laporan Pembelian</h4>
              <div class="ms-auto text-end">
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form action="tampil_laporan_pembelian.php" method="post" style="padding-left: 20px;padding-top: 10px;font-size: 15px">
                          <table>
                            
                            <tr>
                              <td> Tanggal Awal </td>
                              <td> </td>
                              <td><input type="date" name="tanggal_awal" class="form-control">
                              </td>
                              <td> <h2> &nbsp; || &nbsp;</h2> </td>
                              <td> Tanggal Akhir </td>
                              <td> </td>
                              <td><input type="date" name="tanggal_akhir"  class="form-control">
                              <td>&nbsp;&nbsp;&nbsp;<input type="submit" value="cari" class="btn btn-primary">
                            </tr>

                          </table>
                        </form>
                        <br>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered" style="font-size: 12px"
                    >
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
                      $i = 1;
                      $tanggal_awal = $_POST['tanggal_awal'];
                      $tanggal_akhir = $_POST['tanggal_akhir'];
                      $query = "SELECT p.id_pembelian,p.harga_beli,p.jumlah_pembelian,p.harga_beli*p.jumlah_pembelian as total_pembelian,p.tanggal_pembelian,s.nama_supplier,b.nama_barang FROM pembelian p left join supplier s on p.id_supplier = s.id_supplier left join barang b on p.kode_barang = b.kode_barang where DATE(p.tanggal_pembelian) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY id_pembelian DESC";
                      $exec_query = mysqli_query($conn, $query);
                      while ($array = mysqli_fetch_array($exec_query)) {
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                        <td><?php echo $array['id_pembelian']; ?></td>
                        <td><?php echo $array['tanggal_pembelian']; ?></td>
                        <td><?php echo $array['nama_barang']; ?></td>
                        <td><?php echo $array['nama_supplier']; ?></td>
                        <td><?php echo "Rp ".number_format($array['harga_beli'],2,',','.'); ?></td>
                        <td><?php echo $array['jumlah_pembelian']; ?></td>
                        <td><?php echo "Rp ".number_format($array['total_pembelian'],2,',','.'); ?></td>
                        </tr>
                         <?php } ?>
                      </tbody>
                      <tfoot>
                        <?php 
                         $query_total = "SELECT sum(p.harga_beli*p.jumlah_pembelian) as total_keseluruhan FROM pembelian p where DATE(p.tanggal_pembelian) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
                          $exec_query_total = mysqli_query($conn, $query_total);
                        $array_total = mysqli_fetch_array($exec_query_total);
                        $total_keseluruhan = $array_total['total_keseluruhan'];
                        ?>
                        <tr>
                          <th colspan="7" style="text-align:  center;"><b>Total</b></th>
                          <th><b><?php echo "Rp ".number_format($total_keseluruhan,2,',','.'); ?></b></th>
                        </tr>
                      </tfoot>
                    </table>
                    <form action="cetak_laporan_pembelian.php" method="post" target="_blank">
                    <input type="hidden" name="tanggal_awal" value="<?php echo $_POST['tanggal_awal']?>">
                    <input type="hidden" name="tanggal_akhir" value="<?php echo $_POST['tanggal_akhir']?>" >
                    <a ><button type="submit" value="CETAK" class="btn btn-primary"><i class="fas fa-print"></i> CETAK </a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    <?php include 'layout/footer_table.php'; ?>
