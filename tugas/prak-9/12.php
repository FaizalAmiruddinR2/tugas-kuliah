<?php
$array1 = $array2 = array("img12.png", "img10.png", "img2.png", "img1.png");
sort($array1);
echo "Standard sorting\n\r";
print_r($array1);
natsort($array2);
echo "\nNatural order sorting\n";
print_r($array2);
?>