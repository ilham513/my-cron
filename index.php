<?php

$namafile = "data4.txt";
$handle = fopen ($namafile, "w");

if (!$handle) {
	echo "<b>Error 404</b>";
} else {
	$isi = "Pap Skdipap";
	fwrite ($handle, $isi);
	echo "<b>Berhasil :)</b>"; 
}
