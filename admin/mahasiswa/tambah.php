<?php
require_once '../template/header/header.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/">Home</a></li>
              <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/mahasiswa/data.php">Data Mahasiswa</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Mahasiswa</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">No Induk</label>
                <input type="text" id="no_induk_mahasiswa" name="no_induk_mahasiswa"class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Alamat</label>
                <input type="text" id="alamat_mahasiswa" name="alamat_mahasiswa"class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Jenis Kelamin</label>
              <div class="col-4">
                <select class="form-control select2" style="width: 100%;" name="jekel_mahasiswa" id="jekel_mahasiswa">
                  <option selected="selected" value="-">- Pilih -</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              </div>

              <!-- Tempat Lahir -->
              <div class="form-group">
                <label for="inputDescription">Tempat Lahir</label>
                <input id="tempat_lahir_mahasiswa" name="tempat_lahir_mahasiswa" class="form-control" >
              </div>

              <!-- TTL -->
              <div class="form-group">
                <label for="inputName">Tanggal Lahir</label>
                <div class="row">

                  <!-- Tanggal -->
                  <div class="col-2">
                    <select class="form-control select2" style="width: 100%;" name="tanggal" id="tanggal">
                      <option selected="selected" value="-">- Tgl -</option>
                      <?php
                        for ($tgl = 1; $tgl <= 31; $tgl++) {
                          echo "<option value='$tgl'>$tgl</option>";
                        }
                      ?>
                    </select>
                  </div>

                  <!-- Bulan -->
                  <div class="col-4">
                  <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
                      <option selected="selected" value="-">- Bulan -</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                  </div>

                  <!-- Tahun -->
                  <div class="col-3">
                  <select class="form-control select2" style="width: 100%;" name="tahun" id="tahun">
                      <option selected="selected" value="-">- Tahun -</option>
                      <?php
                        for ($thn = 2021; $thn >= 1910; $thn--) {
                          echo "<option value='$thn'>$thn</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>


              <div class="col-12">
              <button type="submit" name="submit_mahasiswa" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/spk_pm_unm/admin/mahasiswa/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
            </div>
            </form>
            </div>
            <!-- /.card-body -->

            <br>
          </div>
          <!-- /.card -->


        </div>
      </div>
    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>