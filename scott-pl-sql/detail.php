<?php
include "koneksi.php";

if(!isset($_GET['empno'])) {
	die("Error !");
}

$EMPNO = $_GET['empno'];

$query = oci_parse($conn, "SELECT * FROM EMP WHERE EMPNO=$EMPNO");
oci_execute($query);

$data = oci_fetch_object($query);
oci_free_statement($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pegawai | <?php echo $data->ENAME ?></title>
</head>
<body>
	<h1>Detail Pegawai</h1>
	<ul>
		<li>NIP : <?php echo $data->EMPNO ?></li>
		<li>Nama : <?php echo $data->ENAME ?></li>
		<li>Pekerjaan : <?php echo $data->JOB ?></li>
		<li>Manajer : <?php echo $data->MGR ?></li>
		<li>Tanggal Diterima : <?php echo $data->HIREDATE ?></li>
		<li>Gaji : <?php echo $data->SAL ?></li>
		<li>Komisi : <?php echo $data->COMM ?></li>
		<li>Departemen : <?php echo $data->DEPTNO ?></li>
		<li><a href="update.php?empno=<?php echo $data->EMPNO ?>">Update</a></li>
		<li><a href="hapus_emp.php?empno=<?php echo $data->EMPNO ?>">Hapus</a></li>
	</ul>
</body>
</html>