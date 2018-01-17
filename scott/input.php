<?php
include "koneksi.php";

$status = "<br>";

if(isset($_POST['simpan'])) {
	$EMPNO = $_POST['EMPNO'];
	$ENAME = strtoupper($_POST['ENAME']);
	$JOB = strtoupper($_POST['JOB']);
	$MGR = $_POST['MGR'];
	$HIREDATE = $_POST['HIREDATE'];
	$SAL = $_POST['SAL'];
	$COMM = $_POST['COMM'];
	$DEPTNO = $_POST['DEPTNO'];

	$query = oci_parse($conn, "INSERT INTO EMP VALUES($EMPNO, '$ENAME', '$JOB', $MGR, TO_DATE('$HIREDATE', 'YYYY-MM-DD'), $SAL, $COMM, $DEPTNO)");

	if(oci_execute($query))
		$status = "Data ".$ENAME." Tersimpan !<br><br>";
	else
		$status = "Gagal Menyimpan ! ".oci_error()['message']."<br><br>";

	oci_free_statement($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pegawai | Input Data</title>
</head>
<body>
	<h1>Input Data Pegawai</h1>
	<?php echo $status ?>
	<form action="" method="post">
		<label for="">NIP <input type="number" name="EMPNO" id=""></label><br><br>
		<label for="">Nama <input type="text" name="ENAME" id=""></label><br><br>
		<label for="">Pekerjaan <input type="text" name="JOB" id=""></label><br><br>
		<label for="">Manager 
			<select name="MGR" id="">
				<option value="" disabled selected>Pilih Manager</option>
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
		<label for="">Tanggal Diterima <input type="date" name="HIREDATE" id=""></label><br><br>
		<label for="">Gaji <input type="number" name="SAL" id=""></label><br><br>
		<label for="">Komisi <input type="number" name="COMM" id=""></label><br><br>
		<label for="">Departemen 
			<select name="DEPTNO" id="">
				<option value="" disabled selected>Pilih Departemen</option>
				<?php 
				$query = oci_parse($conn, 'SELECT DEPTNO, DNAME FROM DEPT');
				oci_execute($query);

				while (($row = oci_fetch_object($query)) != false) {
				?>

				<option value="<?php echo $row->DEPTNO ?>"><?php echo $row->DNAME ?></option>

				<?php 
				}
				oci_free_statement($query);
				oci_close($conn);
				?>
			</select>
		</label><br><br>
		<input type="submit" name="simpan" value="Simpan"> <input type="reset" value="Reset">
	</form>
</body>
</html>