<?php
	$conn = oci_connect('scott', 'tiger', '//localhost/xe');
	if (!$conn) {
   		$m = oci_error();
   		echo $m['message'], "\n";
   		exit; 
   	}
?>