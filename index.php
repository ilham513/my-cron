<?php
$namafile = "cron.xml";
$handle = fopen ($namafile, "w");

if ($handle) {
	$op = '<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:nyt="http://www.nytimes.com/namespaces/rss/2.0" version="2.0">'."\n<channel>\n<title>RSS testo</title>
	";
	
	$ed = "\n</channel>\n</rss>";
	$isi = $op. "<item>\n"."\n</item>" .$ed;
//	fwrite ($handle, $isi);
	fwrite ($handle, 'RE: Write!!!');
	echo '<b>Upadate: '.date("H:i/d-m").'</b>'; 
} else {
	echo 'error statmenect';}
