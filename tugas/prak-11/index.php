<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Praktikum 11</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles/github-gist.css">
	<style type="text/css" media="screen">
	.hljs {
		background:transparent;
	}
	.analisa {
		color:black;
		font-family:sans-serif;
		font-size:15px;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>1. Contoh penggabungan string</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
Untuk menggabungkan beberapa teks menjadi satu teks, 
cukup dengan menggunakan operator titik (.) untuk menghubungkan dua atau lebih kalimat
				</pre>
			</div>
		</div>


		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>2. Format Data dengan fungsi printf</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
printf digunakan untuk menampilkan teks dengan format yang sudah ditentukan
sesuai dengan tipe data yang digunakan,
dari sumber php.net, tipe-tipe data dan simbol format yang relevan sebagai berikut

string	: s
integer	: d, u, c, o, x, X, b
double	: g, G, e, E, f, F
ditambah dengan % didepannya, contoh %s
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>3. Penggunaan fungsi print</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
Penggunaan fungsi print intinya adalah menampilkan teks, juga bisa menampilkan tag-tag html
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>4. Penggunaan fungsi echo</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
Fungsi echo ini fungsinya benar-benar sama dengan print
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>5. Penggunaan fungsi strlen</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
strln akan memberikan hasil berupa banyak karakter dari suatu text bertipe string
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>6. Penggunaan fungsi strtoupper</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
strtoupper adalah fungsi untuk mengubah teks biasa menjadi huruf kapital semua
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>7. Penggunaan fungsi strtolower</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
strtolower adalah kebalikan dari strtoupper yaitu mengubah teks menjadi huruf kecil semua
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>8. Penggunaan fungsi substr</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
substr adalah mengambil beberapa karekter dari suatu teks
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>9. Penggunaan fungsi substr_count</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
substr_count akan memberikan banyaknya karakter yang cocok dengan karakter yang diinginkan di suatu teks
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>10. Penggunaan fungsi strpos</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
strpos akan mencari karakter keberapa pada suatu teks dari karakter yang di cari
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>11. Penggunaan fungsi chr</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
chr akan menampilkan karakter dengan kode ascii
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>12. Penggunaan fungsi strcasecmp</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
strcasecmp akan memastikan dua string apakah sama tanpa memperhatikan case-sensitive jadi Hallo dengan hallo akan sama
				</pre>
			</div>
		</div>


		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>13. Penggunaan fungsi strc_repeat</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
strc_repeat akan mengulang karakter yang diisikan dengan jumlah yang sudah ditentukan
				</pre>
			</div>
		</div>


		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>14. Penggunaan fungsi strrev</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
strrev adalah membalik kalimat
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>15. Penggunaan fungsi str_replace</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
str_replace akan mengganti karakter-karakter yang diinginkan pada suatu teks dengan karakter-karakter yang lain
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>16. Penggunaan fungsi strtok</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
strtok akan memisahkan kalimat-kalimal dengan tanda hubung yang ditentukan menjadi sebuah array
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>17. Penggunaan fungsi ereg</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
ereg akan membandingkan pola kalimat secara tidak case-sensitive

*note = di php7 fungsi ini digantikan preg_match()
				</pre>
			</div>
		</div>

		
		<div class="row container">
			<div class="row">
				<div class="col-md-12"><h1>18. Penggunaan fungsi eregi</h1></div>
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
				<h2>Analisa :</h2>
				<pre class="col-md-12 analisa">
ereg akan membandingkan pola kalimat secara case-sensitive

*note = di php7 fungsi ini digantikan preg_match()
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