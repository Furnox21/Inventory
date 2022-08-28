<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "supplier";
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
              <h4 class="page-title">Data Supplier</h4>
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
                  <h4 class="card-title">Forms Tambah Data Supplier</h4>
                  <form action="proses_tambah_supplier.php" method="post">
                    <div class="form-group">
                    <?php 
                    $query = mysqli_query($conn, "SELECT MAX(id_supplier) AS kode_supplier FROM supplier");
                    $array = mysqli_fetch_array($query);
                    $data_array = $array['kode_supplier'];
                    $kode_supplier = (int) substr($data_array, 3, 6);

                    $kode_supplier++;
                    $huruf_kode = "PS-";
                    $print_kode = $huruf_kode.sprintf("%03s", $kode_supplier);
                    ?>
                    <label for="position-top-right">Kode Supplier</label>
                    <input
                      type="hidden"
                      class="form-control demo"
                      placeholder="Masukkan Kode Supplier"
                      name="id_supplier"
                      value="<?php echo $print_kode ?>"
                    />
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Kode Supplier"
                      value="<?php echo $print_kode ?>"
                      disabled
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Nama Supplier</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Nama Supplier"
                      name="nama_supplier"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Alamat</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Alamat Supplier"
                      name="alamat"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Nomor Telepon</label>
                    <input
                      type="number"
                      class="form-control demo"
                      placeholder="Masukkan Nomor Telepon Supplier"
                      name="no_telepon"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Kontak</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Kontak Supplier"
                      name="kontak"
                      required
                    />
                  </div>
                <div class="border-top">
                  <div class="card-body">
                    <button type="submit" class="btn btn-success text-white">
                      Save
                    </button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                  <a href="supplier.php" class="btn btn-warning">Kembali</a>
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
