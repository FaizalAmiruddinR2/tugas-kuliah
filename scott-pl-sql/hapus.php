<?php
include "koneksi.php";

if(!isset($_GET['empno'])) {
	die("Error !");
}

$EMPNO = $_GET['empno'];
$query = oci_parse($conn, "BEGIN P_EMP(:HASIL, 'DELETE', $EMPNO) END;");

oci_bind_by_name($query, ':HASIL', $hasil);

if(oci_execute($query)){
	if($hasil == 1)
		$status = "Data Terhapus !<br><br>";
	else
		$status = "Gagal Menghapus !<br><br>";
}
else
	$status = "Gagal  Menghapus !<br><br>";

oci_free_statement($query);

echo $status;

?>