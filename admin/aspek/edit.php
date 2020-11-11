<?php
require_once '../template/header/header.php';


$id_aspek = $_GET['id_aspek'];
$result = mysqli_query($conn, "SELECT * FROM tb_aspek WHERE id_aspek = '$id_aspek'");
$dta = mysqli_fetch_assoc($result);


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
              <h3 class="card-title">Edit Aspek</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

            <div class="form-group">
                <label for="inputName">Kode</label>
                <input type="text" value="<?= $dta['kode_aspek'] ?>" disabled class="form-control">
                <input type="hidden" value="<?= $dta['kode_aspek'] ?>" id="kode_aspek" name="kode_aspek"class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Nama Aspek</label>
                <input type="text" value="<?= $dta['nama_aspek'] ?>" id="nama_aspek" name="nama_aspek"class="form-control" placeholder="Prestasi">
              </div>

              <div class="form-group col-5">
                  <label for="inputName">Persentase ( <b>%</b> )</label>
                  <input type="text" value="<?= $dta['persentase_aspek'] ?>" id="persentase_aspek" name="persentase_aspek"class="form-control" placeholder="45">
              </div>


              <div class="col-12">
              <input type="hidden" name="id_aspek" value="<?= $dta['id_aspek'] ?>">
              <button type="submit" name="edit_aspek" id="edit_aspek" disabled="" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
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