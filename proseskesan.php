<?php

include "config.php";

$nim = $_POST['nim'];
$kesan = $_POST['kesan'];
$pesan = $_POST['pesan'];

$jenis = "kesan";

$peserta = mysqli_query($koneksi, "SELECT * FROM peserta");

$array_nim = [];
foreach($peserta as $row){
  $array_nim[] = $row['nim'];
}

if(!in_array($nim, $array_nim)){
  echo "<script> 
            alert('Anda Tidak Terdaftar Sebagai Peserta Magang !') ;
            document.location.href = 'index.php#kesan';
        </script>";
  die;
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
              document.location.href = 'index.php#kesan';
          </script>";
  }
}

if(isset($_POST['kirim'])){
  mysqli_query($koneksi, "INSERT INTO kesan(nim,kesan,pesan,tgl_dibuat) VALUES ('$nim', '$kesan', '$pesan', CURRENT_TIMESTAMP)");
  mysqli_query($koneksi, "INSERT INTO notifikasi(identity,jenis,tgl_input) VALUES ('$nim', '$jenis', CURRENT_TIMESTAMP)");
  alert();
}