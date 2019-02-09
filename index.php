<?php

$opn = '<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:nyt="http://www.nytimes.com/namespaces/rss/2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" version="2.0">'.
"\n<channel>\n<title>RSS testo</title>";
$end = "\n</channel>\n</rss>";

$file = simplexml_load_file("https://queryfeed.net/instagram?q=idcloudhost");
foreach ($file as $value) {
	for($i=0;$i<5;$i++){
		$item = $value-> item[$i];
		
		$jdl = $item -> title;
		$jdl = str_replace("&"," and ",$jdl);
		$lnk = $item -> link;
		$lnk = str_replace("&","&amp;",$lnk);
		$des = $item -> description;
		$des = str_replace("&"," and ",$des);
		$tgl = $item -> pubDate;
		$tgl = str_replace("+0000","GMT",$tgl);
		$img = $item -> enclosure -> attributes() -> url;

		$jdl = '<title>'.$jdl.'</title>';
		//$lnk = '<link><![CDATA['.$lnk.']]></link>';
		$lnk = '<link>'.$lnk.'</link>';
		$des = '<description>'.$des.'</description>';
		$lbd[] = '<lastBuildDate>'.$tgl.'</lastBuildDate>';
		$tgl = '<pubDate>'.$tgl.'</pubDate>';
		$img = '<content:encoded><![CDATA[<img src="'.$img.'" />]]></content:encoded>';
		
		$all = $jdl."\n".$lnk."\n".$des."\n".$tgl."\n".$img;
		$isi[] = $all;
		echo $all;
		echo "<hr/>";
	}
}

$namafile = "cron.xml";
$handle = fopen ($namafile, "w");

foreach($isi as $isi){
	$myitem[] = "<item>\n" .$isi."\n</item>";
}

$myitem = implode("\n",$myitem);
$myitem = $opn."\n".$lbd[0]."\n".$myitem."\n".$end;
fwrite ($handle, $myitem);
echo '<b>Udah di-Upadate: '.date("H:i/d-m").'</b>'; 
