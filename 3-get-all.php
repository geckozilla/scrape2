<?php
# get all lelang in LPSE

$mode = 'tes';  // isinya >> 'tes'  atau 'prod'
$lpse = 'http://www.lpse.trenggalekkab.go.id/';
$path = 'http://localhost/';
$nama_file = '3-get-all.php';


##########################
#   DONT CHANGE HERE 
##########################

include('_inc/simple_html_dom.php');
include('_inc/_func.php');



# pilihan url sesuai mode
if ($mode === 'tes') {
	$uri = 'http://localhost/bahan/lelang.html';   // testing
	$uri_next =  'http://localhost/bahan/lelang.html';  // testing
} else {
	$uri = $lpse.'eproc/lelang';    // production
	$uri_next = $lpse.'eproc/lelang.gridtable.pager/'.$page.'?s=5';    // production
}

# get page
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

# get html
$html = file_get_html($uri);

# get jumlah halaman
if ($page == 1) {
	$jumlah_hal = count($html->find('.t-data-grid-pager a')) + 1;
} else {
	$jumlah_hal = $_GET['jumlah_hal'];
}

$res = '';
$no = 0;

foreach($html->find('.horizLineTop') as $item) {
	$no = $no + 1;
    $nama =  $item->find('.pkt_nama .jpopup');
    $url = trim($nama[0]->href);
    $x['kode_lelang'] = trim(explode('/view/', $url)[1]);
    $x['url'] = $url;
    $x['nama'] = trim($nama[0]->plaintext);
    unset($nama);
    unset($url);

    $agency = $item->find('.agc_nama');
    $x['agency'] = trim($agency[0]->plaintext);
    unset($agency);

    $tahap = $item->find('.tahap');
    $x['tahap'] = trim($tahap[0]->plaintext);
    unset($tahap);

    $hps = $item->find('.pkt_hps');
    $x['hps'] = trim($hps[0]->plaintext);
    unset($hps);

    $list = $item->find('.list span');
    $x['kategori'] = trim($list[2]->innertext);
    $x['jenis'] = trim($list[5]->innertext);
    $x['metode'] = trim($list[8]->innertext);
    $x['nilai'] = trim($list[11]->innertext);
    unset($list);

    $res .= "('', 378, ".$x['kode_lelang'].", '".$x['url']."', '".$x['nama']."', '".$x['agency']."', '".$x['tahap']."', '".$x['hps']."', '".$x['kategori']."', '".$x['jenis']."', '".$x['metode']."', '".$x['nilai']."'),"." \r\n";
}

unset($item);
unset($html);


# write data
$filename = "data/data.txt";
$somecontent = $res." \r\n";

if (file_exists($filename)) {
	if (is_writable($filename)) {
	    if (!$handle = fopen($filename, 'a')) {
	         echo "Cannot open file ($filename)";
	         exit;
	    }
	    if (fwrite($handle, $somecontent) === FALSE) {
	        echo "Cannot write to file ($filename)";
	        exit;
	    }
	    fclose($handle);
	} else {
	    echo "The file $filename is not writable";
	}
} else {
	$isi = "INSERT INTO `data_lelang` (`id`, `kode_lpse`, `kode_lelang`, `url`, `nama`, `agency`, `tahap`, `hps`, `kategori`, `jenis`, `metode`, `nilai`) VALUES  \r\n";
	file_put_contents($filename, $isi);
}



echo 'page: '.$page;

//sleep(2);

if ($page <> $jumlah_hal) {
	$next_page = $page + 1;
	redirect($path . $nama_file.'?jumlah_hal='.$jumlah_hal.'&page='.$next_page);
} else {
	echo '<h1>MISSION ACCOMPLISHED</h1>';
}
