<?php
include "../config.php";
session_start();

$instansi = mysqli_query($koneksi, "SELECT * FROM instansi");

if ($_SESSION['username'] == '') {
    header("Location: ../login.php");
}

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

  <title>Dashboard | Tambah User</title>

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
            <p style="color: #5a5a5a;"><i class="bi bi-person-fill me-1"></i> Tambah User</p>
            <hr style="margin-top: -8px;">
            <form action="prosesuser.php" method="POST" class="text-secondary">
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="nama" style="display: inline-block; margin-top: 3px;">Nama</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="nama" id="nama" placeholder="nama" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="username" style="display: inline-block; margin-top: 3px;">Username</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="username" id="username" placeholder="username" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="password" style="display: inline-block; margin-top: 3px;">Password</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="password" id="password" placeholder="password" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="text-center mt-3 me-5">
                <button class="btn btn-success" name="konfirmasi" value="konfirmasi">Konfirmasi</button>
                <a href="kelola_user.php" class="btn btn-primary">Batal</a>
              </div>
            </form>
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