<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pegawai | Daftar</title>
</head>
<body>
	<h1>Daftar Pegawai</h1>
	<table border="1">
		<tr>
			<th>NIP</th>
			<th>Pekerjaan</th>
			<th>Nama Pegawai</th>
			<th>Manager</th>
			<th>&nbsp;</th>
		</tr>

		<?php
			$query = oci_parse($conn, 'SELECT * FROM EMP');
			oci_execute($query);

			while (($row = oci_fetch_object($query)) != false) {
		?>

		<tr>
			<td><?php echo $row->EMPNO ?></td>
			<td><?php echo $row->JOB ?></td>
			<td><?php echo $row->ENAME ?></td>
			<td><?php echo $row->MGR ?></td>
			<td>
				<a href="detail.php?empno=<?php echo $row->EMPNO ?>">Detail</a> | 
				<a href="update.php?empno=<?php echo $row->EMPNO ?>">Update</a> | 
				<a href="hapus.php?empno=<?php echo $row->EMPNO ?>">Hapus</a>
			</td>
		</tr>

		<?php 
			}
			oci_free_statement($query);
			oci_close($conn);
		?>

	</table>
	<br>
	<a href="input.php">Input Data</a>
</body>
</html>