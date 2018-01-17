<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rekap Data Mahasiswa</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table border="1" width="800">
		<caption><h1>REKAPITULASI DATA MAHASISWA</h1></caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>JURUSAN</th>
				<th>JUMLAH MAHASISWA</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			require_once('database.php');

			foreach ($data as $value) {
			?>
			<tr>
				<td><?php echo $value['no']?></td>
				<td><?php echo $value['jurusan']?></td>
				<td><?php echo $value['jumlah']?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</body>
</html>