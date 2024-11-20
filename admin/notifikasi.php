<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$notifikasi_1 = mysqli_query($koneksi, "SELECT * FROM notifikasi ORDER BY tgl_input DESC");

$daftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");
$makalah = mysqli_query($koneksi, "SELECT * FROM makalah");
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

  <!-- JQUERY -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- DATA TABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">  
  
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../public/css/style.css">

  <title>Dashboard | Kelola TTD</title>

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
          <div class="mx-3 mb-3 p-3 fw-bold daftar-body">
            <p style="color: #5a5a5a;"><i class="bi bi-person-fill me-1"></i> Notifikasi</p>
            <hr style="margin-top: -8px;">
            <div>
              <?php foreach($notifikasi_1 as $row){ ?>
                <?php foreach($daftar as $row_daftar){ ?>
                  <?php if($row['tgl_input'] == $row_daftar['tgl_surat_masuk'] && $row['jenis'] == "daftar"){?>
                      <a class="dropdown-item fw-bold d-flex" href="pendaftar.php">
                        <i class="bi bi-list-ul fs-5 me-2"></i>
                        <div class="d-flex flex-column">
                          <span style="margin-top: 2px;"><span class="text-warning">Pendaftar Baru</span>, dari : <?php echo $row['identity']; ?></span> <br>
                          <span class="mb-3" style="margin-top: -20px;"><?php echo timeago($row['tgl_input']); ?></span>
                        </div>
                      </a>
                  <?php } ?> 
                <?php } ?>
                <?php foreach($makalah as $row_makalah){ ?>
                  <?php if($row['identity'] == $row_makalah['nim'] && $row['jenis'] == "makalah"){?>
                    <a class="dropdown-item fw-bold d-flex" href="peserta.php">
                      <i class="bi bi-list-ul fs-5 me-2"></i>
                      <div class="d-flex flex-column">
                        <span style="margin-top: 2px;"><span class="text-warning">Makalah Baru</span>, dari : <?php echo $row['identity']; ?></span> <br>
                        <span class="mb-3" style="margin-top: -20px;"><?php echo timeago($row['tgl_input']); ?></span>
                      </div>
                    </a>  
                  <?php } ?> 
                <?php } ?>
                <?php foreach($kesan as $row_kesan){ ?>
                  <?php if($row['tgl_input'] == $row_kesan['tgl_dibuat'] && $row['jenis'] == "kesan"){?>
                    <a class="dropdown-item fw-bold d-flex" href="dashboard.php">
                      <i class="bi bi-list-ul fs-5 me-2"></i>
                      <div class="d-flex flex-column">
                        <span style="margin-top: 2px;"><span class="text-warning">Kesan Baru</span>, dari : <?php echo $row['identity']; ?></span> <br>
                        <span class="mb-3" style="margin-top: -20px;"><?php echo timeago($row['tgl_input']); ?></span>
                      </div>
                    </a>
                  <?php } ?> 
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
    $(document).ready( function () {
      $('#table_noconfirm').DataTable();
      $('#table_confirm').DataTable();
    });
  </script>

  <!-- BOOTSTRAP JS -->
  <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DATA TABLES -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
</body>
</html>