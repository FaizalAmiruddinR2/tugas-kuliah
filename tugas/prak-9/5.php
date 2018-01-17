<html>
<head>
<title>Array dimensi dua</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head><body>
<?php
$buah = array (
"apel" => array(
	"warna" => "merah",
	"rasa" => "manis"
),
"pisang" => array(
	"warna" => "kuning",
	"rasa" => "manis"
)
);
print ("Warna buah apel adalah ");
print ($buah["apel"]["warna"])."<br>";
print ("Rasa buah pisang adalah ");
print ($buah["pisang"]["rasa"]);
?>
</body>
</html>