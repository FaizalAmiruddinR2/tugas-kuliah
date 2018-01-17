<?php
include "koneksi.php";

$status = "<br>";
if(isset($_POST['hapus'])) {
	$JOB = strtoupper($_POST['JOB']);
	$ENAME = strtoupper($_POST['ENAME']);

	$query = oci_parse($conn, "DELETE EMP WHERE JOB='$JOB' AND ENAME='$ENAME'");

	if(oci_execute($query))
		$status = "Data Berhasil Dihapus !<br><br>";
	else
		$status = "Gagal Menghapus ! ".oci_error()['message']."<br><br>";

	oci_free_statement($query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pegawai | Hapus</title>
</head>
<body>
	<h1>Update Data Pegawai</h1>
	<?php echo $status ?>
	<form action="" method="post">
		<label for="">Pekerjaan <input type="text" name="JOB" id=""></label><br><br>
		<label for="">Nama <input type="text" name="ENAME" id=""></label><br><br>
		<input type="submit" name="hapus" value="Hapus"> <input type="reset" value="Reset">
	</form>
</body>
</html>