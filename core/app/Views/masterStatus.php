  <?php
  include('link/header.php')
  ?>
  <main id="main" class="main">
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:35px;">Master Status</h5>
                <p>Master Status merupakan data umum untuk menentukan status Pekerjaan yang sudah ditentukan ke pegawai</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Tambah Master Status</button><br>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Jenis Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataStatus as $ds){
                    $no++;
                    ?>
                    <tr>
                      <th><?=$no;?></th>
                      <td><?=$ds['namaStatus']?></td>
                      <td>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$ds['idStatus']?>"><i class="bi bi-pencil" style="font-size:25px;font-weight:bold;color:green"></i></a>
                        <a href="<?=base_url()?>HapusStatus/<?=$ds['idStatus']?>/<?=$username?>" style="color:red;"><i class="bi bi-trash" style="font-size:25px;font-weight:bold;color:red"></i></a>
                        <div class="modal fade" id="verticalycentered<?=$ds['idStatus']?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Master Status</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="<?=base_url()?>EditStatus" enctype="multipart/form-data">  
                              <div class="modal-body">
                                <div class="modal-body">
                                  <div class="form-floating mb-3">
                                    <input type="text" name="idStatus" class="form-control" id="floatingInput" value="<?=$ds['idStatus'];?>" hidden>
                                    <input type="text" name="namaStatus" class="form-control" id="floatingInput" value="<?=$ds['namaStatus'];?>">
                                    <label for="floatingInput">Nama Status</label>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit Master Status</button>
                                  </div>
                                </div>
                              </div>
                            </form>          
                          </div>
                        </div>
                      </div>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>
  </main><!-- End #main -->
  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Master Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="<?=base_url()?>TambahStatus" enctype="multipart/form-data">  
          <div class="modal-body">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="namaStatus" class="form-control" id="floatingInput" placeholder="Masukkan Nama Status">
                <label for="floatingInput">Nama Status</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Master Status</button>
              </div>
            </div>
          </div>
        </form>          
      </div>
    </div>
  </div>
  <?php
  include('link/footer.php')
  ?>