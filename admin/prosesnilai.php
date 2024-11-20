<?php
include "../config.php";

$nim = $_POST['nim'];
$nama = @$_POST['nama'];
$disiplin = @$_POST['disiplin'];
$tanggungjawab = @$_POST['tanggungjawab'];
$loyalitas = @$_POST['loyalitas'];
$kerjasama = @$_POST['kerjasama'];
$pemimpin = @$_POST['pemimpin'];
$peduli = @$_POST['peduli'];
$integritas = @$_POST['integritas'];
$etika = @$_POST['etika'];
$rapi = @$_POST['rapi'];
$makalah = @$_POST['makalah'];

$average = ($disiplin + $tanggungjawab + $loyalitas + $kerjasama + $pemimpin + $peduli + $integritas + $etika + $rapi + $makalah) / 10;

function alert(){
  global $koneksi;
  if(mysqli_affected_rows($koneksi) > 0){
      echo "<script> 
              alert('INPUT BERHASIL !') ;
              document.location.href = 'kelola_nilai.php';            
          </script>";
  } else {
      echo "<script> 
              alert('INPUT GAGAL !') ;
              document.location.href = 'kelola_nilai.php';
          </script>";
  }
}

if(isset($_POST['simpan'])){
  // mysqli_query($koneksi, "INSERT INTO nilai(id_peserta,nama,disiplin,tanggungjawab,loyalitas,kerjasama,pemimpin,peduli,integritas,etika,rapi,makalah,nilai_rata) VALUES ('$id_peserta', '$nama', '$disiplin', '$tanggungjawab', '$loyalitas', '$kerjasama', '$pemimpin', '$peduli', '$integritas', '$etika', '$rapi', '$makalah', '$average')");
  mysqli_query($koneksi, "UPDATE nilai SET disiplin='$disiplin', tanggungjawab='$tanggungjawab', loyalitas='$loyalitas', kerjasama='$kerjasama', pemimpin='$pemimpin', peduli='$peduli', integritas='$integritas', etika='$etika', rapi='$rapi', makalah='$makalah', nilai_rata='$average' WHERE nim='$nim'");
  alert();
} elseif (isset($_GET['hapus'])) {
  $nim_hapus = $_GET['hapus'];
  mysqli_query($koneksi, "DELETE FROM nilai WHERE nim='$nim_hapus'");
  echo header("location:kelola_nilai.php");
}


