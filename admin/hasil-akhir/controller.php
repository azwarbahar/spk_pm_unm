<?php

function plugins() { ?>
	<link rel="stylesheet" href="/spk_pm_unm/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/spk_pm_unm/assets/dist/css2/components.css">
	<script src="/spk_pm_unm/assets/dist/jquery.min.js"></script>
	<script src="/spk_pm_unm/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT PENILAIAN
if (isset($_POST['submit_penilaian'])) {

	$id_mahasiswa = $_POST['id_mahasiswa'];
	$id_aspek = array();
	$id_kriteria = array();
	$nilai = array();

	$aspek = mysqli_query($conn, "SELECT * FROM tb_aspek ");
	$b = 1;
	foreach($aspek as $dta_aspek){
		$kriteria = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_aspek='$dta_aspek[id_aspek]'");
        $c = 1;
        foreach($kriteria as $dta_kriteria){

			$id_aspek[$c] = $_POST['id_aspek'.$b.$c];
			$id_kriteria[$c] = $_POST['id_kriteria'.$b.$c];
			$nilai[$c] = $_POST['nilai'.$b.$c];
			    // TAMBAH DATA
			$query= "INSERT INTO tb_nilai VALUES (NULL, '$id_mahasiswa',
													'$id_aspek[$c]',
													'$id_kriteria[$c]',
													'$nilai[$c]')";
			mysqli_query($conn, $query);
			$c = $c + 1;
		}
		$b = $b + 1;
	}
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Penilaian Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE KRITERIA
if (isset($_POST['edit_kriteria'])) {
	$id_kriteria = $_POST['id_kriteria'];
	$id_aspek = $_POST['id_aspek'];
	$nama_kriteria = $_POST['nama_kriteria'];
	$nilai_kriteria = $_POST['nilai_kriteria'];
	$id_jenis_kriteria = $_POST['id_jenis_kriteria'];

		$query = "UPDATE tb_kriteria SET id_aspek = '$id_aspek',
										nama_kriteria = '$nama_kriteria',
										nilai_kriteria = '$nilai_kriteria',
										id_jenis_kriteria = '$id_jenis_kriteria' WHERE id_kriteria = '$id_kriteria'";
		mysqli_query($conn, $query);
	// EDIT PARTAI
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Kriteria berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

// HAPUS NILAI
if (isset($_GET['hapus_nilai'])) {
	$id_mahasiswa = $_GET['id_mahasiswa'];

	$query = "DELETE FROM tb_nilai WHERE id_mahasiswa = '$id_mahasiswa'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Mereset Nilai',
					text: 'Data Nilai berhasil direset',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>