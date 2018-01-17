<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Praktikum 9</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles/github-gist.css">
	<style type="text/css" media="screen">
	.hljs {
		background:transparent;
	}	
	</style>
</head>
<body>
	<div class="container">
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>1. Array berdimensi satu</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("1.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="1.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Cara assignment untuk array berdimensi satu, yaitu dengan cara-cara sebagai berikut :

$array=['a','b','c'];
$array=['index' => 'value', 0 => 'isi', 'a' => 1];
$array[0] = 'isi1';
$array[1] = 'isi2';

Adapun untuk menggunakan value-nya, cukup dengan memanggil nama variablenya disertai index-nya, contoh :

echo $array[0];
				</pre>
			</div>
		</div>


		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>2. menampilkan Array</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("2.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="2.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Seperti yang sudah saya jelaskan pada nomor 1, untuk menggunakan atau menampilkan salah satu elemen array adalah dengan contohnya:

print("Elemen berindeks 0 : $jurusan[0]");
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>3. Menampilkan Array dengan fungsi for</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("3.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="3.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Untuk menampilkan tiap elemen array, dapat dengan menggunakan for, yaitu dengan :

for ($i = 0;$i < $jumlah_jurusan; $i++) {
    print("Elemen berindeks $i : $jurusan[$i]\n"); //menampilkan elemen array $jurusan dengan index $i
}

note : Untuk menampilkan elemen array dengan for lebih tepat untuk menampilkan array yang indexnya menggunakan angka atau huruf yang urut, misalkan :

$array[0];
$array[1];
$array[2];

atau

$array['a'];
$array['b'];
$array['c'];
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>4. Menentukan Nama Hari memakai Array</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("4.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="4.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
$hari["Sunday"] = "Minggu";
$hari["Monday"] = "Senin";
$hari["Tuesday"] = "Selasa";
$hari["Wednesday"] = "Rabu";
$hari["Thursday"] = "Kamis";
$hari["Friday"] = "Jum'at";
$hari["Saturday"] = "Sabtu";
$hari_inggris = date('l');
print("Hari ini adalah $hari[$hari_inggris]");

Dari kode di atas, fungsi bawaan php date() akan menampilkan informasi mengenai tanggal, jika dengan opsi 'l' (L kecil) akan menampilkan nama hari sekarang dalam bahasa Inggris.

Jadi
print("Hari ini adalah $hari[$hari_inggris]");
akan menampilkan array $hari dengan index nama hari sekarang (<?php echo date('l')?>).
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>5. Array dimensi dua</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("5.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="5.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Array dua dimensi adalah array yang tiap elemennya merupakan array yang lain yang berdimensi satu, contohnya :

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

Array $buah tiap elemennya adalah array satu dimensi. Contoh cara memanggilnya adalah :

print ($buah["apel"]["warna"]);
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>6. Membuat Array berdimensi dua</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("6.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="6.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Salah satu cara untuk menampilkan array 2 dimensi adalah dengan metode berikut :

while(list($indeks1, $nilai1)=each($peserta))
{
    print("Peserta $indeks1 : $nilai1[0]");
    $nomor = 1;
}
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>7. Fungsi Arsort</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("7.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="7.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Arsort adalah mengurutkan secara descending value dari tiap elemen array tanpa mengubah hubungan index dengan valuenya, contoh :

$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");

akan menjadi a = orange d = lemon b = banana c = apple
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>8. Fungsi Asort</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("8.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="8.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Asort adalah kebalikan dari Arsort, yaitu diurutkan ascending
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>9. Fungsi Krsort</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("9.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="9.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Krsort adalah mengurutkan elemen array sesuai index-nya secara descending tanpa mengubah hubungan index dengan valuenya, contoh :

$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");

menjadi d = lemon c = apple b = banana a = orange
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>10. Fungsi Rsort</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("10.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="10.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Rsort adalah untuk mengurutkan array secara descending yang indexnya akan menyesuaikan urutan, contoh :

$fruits = array("lemon", "orange", "banana", "apple");
menjadi 0 = orange 1 = lemon 2 = banana 3 = apple

"orange" yang awalnya ber-index 1 menjadi index 0, begitu pun yang lainnya
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>11. Fungsi Sort</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("11.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="11.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Sort sama seperti Rsort dengan urutan ascending
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>12. Fungsi Natsort</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("12.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="12.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Natsort akan mengurutkan value array tanpa mengubah index, dengan algoritma natural sort, contoh :

misal dalam sorting biasa (sort) :
Array ( [0] => img1.png [1] => img10.png [2] => img12.png [3] => img2.png )

maka dalam natsort :
Array ( [3] => img1.png [2] => img2.png [1] => img10.png [0] => img12.png )

note : Algoritma natural sort biasa digunakan untuk mengurutkan nama file
				</pre>
			</div>
		</div>


		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>13. Fungsi Ksort</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("13.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="13.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Ksort adalah mengurutkan array sesuai index-nya
				</pre>
			</div>
		</div>


		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>14. Fungsi Array_pop</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("14.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="14.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Array_pop adalah mengambil satu elemen array yang paling akhir (algoritma stack pop)
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>15. Fungsi Array_push</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("15.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="15.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Array_push adalah memasukkan satu elemen array ke index yang paling akhir (algoritma stack push)
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>16. Fungsi Array_shift</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("16.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="16.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Array_shift adalah mengambil satu elemen array yang paling awal (algoritma queue dequeue)
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>17. Fungsi Array_unshift</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("17.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="17.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Array_unshift adalah menambah beberapa elemen array ke index yang paling awal
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>18. Fungsi Array_rand</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("18.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="18.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Array_rand adalah mengambil value dari sebuah array secara acak
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>19. Fungsi Array_unique</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("19.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="19.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Array_unique adalah menjadikan value yang ada duplikatnya, menjadi hanya 1 value saja, contoh:

$input = array("a" => "green", "red", "b" => "green", "blue", "red");

red dan green masing-masing ada dua, sehingga akan dijadikan hanya satu

Array ( [a] => green [0] => red [1] => blue )
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>20. Fungsi In_Array</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("20.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="20.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
In_array adalah memastikan suatu value ada pada sebuah array
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>21. Fungsi Shuffle</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("21.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="21.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Shuffle adalah mengacak tiap elemen dari array sehingga menjadi tidak terurut
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>22. Fungsi Range</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("22.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="22.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Range adalah membuat urutan data dalam bentuk angka maupun huruf dengan rentang langkah tertentu
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>23. Fungsi Explode</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("23.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="23.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Explode adalah memisahkan tiap kata dari kalimat dengan pemisah tertentu, contoh :

$pizza = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);

piece1 piece2 piece3 piece4 piece5 piece6 akan dipisah dengan pemisah spasi
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>24. Fungsi Implode</h1></div>
			</div>

			<div class="row">
				<div class="col-md-6">
				<h2>Source :</h2>
				<pre style="height: 300px; overflow: auto;">
				<?php 
				highlight_file("24.php");
				?>
				</pre>
				</div>

				<div class="col-md-6">
				<h2>Hasil :</h2>
				<iframe class="thumbnail" style="height: 300px; width:100%;" src="24.php"></iframe>
				</div>
			</div>

			<div class="row container">
				<pre class="col-md-12">
Implode adalah kebalikan dari explode, yaitu menyatukan tiap value dari array menjadi kalimat (string)
				</pre>
			</div>
		</div>
	</div>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/highlight.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
		hljs.initHighlightingOnLoad();
		$(document).ready(function() {
			$('code').addClass('php');
		});
	</script>
</body>
</html>