<?php
  include('link/header.php')
  ?>
  <main id="main" class="main">
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:35px;">Data Pengguna Tanda Tangan Elektronik</h5>
                <p>Data yang ditampilkan merupakan data pegawai aparat sipil negara Kabupaten Deli Serdang yang menggunakan Tanda Tangan Elektronik</p>
                <form method="POST" action="<?=base_url()?>PencarianDataTTE" enctype="multipart/form-data">  
                  <input type="text" name="nip" style="width:200px;padding:5px;margin-top:10px;border-radius:10px;" placeholder="Masukkan NIP">
                  <input type="text" name="nik" style="width:200px;padding:5px;margin-top:10px;border-radius:10px;" placeholder="Masukkan NIK">
                  <?php
                  if($hakAkses == 1){?>
                    <select name="opd" style="width:200px;padding:6px;margin-top:10px;border-radius:10px;">
                    <option value=""> - Pilih OPD -</option>
                    <?php
                    foreach($dataOpd as $do){?>
                    <option value="<?=$do['idOpd']?>"> <?=$do['namaOpd']?> </option>
                    <?php
                    }
                    ?>
                    </select>
                    <?php
                  }
                  ?>
                  <select name="status" style="width:200px;padding:6px;margin-top:10px;border-radius:10px;">
                    <option value=""> - Pilih Status -</option>
                    <?php
                    foreach($dataStatus as $ds){?>
                    <option value="<?=$ds['idStatus']?>"> <?=$ds['namaStatus']?> </option>
                    <?php
                    }
                    ?>
                  </select>
                  <button class="btn btn-primary" type="submit"><i class="bi bi-search" style="color:white"></i></button><br>
                </form>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Opd</th>
                      <th scope="col">Nama Pegawai</th>
                      <th scope="col">Status</th>
                      <?php
                      if($hakAkses == 1){?>
                      <th scope="col">Action</th>
                      <?php
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataTTE as $dt){
                    $no++;
                    ?>
                    <tr>
                      <th><?=$no;?></th>
                      <td><?=$dt['namaOpd'];?></td>
                      <td><?=$dt['namaPegawai'];?></td>
                      <td><?=$dt['namaStatus'];?></td>
                      <?php
                      if($hakAkses == 1){
                      ?>
                      <td>
                        <a href="" style="color:orange;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dt['idTte']?>update"><i class="bi bi-sliders" style="font-size:25px;font-weight:bold;color:orange"></i></a>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dt['idTte']?>"><i class="bi bi-pencil" style="font-size:25px;font-weight:bold;color:green"></i></a>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dt['idTte']?>Detail"><i class="bi bi-eye" style="font-size:25px;font-weight:bold;color:gray"></i></a>
                        <a href="<?=base_url()?>HapusDataTTE/<?=$dt['idTte']?>/<?=$username?>" style="color:red;"><i class="bi bi-trash" style="font-size:25px;font-weight:bold;color:red"></i></a>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="verticalycentered<?=$dt['idTte']?>" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Edit Data TTE</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="POST" action="<?=base_url()?>EditDataTTE" enctype="multipart/form-data">  
                                  <div class="modal-body">
                                    <div class="form-floating mb-3">
                                    <input type="text" name="idTte" class="form-control" id="floatingInput" value="<?=$dt['idTte']?>" hidden>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <input type="text" name="opd" class="form-control" id="floatingInput" value="<?=$dt['idOpd']?>" hidden>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <input type="text" name="status" class="form-control" id="floatingInput" value="<?=$dt['idStatus']?>" hidden>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="text" name="namaPegawai" class="form-control" id="floatingInput" value="<?=$dt['namaPegawai']?>">
                                      <label for="floatingInput">Nama Pegawai</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="text" name="email" class="form-control" id="floatingInput" value="<?=$dt['email']?>">
                                      <label for="floatingInput">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="text" name="nip" class="form-control" id="floatingInput" value="<?=$dt['nip']?>">
                                      <label for="floatingInput">NIP</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="text" name="nik" class="form-control" id="floatingInput" value="<?=$dt['nik']?>">
                                      <label for="floatingInput">NIK</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Edit Data TTE</button>
                                    </div>
                                  </div>
                                </div>
                              </form>          
                            </div>
                          </div>
                        </div>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="verticalycentered<?=$dt['idTte']?>Detail" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Detai Data Pegawai TTE</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                                  <div class="modal-body">
                                    <div class="form-floating mb-3">
                                      <label for="floatingInput">OPD</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="text" name="namaPegawai" class="form-control" id="floatingInput" value="<?=$dt['namaPegawai']?>">
                                      <label for="floatingInput">Nama Pegawai</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="text" name="email" class="form-control" id="floatingInput" value="<?=$dt['email']?>">
                                      <label for="floatingInput">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="text" name="nip" class="form-control" id="floatingInput" value="<?=$dt['nip']?>">
                                      <label for="floatingInput">NIP</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="text" name="nik" class="form-control" id="floatingInput" value="<?=$dt['nik']?>">
                                      <label for="floatingInput">NIK</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>     
                            </div>
                          </div>
                        </div>
                        <!-- Modal Update Status -->
                        <div class="modal fade" id="verticalycentered<?=$dt['idTte']?>update" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Update Status Pegawai</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                                <form method="POST" action="<?=base_url()?>UpdateStatusTTE" enctype="multipart/form-data">  
                                  <div class="modal-body">
                                    <div class="form-floating mb-3">
                                    <input type="text" name="idTte" class="form-control" id="floatingInput" value="<?=$dt['idTte']?>" hidden>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <select name="status" class="form-control">
                                          <option value="<?=$dt['idStatus']?>"><?=$dt['namaStatus']?></option>
                                          <?php
                                          foreach($dataStatus as $ds){?>
                                          <option value="<?=$ds['idStatus']?>"> <?=$ds['namaStatus']?> </option>
                                          <?php
                                          }
                                          ?>
                                        </select>
                                      <label for="floatingInput">Update Status</label>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Update Status</button>
                                    </div>
                                  </div>
                                </div>
                              </form>     
                            </div>
                          </div>
                        </div>
                      </td>
                      <?php
                      }
                      ?>
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
  <?php
  include('link/footer.php')
  ?>