
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      Modified By &copy; <strong> Tes Programmer Atas Nama Muh Riqza Hadiyatullah Dari Pekalongan Tahun <?= date('Y')?></strong> | All rights reserved.
    </footer>
  
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
  
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url() ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables -->
  <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <!-- DataTables Responsive -->
  <script src="<?= base_url() ?>public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>public/dist/js/adminlte.js"></script>
  
  <!-- Sweet Alert -->
  <script src="<?= base_url() ?>public/plugins/sweetalert/js/sweetalert.min.js"></script>

  <!-- Toastr -->
  <script src="<?= base_url() ?>public/plugins/toastr/toastr.min.js"></script>

  <!-- Select2 -->
  <script src="<?= base_url() ?>public/plugins/select2/js/select2.full.min.js"></script>

  <!-- page script -->
  <?php $this->load->view('theme/script') ?>

</body>

</html>