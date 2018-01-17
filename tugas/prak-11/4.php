<?php
echo("Hello World <br>");
echo "echo() juga bisa digunakan tanpa menggunakan tanda kurung<br>";
// Anda dapat menggunakan variable dalam print statement
$kuliah = "Politeknik Elektronika Negeri Surabaya";
$jurusan = "Teknologi Informasi";
echo "saya kuliah di is $kuliah <br>\n"; // saya kuliah di Politeknik Elektronika Negeri Surabaya
// Anda juga dapat menggunakan array
$jurusan = array("value" => "Teknologi Informasi");
echo "Program Studi {$jurusan['value']} !<br>\n"; //Program Studi Teknologi Informasi
// penggunaan single quotes akan menampilkan nama variabel, bukan nilainya.
echo 'saya belajar di $kuliah'; // saya belajar di $kuliah
// Jika anda tidak menggunakan karakter lain, anda dapat menampilkan variabelnya.
$kuliah;// foobar
// passing multiple parameters to echo over concatenation.
echo 'This ', 'string ', 'was ', 'made ', 'with multiple parameters.<br>', chr(10);
echo '<br>';
echo 'This ' . 'string ' . 'was ' . 'made ' . 'with concatenation.' . "\n";
?>