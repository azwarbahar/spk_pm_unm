<?php
require '../template/header/header.php';

$id_mahasiswa = $_GET['id_mahasiswa'];
$mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'");
$dta = mysqli_fetch_assoc($mahasiswa);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="data.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
          <h1 class="m-0 text-dark">Penilaian Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/">Home</a></li>
            <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/penilaian/data.php">Penialaian Mahasiswa</a></li>
            <li class="breadcrumb-item active">Nilai</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


  <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Penilaian</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <input type="hidden" value="<?= $dta['id_mahasiswa'] ?>" name="id_mahasiswa">
                                            <h4 class="text-center"><?= $dta['nama_mahasiswa'] ?></h4>
                                            <br>
                                            <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>No Induk</b> <a class="float-right"><?= $dta['no_induk_mahasiswa'] ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Jenis Kelamin</b> <a class="float-right"><?= $dta['jekel_mahasiswa'] ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tanggal Lahir</b> <a class="float-right"><?= $dta['tgl_lahir_mahasiswa'] ?></a>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Keterangan Penilaian -->
                                    <div class="card card-danger card-outline">
                                        <div class="card-body box-profile">
                                            <h5>Keterangan Penilaian</h5>
                                            <br>
                                            <p> 1 => Sangat Kurang</p>
                                            <p> 2 => Kurang</p>
                                            <p> 3 => Cukup</p>
                                            <p> 4 => Baik</p>
                                            <p> 5 => Sangat Baik</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <?php

                                    $aspek = mysqli_query($conn, "SELECT * FROM tb_aspek ");
                                    $jumlah_row_aspek = mysqli_num_rows($aspek);
                                    // $_SESSION['jumlah_row_aspek'] = $jumlah_row_aspek;
                                    $a1 = 1;
                                    foreach($aspek as $dta_aspek) {

                                    ?>

                                    <!-- CARD BIODATA -->
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title"><?= $dta_aspek['nama_aspek'] ?></h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $kriteria = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]'");
                                            $jumlah_row_kriteria = mysqli_num_rows($kriteria);
                                            // $_SESSION['jumlah_row_kriteria'] = $jumlah_row_kriteria;
                                            $a2 = 1;
                                            foreach($kriteria as $dta_kriteria) {

                                            ?>

                                            <div class="form-group">
                                                <input type="hidden" value="<?= $dta_kriteria['id_aspek'] ?>" name="id_aspek<?=$a1.$a2?>">
                                                <input type="hidden" value="<?= $dta_kriteria['id_kriteria'] ?>" name="id_kriteria<?=$a1.$a2?>">
                                                <label for="inputName"><?= $dta_kriteria['nama_kriteria'] ?></label><div class="col-4">
                                                <select class="form-control select2" style="width: 100%;" name="nilai<?=$a1.$a2?>">
                                                    <option selected="selected" value="1">- Pilih -</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <?php $a2 = $a2 + 1; }  ?>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- END CARD BIODATA -->

                                    <?php
                                    $a1 = $a1 + 1; }
                                    ?>

                                    <div class="col-12">
                                        <button type="submit" name="submit_penilaian" id="submit_penilaian" class="btn btn-primary float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
                                        <a href="/spk_pm_unm/admin/penilaian/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.card -->
                </div>
            </div>
            </form>
        </div>
    </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->

<?php
require '../template/footer/footer.php';
?>