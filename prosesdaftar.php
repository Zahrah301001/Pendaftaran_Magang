<?php

include "config.php";

$instansi = $_POST['instansi'];
$berkas = berkas();
$nohp = $_POST['nohp'];
$status = "pending";

$jenis = "daftar";

function berkas(){
  $namafile = $_FILES['file']['name'];
  $tmpname = $_FILES['file']['tmp_name'];

  $ekstensivalid = ['pdf'];
  $ekssplit = explode('.', $namafile);
  $ekstensi = strtolower(end($ekssplit));
  if($namafile == ""){
      return false;
  } elseif (!in_array($ekstensi, $ekstensivalid)){
      echo "<script> alert('YANG ANDA UPLOAD BUKAN FORMAT PDF !') </script>"; 
      return false;
  }

  $namafilebaru = uniqid();
  $namafilebaru.= ".";
  $namafilebaru.= $ekstensi;

  move_uploaded_file($tmpname, 'public/berkas/berkas-daftar/'.$namafilebaru);

  return $namafilebaru;
}

function alert(){
  global $koneksi;
  if(mysqli_affected_rows($koneksi) > 0){
      echo "<script> 
              alert('INPUT BERHASIL !') ;
              document.location.href = 'index.php';            
          </script>";
  } else {
      echo "<script> 
              alert('INPUT GAGAL !') ;
              document.location.href = 'index.php#daftar';
          </script>";
  }
}

if(isset($_POST['daftar']) && $berkas == false){
  alert();
} else {
  mysqli_query($koneksi, "INSERT INTO pendaftar(instansi,telpon,berkas,tgl_surat_masuk,status) VALUES ('$instansi', '$nohp', '$berkas', CURRENT_TIMESTAMP, '$status')");
  mysqli_query($koneksi, "INSERT INTO notifikasi(identity,jenis,tgl_input) VALUES ('$instansi', '$jenis', CURRENT_TIMESTAMP)");
  alert();
}