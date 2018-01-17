<?php 
#DATABASE
$db = new mysqli('localhost', 'root', 'root', 'dbmahasiswa');

if($db->connect_errno){
	die("ERROR : -> ".$db->connect_error);
}

$data = [];

$res = $db->query("SELECT * FROM `rekapitulasi`");
$i = 0;
while($row = $res->fetch_assoc()) {
	array_push($data, $row);
	$data[$i]['jurusan'] = "Teknik ".$data[$i]['jurusan'];
	$i++;
}
?>