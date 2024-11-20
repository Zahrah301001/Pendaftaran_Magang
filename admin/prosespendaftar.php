<?php
include "../config.php";

$id_pendaftar = @$_POST['id_pendaftar'];
$no_balasan = @$_POST['no_balasan'];
$penerima = @$_POST['penerima'];
$instansi = @$_POST['instansi'];
$tgl_surat_pengirim = @$_POST['tgl_surat_pengirim'];
$no_surat_pengirim = @$_POST['no_surat_pengirim'];
$tgl_masuk = @$_POST['tgl_masuk'];
$tgl_keluar = @$_POST['tgl_keluar'];
$nama_diterima = @$_POST['nama_diterima'];
$nama_pihak_pln = @$_POST['nama_pihak_pln'];
$no_pihak_pln = @$_POST['no_pihak_pln'];

$status = "aktif";

function alert(){
  global $koneksi;
  if(mysqli_affected_rows($koneksi) > 0){
      echo "<script> 
              alert('INPUT BERHASIL !') ;
              document.location.href = 'pendaftar.php';            
          </script>";
  } else {
      echo "<script> 
              alert('INPUT GAGAL !') ;
              document.location.href = 'pendaftar.php';
          </script>";
  }
}

if(isset($_POST['konfirmasi'])){
  mysqli_query($koneksi, "INSERT INTO surat_balasan(id_pendaftar,no_surat_balasan,nama_penerima,instansi,tgl_surat_pengirim,no_surat_pengirim,tgl_masuk,tgl_keluar,nama_diterima,nama_pihak_pln,no_pihak_pln) VALUES ('$id_pendaftar', '$no_balasan', '$penerima', '$instansi', '$tgl_surat_pengirim', '$no_surat_pengirim', '$tgl_masuk', '$tgl_keluar', '$nama_diterima', '$nama_pihak_pln', '$no_pihak_pln')");
  mysqli_query($koneksi, "UPDATE pendaftar SET status='$status', tgl_konfirmasi=CURRENT_TIMESTAMP WHERE id_pendaftaran='$id_pendaftar'");
  alert();
} elseif (isset($_GET['hapus_pending'])) {
  $id_pending = $_GET['hapus_pending'];
  $query = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id_pendaftaran='$id_pending'");
  $berkas_daftar = mysqli_fetch_array($query);
  $berkas_hapus = $berkas_daftar['berkas'];
  unlink("../public/berkas/berkas-daftar/$berkas_hapus");
  mysqli_query($koneksi, "DELETE FROM pendaftar WHERE id_pendaftaran='$id_pending'");
  echo header("location:pendaftar.php");
} elseif (isset($_GET['hapus_konfir'])) {
  $id_konfir = $_GET['hapus_konfir'];
  $query = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id_pendaftaran='$id_konfir'");
  $berkas_daftar = mysqli_fetch_array($query);
  $berkas_konfir = $berkas_daftar['berkas'];
  unlink("../public/berkas/berkas-daftar/$berkas_konfir");
  mysqli_query($koneksi, "DELETE FROM pendaftar WHERE id_pendaftaran='$id_konfir'");
  echo header("location:pendaftar.php");
}