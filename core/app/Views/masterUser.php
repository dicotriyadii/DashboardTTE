  <?php
  include('link/header.php')
  ?>
  <main id="main" class="main">
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:35px;">Data User</h5>
                <p>Master User merupakan kumpulan data User</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Tambah Master User</button><br>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Nama</th>
                      <th scope="col">OPD</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataUser as $dp){
                    $no++;
                    ?>
                    <tr>
                      <th><?=$no;?></th>
                      <td><?=$dp['username'];?></td>
                      <td><?=$dp['nama'];?></td>
                      <td><?=$dp['namaOpd'];?></td>
                      <td>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dp['userId']?>"><i class="bi bi-pencil" style="font-size:25px;font-weight:bold;color:green"></i></a>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dp['userId']?>GantiPassword"><i class="bi bi-lock" style="font-size:25px;font-weight:bold;color:gray"></i></a>
                        <a href="<?=base_url()?>HapusUser/<?=$dp['userId']?>/<?=$username?>" style="color:red;"><i class="bi bi-trash" style="font-size:25px;font-weight:bold;color:red"></i></a>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="verticalycentered<?=$dp['userId']?>" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Edit User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="POST" action="<?=base_url()?>EditUser" enctype="multipart/form-data">  
                                <div class="modal-body">
                                  <div class="form-floating mb-3">
                                    <input type="text" name="userId" class="form-control" id="floatingInput" value="<?=$dp['userId']?>" hidden>
                                    <input type="text" name="username" class="form-control" id="floatingInput" value="<?=$dp['username']?>">
                                    <label for="floatingInput">Username</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="nama" class="form-control" id="floatingInput" value="<?=$dp['nama']?>">
                                    <label for="floatingInput">Nama</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <select name="opd" class="form-control">
                                      <option value="<?=$dp['idOpd']?>"><?=$dp['namaOpd']?></option>
                                      <?php
                                      foreach($dataOpd as $do){?>
                                      <option value="<?=$do['idOpd']?>"><?=$do['namaOpd']?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                    <label for="floatingInput">OPD</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <select name="hakAkses" class="form-control">
                                      <option value="<?=$dp['idHakAkses']?>"><?=$dp['namaHakAkses']?></option>
                                      <?php
                                      foreach($dataHakAkses as $da){?>
                                      <option value="<?=$da['idHakAkses']?>"><?=$da['namaHakAkses']?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                    <label for="floatingInput">Hak Akses</label>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit User</button>
                                  </div>
                                </div>
                              </form>          
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="verticalycentered<?=$dp['userId']?>GantiPassword" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Ganti Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="POST" action="<?=base_url()?>GantiPassword" enctype="multipart/form-data">  
                                <div class="modal-body">
                                  <div class="form-floating mb-3">
                                    <input type="text" name="userId" class="form-control" id="floatingInput" value="<?=$dp['userId']?>" hidden>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="userId" class="form-control" id="floatingInput" value="<?=$dp['userId']?>" hidden>
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
          <h5 class="modal-title">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahUser" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Masukkan Username">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukkan nama">
                <label for="floatingInput">Nama</label>
              </div>
              <div class="form-floating mb-3">
                <select name="opd" class="form-control">
                  <option value="">- Pilih OPD -</option>
                  <?php
                  foreach($dataOpd as $do){?>
                  <option value="<?=$do['idOpd']?>"><?=$do['namaOpd']?></option>
                  <?php
                  }
                  ?>
                </select>
                <label for="floatingInput">OPD</label>
              </div>
              <div class="form-floating mb-3">
                <select name="hakAkses" class="form-control">
                  <option value="">- Pilih Hak Akses -</option>
                  <?php
                  foreach($dataHakAkses as $da){?>
                  <option value="<?=$da['idHakAkses']?>"><?=$da['namaHakAkses']?></option>
                  <?php
                  }
                  ?>
                </select>
                <label for="floatingInput">Hak Akses</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah User</button>
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