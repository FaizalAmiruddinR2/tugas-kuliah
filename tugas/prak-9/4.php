<html>
<head>
<title>Menentukan Nama Hari memakai Array</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
$hari["Sunday"] = "Minggu";
$hari["Monday"] = "Senin";
$hari["Tuesday"] = "Selasa";
$hari["Wednesday"] = "Rabu";
$hari["Thursday"] = "Kamis";
$hari["Friday"] = "Jum'at";
$hari["Saturday"] = "Sabtu";
$hari_inggris = date('l');
print("Hari ini adalah $hari[$hari_inggris]");
?>
</body>
</html>