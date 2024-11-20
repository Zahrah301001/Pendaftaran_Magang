<?php
include "../config.php";

$id_peserta = @$_POST['id_peserta'];

$nim = @$_POST['nim'];
$nama = @$_POST['nama'];
$instansi = @$_POST['instansi'];
$jurusan = @$_POST['jurusan'];
$tgl_mulai = @$_POST['tgl_mulai'];
$tgl_selesai = @$_POST['tgl_selesai'];
$gender = @$_POST['gender'];
$agama = @$_POST['agama'];
$email = @$_POST['email'];
$wa = @$_POST['wa'];

$status = "aktif";
$status_edit = @$_POST['status_edit'];

function alert(){
  global $koneksi;
  if(mysqli_affected_rows($koneksi) > 0){
      echo "<script> 
              alert('INPUT BERHASIL !') ;
              document.location.href = 'peserta.php';            
          </script>";
  } else {
      echo "<script> 
              alert('INPUT GAGAL !') ;
              document.location.href = 'peserta.php';
          </script>";
  }
}

if(isset($_POST['konfirmasi'])){
  mysqli_query($koneksi, "INSERT INTO peserta(nim,nama,instansi,jurusan,tgl_mulai,tgl_selesai,gender,agama,email,no_wa,status) VALUES ('$nim', '$nama', '$instansi', '$jurusan', '$tgl_mulai', '$tgl_selesai', '$gender', '$agama', '$email', '$wa', '$status')");
  mysqli_query($koneksi, "INSERT INTO nilai(nim,nama) VALUES ('$nim', '$nama')");
  alert();
} elseif (isset($_POST['simpan'])) {
  mysqli_query($koneksi, "UPDATE peserta SET nim='$nim', nama='$nama', instansi='$instansi', jurusan='$jurusan', tgl_mulai='$tgl_mulai', tgl_selesai='$tgl_selesai', gender='$gender', agama='$agama', email='$email', no_wa='$wa', status='$status_edit' WHERE id_peserta='$id_peserta'");
  mysqli_query($koneksi, "UPDATE nilai SET nama='$nama' WHERE nim='$nim'");
  alert();
} elseif (isset($_GET['hapus'])) {
  $id_hapus = $_GET['hapus'];
  $nim_hapus = $_GET['nim'];
  $query = mysqli_query($koneksi, "SELECT * FROM makalah WHERE nim='$nim_hapus'");
  $makalah = mysqli_fetch_array($query);
  $makalah_hapus = $makalah['berkas'];
  unlink("../public/berkas/makalah/$makalah_hapus");
  mysqli_query($koneksi, "DELETE FROM peserta WHERE id_peserta='$id_hapus'");
  mysqli_query($koneksi, "DELETE FROM nilai WHERE nim='$nim_hapus'");
  echo header("location:peserta.php");
}
