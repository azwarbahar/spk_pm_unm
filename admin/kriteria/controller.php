<?php

function plugins() { ?>
	<link rel="stylesheet" href="/spk_pm_unm/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/spk_pm_unm/assets/dist/css2/components.css">
	<script src="/spk_pm_unm/assets/dist/jquery.min.js"></script>
	<script src="/spk_pm_unm/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT KRITERIA
if (isset($_POST['submit_kriteria'])) {
	$kode_keriteria = $_POST['kode_keriteria'];
	$id_aspek = $_POST['id_aspek'];
	$nama_kriteria = $_POST['nama_kriteria'];
	$nilai_kriteria = $_POST['nilai_kriteria'];
	$id_jenis_kriteria = $_POST['id_jenis_kriteria'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_kriteria VALUES (NULL, '$kode_keriteria',
													'$id_aspek',
													'$nama_kriteria',
													'$nilai_kriteria',
													'$id_jenis_kriteria')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Kriteria Berhasil ditambah!',
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

// HAPUS ADMIN
if (isset($_GET['hapus_kriteria'])) {
	$id_kriteria = $_GET['id_kriteria'];

	$query = "DELETE FROM tb_kriteria WHERE id_kriteria = '$id_kriteria'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Kriteria berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>