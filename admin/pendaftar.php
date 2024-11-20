<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$pendaftar_pending = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE status='pending'");

$pendaftar_aktif = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE status='aktif'");

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

  <title>Dashboard | Pendaftar</title>

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
            <p style="color: #5a5a5a;"><i class="bi bi-list-ul me-1"></i> Data Pendaftar Belum Dikonfirmasi</p>
            <hr style="margin-top: -8px;">
            <table id="table_noconfirm" class="table" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Instansi</th>
                  <th>Lampiran Surat</th>
                  <th>No Telp</th>
                  <th>Waktu</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <?php $no = 1; ?>
              <?php foreach($pendaftar_pending as $row){ ?>
                <tbody>
                  <tr>
                    <td><?php echo $no; ?>.</td>
                    <td><?php echo $row['instansi']; ?></td>
                    <td class="text-center"><a href="../public/berkas/berkas-daftar/<?php echo $row['berkas']; ?>" target="_blank"><i class="bi bi-file-earmark-pdf text-danger fs-3"></i></a></td>
                    <td><?php echo $row['telpon']; ?></td>
                    <td><?php echo date('d-m-Y, H:i:s', strtotime($row['tgl_surat_masuk'])); ?></td>
                    <td>
                      <a href="prosespendaftar.php?hapus_pending=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-danger"  onclick="return confirm('yakin hapus?')"><i class="bi bi-trash3"></i></a>
                      <a href="konfirmasi_pendaftar.php?konfirmasi=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-success fw-bold">Konfirmasi</a>
                    </td>
                  </tr>
                </tbody>
                <?php $no++; ?>
              <?php } ?>
            </table>
          </div>
          <div class="mx-3 p-3 fw-bold daftar-body">
            <p style="color: #5a5a5a;"><i class="bi bi-list-ul me-1"></i> Data Pendaftar Sudah Dikonfirmasi</p>
            <hr style="margin-top: -8px;">
            <table id="table_confirm" class="table" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Instansi</th>
                  <th>Lampiran Surat</th>
                  <th>Tanggal Surat Masuk</th>
                  <th>Tanggal Konfirmasi</th>
                  <th>Surat Konfirmasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php $no = 1; ?>
              <?php foreach($pendaftar_aktif as $row_1){ ?>
                <tbody>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row_1['instansi']; ?></td>
                    <td class="text-center"><a href="../public/berkas/berkas-daftar/<?php echo $row_1['berkas']; ?>" target="_blank"><i class="bi bi-file-earmark-pdf text-danger fs-3"></i></a></td>
                    <td><?php echo date('d-m-Y, H:i:s', strtotime($row_1['tgl_surat_masuk'])); ?></td>
                    <td><?php echo date('d-m-Y, H:i:s', strtotime($row_1['tgl_konfirmasi'])); ?></td>
                    <td>
                      <a href="surat_konfirmasi.php?id_pendaftar=<?php echo $row_1['id_pendaftaran']; ?>" class="btn btn-success" target="_blank"><i class="bi bi-eye"></i></a>
                    </td>
                    <td>
                      <a href="prosespendaftar.php?hapus_konfir=<?php echo $row_1['id_pendaftaran']; ?>" class="btn btn-danger"  onclick="return confirm('yakin hapus?')"><i class="bi bi-trash3"></i></a>
                    </td>
                  </tr>
                </tbody>
                <?php $no++; ?>
              <?php } ?>
            </table>
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