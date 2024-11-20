<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$id_pendaftar = $_GET['id_pendaftar'];

$surat_balasan = mysqli_query($koneksi, "SELECT * FROM surat_balasan WHERE id_pendaftar='$id_pendaftar'")

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../public/img/favicon.png" rel="icon">

  <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <title>Surat Konfirmasi</title>
</head>
<body>
  <?php foreach($surat_balasan as $row){ ?>
  <div class="container" style="padding: 0 15%;">
    <p class="mt-5 text-end">Kendari, 10 September 2020</p>
    <p class="mb-0">No. <?php echo $row['no_surat_balasan']; ?></p>
    <p class="mb-0">Kepada Yth</p>
    <p class="mb-0 fw-bold"><?php echo $row['nama_penerima']; ?></p>
    <p class="mb-0 fw-bold"><?php echo $row['instansi']; ?></p>
    <p class="mb-0">Di-</p>
    <p>Tempat</p> 
    <br>
    <p>Perihal : <span>Pemeberitahuan Praktek Kerja Lapangan</span></p>
    <p style="text-align: justify;">
      Menunjuk surat NO. <?php echo $row['no_surat_pengirim']; ?> tanggal <?php echo date('d-m-Y', strtotime($row['tgl_surat_pengirim'])); ?> perihal kesediaan Menerima Mahasiswa KKP, dengan ini kami sampaikan
      kesediaan kantor kami menerima Siswa / Mahasiswa Saudara untuk melaksanakan praktek kerja lapangan dengan peserta antara lain :
    </p>
    <?php $nama_penerima = $row['nama_diterima']; ?>
    <?php $penerima = explode(", ", $nama_penerima); ?>
    <p class="fw-bold">
      <?php foreach($penerima as $row_1){ ?>
        <?php echo $row_1."</br>"; ?>
      <?php } ?>
    </p>
    <p style="text-align: justify;">
      Adapun waktu pelaksanaan praktek kerja lapangan dimulai pada tanggal <?php echo date('d-m-Y', strtotime($row['tgl_masuk'])); ?> s/d <?php echo date('d-m-Y', strtotime($row['tgl_keluar'])); ?>. Dalam hal diperlukan informasi lebih
      lanjut mengenai kegiatan tersebut, kiranya dapat menghubungi PIC kami Sdr. - (HP : <?php echo $row['no_pihak_pln']; ?>). Demikian kami sampaikan. Atas perhatian dan kerjasama
      Saudara kami ucapkan terimakasih.
    </p>
    <br>
    <p class="text-end" style="padding-right: 7%;">KANTOR PERWAKILAN PLN</p>
    <P class="text-end" style="padding-right: 9%;">PROVINSI JAWA TIMUR</P>
    <br> <br>
    <P class="text-end fw-bold" style="padding-right: 18%;"><?php echo $row['nama_pihak_pln']; ?></P>
  </div>
  <?php } ?>

  <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>