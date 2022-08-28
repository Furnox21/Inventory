<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "barang";
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
              <h4 class="page-title">Data Barang</h4>
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
                  <br><br>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Stok</th>
                          <th>EOQ</th>
                          <th>Frekuensi Pemesanan</th>
                          <th>ROP</th>
                          <th>Safety Stock</th>
                          <th>Range Pembelian</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                      $kode_barang = $_GET['kode_barang'];
                      $i = 1;
                      $query = "SELECT * FROM persediaan_barang where kode_barang = '$kode_barang'";
                      $exec_query = mysqli_query($conn, $query);
                      while ($array = mysqli_fetch_array($exec_query)) {
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                        <td><?php echo $array['nama_barang']; ?></td>
                        <td><?php echo $array['stok']; ?></td>
                        <td><?php echo $array['eoq']; ?></td>
                        <td>
                          <?php 
                          if($array['frekuensi_pembelian'] == "0"){
                            echo "Frekuensi Pemesanan Periode Ini Sudah Habis";
                          }elseif($array['frekuensi_pembelian'] == null){
                            echo "-";
                          }
                          else{
                            echo $array['frekuensi_pembelian']. " Kali Pemesanan";
                          }
                        ?>
                        </td>
                        <td><?php echo $array['rop']; ?></td>
                        <td><?php echo $array['safety_stock']; ?></td>
                        <td><?php echo $array['range_beli']; ?></td>
                        </tr>
                         <?php } ?>
                      </tbody>
                      <!-- <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr>
                      </tfoot> -->
                    </table>
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
