<?php
include "../config.php";

$instansi = @$_POST['instansi'];

function alert(){
  global $koneksi;
  if(mysqli_affected_rows($koneksi) > 0){
      echo "<script> 
              alert('INPUT BERHASIL !') ;
              document.location.href = 'kelola_instansi.php';            
          </script>";
  } else {
      echo "<script> 
              alert('INPUT GAGAL !') ;
              document.location.href = 'kelola_instansi.php';
          </script>";
  }
}

if(isset($_POST['simpan'])){
  mysqli_query($koneksi, "INSERT INTO instansi(nama_instansi) VALUES ('$instansi')");
  alert();
} elseif (isset($_GET['hapus'])) {
  $id_hapus = $_GET['hapus'];
  mysqli_query($koneksi, "DELETE FROM instansi WHERE id_instansi='$id_hapus'");
  echo header("location:kelola_instansi.php");
}
