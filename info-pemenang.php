<?php
# fetch lelang list
# BAHAN: http://localhost/bahan/Informasi%20Lelang.html
# URL ASLI: http://www.lpse.trenggalekkab.go.id/eproc/lelang/pemenang/766391

include('_inc/simple_html_dom.php');
$uri = 'http://localhost/bahan/Informasi%20Pemenang%20Lelang.html';   // testing
//$uri = 'http://www.lpse.trenggalekkab.go.id/eproc/lelang/pemenang/766391';   // production

$html = file_get_html($uri);


$xx['nama_lelang'] = trim($html->find('.horizLine')[0]->plaintext);
$xx['kategori'] = trim($html->find('.horizLine')[1]->plaintext);
$xx['agency'] = trim($html->find('.horizLine')[2]->plaintext);
$xx['satker'] = trim($html->find('.horizLine')[3]->plaintext);
$xx['pagu'] = trim($html->find('.horizLine')[4]->plaintext);
$xx['hps'] = trim($html->find('.horizLine')[5]->plaintext);
$xx['nama_pemenang'] = trim($html->find('.horizLine')[6]->plaintext);
$xx['alamat'] = trim($html->find('.horizLine')[7]->plaintext);
$xx['npwp'] = trim($html->find('.horizLine')[8]->plaintext);
$xx['harga_penawaran'] = trim($html->find('.horizLine')[9]->plaintext);

/*
$xx['keterangan'] = trim($html->find('.horizLine')[2]->plaintext);
$xx['tahap_lelang'] = trim($html->find('.horizLine')[3]->plaintext);
$xx['agency'] = trim($html->find('.horizLine')[4]->plaintext);
$xx['satuan_kerja'] = trim($html->find('.horizLine')[5]->plaintext);
$xx['kategori'] = trim($html->find('.horizLine')[6]->plaintext);
$xx['metode_pengadaan'] = trim($html->find('.horizLine')[7]->plaintext);
$xx['metode_kualifikasi'] = trim($html->find('.horizLine')[8]->plaintext);
$xx['metode_dokumen'] = trim($html->find('.horizLine')[9]->plaintext);
$xx['anggaran'] = trim($html->find('.horizLine')[11]->plaintext);
$xx['nilai_pagu'] = trim($html->find('.horizLine')[12]->plaintext);
$xx['nilai_hps'] = trim($html->find('.horizLine')[13]->plaintext);
$xx['cara_pembayaran'] = trim($html->find('.horizLine')[15]->plaintext);
$xx['tahun_anggaran'] = trim($html->find('.horizLine')[16]->plaintext);
$xx['pendanaan'] = trim($html->find('.horizLine')[17]->plaintext);
$xx['kualifikasi_usaha'] = trim($html->find('.horizLine')[18]->plaintext);
$xx['lokasi'] = trim($html->find('.horizLine')[19]->plaintext);
$xx['syarat_kualifikasi'] = trim($html->find('.horizLine')[20]->innertext);
//  */

var_dump($xx);
