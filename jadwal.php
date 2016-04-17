<?php
# fetch lelang list
# BAHAN: http://localhost/bahan/Jadwal%20Lelang.html
# URL ASLI: http://www.lpse.trenggalekkab.go.id/eproc/lelang/pemenang/766391

include('_inc/simple_html_dom.php');
$uri = 'http://localhost/bahan/Jadwal%20Lelang.html';   // testing
//$uri = 'http://www.lpse.trenggalekkab.go.id/eproc/lelang/pemenang/766391';   // production

$html = file_get_html($uri);

$no = 0;
foreach($html->find('tr')as $item) {
	$no = $no + 1;
	$res[$no]['tahap'] = trim($item->find('td')[1]->plaintext);
	$res[$no]['mulai'] = rem_nbsp($item->find('td')[2]->plaintext);
	$res[$no]['sampai'] = rem_nbsp($item->find('td')[3]->plaintext);
	$res[$no]['perubahan'] = trim($item->find('td')[4]->plaintext);
}


var_dump($res);


function rem_nbsp($in) {
	$out = str_replace('&nbsp', '', $in);
	return trim($out);
}