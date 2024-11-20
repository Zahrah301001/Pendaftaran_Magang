<?php
include "../config.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

function alert(){
  global $koneksi;
  if(mysqli_affected_rows($koneksi) > 0){
      echo "<script> 
              alert('INPUT BERHASIL !') ;
              document.location.href = 'kelola_user.php';            
          </script>";
  } else {
      echo "<script> 
              alert('INPUT GAGAL !') ;
              document.location.href = 'kelola_user.php';
          </script>";
  }
}

if(isset($_POST['konfirmasi'])){
  mysqli_query($koneksi, "INSERT INTO user(nama,username,password) VALUES ('$nama', '$username', '$password')");
  alert();
} elseif (isset($_GET['hapus'])) {
  $id_hapus = $_GET['hapus'];
  mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id_hapus'");
  echo header("location:kelola_user.php");
}