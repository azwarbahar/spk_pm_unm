<?php

function plugins() { ?>
	<link rel="stylesheet" href="/spk_pm_unm/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/spk_pm_unm/assets/dist/css2/components.css">
	<script src="/spk_pm_unm/assets/dist/jquery.min.js"></script>
	<script src="/spk_pm_unm/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT ASPEK
if (isset($_POST['submit_aspek'])) {
	$kode_aspek = $_POST['kode_aspek'];
	$nama_aspek = $_POST['nama_aspek'];
	$persentase_aspek = $_POST['persentase_aspek'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_aspek VALUES (NULL, '$kode_aspek',
													'$nama_aspek',
													'$persentase_aspek')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Aspek Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE ASPEK
if (isset($_POST['edit_aspek'])) {
	$id_aspek = $_POST['id_aspek'];
	$nama_aspek = $_POST['nama_aspek'];
	$persentase_aspek = $_POST['persentase_aspek'];

		$query = "UPDATE tb_aspek SET nama_aspek = '$nama_aspek',
										  persentase_aspek = '$persentase_aspek' WHERE id_aspek = '$id_aspek'";
		mysqli_query($conn, $query);
	// EDIT PARTAI
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Aspek berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

// HAPUS ADMIN
if (isset($_GET['hapus_aspek'])) {
	$id_aspek = $_GET['id_aspek'];

	$query = "DELETE FROM tb_aspek WHERE id_aspek = '$id_aspek'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Aspek berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>