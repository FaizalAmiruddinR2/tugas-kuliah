<html>
<head>
<title>Penggunaan fungsi strpos</title>
</head>
<body>
<?php
$mystring = 'politeknik pens';
$findme = 'l';
$pos = strpos($mystring, $findme);
if ($pos === false) {
echo "String '$findme' tidak ditemukan dalam string '$mystring'";
} else {
echo " string '$findme' ditemukan dalam string '$mystring'";
echo " dan berada pada posisi $pos";
}
?>
</body>
</html>