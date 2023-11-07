  <div class="modal fade" id="verticalycentered<?=$userId?>GantiPassword" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ganti Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="<?=base_url()?>GantiPassword" enctype="multipart/form-data">  
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" name="userId" class="form-control" id="floatingInput" value="<?=$userId?>" hidden>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="passwordLama" class="form-control" id="floatingInput" placeholder="Masukkan Password Lama">
            <label for="floatingInput">Password Lama</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="passwordBaru" class="form-control" id="floatingInput" placeholder="Masukkan Baru">
            <label for="floatingInput">Password Baru</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ganti Password</button>
          </div>
        </div>
      </form>          
    </div>
  </div>
  <!-- Diagram -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Sweet Alert -->
  <script script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php 
  $dataSession = $session->get('statusTambah');
  $dataKeterangan = $session->get('keterangan');
  if($dataSession == "Berhasil"){ 
  ?>
  <script> swal("Selamat ! ", "<?= $dataKeterangan; ?>", "success"); </script>
  <?php 
  $arraySession = ['statusTambah','keterangan'];
  $session->remove($arraySession);
  }else if($dataSession == "Gagal"){
  ?>
  <script> swal("Gagal ! ", "<?= $dataKeterangan; ?>", "error"); </script>
  <?php 
  $arraySession = ['statusTambah','keterangan'];
  $session->remove($arraySession);
  } 
  ?>
</body>
</html>