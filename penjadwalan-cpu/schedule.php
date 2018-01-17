<?php

if(isset($_POST['metode']) && isset($_POST['jumproses']) && isset($_POST['proses'])) {
	$metode = $_POST['metode'];
	$jumproses = $_POST['jumproses'];
	$proses = $_POST['proses'];
	$hasil = ['gantt'=>[], 'selesai' => null, 'analisis'=>[], 'totwt' => null, 'tottat' => null];

	$nama  = [];
    $priority  = [];
    $bursttime = [];
	if($metode == 'Priority') {
		//urutkan berdasar prioritas
		foreach ($proses as $key => $row) {
			$nama[$key]  = $row['nama'];
		    $priority[$key]  = $row['priority'];
		    $bursttime[$key] = $row['bursttime'];
		}
		array_multisort($priority, SORT_DESC, $bursttime, SORT_DESC, $nama, SORT_DESC, $proses);
	}
	else {
		//urutkan berdasar arival time
		foreach ($proses as $key => $row) {
			$nama[$key]  = $row['nama'];
		    $arvtime[$key]  = $row['arvtime'];
		    $bursttime[$key] = $row['bursttime'];
		}
		array_multisort($arvtime, SORT_DESC, $bursttime, SORT_DESC, $nama, SORT_DESC, $proses);
	}

	//Pemilihan algoritma penjadwalan
	switch ($metode) {
		case 'FCFS':
			fcfs();
			break;
		
		case 'SJF-Non Preemptive':
			sjfnp();
			break;

		case 'Priority':
			priority();
			break;

		case 'Round Robin':
			roundrobin();
			break;
		
		case 'SJF-Preemptive':
			sjfp();
			break;

		default:
			break;
	}

	$namapros  = [];
    $pri  = [];
    $bt = [];
    $wt = [];
    $tat = [];
	//pengurutan hasil penjadwalan berdasarkan nama proses
	if($metode == 'Priority') {
		foreach ($hasil['analisis'] as $key => $row) {
			$namapros[$key]  = $row['proses'];
		    $pri[$key]  = $row['pri']; // Prioritas
		    $bt[$key] = $row['bt']; // Burst Time
		    $wt[$key] = $row['wt']; // Waiting Time
		    $tat[$key] = $row['tat']; // Turned Around Time
		}
		array_multisort($namapros, SORT_ASC, $pri, SORT_ASC, $bt, SORT_ASC, $wt, SORT_ASC, $tat, SORT_ASC, $hasil['analisis']);
	}
	else {
		foreach ($hasil['analisis'] as $key => $row) {
			$namapros[$key]  = $row['proses'];
		    $at[$key]  = $row['at']; // Arival Time
		    $bt[$key] = $row['bt'];
		    $wt[$key] = $row['wt'];
		    $tat[$key] = $row['tat'];
		}
		array_multisort($namapros, SORT_ASC, $at, SORT_ASC, $bt, SORT_ASC, $wt, SORT_ASC, $tat, SORT_ASC, $hasil['analisis']);
	}

	// tampilkan hasil
	echo json_encode($hasil);
}

// Algoritma First Come First Served
function fcfs(){
	global $proses, $jumproses, $hasil;
	$lastpros = 0; // Waktu terakhir proses dikerjakan
	$cpros = array_pop($proses); // Current Proccess (yg sedang dikerjakan)
	$idle = 0; // Jika ada waktu dimana proses tidak berjalan

	$wt = 0; // Waiting Time
	$tat = 0; // Turned Around Time

	// Total
	$totwt = 0;
	$tottat = 0;

	// Proses Pejadwalan
	do {
		$cprosarv = intval($cpros['arvtime']); // Arival Time proses yang berjalan
		if($lastpros < $cprosarv) { // Mengindikasi adanya waktu dimana proses tidak berjalan
			array_push($hasil['gantt'], [
				'proses'	=>	'NP'.++$idle,
				'start'		=>	$lastpros,
				'end'		=>	$cprosarv,
				'jml'		=>	$cprosarv - $lastpros,
				'idle'		=>	'idle'
			]);

			$lastpros = $cprosarv;
		}
		else {
			$cpros['bursttime'] = intval($cpros['bursttime']);
			array_push($hasil['gantt'], [
				'proses'	=>	'P'.$cpros['nama'],
				'start'		=>	$lastpros,
				'end'		=>	$lastpros + $cpros['bursttime'],
				'jml'		=>	$cpros['bursttime'],
				'idle'		=>	''
			]);

			$wt = $lastpros - $cprosarv;
			$totwt += $wt;

			$tat = $wt + $cpros['bursttime'];
			$tottat += $tat;

			array_push($hasil['analisis'], [
				'proses'=>	$cpros['nama'],
				'at'	=>	$cprosarv,
				'bt'	=>	$cpros['bursttime'],
				'wt'	=>	$wt,
				'tat'	=>	$tat 
			]);

			$hasil['selesai'] = $lastpros = $lastpros + $cpros['bursttime'];
			$cpros = array_pop($proses); // Mengganti dengan proses selanjutnya
		}
	} while($cpros != null);

	$hasil['totwt'] = $totwt;
	$hasil['tottat'] = $tottat;
}


// Algoritma Shortest Job First Non-Preemptive
function sjfnp() {
	global $proses, $jumproses, $hasil;
	$lastpros = 0;
	$cpros = array_pop($proses);
	$cpros['bursttime'] = intval($cpros['bursttime']);
	$cproskey = $jumproses - 2; // Index Proses yang berjalan
	$qpros = []; // Queue (antrian) proses untuk dijalankan
	$idle = 0;

	$wt = 0;
	$tat = 0;

	$totwt = 0;
	$tottat = 0;
	do {
		$cprosarv = intval($cpros['arvtime']);
		if($lastpros < $cprosarv) {
			array_push($hasil['gantt'], [
				'proses'	=>	'NP'.++$idle,
				'start'		=>	$lastpros,
				'end'		=>	$cprosarv,
				'jml'		=>	$cprosarv - $lastpros,
				'idle'		=>	'idle'
			]);

			$lastpros = $cprosarv;
		}
		else {
			array_push($hasil['gantt'], [
				'proses'	=>	'P'.$cpros['nama'],
				'start'		=>	$lastpros,
				'end'		=>	$lastpros + $cpros['bursttime'],
				'jml'		=>	$cpros['bursttime'],
				'idle'		=>	''
			]);

			$wt = $lastpros - $cprosarv;
			$totwt += $wt;

			$tat = $wt + $cpros['bursttime'];
			$tottat += $tat;

			array_push($hasil['analisis'], [
				'proses'=>	$cpros['nama'],
				'at'	=>	$cprosarv,
				'bt'	=>	$cpros['bursttime'],
				'wt'	=>	$wt,
				'tat'	=>	$tat 
			]);

			// Memasukkan proses dengan waktu yg di bawah waktu terakhir proses berjalan ke dalam antrian
			for($i = $cproskey; $i >= 0 && count($proses) > 1; $i--) {
				if($proses[$i]['arvtime'] <= $lastpros + $cpros['bursttime']) {
					array_push($qpros, array_pop($proses));
					$cproskey--;
				}
			}

			// Mengurutkan antrian berdasarkan besar Burst Time
			if(count($qpros) > 2) {
				$bursttime = [];
			    $arvtime  = [];
				$nama  = [];
				foreach ($qpros as $key => $row) {
					$nama[$key]  = $row['nama'];
				    $arvtime[$key]  = $row['arvtime'];
				    $bursttime[$key] = $row['bursttime'];
				}
				array_multisort($bursttime, SORT_DESC, $arvtime, SORT_DESC, $nama, SORT_DESC, $qpros);
			}

			$hasil['selesai'] = $lastpros = $lastpros + $cpros['bursttime'];

			// Selama antrian proses tidak kosong, maka proses selanjutnya dari antrian proses
			$cpros = count($qpros) > 0 ? array_pop($qpros) : array_pop($proses);
		}
	} while($cpros != null);

	$hasil['totwt'] = $totwt;
	$hasil['tottat'] = $tottat;
}

function priority() {
	global $proses, $jumproses, $hasil;
	$lastpros = 0;
	$cpros = array_pop($proses);

	$wt = 0;
	$tat = 0;

	$totwt = 0;
	$tottat = 0;
	do {
		// Arival time dibuat serempak pada 0
		// Pada algoritma FCFS proses berjalan berurutan sesuai waktu kedatangan (arival time)
		// Pada algoritma Priority proses berjalan berurutan sesuai prioritas
		$cpros['bursttime'] = intval($cpros['bursttime']);
		array_push($hasil['gantt'], [
			'proses'	=>	'P'.$cpros['nama'],
			'start'		=>	$lastpros,
			'end'		=>	$lastpros + $cpros['bursttime'],
			'jml'		=>	$cpros['bursttime'],
			'idle'		=>	''
		]);

		$wt = $lastpros;
		$totwt += $wt;

		$tat = $wt + $cpros['bursttime'];
		$tottat += $tat;

		array_push($hasil['analisis'], [
			'proses'=>	$cpros['nama'],
			'pri'	=>	intval($cpros['priority']),
			'bt'	=>	$cpros['bursttime'],
			'wt'	=>	$wt,
			'tat'	=>	$tat 
		]);

		$hasil['selesai'] = $lastpros = $lastpros + $cpros['bursttime'];
		$cpros = array_pop($proses);
	} while($cpros != null);

	$hasil['totwt'] = $totwt;
	$hasil['tottat'] = $tottat;
}


// Algoritma Round Robin
function roundrobin() {
	global $proses, $jumproses, $hasil;
	$lastpros = 0;
	$quantum = intval($_POST['quantum']); // Quantum Time
	$cpros = array_pop($proses);
	$cpros['bursttime'] = intval($cpros['bursttime']);
	$cproskey = $jumproses - 2;
	$qpros = [];
	$qquant = []; // Queue (antrian) proses berdasarkan quantum time
	$analisis = [];
	$idle = 0;
	$jml = 0;

	$wt = 0;
	$tat = 0;

	$totwt = 0;
	$tottat = 0;

	do {
		$cprosarv = intval($cpros['arvtime']);
		if($lastpros < $cprosarv) {
			array_push($hasil['gantt'], [
				'proses'	=>	'NP'.++$idle,
				'start'		=>	$lastpros,
				'end'		=>	$cprosarv,
				'jml'		=>	$cprosarv - $lastpros,
				'idle'		=>	'idle'
			]);

			$lastpros = $cprosarv;
		}
		else {
			// Jika besar burst time di atas Quantum Time maka burst time proses saat ini besarnya dianggap sebesar Quantum Time
			// selain itu maka burst time tetap
			$burst = $cpros['bursttime'] > $quantum ? $quantum : $cpros['bursttime'];
			array_push($hasil['gantt'], [
				'proses'	=>	'P'.$cpros['nama'],
				'start'		=>	$lastpros,
				'end'		=>	$lastpros + $burst,
				'jml'		=>	intval($burst),
				'idle'		=>	''
			]);

			// Untuk hasil penjadwalan tiap proses
			if(!isset($analisis[$cpros['nama']])) { // Jika hasil penjadwalan proses ke-n belum ada
				$wt = $lastpros - $cprosarv; // Waiting time saat pertama proses berjalan
				$tat = $wt + $cpros['bursttime'];
				$analisis[$cpros['nama']] = [
					'at'	=>	$cprosarv,
					'bt'	=>	$cpros['bursttime'],
					'wt'	=>	$wt,
					'lft'	=>	$lastpros + $burst, //last finishing time (waktu proses selesai terakhir)
					'tat'	=>	$tat
				];
			}
			else {
				// Jika Burst Time terpotang dengan Quantum Time
				$analisis[$cpros['nama']]['wt'] += ($lastpros - $analisis[$cpros['nama']]['lft']); // penambahan waiting time jika dengan selisih antara waktu dijalankan saat ini dan waktu terakhir proses selesai
				$analisis[$cpros['nama']]['lft'] = $lastpros + $burst; // memperbarui waktu proses selesai saat ini
				$wt = $analisis[$cpros['nama']]['wt'];
				$bt = $analisis[$cpros['nama']]['bt'];
				$analisis[$cpros['nama']]['tat'] = $wt + $bt; // memperbarui TAT
			}

			// Proses selesai dan burst time dikurangi quantum time atau di-0 kan jika dibawah burst time
			$cpros['bursttime'] -= $cpros['bursttime'] > $quantum ? $quantum : $cpros['bursttime'];

			// Memasukkan proses dengan waktu yg di bawah waktu terakhir proses berjalan ke dalam antrian proses
			for($i = $cproskey; $i >= 0 && count($proses) > 0; $i--) {
				if($proses[$i]['arvtime'] <= $lastpros + $burst) {
					array_push($qpros, array_pop($proses));
					$cproskey--;
				}
			}

			// Mengurutkan antrian berdasarkan Burst Time
			if(count($qpros) > 2) {
				$bursttime = [];
			    $arvtime  = [];
				$nama  = [];
				foreach ($qpros as $key => $row) {
					$nama[$key]  = $row['nama'];
				    $arvtime[$key]  = $row['arvtime'];
				    $bursttime[$key] = intval($row['bursttime']);
				}
				array_multisort($bursttime, SORT_ASC, $arvtime, SORT_ASC, $nama, SORT_ASC, $qpros);
			}

			// Memasukkan antrian proses ke antrian quantum
			foreach ($qpros as $value) {
				array_push($qquant, array_shift($qpros));
			}
			// Jika proses saat ini belum benar-benar selesai, dimasukkan di akhir antrian quantum
			if($cpros['bursttime'] > 0)
				array_push($qquant, $cpros);			

			$hasil['selesai'] = $lastpros = $lastpros + $burst;
			$cpros = array_shift($qquant);
		}
		$jml++;
	} while($cpros != null);
	
	foreach ($analisis as $key => $value) {
		array_push($hasil['analisis'], [
			'proses'=>	$key,
			'at'	=>	$value['at'],
			'bt'	=>	$value['bt'],
			'wt'	=>	$value['wt'],
			'tat'	=>	$value['tat'] 
		]);
		$totwt += $value['wt'];
		$tottat += $value['tat'];
	}

	$hasil['totwt'] = $totwt;
	$hasil['tottat'] = $tottat;
	$hasil['jmlpros'] = $jml;
}

// Algoritma SJF-Preemptive (Shortest Remaining Time First)
function sjfp() {
	global $proses, $jumproses, $hasil;
	$lastpros = 0;
	$cpros = array_pop($proses);
	$cpros['bursttime'] = intval($cpros['bursttime']);
	$cproskey = $jumproses - 2;
	$qpros = []; // Antrian Remaining Time (Sisa Burst Time)
	$analisis = [];
	$idle = 0;
	$jml = 0;

	$wt = 0;
	$tat = 0;

	$totwt = 0;
	$tottat = 0;

	do {
		$cprosarv = intval($cpros['arvtime']);
		if($lastpros < $cprosarv) {
			array_push($hasil['gantt'], [
				'proses'	=>	'NP'.++$idle,
				'start'		=>	$lastpros,
				'end'		=>	$cprosarv,
				'jml'		=>	$cprosarv - $lastpros,
				'idle'		=>	'idle'
			]);

			$lastpros = $cprosarv;
		}
		else {
			if(end($hasil['gantt'])['proses'] != 'P'.$cpros['nama']) { // jika proses terakhir berjalan != proses saat ini
				array_push($hasil['gantt'], [
					'proses'	=>	'P'.$cpros['nama'],
					'start'		=>	$lastpros,
					'end'		=>	$lastpros + 1,
					'jml'		=>	1,
					'idle'		=>	''
				]);
			}
			else {
				// jika proses yang berjalan = sebelumnya
				end($hasil['gantt']);
				$hasil['gantt'][key($hasil['gantt'])]['end'] += 1;
				$hasil['gantt'][key($hasil['gantt'])]['jml'] += 1;
			}

			if(!isset($analisis[$cpros['nama']])) {
				$wt = $lastpros - $cprosarv;
				$tat = $wt + $cpros['bursttime'];
				$analisis[$cpros['nama']] = [
					'at'	=>	$cprosarv,
					'bt'	=>	$cpros['bursttime'],
					'wt'	=>	$wt,
					'lft'	=>	$lastpros + 1, //last finishing time
					'tat'	=>	$tat 
				];
			}
			else {
				$analisis[$cpros['nama']]['wt'] += ($lastpros - $analisis[$cpros['nama']]['lft']);
				$analisis[$cpros['nama']]['lft'] = $lastpros + 1;
				$wt = $analisis[$cpros['nama']]['wt'];
				$bt = $analisis[$cpros['nama']]['bt'];
				$analisis[$cpros['nama']]['tat'] = $wt + $bt;
			}

			// Sama seperti Algoritma Round Robin, burst time akan berkala berkurang
			// untuk SJFP ini burst time akan berkala berkurang 1
			$cpros['bursttime'] -= 1;

			// Memasukkan proses dengan waktu yg di bawah waktu terakhir proses berjalan ke dalam antrian remaining time
			for($i = $cproskey; $i >= 0 && count($proses) > 0; $i--) {
				if($proses[$i]['arvtime'] <= $lastpros + 1) {
					array_push($qpros, array_pop($proses));
					$cproskey--;
				}
			}

			// Jika ada sisa burst time pada proses saat ini, maka masukan juga ke antrian remaining time
			if($cpros['bursttime'] > 0)
				array_push($qpros, $cpros);

			// urutkan antrian remaining time berdasarkan remaining time (sisa burst time)
			if(count($qpros) > 2) {
				$bursttime = [];
			    $arvtime  = [];
				$nama  = [];
				foreach ($qpros as $key => $row) {
				    $bursttime[$key] = $row['bursttime'];
				    $arvtime[$key]  = $row['arvtime'];
					$nama[$key]  = $row['nama'];
				}
				array_multisort($bursttime, SORT_DESC, $arvtime, SORT_DESC, $nama, SORT_DESC, $qpros);
			}

			$hasil['selesai'] = $lastpros = $lastpros + 1;

			// Selama antrian remaining time tidak kosong, maka proses selanjutnya dari antrian remaining time
			$cpros = count($qpros) > 0 ? array_pop($qpros) : array_pop($proses);
		}
		$jml++;
	} while($cpros != null);
	
	foreach ($analisis as $key => $value) {
		array_push($hasil['analisis'], [
			'proses'=>	$key,
			'at'	=>	$value['at'],
			'bt'	=>	$value['bt'],
			'wt'	=>	$value['wt'],
			'tat'	=>	$value['tat'] 
		]);
		$totwt += $value['wt'];
		$tottat += $value['tat'];
	}

	$hasil['totwt'] = $totwt;
	$hasil['tottat'] = $tottat;
	$hasil['jmlpros'] = $jml;
}