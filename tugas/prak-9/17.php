<?php
$queue = array("orange", "banana");
echo "Sebelum : ";
print_r($queue);
array_unshift($queue, "apple", "raspberry");
echo "<br>Sesudah : ";
print_r($queue);
?>