<html>
<head>
<title>Penggunaan fungsi substr</title>
</head>
<body>
<?php
echo substr('komputer', 1);
echo '<br>';
echo substr('komputer', 1, 3);
echo '<br>';
echo substr('komputer', 0, 4);
echo '<br>';
echo substr('komputer', 0, 8);
echo '<br>';
echo substr('komputer', -4, 3);
echo '<br>';
// Accessing single characters in a string
// can also be achived using "curly braces"
$string = 'jaringan';
echo $string{0};
echo '<br>';
echo $string{3};
echo '<br>';
echo $string{strlen($string)-1};
?>
</body>
</html>