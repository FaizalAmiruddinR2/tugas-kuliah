<?php
include "koneksi.php";

if(!isset($_GET['empno'])) {
	die("Error !");
}

$EMPNO = $_GET['empno'];

$query = oci_parse($conn, "SELECT ENAME FROM EMP WHERE EMPNO=$EMPNO");
oci_execute($query);

$data = oci_fetch_object($query);
oci_free_statement($query);

$status = "<br>";
if(isset($_POST['simpan'])) {
	$MGR = isset($_POST['MGR'])?$_POST['MGR']:"";
	$SAL = $_POST['SAL'];

	$query = oci_parse($conn, "UPDATE EMP SET MGR=$MGR, SAL=$SAL WHERE EMPNO=$EMPNO");

	if(oci_execute($query))
		$status = "Update Data ".$data->ENAME." Tersimpan !<br><br>";
	else
		$status = "Gagal Menyimpan ! ".oci_error()['message']."<br><br>";

	oci_free_statement($query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pegawai | Update</title>
</head>
<body>
	<h1>Update Data Pegawai <?php echo $data->ENAME ?></h1>
	<?php echo $status ?>
	<form action="" method="post">
		<label for="">Manager 
			<select name="MGR" id="">
				<option value="" disabled selected>Pilih Manager</option>
				<option value="">Tanpa Manager</option>
				<?php 
				$query = oci_parse($conn, 'SELECT EMPNO, ENAME FROM EMP');
				oci_execute($query);

				while (($row = oci_fetch_object($query)) != false) {
				?>

				<option value="<?php echo $row->EMPNO ?>"><?php echo $row->ENAME ?></option>

				<?php 
				}
				oci_free_statement($query);
				?>
			</select>
		</label><br><br>
		<label for="">Gaji <input type="number" name="SAL" id=""></label><br><br>
		<input type="submit" name="simpan" value="Simpan"> <input type="reset" value="Reset">
	</form>
</body>
</html>