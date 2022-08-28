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
                  <h4 class="card-title">Forms Edit Data Supplier</h4>
                  <form action="proses_edit_supplier.php" method="post">
                    <?php 
                    $id_supplier = $_GET['id_supplier'];
                    $query = mysqli_query($conn,"SELECT * From supplier where id_supplier='$id_supplier'");
                    $exec_query = mysqli_fetch_array($query);
                    $nama_supplier = $exec_query['nama_supplier'];
                    $alamat = $exec_query['alamat'];
                    $no_telepon = $exec_query['no_telepon'];
                    $kontak = $exec_query['kontak'];
                     ?>
                  <div class="form-group">
                    <label for="position-top-right">ID Supplier</label>
                    <input
                      type="text"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      value="<?php echo $id_supplier ?>"
                      required
                      disabled
                    />
                    <input
                      type="hidden"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      name="id_supplier"
                      value="<?php echo $id_supplier ?>"
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Nama Supplier</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Nama Supplier"
                      name="nama_supplier"
                      value="<?php echo $nama_supplier ?>"
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
                  <div class="form-group">
                    <label for="position-top-right">Nomor Telepon</label>
                    <input
                      type="number"
                      class="form-control demo"
                      placeholder="Masukkan Nomor Telepon"
                      value="<?php echo $no_telepon ?>"
                      name="no_telepon"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Kontak</label>
                    <input
                      type="number"
                      class="form-control demo"
                      placeholder="Masukkan Kontak"
                      value="<?php echo $kontak ?>"
                      name="kontak"
                      required
                    />
                  </div>
                <div class="border-top">
                  <div class="card-body">
                    <button type="submit" class="btn btn-success text-white">
                      Edit
                    </button>
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
