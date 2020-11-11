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
            <h1 class="m-0 text-dark">Data Aspek</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/">Home</a></li>
              <li class="breadcrumb-item"><a href="/spk_pm_unm/admin/aspek/data.php">Data Aspek</a></li>
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
              <h3 class="card-title">Tambah Aspek</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

            <?php
              $id_last_aspek = mysqli_query($conn, "SELECT id_aspek FROM tb_aspek ORDER BY id_aspek DESC LIMIT 1");
              $get_last_id = "";
              while ($row = mysqli_fetch_assoc($id_last_aspek)) {
                $get_last_id = $row['id_aspek'];
              }
            ?>

              <div class="form-group">
                <label for="inputName">Kode</label>
                <input type="text" value="AS-00<?= $get_last_id + 1 ?>" disabled class="form-control">
                <input type="hidden" value="AS-00<?= $get_last_id + 1 ?>" id="kode_aspek" name="kode_aspek"class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Nama Aspek</label>
                <input type="text" id="nama_aspek" name="nama_aspek"class="form-control" placeholder="Prestasi">
              </div>

              <div class="form-group col-5">
                  <label for="inputName">Persentase ( <b>%</b> )</label>
                  <input type="text" id="persentase_aspek" name="persentase_aspek"class="form-control" placeholder="45">
              </div>



              <div class="col-12">
              <button type="submit" name="submit_aspek" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/spk_pm_unm/admin/aspek/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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