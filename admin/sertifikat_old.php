<?php
include "../config.php";

$id = $_GET['id'];

$peserta = mysqli_query($koneksi, "SELECT * FROM peserta WHERE id_peserta='$id'");

$ttd = mysqli_query($koneksi, "SELECT * FROM ttd");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- FAVICON -->
  <link href="../public/img/favicon.png" rel="icon">

  <!-- BOOTSTRAP CSS-->
  <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">

  <!-- JQUERY -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- DATA TABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">  
  
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../public/css/style.css">

  <title>Sertifikat</title>

</head>
<style>
  @font-face {
      font-family: 'Rubik';
      font-style: normal;
      font-weight: 300;
  }
  @font-face {
      font-family: 'Rubik';
      font-style: bold;
      font-weight: 600;
  }

  .rubik-normal{
    font-family: 'Rubik Normal', sans-serif;
    font-weight: 300;
  }

  .sertifikat-body{
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>
<body>
  <div class="fluid-container">
    <div class="mt-3 text-center">
      <img src="../public/img/sertifikat-1.png" alt="sertifikat" style="width: 65%;">
    </div>
    <div class="sertifikat-body text-center ">
      <?php foreach($peserta as $row){ ?>
        <div style="margin-top: 117px;">
          <h3 class="fw-bold"><?php echo strtoupper($row['nama']); ?></h3>
          <h4 class="rubik-normal" style="font-size: 1.2rem;"><?php echo $row['instansi']; ?></h4>
        </div>
        <p class="rubik-normal fw-bold fst-italic" style="margin-top: 80px; font-size: 0.93rem; color: #000000b5;"><?php echo date('j F Y', strtotime($row['tgl_mulai'])) ?> s.d. <?php echo date('j F Y', strtotime($row['tgl_selesai'])) ?></p>
        <p class="rubik-normal fw-bold fst-italic" style="margin-top: 46px; margin-left: 50px;font-size: 0.93rem; color: #000000b5;"><?php echo date('j F Y', strtotime($row['tgl_selesai'])) ?></p>
        <?php foreach($ttd as  $row_1){ ?>
          <p class="rubik-normal fw-bold" style="margin-top: 56px; font-size: 0.93rem; color: #000000b5;"><?php echo $row_1['nama']; ?></p>
          <p class="rubik-normal fw-bold" style="margin-top: -16px; font-size: 0.93rem; color: #000000b5;"><?php echo $row_1['jabatan']; ?></p>
        <?php } ?>
      <?php } ?>
    </div>
  </div>

  <!-- BOOTSTRAP JS -->
  <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DATA TABLES -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
</body>
</html>