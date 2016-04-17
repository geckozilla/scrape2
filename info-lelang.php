<?php
# fetch lelang list
# BAHAN: http://localhost/bahan/Informasi%20Lelang.html
# URL ASLI: http://www.lpse.trenggalekkab.go.id/eproc/lelang/view/766391

include('_inc/simple_html_dom.php');
$uri = 'http://localhost/bahan/Informasi%20Lelang.html';   // testing
//$uri = 'http://www.lpse.trenggalekkab.go.id/eproc/lelang/view/766391';   // production

$html = file_get_html($uri);


$xx['kode_lelang'] = trim($html->find('.horizLine')[0]->plaintext);
$xx['nama_lelang'] = trim($html->find('.horizLine')[1]->plaintext);
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

var_dump($xx);

?>
<b>Kode Lelang: </b><?php echo $xx['kode_lelang']; ?>  <br />
<b>Nama Lelang (Lelang Ulang): </b><?php echo $xx['nama_lelang']; ?>  <br />
<b>Keterangan: </b><?php echo $xx['keterangan']; ?>  <br />
<b>Tahap Lelang Saat ini: </b><?php echo $xx['tahap_lelang']; ?>  <br />
<b>Agency: </b><?php echo $xx['agency']; ?>  <br />
<b>Satuan Kerja: </b><?php echo $xx['satuan_kerja']; ?>  <br />
<b>Kategori: </b><?php echo $xx['kategori']; ?>  <br />
<b>Metode Pengadaan: </b><?php echo $xx['metode_pengadaan']; ?>  <br />
<b>Metode Kualifikasi: </b><?php echo $xx['metode_kualifikasi']; ?>  <br />
<b>Metode Dokumen: </b><?php echo $xx['metode_dokumen']; ?>  <br />
<b>Anggaran:</b><?php echo $xx['anggaran']; ?>  <br />
<b>Nilai Pagu Paket:</b><?php echo $xx['nilai_pagu']; ?>  <br />
<b>Nilai HPS Paket:</b><?php echo $xx['nilai_hps']; ?>  <br />
<b>Cara Pembayaran:</b><?php echo $xx['cara_pembayaran']; ?>  <br />
<b>Pembebanan Tahun Anggaran:</b><?php echo $xx['tahun_anggaran']; ?>  <br />
<b>Sumber Pendanaan:</b><?php echo $xx['pendanaan']; ?>  <br />
<b>Kualifikasi Usaha:</b><?php echo $xx['kualifikasi_usaha']; ?>  <br />
<b>Lokasi Pekerjaan:</b><?php echo $xx['lokasi']; ?>  <br />
<b>Syarat Kualifikasi:</b><?php echo $xx['syarat_kualifikasi']; ?>  <br />

<hr />



