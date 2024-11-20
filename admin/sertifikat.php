<?php
include "../config.php";

$id = $_GET['id'];

$peserta = mysqli_query($koneksi, "SELECT * FROM peserta WHERE id_peserta='$id'");
$sertifikat = mysqli_query($koneksi, "SELECT * FROM sertifikat");

$sql = mysqli_fetch_array($peserta);
$sql_1 = mysqli_fetch_array($sertifikat);

$gambar = "../public/img/sertifikat-3.jpg";

$image = imagecreatefromjpeg($gambar);
$white = imageColorAllocate($image, 255, 255, 255);
$black = imageColorAllocate($image, 0, 0, 0);
$font_nama = "../public/fonts/QuinchoScript_PersonalUse.ttf";
$font_sekolah = "../public/fonts/Poppins-Bold.ttf";
$font_tanggal = "../public/fonts/Poppins-MediumItalic.ttf";
$font_ttd = "../public/fonts/Poppins-Medium.ttf";
$size_nama = 64;
$size_sekolah = 30;
$size_tanggal = 24;
//definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
$image_width = imagesx($image);  
//membuat textbox agar text centered
$text_box = imagettfbbox($size_nama,0,$font_nama,$sql['nama']);
$text_width = $text_box[2]-$text_box[0];
$text_height = $text_box[3]-$text_box[1];
$x = ($image_width/2) - ($text_width/2);

$text_box_1 = imagettfbbox($size_sekolah,0,$font_sekolah,$sql['instansi']);
$text_width_1 = $text_box_1[2]-$text_box_1[0];
$text_height_1 = $text_box_1[3]-$text_box_1[1];
$x_1 = ($image_width/2) - ($text_width_1/2);

$text_box_2 = imagettfbbox($size_tanggal,0,$font_tanggal,$sql_1['teks']);
$text_width_2 = $text_box_2[2]-$text_box_2[0];
$text_height_2 = $text_box_2[3]-$text_box_2[1];
$x_2 = ($image_width/2) - ($text_width_2/2);

$text_box_3 = imagettfbbox($size_tanggal,0,$font_ttd,$sql_1['nama']);
$text_width_3 = $text_box_3[2]-$text_box_3[0];
$text_height_3 = $text_box_3[3]-$text_box_3[1];
$x_3 = ($image_width/2) - ($text_width_3/2);

$text_box_4 = imagettfbbox($size_tanggal,0,$font_ttd,$sql_1['jabatan']);
$text_width_4 = $text_box_4[2]-$text_box_4[0];
$text_height_4 = $text_box_4[3]-$text_box_4[1];
$x_4 = ($image_width/2) - ($text_width_4/2);

$text_box_5 = imagettfbbox($size_tanggal,0,$font_ttd,$sql_1['kota'].", ".date('j F Y', strtotime($sql['tgl_selesai'])));
$text_width_5 = $text_box_5[2]-$text_box_5[0];
$text_height_5 = $text_box_5[3]-$text_box_5[1];
$x_5 = ($image_width/2) - ($text_width_5/2);

$text_box_6 = imagettfbbox($size_tanggal,0,$font_ttd,date('j F Y', strtotime($sql['tgl_mulai']))." s.d. ".date('j F Y', strtotime($sql['tgl_selesai'])));
$text_width_6 = $text_box_6[2]-$text_box_6[0];
$text_height_6 = $text_box_6[3]-$text_box_6[1];
$x_6 = ($image_width/2) - ($text_width_6/2);
//generate sertifikat beserta namanya
imagettftext($image, $size_nama, 0, $x, 540, $black, $font_nama, $sql['nama']);
imagettftext($image, $size_sekolah, 0, $x_1, 626, $black, $font_sekolah, $sql['instansi']);
imagettftext($image, $size_tanggal, 0, $x_2, 750, $black, $font_tanggal, $sql_1['teks']);
imagettftext($image, $size_tanggal, 0, $x_6, 807, $black, $font_tanggal, date('j F Y', strtotime($sql['tgl_mulai']))." s.d. ".date('j F Y', strtotime($sql['tgl_selesai'])));
imagettftext($image, $size_tanggal, 0, $x_5, 999, $black, $font_tanggal, $sql_1['kota'].", ".date('j F Y', strtotime($sql['tgl_selesai'])));
imagettftext($image, $size_tanggal, 0, $x_3, 1170, $black, $font_ttd, $sql_1['nama']);
imagettftext($image, $size_tanggal, 0, $x_4, 1230, $black, $font_ttd, $sql_1['jabatan']);

//tampilkan di browser
header("Content-type:  image/jpeg");
imagejpeg($image);
imagedestroy($image);
?>