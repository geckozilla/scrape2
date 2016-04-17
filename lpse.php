<?php
//error_reporting(0);

# Get URL LPSE
# BAHAN: http://localhost/bahan/INAPROC%20-%20Portal%20Pengadaan%20Nasional%20(Indonesian%20Procurement).html
# URL ASLI: https://inaproc.lkpp.go.id/v3/daftar_lpse


include('_inc/simple_html_dom.php');

$uri = 'http://localhost/bahan/INAPROC%20-%20Portal%20Pengadaan%20Nasional%20(Indonesian%20Procurement).html';
//$uri = 'https://inaproc.lkpp.go.id/v3/daftar_lpse';  // production

$html = file_get_html($uri);
$no = 0;
foreach($html->find('tbody tr') as $link) {
	$no = $no + 1;
	if ($no <> 1) {
        echo $link->find('td')[0]->plaintext;
        echo '|';
        echo $link->find('td')[1]->plaintext;
        echo '|';
        echo $link->find('.linkPaket')[0]->href;
        echo '<br /> '."\r\n";
	}
}

