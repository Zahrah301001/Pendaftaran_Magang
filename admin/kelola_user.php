<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$user = mysqli_query($koneksi, "SELECT * FROM user");

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

  <title>Dashboard | Kelola User</title>

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
            <p style="color: #5a5a5a;"><i class="bi bi-list-ul me-1"></i> Kelola User</p>
            <hr style="margin-top: -8px;">
            <a href="tambah_user.php" class="btn btn-secondary"><span class="fw-bold">+</span> Tambah User</a>
            <hr>
            <table id="table_peserta" class="table" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pegawai</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <?php $no = 1;?>
              <?php foreach($user as $row){ ?>
                <tbody>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                      <a href="prosesuser.php?hapus=<?php echo $row['id_user']; ?>" class="btn btn-danger" onclick="return confirm('yakin hapus?')"><i class="bi bi-trash3"></i></a>
                    </td>
                  </tr>
                </tbody>
                <?php $no ++ ?>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
    $(document).ready( function () {
      $('#table_peserta').DataTable();
    });
  </script>

  <!-- BOOTSTRAP JS -->
  <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DATA TABLES -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
</body>
</html>