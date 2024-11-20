<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$peserta = mysqli_query($koneksi, "SELECT * FROM peserta WHERE status='aktif'");
$makalah = mysqli_query($koneksi, "SELECT * FROM makalah");
$nilai = mysqli_query($koneksi, "SELECT * FROM nilai");

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

  <title>Dashboard | Peserta</title>

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
            <p style="color: #5a5a5a;"><i class="bi bi-list-ul me-1"></i> Data Mahasiswa / Siswa Magang</p>
            <hr style="margin-top: -8px;">
            <a href="tambah_peserta.php" class="btn btn-secondary"><span class="fw-bold">+</span> Input Data</a>
            <hr>
            <table id="table_peserta" class="table" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM / NIS</th>
                  <th>Nama</th>
                  <th>Universitas / Sekolah</th>
                  <th>Berkas</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <?php $no = 1;?>
              <?php foreach($peserta as $row){ ?>
                <tbody>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['instansi']; ?></td>
                    <td>
                      <?php foreach($makalah as $row_1){ ?>
                        <?php if($row['nim'] == $row_1['nim']){ ?>
                          <a class="btn btn-primary text-center" href="../public/berkas/makalah/<?php echo $row_1['berkas']; ?>" target="_blank"><i class="bi bi-file-earmark-pdf"></i> Makalah</a>
                        <?php } ?>  
                      <?php } ?>
                      <?php foreach($nilai as $row_2){ ?>
                        <?php if($row['nim'] == $row_2['nim']){ ?>
                          <a class="btn btn-primary text-center" href="lembar_nilai.php?nim=<?php echo $row_2['nim']; ?>" target="_blank"><i class="bi bi-pen"></i> Nilai</a>
                        <?php } ?>  
                      <?php } ?>
                      <a class="btn btn-primary text-center" href="sertifikat.php?id=<?php echo $row['id_peserta']; ?>" target="_blank"><i class="bi bi-award"></i> Sertifikat</a>
                    </td>
                    <td>
                      <a href="prosespeserta.php?hapus=<?php echo $row['id_peserta']; ?>&nim=<?php echo $row['nim'] ?>" class="btn btn-danger" onclick="return confirm('yakin hapus?')"><i class="bi bi-trash3"></i></a>
                      <a href="edit_peserta.php?id_peserta=<?php echo $row['id_peserta']; ?>" class="btn btn-warning fw-bold"><i class="bi bi-pencil-square"></i></a>
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