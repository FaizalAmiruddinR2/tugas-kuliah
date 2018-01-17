<html>
<head>
<title>membuat array berdimensi dua</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
// membuat array berdimensi dua
$peserta = array
(
	"LabSI"=>array("Budi","Agung","Bagus"),
	"LabAI"=>array("Dini","Sri"),
	"LabJarkom"=>array("Rasyid","Bambang","Bobby","Putri"),
	"LabGIS"=>array("Dina","Retno")
);
//menampilkan isi array
while(list($indeks1, $nilai1)=each($peserta))
{
	print("Peserta $indeks1 : $nilai1[0]<BR>");
	$nomor = 1;
}
?>
</body>
</html>