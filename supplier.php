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
                  <a href="form_tambah_supplier.php"><button type="button" class="btn btn-info">Tambah Data Supplier <i class="mdi mdi-plus-circle"></i></button></a><br><br>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Supplier</th>
                          <th>Alamat</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                      $i = 1;
                      $query = "SELECT * FROM supplier";
                      $exec_query = mysqli_query($conn, $query);
                      while ($array = mysqli_fetch_array($exec_query)) {
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                        <td><?php echo $array['nama_supplier']; ?></td>
                        <td><?php echo $array['alamat']; ?></td>
                        <td width="23%">
                        
                        <a href="detail_barang_supplier.php?id_supplier=<?php echo $array['id_supplier']?>">
                        <button type="button" class="btn btn-warning text-white">
                          Detail
                           <i class="mdi mdi-eye"></i>
                        </button>
                        </a>
                        <a href="form_edit_supplier.php?id_supplier=<?php echo $array['id_supplier']?>">
                        <button type="button" class="btn btn-success text-white">
                          Edit
                           <i class="mdi mdi-grease-pencil"></i>
                        </button>
                        </a>
                        </td>
                        </tr>
                         <?php } ?>
                      </tbody>
                      <!-- <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr>
                      </tfoot> -->
                    </table>
                  </div>
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
