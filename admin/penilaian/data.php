<?php
require_once '../template/header/header.php';
$mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Penilaian Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/">Home</a></li>
              <li class="breadcrumb-item active">Penilaian Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 45px;">No</th>
                    <th style="text-align: center; width: 135px;">No Induk</th>
                    <th>Nama</th>
                    <th style="text-align: center; width: 120px;">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($mahasiswa as $dta) { ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td><?= $dta['no_induk_mahasiswa'] ?></td>
                    <td><?= $dta['nama_mahasiswa'] ?></td>
                    <td style="text-align:center">
                      <?php
                        $result_nilai = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE id_mahasiswa='$dta[id_mahasiswa]'");
                        $jumlah_result = mysqli_num_rows($result_nilai);
                        if($jumlah_result > 0 ){
                          echo "<a href='#' type='button' class='btn btn-secondary' data-toggle='modal' data-target='#modal-warning$dta[id_mahasiswa]'><i class='fa fa-retweet'> Reset</i></a>";
                        } else {
                          echo "<a href='nilai.php?id_mahasiswa= $dta[id_mahasiswa] ' type='button' class='btn btn-primary'><i class='fa fa-edit'> Nilai</i></a>";
                        }
                      ?>
                    </td>
                  </tr>


      <!-- Modal Reset -->
      <div class="modal fade" tabindex="-1" id="modal-warning<?= $dta['id_mahasiswa'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-warning">
            <div class="modal-header">
              <h4 class="modal-title">Reset Nilai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Mereset Nilai <b><?= $dta['nama_mahasiswa'] ?></b> ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_nilai=true&id_mahasiswa=<?= $dta['id_mahasiswa'] ?>" type="button" class="btn btn-outline-light">Reset</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

                  <?php $i = $i + 1; } ?>
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>