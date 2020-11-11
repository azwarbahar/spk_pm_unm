<?php
require_once '../template/header/header.php';
$jenis_kriteria = mysqli_query($conn, "SELECT * FROM tb_jenis_kriteria");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pengaturan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active">Pengaturan</li>
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
                    <th>No</th>
                    <th>Nama Jenis Kriteria</th>
                    <th>Nila</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($jenis_kriteria as $dta) { ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td><?= $dta['nama_jenis_kriteria'] ?></td>
                    <td><?= $dta['nilai_jenis_kriteria'] ?></td>
                    <td style="text-align:center">
                        <a href="edit.php?id_jenis_kriteria=<?= $dta['id_jenis_kriteria'] ?>" type="button" class="btn btn-secondary"><i class="fa fa-edit"> Edit</i></a>
                        <!-- <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" ><i class="fa fa-trash"></i></a> -->
                    </td>
                  </tr>

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