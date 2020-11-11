<?php

function plugins() { ?>
	<link rel="stylesheet" href="/spk_pm_unm/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/spk_pm_unm/assets/dist/css2/components.css">
	<script src="/spk_pm_unm/assets/dist/jquery.min.js"></script>
	<script src="/spk_pm_unm/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT MAHASISWA
if (isset($_POST['submit_mahasiswa'])) {
	$no_induk_mahasiswa = $_POST['no_induk_mahasiswa'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$alamat_mahasiswa = $_POST['alamat_mahasiswa'];
	$jekel_mahasiswa = $_POST['jekel_mahasiswa'];
	$tanggal = $_POST['tanggal'];
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	$tgl_lahir_mahasiswa = $tanggal. ' ' .$bulan. ' ' .$tahun;
	$tempat_lahir_mahasiswa = $_POST['tempat_lahir_mahasiswa'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_mahasiswa VALUES (NULL, '$no_induk_mahasiswa',
													'$nama_mahasiswa',
													'$alamat_mahasiswa',
													'$jekel_mahasiswa',
													'$tgl_lahir_mahasiswa',
													'$tempat_lahir_mahasiswa')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Mahasiswa Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE MAHASISWA
if (isset($_POST['edit_mahasiswa'])) {
	$id_mahasiswa = $_POST['id_mahasiswa'];
	$no_induk_mahasiswa = $_POST['no_induk_mahasiswa'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$alamat_mahasiswa = $_POST['alamat_mahasiswa'];
	$jekel_mahasiswa = $_POST['jekel_mahasiswa'];
	$tgl_lahir_mahasiswa = $_POST['tgl_lahir_mahasiswa'];
	$tempat_lahir_mahasiswa = $_POST['tempat_lahir_mahasiswa'];

		$query = "UPDATE tb_mahasiswa SET no_induk_mahasiswa = '$no_induk_mahasiswa',
										  nama_mahasiswa = '$nama_mahasiswa',
										  alamat_mahasiswa = '$alamat_mahasiswa',
										  jekel_mahasiswa = '$jekel_mahasiswa',
										  tgl_lahir_mahasiswa = '$tgl_lahir_mahasiswa',
										  tempat_lahir_mahasiswa = '$tempat_lahir_mahasiswa' WHERE id_mahasiswa = '$id_mahasiswa'";
		mysqli_query($conn, $query);
	// EDIT PARTAI
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Mahasiswa berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS ADMIN
if (isset($_GET['hapus_mahasiswa'])) {
	$id_mahasiswa = $_GET['id_mahasiswa'];

	$query = "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Mahasiswa berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>