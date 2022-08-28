<?php 
 session_start();
 include 'koneksi.php';

 if($_SESSION['level']==""){
        header("location:login.php");
 }
    $halaman = "kategori barang";
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
                  <a href="form_tambah_kategori_barang.php"><button type="button" class="btn btn-info">Tambah Data Kategori Barang <i class="mdi mdi-plus-circle"></i></button></a><br><br>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kategori</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                      $i = 1;
                      $query = "SELECT * FROM kategori";
                      $exec_query = mysqli_query($conn, $query);
                      while ($array = mysqli_fetch_array($exec_query)) {
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                        <td><?php echo $array['nama_kategori']; ?></td>
                        <td width="23%">
                          
                          <a href="form_edit_kategori_barang.php?id_kategori=<?php echo $array['id_kategori']?>">
                        <button type="button" class="btn btn-success text-white">
                          Edit
                           <i class="mdi mdi-grease-pencil"></i>
                             </button>
                      </a>
                       <a data-toggle="modal" data-target="#delete_kategori<?php echo $array['id_kategori']; ?>">
                        <button type="button" class="btn btn-danger text-white">
                          Delete
                           <i class="mdi mdi-delete"></i>
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
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM kategori");
                    while ($array = mysqli_fetch_array($query)) {
                  ?>
                  <div class="modal fade" role="document" id="delete_kategori<?php echo $array['id_kategori']; ?>">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <form action="proses_delete_kategori_barang.php" method="post">
                          <input type="hidden" name="id_kategori" value="<?php echo $array['id_kategori']; ?>">
                          <div class="modal-header">
                            <h4>Hapus Data Kategori Barang</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <div class="modal-body">
                            <p>Apakah Anda Yakin Menghapus Data Ini ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Ya</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
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
