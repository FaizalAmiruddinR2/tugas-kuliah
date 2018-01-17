<?php
$numbers = range(1, 20);
srand((float)microtime() * 1000000);
shuffle($numbers);
foreach ($numbers as $number) {
echo "$number ";
}
?>