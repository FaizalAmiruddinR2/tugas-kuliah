<?php 
// no 1
function hitung($a, $b) {
	return $a*(($b/4)+1)*$b;
}

// no 2
// a=97 z=122 A=65 Z=90
function karakter($kalimat) {
	$vokal = $konsonan = 0;
	foreach(str_split(strtolower($kalimat)) as $huruf) {
		if(ord($huruf)>96 && ord($huruf)<123) {
			if($huruf == "a" || $huruf == "i" || $huruf == "u" || $huruf == "e" || $huruf == "o")
				$vokal++;
			else
				$konsonan++;
		}
	}
	return ['kalimat' => $kalimat, 'vokal' => $vokal, 'konsonan' => $konsonan];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Praktikum 16</title>
	<link rel="stylesheet" href="">
</head>
<body>
		<ol type="1">
			<li>
				<form action="" method="post">
					<p>Y=Ax((B/4)+1)xB</p>
					<p>A = <input type="number" name="a" placeholder="...A..."></p>
					<p>B = <input type="number" name="b" placeholder="...B..."></p>
					<p><input type="submit" name="" value="Hitung"></p>
					<p>
					<?php 
					if(isset($_POST['a']) && isset($_POST['b'])) 
						echo 'Y = '.$_POST['a'].
							'x(('.$_POST['b'].'/4)+1)x'.$_POST['b'].' = '.
							hitung($_POST['a'], $_POST['b']);
					?>
					</p>
				</form>
			</li>
			<li>
				<form action="" method="post">
					<p>Menghitung jumlah huruf Vokal dan Konsonan dari suatu kalimat, Spasi tidak dihitung</p>
					<p>Kata = <input type="text" name="kalimat" placeholder="Masukkan...Kalimat..."></p>
					<p><input type="submit" name="" value="Hitung"></p>
					<p>
					<?php 
					if(isset($_POST['kalimat'])){
						$hasil = karakter($_POST['kalimat']);
						echo '<p>Kalimat = '.$_POST['kalimat'].'</p>';
						echo '<p>Vokal = '.$hasil['vokal'].' huruf</p>';
						echo '<p>Konsonan = '.$hasil['konsonan'].' huruf</p>';
					} 
					?>
					</p>
				</form>
			</li>
		</ol>
</body>
</html>