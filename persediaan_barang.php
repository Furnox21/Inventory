<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "persediaan barang";
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
              <h4 class="page-title">Data Persediaan Barang</h4>
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
                  <a href="form_tambah_persediaan_barang.php"><button type="button" class="btn btn-info">Tambah Data Persediaan Barang <i class="mdi mdi-plus-circle"></i></button></a>
                  <?php 

                  $tahun_sebelum = date('Y') - 1;
                  $tahun_setelah = date('Y') + 1;
                  $query = mysqli_query($conn,"SELECT * from persediaan_barang");
                  $array = mysqli_fetch_array($query); 

                  ?> 
                  <?php if ($_SESSION['level'] == 'pemilik') { ?>
                    <a href="perhitungan_barang.php"><button type="button" class="btn btn-success text-white">Perhitungan Barang <i class="mdi mdi-calculator"></i></button></a>
                 <?php } ?>
                 

                  <?php 
                if(date('Y')>=$tahun_setelah) { ?>
                  <a data-toggle="modal" data-target="#delete_persediaan">
                        <button type="button" class="btn btn-danger text-white">
                          Hapus Data Persediaan Periode <?php echo $tahun_sebelum ?>
                           <i class="mdi mdi-delete"></i>
                             </button>
                      </a>
                 <?php } ?>

                  <br><br>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Stok</th>
                          <th>ROP</th>
                          <th>Safety Stock</th>
                          <th>Harga Beli</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                      $i = 1;
                      $query = "SELECT * FROM persediaan_barang";
                      $exec_query = mysqli_query($conn, $query);
                      while ($array = mysqli_fetch_array($exec_query)) {
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                        <td><?php echo $array['kode_barang']; ?></td>
                        <td><?php echo $array['nama_barang']; ?></td>
                        <td><?php echo $array['stok']; ?></td>
                        <td><?php echo $array['rop']; ?></td>
                        <td><?php echo $array['safety_stock']; ?></td>
                        <td><?php echo "Rp " .number_format($array['harga_beli'], 2); ?></td>
                       
                      <?php 
                      if($array['rop'] == null){ 
                          echo "Belum Melakukan Perhitungan Barang";
                          ?>
                       <?php }
                      elseif($array['stok'] <= $array['rop']){ ?>
                      <td style="background-color: red;">
                         <p style="color:white">Barang Sudah Mencapai Batas Minimum</p>
                      </td>
                       <?php  }  else{ ?>
                        <td>
                          <p class="text-success">Barang Masih Cukup</p>
                       </td>
                      <?php } ?>
                      
                      <td width="23%">
                      <?php
                      if($array['stok'] <= $array['rop']){ ?>
                       <a href="form_restock_persediaan_barang.php?kode_barang=<?php echo $array['kode_barang']?>&harga_beli=<?php echo $array['harga_beli'] ?>">
                        <button type="button" class="btn btn-danger text-white">
                          Restock <i class="mdi mdi-cart"></i>
                        </button>
                      </a>
                      <?php } ?>
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
