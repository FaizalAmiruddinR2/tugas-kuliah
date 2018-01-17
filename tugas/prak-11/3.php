<?php
print("Hello World <br>");
print "print() juga bisa digunakan tanpa menggunakan tanda kurung<br>";// Anda dapat menggunakan variable dalam print statement//
$kuliah = "Politeknik Elektronika Negeri Surabaya";
$jurusan = "Teknologi Informasi";
print "saya kuliah di is $kuliah <br>\n";
// saya kuliah di Politeknik Elektronika Negeri Surabaya
// Anda juga dapat menggunakan array//
$jurusan = array("value" => "Teknologi Informasi");
print "Program Studi {$jurusan['value']} !<br>\n";
//Program Studi Teknologi Informasi//
// penggunaan single quotes akan menampilkan nama variabel, bukan nilainya.//
print 'saya belajar di $kuliah';
// saya belajar di $kuliah//
// Jika anda tidak menggunakan karakter lain, anda dapat menampilkan variabelnya.//
$kuliah;// foobar//
?>