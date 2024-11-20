<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$kesan = mysqli_query($koneksi, "SELECT * FROM kesan");
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
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../public/css/style.css">

  <title>Dashboard</title>

</head>
<body>
  <div class="fluid-container">

    <div class="row">
      <div class="col-2">
        <?php include "sidebar.php" ?>
      </div>
      <div class="col-10">
        <div class="col-12">
          <?php include "header.php" ?>
        </div>
        <div class="col-12 dashboard">
          <div class="bg-primary text-white mx-3 p-3" style="border-radius: 20px;">
            <h6 class="fw-bold mb-3">Selamat Datang</h6>
            <span>Di Sistem Informasi Magang</span> 
          </div>
          <div class="mt-3 mx-3 p-3 dashboard-notif">
            <p class="fw-bold" style="color: #949494;">Kesan & pesan siswa / mahasiswa Yang telah melaksanakan magang di PLN</p>
            <hr>
            <?php foreach($kesan as $row){ ?>
              <div class="d-flex">
                <i class="bi bi-person-circle me-2"></i>
                <?php $nim = $row['nim']; ?>
                <?php $peserta = mysqli_query($koneksi, "SELECT * FROM peserta WHERE nim='$nim'");?>
                <?php $peserta_name = mysqli_fetch_array($peserta);?>
                  <h6 class="fw-bold" style="font-size: 1.1rem;"><?php echo $peserta_name['nama']; ?></h6>
                  <span class="ms-2" style="font-size: 0.7rem; margin-top: 6px;"><?php echo $row['tgl_dibuat']; ?></span>
                </div>
                <div class="ms-4">
                  <p class="fw-bold mb-0" style="color: #5a5a5a;">Kesan</p>
                  <p class="mb-2"><?php echo $row['kesan'] ?></p>
                  <p class="fw-bold mb-0" style="color: #5a5a5a;">Pesan</p>
                  <p><?php echo $row['pesan'] ?></p>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- BOOTSTRAP JS -->
  <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>