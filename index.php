<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "index";
 include 'layout/header.php';
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
              <h4 class="page-title">Dashboard Inventory PT.Wahana Tata Griya</h4>
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
             <?php
              $query_penjualan_bulananan = mysqli_query($conn, "SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = MONTH(NOW()) and YEAR(tanggal_transaksi) = YEAR(NOW())");
              $penjualan_bulanan = mysqli_fetch_array($query_penjualan_bulananan);
              $total_penjualan = $penjualan_bulanan['total_penjualan'];
              

              $query_pembelian_bulanan = mysqli_query($conn,"SELECT SUM(harga_beli*jumlah_pembelian) as total_pembelian FROM `pembelian` WHERE MONTH(tanggal_pembelian) = MONTH(NOW()) and YEAR(tanggal_pembelian) = YEAR(NOW())");
              $pembelian_bulanan = mysqli_fetch_array($query_pembelian_bulanan);
              $total_pembelian = $pembelian_bulanan['total_pembelian'];

              $query_jumlah_barang = mysqli_query($conn, "SELECT COUNT(kode_barang) as total_barang FROM barang");
              $jumlah_barang = mysqli_fetch_array($query_jumlah_barang);
              $total_barang = $jumlah_barang['total_barang'];

              $query_jumlah_supplier = mysqli_query($conn, "SELECT COUNT(id_supplier) as total_supplier FROM supplier");
              $jumlah_supplier = mysqli_fetch_array($query_jumlah_supplier);
              $total_supplier = $jumlah_supplier['total_supplier'];

            ?>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                <i class="mdi mdi-cart fs-3 mb-1 font-16" style="color: white"></i>
                <h5 class="mb-0 mt-1" style="color: white"><?php echo "Rp " .number_format($total_penjualan, 2); ?>
                </h5>
                <small class="font-light" style="color: white">Penjualan Bulan Ini</small>
                </div>



              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                <i class="mdi mdi-cart fs-3 mb-1 font-16" style="color: white"></i>
                <h5 class="mb-0 mt-1" style="color: white"><?php echo "Rp " .number_format($total_pembelian, 2); ?>
                </h5>
                <small class="font-light" style="color: white">Pembelian Bulan Ini</small>
                </div>

              </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                <i class="mdi mdi-cart fs-3 mb-1 font-16" style="color: white"></i>
                <h5 class="mb-0 mt-1" style="color: white"><?php echo $total_barang; ?>
                </h5>
                <small class="font-light" style="color: white">Jumlah Barang</small>
                </div>

              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                <i class="mdi mdi-cart fs-3 mb-1 font-16" style="color: white"></i>
                <h5 class="mb-0 mt-1" style="color: white"><?php echo $total_supplier; ?>
                </h5>
                <small class="font-light" style="color: white">Jumlah Supplier</small>
                </div>

              </div>
            </div>
            <div class="row">
            
            <div class="col-md-6 col-xlg-3">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">News Updates</h4>
                  <div class="row">
	                  <div class="col-md">
	                    <?php
                      $conn=mysqli_connect("localhost","root","","inventory1");    
                       
                      $ambildatastok = mysqli_query($conn, "select * from persediaan_barang where stok <= rop");

                      while($fetch=mysqli_fetch_array($ambildatastok)){
                        $namabarang = $fetch['nama_barang'];
                      ?>
			      <div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Perhatian</h4>
                Stok Barang <?=$namabarang?> Akan Habis Lakukan Pembelian Kembali 
            </div>
			          <?php
                      }
                  ?>
	                  </div>
                  </div>
                <ul class="list-style-none">
                  <li class="d-flex no-block card-body">     
                </div>
              </div>
            </div>
            </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Grafik Penjualan Tahun <?php echo date('Y') ?></h5>
                  <div class="bars" style="height: 600px">
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $januari = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 01 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_januari = mysqli_fetch_array($januari);
          $tampil_penjualan_januari = $penjualan_januari['total_penjualan'];
          if($tampil_penjualan_januari == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_januari;
          }
          ?>,
          <?php 
          $februari = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 02 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_februari = mysqli_fetch_array($februari);
          $tampil_penjualan_februari = $penjualan_februari['total_penjualan'];
          if($tampil_penjualan_februari == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_februari;
          }
          ?>, 
          <?php 
          $maret = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 03 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_maret = mysqli_fetch_array($maret);
          $tampil_penjualan_maret = $penjualan_maret['total_penjualan'];
          if($tampil_penjualan_maret == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_maret;
          }
          ?>, 
          <?php 
          $april = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 04 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_april = mysqli_fetch_array($april);
          $tampil_penjualan_april = $penjualan_april['total_penjualan'];
          if($tampil_penjualan_april == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_april;
          }
          ?>,
          <?php 
          $mei = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 05 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_mei = mysqli_fetch_array($mei);
          $tampil_penjualan_mei = $penjualan_mei['total_penjualan'];
          if($tampil_penjualan_mei == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_mei;
          }
          ?>,
          <?php 
          $juni = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 06 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_juni = mysqli_fetch_array($juni);
          $tampil_penjualan_juni = $penjualan_juni['total_penjualan'];
          if($tampil_penjualan_juni == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_juni;
          }
          ?>,
          <?php 
          $juli = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 07 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_juli = mysqli_fetch_array($juli);
          $tampil_penjualan_juli = $penjualan_juli['total_penjualan'];
          if($tampil_penjualan_juli == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_juli;
          }
          ?>,
          <?php 
          $agustus = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 08 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_agustus = mysqli_fetch_array($agustus);
          $tampil_penjualan_agustus = $penjualan_agustus['total_penjualan'];
          if($tampil_penjualan_agustus == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_agustus;
          }
          ?>,
          <?php 
          $september = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 09 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_september = mysqli_fetch_array($september);
          $tampil_penjualan_september = $penjualan_september['total_penjualan'];
          if($tampil_penjualan_september == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_september;
          }
          ?>,
          <?php 
          $oktober = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 10 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_oktober = mysqli_fetch_array($oktober);
          $tampil_penjualan_oktober = $penjualan_oktober['total_penjualan'];
          if($tampil_penjualan_oktober == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_oktober;
          }
          ?>,
          <?php 
          $november = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 11 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_november = mysqli_fetch_array($november);
          $tampil_penjualan_november = $penjualan_november['total_penjualan'];
          if($tampil_penjualan_november == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_november;
          }
          ?>,
          <?php 
          $desember = mysqli_query($conn,"SELECT sum(total_harga) as total_penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = 12 and YEAR(tanggal_transaksi) = YEAR(NOW())");
          $penjualan_desember = mysqli_fetch_array($desember);
          $tampil_penjualan_desember = $penjualan_desember['total_penjualan'];
          if($tampil_penjualan_desember == 0){
            echo "0";
          }else{
            echo $tampil_penjualan_desember;
          }
          ?>,
          ],
          backgroundColor:"rgba(78, 115, 223, 1)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
    <?php include 'layout/footer.php'; ?>
