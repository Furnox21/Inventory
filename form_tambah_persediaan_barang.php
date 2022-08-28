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
                  <h4 class="card-title">Forms Tambah Data Persediaan Barang</h4>
                  <form action="proses_tambah_persediaan_barang.php" method="post">
                  <div class="form-group">
                    <label for="position-top-right">Kode Barang</label>
                    <?php
                    $query_barang = mysqli_query($conn, "SELECT *  FROM barang Order by nama_barang ");
                    ?>
                    <select name="kode_barang" class="select2 form-select shadow-none" id="barangSelect">
                         <option value='' disabled selected> Pilih Barang </option>
                         <?php while ($array_barang = mysqli_fetch_array($query_barang)) { ?>
                         <option value="<?php echo $array_barang['kode_barang']; ?>"> <?php echo $array_barang['nama_barang']; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Stok Awal</label>
                    <input
                      type="number"
                      class="form-control demo"
                      placeholder="Masukkan Stok Awal Barang"
                      name="stok"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Harga Beli Barang</label>
                    <input
                      type="number"
                      id="harga_beli_barang"
                      class="form-control demo"
                      required
                      disabled
                    />
                    <input
                      type="hidden"
                      id="harga_beli_barang2"
                      class="form-control demo"
                      name="harga_beli"
                      required
                    />
                  </div>
                <div class="border-top">
                  <div class="card-body">
                    <button type="submit" class="btn btn-success text-white">
                      Save
                    </button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                  <a href="barang.php" class="btn btn-warning">Kembali</a>
                  </div>
                  </form>
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


