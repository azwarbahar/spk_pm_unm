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
            <h1 class="m-0 text-dark">Data Kriteria</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/">Home</a></li>
              <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/kriteria/data.php">Data Kriteria</a></li>
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
              <h3 class="card-title">Tambah Kriteria</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

            <?php
              $id_last_kriteria = mysqli_query($conn, "SELECT id_kriteria FROM tb_kriteria ORDER BY id_kriteria DESC LIMIT 1");
              $get_last_id = "";
              while ($row = mysqli_fetch_assoc($id_last_kriteria)) {
                $get_last_id = $row['id_kriteria'];
              }
            ?>

              <div class="form-group">
                <label for="inputName">Kode</label>
                <input type="text" value="KT-00<?= $get_last_id + 1 ?>" disabled class="form-control">
                <input type="hidden" value="KT-00<?= $get_last_id + 1 ?>" id="kode_keriteria" name="kode_keriteria"class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Aspek</label>
                <select class="form-control select2" style="width: 100%;" name="id_aspek" id="id_aspek">
                    <option selected="selected">---- Pilih ----</option>
                    <?php
                      $result=mysqli_query($conn,'SELECT * FROM tb_aspek');
                      while($row=mysqli_fetch_assoc($result)) {
                        echo "<option value='$row[id_aspek]'>$row[nama_aspek]</option>";
                      }
                    ?>
                  </select>
              </div>

              <div class="form-group">
                <label for="inputName">Nama Kriteria</label>
                <input type="text" id="nama_kriteria" name="nama_kriteria"class="form-control" placeholder="Prestasi">
              </div>

              <div class="form-group col-3">
                  <label for="inputName">Nilai Ideal</label>
                  <select class="form-control select2" style="width: 100%;" name="nilai_kriteria" id="nilai_kriteria">
                      <option selected="selected" value="-">- Pilih -</option>
                      <?php
                        for ($nomor = 1; $nomor <= 5; $nomor++) {
                          echo "<option value='$nomor'>$nomor</option>";
                        }
                      ?>
                    </select>
              </div>

              <div class="form-group">
                <label for="inputName">Jenis</label>
                <select class="form-control select2" style="width: 100%;" name="id_jenis_kriteria" id="id_jenis_kriteria">
                    <option selected="selected">---- Pilih ----</option>
                    <?php
                      $result1=mysqli_query($conn,'SELECT * FROM tb_jenis_kriteria');
                      while($row1=mysqli_fetch_assoc($result1)) {
                        echo "<option value='$row1[id_jenis_kriteria]'>$row1[nama_jenis_kriteria]</option>";
                      }
                    ?>
                  </select>
              </div>



              <div class="col-12">
              <button type="submit" name="submit_kriteria" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/spk_pm_unm/admin/kriteria/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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