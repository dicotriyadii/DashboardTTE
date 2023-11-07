  <?php
  include('link/header.php')
  ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <?php
      if($hakAkses == 1){?>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="margin-bottom:15px;">Tambah Data Tanda Tangan Elektronik</button><br>
      <?php
      }
      ?>
      <div class="row">
          <div class="row">
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Data Keseluruhan</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people" style="color:blue;"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$dataKeseluruhan['data']?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Sudah Aktivasi</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people" style="color:green;"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$sudahAktivasi['data']?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Belum Aktivasi</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people" style="color:orange;"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$belumAktivasi['data']?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Belum Set Passphrase</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people" style="color:gray;"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$belumSetPassphrase['data']?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Belum Daftar</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people" style="color:red;"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$belumDaftar['data']?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card info-card sales-card">
        <div class="card-body">
          <canvas id="myChart" style="height:100px;"></canvas>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById('myChart');

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Data Keseluruhan','Sudah Aktivasi', 'Belum Aktivasi', 'Belum Set Passphrases','Belum Daftar'],
          datasets: [{
            label: 'Data Grafik Tanda Tangan Elektronik',
            data: [<?=$dataKeseluruhan['data']?>,<?=$sudahAktivasi['data']?>, <?=$belumAktivasi['data']?>, <?=$belumSetPassphrase['data']?>,<?=$belumDaftar['data']?>],
            backgroundColor: [
              'rgba(0,191,255,0.5)',
              'rgba(50,205,50,0.5)',
              'rgb(255,127,80,0.5)',
              'rgb(211,211,211,0.5)',
              'rgb(255,0,0,0.5)'
            ],
            borderColor: [
              'rgba(0,191,255,0.5)',
              'rgba(50,205,50,0.5)',
              'rgb(255,127,80,0.5)',
              'rgb(211,211,211,0.5)',
              'rgb(255,0,0,0.5)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
  </main><!-- End #main -->
  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Master Jabatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="<?=base_url()?>TambahDataTTE" enctype="multipart/form-data">  
          <div class="modal-body">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <select name="opd" class="form-control" id="floatingInput">
                  <option value=""> - Pilih OPD -</option>
                  <?php
                  foreach($dataOpd as $do){?>
                  <option value="<?=$do['idOpd']?>"> <?=$do['namaOpd']?> </option>
                  <?php
                  }
                  ?>
                </select>
                <label for="floatingInput">OPD</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="namaPegawai" class="form-control" id="floatingInput" placeholder="Masukkan Nama Jabatan">
                <label for="floatingInput">Nama Pegawai</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" id="floatingInput" placeholder="Masukkan Nama Jabatan">
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nip" class="form-control" id="floatingInput" placeholder="Masukkan Nama Jabatan">
                <label for="floatingInput">NIP</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nik" class="form-control" id="floatingInput" placeholder="Masukkan Nama Jabatan">
                <label for="floatingInput">NIK</label>
              </div>
              <div class="form-floating mb-3">
                <select name="status" class="form-control" id="floatingInput">
                  <option value=""> - Pilih Status -</option>
                  <?php
                  foreach($dataStatus as $do){?>
                  <option value="<?=$do['idStatus']?>"> <?=$do['namaStatus']?> </option>
                  <?php
                  }
                  ?>
                </select>
                <label for="floatingInput">Status</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Master Jabatan</button>
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