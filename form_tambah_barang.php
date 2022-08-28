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
                  <h4 class="card-title">Forms Tambah Data Barang</h4>
                  <form action="proses_tambah_barang.php" method="post">
                  <div class="form-group">
                    <label for="position-top-right">Kode Barang</label>
                    <?php 
                    $query = mysqli_query($conn, "SELECT MAX(kode_barang) AS kode_barang FROM barang");
                    $data = mysqli_fetch_array($query);
                    $dataQuery = $data['kode_barang'];
                    $dataQuery++;
                    
                    ?>
                    <input
                      type="hidden"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      placeholder="Masukkan Kode Barang"
                      name="kode_barang"
                      value="<?php echo $dataQuery; ?>"
                      required
                    />
                     <input
                      type="number"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      placeholder="Masukkan Kode Barang"
                      value="<?php echo $dataQuery; ?>"
                      disabled
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Nama Barang</label>
                    <input
                      type="text"
                      class="form-control demo"
                      placeholder="Masukkan Nama Barang"
                      name="nama_barang"
                      required
                    />
                  </div>
                  <?php
                  $ambilDataKategori = mysqli_query($conn, "SELECT *  FROM kategori ");
                    ?>
                    <div class="form-group">
                      <label class="control-label">Nama Kategori :</label>
                      <select name="id_kategori" class="form-control demo">
                        <option> Pilih Kategori </option>
                        <?php while ($actionAmbilDataKategori = mysqli_fetch_array($ambilDataKategori)) { ?>
                          <option value="<?php echo $actionAmbilDataKategori['id_kategori']; ?>"> <?php echo $actionAmbilDataKategori['nama_kategori']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="position-top-right">Harga Beli</label>
                    <input
                      type="number"
                      class="form-control demo"
                      placeholder="Masukkan Harga Beli Barang (IDR)"
                      name="harga_beli"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Harga Jual</label>
                    <input
                      type="number"
                      class="form-control demo"
                      placeholder="Masukkan Harga Jual Barang (IDR)"
                      name="harga_jual"
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
