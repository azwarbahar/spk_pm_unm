<?php
require_once '../template/header/header.php';


$id_kriteria = $_GET['id_kriteria'];
$result = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_kriteria = '$id_kriteria'");
$dta = mysqli_fetch_assoc($result);


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
              <li class="breadcrumb-item active">Edit</li>
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
              <h3 class="card-title">Edit Kriteria</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

            <div class="form-group">
                <label for="inputName">Kode</label>
                <input type="text" value="<?= $dta['kode_kriteria'] ?>" disabled class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Aspek</label>
                <select class="form-control select2" style="width: 100%;" name="id_aspek" id="id_aspek">
                    <?php
                      $result=mysqli_query($conn,'SELECT * FROM tb_aspek');
                      while($row=mysqli_fetch_assoc($result)) {
                        if ($dta['id_aspek'] == $row['id_aspek']) {
                          $selected = 'selected="selected"';
                        } else {
                          $selected = '';
                        }
                        echo "<option value='$row[id_aspek]' $selected >$row[nama_aspek]</option>";
                      }
                    ?>
                  </select>
              </div>

              <div class="form-group">
                <label for="inputName">Nama Kriteria</label>
                <input type="text" value="<?= $dta['nama_kriteria'] ?>"id="nama_kriteria" name="nama_kriteria"class="form-control" placeholder="Prestasi">
              </div>

              <div class="form-group col-3">
                  <label for="inputName">Nilai Ideal</label>
                  <select class="form-control select2" style="width: 100%;" name="nilai_kriteria" id="nilai_kriteria">
                      <?php
                        for ($nomor = 1; $nomor <= 5; $nomor++) {
                        if ($dta['nilai_kriteria'] == $nomor) {
                          $selected = 'selected="selected"';
                        } else {
                          $selected = '';
                        }
                          echo "<option value='$nomor' $selected >$nomor</option>";
                        }
                      ?>
                    </select>
              </div>

              <div class="form-group">
                <label for="inputName">Jenis</label>
                <select class="form-control select2" style="width: 100%;" name="id_jenis_kriteria" id="id_jenis_kriteria">
                    <?php
                      $result1=mysqli_query($conn,'SELECT * FROM tb_jenis_kriteria');
                      while($row1=mysqli_fetch_assoc($result1)) {
                        if ($dta['id_jenis_kriteria'] == $row1['id_jenis_kriteria']) {
                          $selected = 'selected="selected"';
                        } else {
                          $selected = '';
                        }
                        echo "<option value='$row1[id_jenis_kriteria]' $selected >$row1[nama_jenis_kriteria]</option>";
                      }
                    ?>
                  </select>
              </div>


              <div class="col-12">
              <input type="hidden" name="id_kriteria" value="<?= $dta['id_kriteria'] ?>">
              <button type="submit" name="edit_kriteria" id="edit_aspek" disabled="" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$('form')
		.each(function(){
			$(this).data('serialized', $(this).serialize())
		})
        .on('change input', function(){
            $(this)
                .find('input:submit, button:submit')
                    .attr('disabled', $(this).serialize() == $(this).data('serialized'))
            ;
         })
		.find('input:submit, button:submit')
			.attr('disabled', true)
	;
</script>


<?php
require '../template/footer/footer.php';
?>