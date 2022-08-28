<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "laporan penjualan";
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
              <h4 class="page-title">Data Laporan Penjualan</h4>
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
                  <form action="tampil_laporan_penjualan.php" method="post" style="padding-left: 20px;padding-top: 10px;font-size: 15px">
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
                      class="table table-striped table-bordered"
                    >
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
                      $i = 1;
                      $query = "SELECT * FROM penjualan ORDER BY id_penjualan DESC";
                      $exec_query = mysqli_query($conn, $query);
                      while ($array = mysqli_fetch_array($exec_query)) {
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                        <td><?php echo $array['id_penjualan']; ?></td>
                        <td><?php echo $array['tanggal_transaksi']; ?></td>
                        <td><?php echo $array['nama_barang']; ?></td>
                        <td><?php echo "Rp ".number_format($array['harga_jual'],2,',','.'); ?></td>
                        <td><?php echo $array['quantity']; ?></td>
                        <td><?php echo "Rp ".number_format($array['total_harga'],2,',','.'); ?></td>
                        </tr>
                         <?php } ?>
                      </tbody>
                      <tfoot>
                        <?php 
                         $query_total = "SELECT sum(total_harga) as total_keseluruhan FROM penjualan";
                          $exec_query_total = mysqli_query($conn, $query_total);
                        $array_total = mysqli_fetch_array($exec_query_total);
                        $total_keseluruhan = $array_total['total_keseluruhan'];
                        ?>
                        <tr>
                          <th colspan="6" style="text-align:  center;"><b>Total</b></th>
                          <th><b><?php echo "Rp ".number_format($total_keseluruhan,2,',','.'); ?></b></th>
                        </tr>
                      </tfoot>
                    </table>
                    <a href="cetak_laporan_penjualan_all.php" class="btn btn-success" style="margin-left: 20px" target="blank" ><i class="fas fa-print"></i> CETAK </a>
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
