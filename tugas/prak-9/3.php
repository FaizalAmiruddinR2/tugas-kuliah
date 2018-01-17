<html>
<head>
<title>Menampilkan nilai Array dengan fungsi For</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>
<?php
$jurusan        = array("Elektronika", "Telekomunikasi", "Elektro Industri", "Teknologi Informasi", "Teknik Kimia");
$jumlah_jurusan = count($jurusan);
for ($i = 0;$i < $jumlah_jurusan; $i++) {
	print("Elemen berindeks $i : $jurusan[$i] <br>\n");
}

?>
</body>
</html>