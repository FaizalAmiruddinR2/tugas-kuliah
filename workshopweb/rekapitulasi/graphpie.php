<?php 
require_once('database.php');
include ("../libs/jpgraph/jpgraph.php");
include ("../libs/jpgraph/jpgraph_pie.php");
include ("../libs/jpgraph/jpgraph_pie3d.php");
$jurusan = [];
$jumlah = [];
foreach ($data as $value) {
	array_push($jurusan, $value['jurusan']);
	array_push($jumlah, $value['jumlah']);
}
$graph = new PieGraph(1500,700,"auto"); 
$graph->SetScale('textint'); 
$graph->img->SetMargin(50,30,50,50); 
$graph->SetShadow(); 
$graph->title->Set("REKAPITULASI DATA MAHASISWA"); 
$bplot = new PiePlot3D($jumlah); 
$bplot->SetCenter(0.45); 
$bplot->SetLegends($jurusan); 
$graph->Add($bplot); 
$graph->Stroke(); 
?>