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
                  <h4 class="card-title">Forms Tambah Data Penjualan</h4>
                  <form action="proses_tambah_penjualan.php" method="post">
                    <?php 
                    $query = mysqli_query($conn, "SELECT MAX(id_penjualan) AS no_penjualan FROM penjualan");
                    $array = mysqli_fetch_array($query);
                    $data_array = $array['no_penjualan'];
                    $no_penjualan = (int) substr($data_array, 2, 6);

                    $no_penjualan++;
                    $huruf_kode = "PJ";
                    $print_kode = $huruf_kode.sprintf("%06s", $no_penjualan);
                    ?>
                  <div class="form-group">
                    <label for="position-top-right">No Penjualan</label>
                    <input
                      type="text"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      placeholder="Masukkan No Penjualan"
                      value="<?php echo $print_kode; ?>"
                      disabled
                      required
                    />
                    <input
                      type="hidden"
                      style="text-transform:uppercase"
                      class="form-control demo"
                      placeholder="Masukkan No Penjualan"
                      name="id_penjualan"
                      value="<?php echo $print_kode; ?>"
                      required
                    />
                  </div>
                   <div class="form-group">
                    <label for="position-top-right">Nama Barang</label>
                    <?php
                    $query_barang = mysqli_query($conn, "SELECT *  FROM persediaan_barang Order by nama_barang ");
                    ?>
                    <select name="kode_barang" class="select2 form-select shadow-none" id="barangSelectForPersediaan">
                         <option value='' disabled selected> Pilih Barang </option>
                         <?php while ($array_barang = mysqli_fetch_array($query_barang)) { ?>
                         <option value="<?php echo $array_barang['kode_barang']; ?>"> <?php echo $array_barang['nama_barang']; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Harga</label>
                    <input
                      type="number"
                      id="harga_jual_barang"
                      class="form-control demo"
                      required
                      disabled
                    />
                    <input
                      type="hidden"
                      id="harga_jual_barang2"
                      class="form-control demo"
                      name="harga_jual"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Quantity</label>
                    <input
                      type="number"
                      class="form-control demo"
                      placeholder="Masukkan Quantity Penjualan"
                      name="quantity"
                      id="quantity"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Total Harga</label>
                    <input
                      type="number"
                      id="total_harga"
                      class="form-control demo"
                      required
                      disabled
                    />
                    <input
                      type="hidden"
                      id="total_harga2"
                      class="form-control demo"
                      name="total_harga"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Tanggal Transaksi </label>
                    <input type="date" class="form-control" name="tanggal_transaksi" placeholder="mm/dd/yyyy">
                  </div>
                <div class="border-top">
                  <div class="card-body">
                    <button type="submit" class="btn btn-success text-white">
                      Save
                    </button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                  <a href="penjualan.php" class="btn btn-warning">Kembali</a>
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
