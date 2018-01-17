<?php
include "koneksi.php";

if(!isset($_GET['empno'])) {
	die("Error !");
}

$EMPNO = $_GET['empno'];
$query = oci_parse($conn, "DELETE EMP WHERE EMPNO=$EMPNO");

if(oci_execute($query))
	$status = "Data Terhapus !<br><br>";
else
	$status = "Gagal Menyimpan ! ".oci_error()['message']."<br><br>";

oci_free_statement($query);

echo $status;

?>