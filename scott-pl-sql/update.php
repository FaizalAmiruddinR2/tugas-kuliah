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
	$ENAME = strtoupper($_POST['ENAME']);
	$JOB = strtoupper($_POST['JOB']);
	$MGR = isset($_POST['MGR'])?$_POST['MGR']:"";
	$HIREDATE = $_POST['HIREDATE'];
	$SAL = $_POST['SAL'];
	$COMM = $_POST['COMM'];
	$DEPTNO = $_POST['DEPTNO'];

	$query = oci_parse($conn, "BEGIN P_EMP(:HASIL, 'UPDATE', $EMPNO, '$ENAME', '$JOB', $MGR, '$HIREDATE', $SAL, $COMM, $DEPTNO) END;");

	oci_bind_by_name($query, ':HASIL', $hasil);

	if(oci_execute($query)){
		if($hasil == 1)
			$status = "Update Data ".$ENAME." Tersimpan !<br><br>";
		else
			$status = "Gagal Menyimpan !<br><br>";
	}
	else
		$status = "Gagal Menyimpan !<br><br>";

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
		<label for="">Gaji <input type="number" name="SAL" id=""></label><br><br>
		<input type="submit" name="simpan" value="Simpan"> <input type="reset" value="Reset">
	</form>
</body>
</html>