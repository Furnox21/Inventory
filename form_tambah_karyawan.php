<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "karyawan";
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
              <h4 class="page-title">Data Karyawan</h4>
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
                  <h4 class="card-title">Forms Tambah Data Karyawan</h4>
                  <form action="proses_tambah_karyawan.php" method="post">
                  <div class="form-group">
                    <label for="position-top-right">Nama Karyawan</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Nama Karyawan"
                      name="nama_pengguna"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Username</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Username"
                      name="username"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Password</label>
                    <input
                      type="password"
                      class="form-control demo"
                      placeholder="Masukkan Password"
                      name="password"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Alamat</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Alamat"
                      name="alamat"
                      required
                    />
                  </div>
                 
                <div class="border-top">
                  <div class="card-body">
                    <button type="submit" class="btn btn-success text-white">
                      Save
                    </button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                  <a href="karyawan.php" class="btn btn-warning">Kembali</a>
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
