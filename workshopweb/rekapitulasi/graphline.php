<?php 
require_once('database.php');
include ("../libs/jpgraph/jpgraph.php");
include ("../libs/jpgraph/jpgraph_line.php");
$jurusan = [];
$jumlah = [];
foreach ($data as $value) {
	array_push($jurusan, $value['jurusan']);
	array_push($jumlah, $value['jumlah']);
}
$graph = new Graph(1500,700,"auto");
$graph->SetScale('textint');
$graph->img->SetMargin(50,30,50,50);
$graph->SetShadow();
$graph->title->Set("REKAPITULASI DATA MAHASISWA");
$graph->xaxis->SetTickLabels($jurusan);
$bplot = new LinePlot($jumlah);
$bplot->value->Show();
$bplot->value->SetFont(FF_ARIAL,FS_BOLD,50);
$bplot->value->SetAngle(45);
$bplot->SetLegend("Banyak data");
$graph->Add($bplot);
$graph->Stroke();
?>