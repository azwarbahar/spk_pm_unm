<?php
require '../template/header/header.php';
$kriteria = mysqli_query($conn, "SELECT * FROM tb_kriteria");
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
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active">Data Kriteria</li>
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
              <div class="card-header">
                <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Kriteria</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 35px;">No</th>
                    <th style="width: 100px;">Kode</th>
                    <th>Nama Aspek</th>
                    <th>Nama Kriteria</th>
                    <th>Nilai</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $i = 1; foreach($kriteria as $dta_kriteria) {
                    
                  ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td><?= $dta_kriteria['kode_kriteria'] ?></td>
                    <?php
                    $aspek = mysqli_query($conn, "SELECT * FROM tb_aspek WHERE id_aspek = $dta_kriteria[id_aspek]");
                      while($row_aspek=mysqli_fetch_assoc($aspek)) {
                        echo "<td> $row_aspek[nama_aspek] </td>";
                      }
                    ?>
                    <td><?= $dta_kriteria['nama_kriteria'] ?></td>
                    <td><?= $dta_kriteria['nilai_kriteria'] ?></td>
                    <?php
                      $jenis_kriteria = mysqli_query($conn, "SELECT * FROM tb_jenis_kriteria WHERE id_jenis_kriteria = '$dta_kriteria[id_jenis_kriteria]'");
                      while($row_jenis=mysqli_fetch_assoc($jenis_kriteria)) {
                        echo "<td> $row_jenis[nama_jenis_kriteria] </td>";
                      }
                    ?>
                    <td style="text-align:center">
                        <a href="edit.php?id_kriteria=<?= $dta_kriteria['id_kriteria'] ?>" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?= $dta_kriteria['id_kriteria'] ?>" ><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>

      <!-- Modal Hapus -->
      <div class="modal fade" tabindex="-1" id="modal-danger<?= $dta_kriteria['id_kriteria'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Kriteria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Kriteria</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_kriteria=true&id_kriteria=<?= $dta_kriteria['id_kriteria'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
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