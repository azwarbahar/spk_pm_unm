<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// UPDATE JENIS
if (isset($_POST['edit_jenis'])) {
	$id_jenis_kriteria = $_POST['id_jenis_kriteria'];
	$nilai_jenis_kriteria = $_POST['nilai_jenis_kriteria'];

		$queryAkun = "UPDATE tb_jenis_kriteria SET nilai_jenis_kriteria = '$nilai_jenis_kriteria' WHERE id_jenis_kriteria = '$id_jenis_kriteria'";
		mysqli_query($conn, $queryAkun);
	// EDIT JENIS
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Jenis Kriteria berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>