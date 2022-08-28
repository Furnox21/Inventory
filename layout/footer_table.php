        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
         Website Inventory Aisyah
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="dist/js/pages/mask/mask.init.js"></script>
    
    <script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>

    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>

    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript">
                    $(document).ready(function(){
                       $('#barangSelect').change(function(){
                      debugger
                        var kode_barang = $(this).val();
                        $.ajax({
                            url: 'ajax_get_barang.php',
                            data:"kode_barang="+kode_barang ,
                        }).done(function (data) {
                            var json = data,
                            obj = JSON.parse(json);
                            $('#harga_beli_barang').val(obj.harga_beli);
                            $('#harga_beli_barang2').val(obj.harga_beli);
                        });
                    });
                       });
    </script>
    <script type="text/javascript">
                    $(document).ready(function(){
                       $('#barangSelectForPersediaan').change(function(){
                      debugger
                        var kode_barang = $(this).val();
                        $.ajax({
                            url: 'ajax_get_barang_for_persediaan.php',
                            data:"kode_barang="+kode_barang ,
                        }).done(function (data) {
                            var json = data,
                            obj = JSON.parse(json);
                            $('#harga_jual_barang').val(obj.harga_jual);
                            $('#harga_jual_barang2').val(obj.harga_jual);
                        });
                    });
                       });


    </script>
    <script type="text/javascript">
                    $(document).ready(function(){
                       $('#quantity').change(function(){
                      debugger
                        var quantity = $("input[name=quantity]").val();
                        var harga = document.getElementById('harga_jual_barang2').value;
                        $.ajax({
                            url: 'ajax_total_harga_for_persediaan.php',
                            data:"quantity="+quantity+"&harga="+harga,
                        }).done(function (data) {
                            var json = data,
                            obj = JSON.parse(json);
                            $('#total_harga').val(obj.total_harga);
                            $('#total_harga2').val(obj.total_harga);
                        });
                    });
                       });
                    $(document).ready(function(){
                       $('#quantity_beli').change(function(){
                      debugger
                        var quantity = $("input[name=jumlah_pembelian]").val();
                        var harga = document.getElementById('harga_beli_barang').value;
                      debugger
                        $.ajax({
                            url: 'ajax_total_harga_beli_for_persediaan.php',
                            data:"quantity="+quantity+"&harga="+harga,
                        }).done(function (data) {
                            var json = data,
                            obj = JSON.parse(json);
                            $('#total_harga_beli_barang').val(obj.total_harga_beli_text);
                            $('#total_harga_beli_barang2').val(obj.total_harga_beli);
                            debugger
                        });
                    });
                       });
    </script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script>
      //***********************************//
      // For select 2
      //***********************************//
      $(".select2").select2();

      /*colorpicker*/
      $(".demo").each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
          control: $(this).attr("data-control") || "hue",
          position: $(this).attr("data-position") || "bottom left",

          change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
              console.log(value);
            }
          },
          theme: "bootstrap",
        });
      });
      /*datwpicker*/
      jQuery(".mydatepicker").datepicker();
      jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
      });
      var quill = new Quill("#editor", {
        theme: "snow",
      });
    </script>



<!-- jQuery library -->

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>