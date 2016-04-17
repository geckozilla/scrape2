<?php
# fetch lelang list
# BAHAN: http://localhost/bahan/LPSE%20Kabupaten%20Trenggalek%203.html
# URL ASLI: http://www.lpse.trenggalekkab.go.id/eproc/lelang

include('_inc/simple_html_dom.php');
$uri = 'http://localhost/bahan/lelang.html';   // testing
//$uri = 'http://www.lpse.trenggalekkab.go.id/eproc/lelang';   // production

$html = file_get_html($uri);

$no = 0;
foreach($html->find('.horizLineTop') as $item) {
	$no = $no + 1;
    $nama =  $item->find('.pkt_nama .jpopup');
    $url = trim($nama[0]->href);
    $xx[$no]['kode_lelang'] = trim(explode('/view/', $url)[1]);
    $xx[$no]['url'] = $url;
    $xx[$no]['nama'] = trim($nama[0]->plaintext);
    unset($nama);
    unset($url);

    $agency = $item->find('.agc_nama');
    $xx[$no]['agency'] = trim($agency[0]->plaintext);
    unset($agency);

    $tahap = $item->find('.tahap');
    $xx[$no]['tahap'] = trim($tahap[0]->plaintext);
    unset($tahap);

    $hps = $item->find('.pkt_hps');
    $xx[$no]['hps'] = trim($hps[0]->plaintext);
    unset($hps);

    $list = $item->find('.list span');
    $xx[$no]['kategori'] = trim($list[2]->innertext);
    $xx[$no]['jenis'] = trim($list[5]->innertext);
    $xx[$no]['metode'] = trim($list[8]->innertext);
    $xx[$no]['nilai'] = trim($list[11]->innertext);
    unset($list);
}

unset($item);
unset($html);

var_dump($xx);