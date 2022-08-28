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
                  <h4 class="card-title">Forms Edit Data Karyawan</h4>
                  <form action="proses_edit_karyawan.php" method="post">
                    <?php 
                    $id_pengguna = $_GET['id_pengguna'];
                    $query = mysqli_query($conn,"SELECT * From pengguna where id_pengguna='$id_pengguna'");
                    $exec_query = mysqli_fetch_array($query);
                    $nama_pengguna = $exec_query['nama_pengguna'];
                    $username = $exec_query['username'];
                    $password = $exec_query['password'];
                    $alamat = $exec_query['alamat'];
                     ?>
                  <div class="form-group">
                    <label for="position-top-right">ID Karyawan</label>
                    <input
                      type="text"
                      class="form-control demo"
                      value="<?php echo $id_pengguna ?>"
                      required
                      disabled
                    />
                    <input
                      type="hidden"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      name="id_pengguna"
                      value="<?php echo $id_pengguna ?>"
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Nama Karyawan</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Nama Karyawan"
                      name="nama_pengguna"
                      value="<?php echo $nama_pengguna ?>"
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
                      value="<?php echo $username ?>"
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
                      value="<?php echo $password ?>"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Alamat</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Alamat"
                      value="<?php echo $alamat ?>"
                      name="alamat"
                      required
                    />
                  </div>
                <div class="border-top">
                  <div class="card-body">
                    <button type="submit" class="btn btn-success text-white">
                      Edit
                    </button>
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
