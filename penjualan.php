<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "penjualan";
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
              <h4 class="page-title">Data Penjualan</h4>
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
                  <a href="form_tambah_penjualan.php"><button type="button" class="btn btn-info">Tambah Data Penjualan <i class="mdi mdi-plus-circle"></i></button></a><br><br>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Penjualan</th>
                          <th>Nama Barang</th>
                          <th>Harga</th>
                          <th>Quantity</th>
                          <th>Total Harga</th>
                          <th>Tanggal Transaksi</th>
                          <th>Aksi</th>
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
                        <td><?php echo $array['nama_barang']; ?></td>
                        <td><?php echo "Rp ".number_format($array['harga_jual'],2,',','.'); ?></td>
                        <td><?php echo $array['quantity']; ?></td>
                        <td><?php echo "Rp ".number_format($array['total_harga'],2,',','.'); ?></td>
                        <td><?php echo $array['tanggal_transaksi']; ?></td>
                        <td width="12%">
                        <a data-toggle="modal" data-target="#delete_penjualan<?php echo $array['id_penjualan']; ?>">
                        <button type="button" class="btn btn-danger text-white">
                          Delete
                           <i class="mdi mdi-delete"></i>
                             </button>
                      </a>
                      </td>  
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
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM penjualan");
                    while ($array = mysqli_fetch_array($query)) {
                  ?>
                  <div class="modal fade" role="document" id="delete_penjualan<?php echo $array['id_penjualan']; ?>">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <form action="proses_delete_penjualan.php" method="post">
                          <input type="hidden" name="id_penjualan" value="<?php echo $array['id_penjualan']; ?>">
                          <div class="modal-header">
                            <h4>Hapus Data Penjualan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <div class="modal-body">
                            <p>Apakah Anda Yakin Menghapus Data Ini ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Ya</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
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
