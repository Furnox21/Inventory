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
                  <h4 class="card-title">Forms Restock Persediaan Barang</h4>
                  <form action="proses_restock_persediaan_barang.php" method="post">
                  <div class="form-group">
                    <?php 
                      $kode_barang = $_GET['kode_barang'];
                      $harga_beli = $_GET['harga_beli'];
                      $query = mysqli_query($conn, "SELECT MAX(id_pembelian) AS no_pembelian FROM pembelian");
                      $array = mysqli_fetch_array($query);
                      $data_array = $array['no_pembelian'];
                      $no_pembelian = (int) substr($data_array, 2, 8);

                      $no_pembelian++;
                      $huruf_kode = "BL";
                      $print_kode = $huruf_kode.sprintf("%08s", $no_pembelian);
                    ?>
                    <div class="form-group">
                    <label for="position-top-right">Kode Pembelian</label>
                    <input
                      type="text"
                      class="form-control demo"
                      value="<?php echo $print_kode ?>"
                      disabled                      
                    />
                    <input type="hidden" name="kode_pembelian" value="<?php echo $print_kode ?>"  />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Kode Barang</label>
                    <input
                      type="text"
                      class="form-control demo"
                      value="<?php echo $kode_barang ?>"
                      disabled                      
                    />
                    <input type="hidden" name="kode_barang" value="<?php echo $kode_barang ?>"  />
                  </div>
                  
                  <div class="form-group">
                    <label for="position-top-right">Harga Beli Barang</label>
                    <input
                      type="text"
                      class="form-control demo"
                      value="<?php echo "Rp " .number_format($harga_beli, 2); ?>"
                      disabled
                    />
                    <input
                      type="hidden"
                      id="harga_beli_barang"
                      class="form-control demo"
                      name="harga_beli"
                      value="<?php echo $harga_beli ?>"
                    />
                  </div>
                   <?php
                  $ambil_data_supplier = mysqli_query($conn, "SELECT *  FROM supplier ");
                    ?>
                    <div class="form-group">
                      <label class="control-label">Nama Supplier :</label>
                      <select name="id_supplier" class="form-control demo">
                        <option> Pilih Supplier </option>
                        <?php while ($action_ambil_data_supplier = mysqli_fetch_array($ambil_data_supplier)) { ?>
                          <option value="<?php echo $action_ambil_data_supplier['id_supplier']; ?>"> <?php echo $action_ambil_data_supplier['nama_supplier']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="position-top-right">Jumlah Beli</label>
                    <input
                      type="number"
                      id="quantity_beli"
                      class="form-control demo"
                      placeholder="Masukkan Jumlah Beli Barang"
                      name="jumlah_pembelian"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="position-top-right">Total Harga</label>
                    <input
                      type="text"
                      id="total_harga_beli_barang"
                      class="form-control demo"
                      disabled
                      
                    />
                  </div>
                    <input
                      type="hidden"
                      id="total_harga_beli_barang2"
                      class="form-control demo"
                      name="total_harga"
                      
                    />
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


