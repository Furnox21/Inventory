<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "pembelian";
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
              <h4 class="page-title">Data Pembelian</h4>
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
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered" style="font-size: 12px"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Pembelian</th>
                          <th>Nama Barang</th>
                          <th>Nama Supplier</th>
                          <th>Harga Beli</th>
                          <th>Jumlah Beli</th>
                          <th>Total Harga</th>
                          <th>Tanggal Transaksi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                      $i = 1;
                      $query = "SELECT p.id_pembelian,p.harga_beli,p.jumlah_pembelian,p.harga_beli*p.jumlah_pembelian as total_pembelian,p.tanggal_pembelian,s.nama_supplier,b.nama_barang FROM pembelian p left join supplier s on p.id_supplier = s.id_supplier left join barang b on p.kode_barang = b.kode_barang ORDER BY id_pembelian DESC";
                      $exec_query = mysqli_query($conn, $query);
                      while ($array = mysqli_fetch_array($exec_query)) {
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                        <td><?php echo $array['id_pembelian']; ?></td>
                        <td><?php echo $array['nama_barang']; ?></td>
                        <td><?php echo $array['nama_supplier']; ?></td>
                        <td><?php echo "Rp ".number_format($array['harga_beli'],2,',','.'); ?></td>
                        <td><?php echo $array['jumlah_pembelian']; ?></td>
                        <td><?php echo "Rp ".number_format($array['total_pembelian'],2,',','.'); ?></td>
                        <td><?php echo $array['tanggal_pembelian']; ?></td>
                        <td width="12%">
                        <a data-toggle="modal" data-target="#delete_pembelian<?php echo $array['id_pembelian']; ?>">
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
                    $query = mysqli_query($conn, "SELECT * FROM pembelian");
                    while ($array = mysqli_fetch_array($query)) {
                  ?>
                  <div class="modal fade" role="document" id="delete_pembelian<?php echo $array['id_pembelian']; ?>">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <form action="proses_delete_pembelian.php" method="post">
                          <input type="hidden" name="id_pembelian" value="<?php echo $array['id_pembelian']; ?>">
                          <div class="modal-header">
                            <h4>Hapus Data pembelian</h4>
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
