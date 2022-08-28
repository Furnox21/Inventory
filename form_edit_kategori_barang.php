<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "kategori_barang";
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
              <h4 class="page-title">Data Kategori Barang</h4>
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
                  <h4 class="card-title">Forms Edit Data Kategori Barang</h4>
                  <form action="proses_edit_kategori_barang.php" method="post">
                    <?php 
                    $id_kategori = $_GET['id_kategori'];
                    $query = mysqli_query($conn,"SELECT * From kategori where id_kategori='$id_kategori'");
                    $exec_query = mysqli_fetch_array($query);
                    $nama_kategori = $exec_query['nama_kategori'];
                     ?>
                  <div class="form-group">
                    <label for="position-top-right">Kode Kategori Barang</label>
                    <input
                      type="text"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      placeholder="Masukkan Kode Barang"
                      value="<?php echo $id_kategori ?>"
                      required
                      disabled
                    />
                    <input
                      type="hidden"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      name="id_kategori"
                      placeholder="Masukkan Kode Barang"
                      value="<?php echo $id_kategori ?>"
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Nama Kategori Barang</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Nama Barang"
                      name="nama_kategori"
                      value="<?php echo $nama_kategori ?>"
                      required
                    />
                  </div>
                <div class="border-top">
                  <div class="card-body">
                    <button type="submit" class="btn btn-success text-white">
                      Edit
                    </button>
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
