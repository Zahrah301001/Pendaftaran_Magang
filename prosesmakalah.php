<?php

include "config.php";

$nim = $_POST['nim'];
$jenis = "makalah";

$peserta = mysqli_query($koneksi, "SELECT * FROM peserta");
$array_nim = [];
foreach($peserta as $row){
  $array_nim[] = $row['nim'];
}

if(!in_array($nim, $array_nim)){
  echo "<script> 
            alert('Anda Tidak Terdaftar Sebagai Peserta Magang !') ;
            document.location.href = 'index.php#makalah';
        </script>";
  die;
} else {
  $berkas = berkas();
}

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

  move_uploaded_file($tmpname, 'public/berkas/makalah/'.$namafilebaru);

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
              document.location.href = 'index.php#makalah';
          </script>";
  }
}

if(isset($_POST['upload']) && $berkas == false){
  alert();
} else {
  mysqli_query($koneksi, "INSERT INTO makalah(nim,berkas) VALUES ('$nim', '$berkas')");
  mysqli_query($koneksi, "INSERT INTO notifikasi(identity,jenis,tgl_input) VALUES ('$nim', '$jenis', CURRENT_TIMESTAMP)");
  alert();
}