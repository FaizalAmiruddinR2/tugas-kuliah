<?php
$kalimat="aku dan dia";
$kata=strtok($kalimat, " ");
while ($kata){
echo "Kata = " . $kata;
echo "<br>";
$kata=strtok(" ");}
?>