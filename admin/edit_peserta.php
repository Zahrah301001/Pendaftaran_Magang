<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$id_peserta = $_GET['id_peserta'];

$peserta = mysqli_query($koneksi, "SELECT * FROM peserta WHERE id_peserta='$id_peserta'");

$instansi = mysqli_query($koneksi, "SELECT * FROM instansi");

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

  <title>Dashboard | Edit Peserta</title>

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
            <p style="color: #5a5a5a;"><i class="bi bi-person-fill me-1"></i> Edit Data</p>
            <hr style="margin-top: -8px;">
            <?php foreach($peserta as $row){ ?>
            <form action="prosespeserta.php" method="POST" class="text-secondary">
              <input type="hidden" name="id_peserta" value="<?php echo $row['id_peserta']; ?>">
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="nim" style="display: inline-block; margin-top: 3px;">NIM / NIS</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="nim" id="nim" value="<?php echo $row['nim']; ?>" placeholder="cth: 180020023" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="nama" style="display: inline-block; margin-top: 3px;">Nama</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" placeholder="cth: Tria Rei" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="instansi" style="display: inline-block; margin-top: 3px;">Instansi</label>
                </div>
                <div class="col-8 mb-3">
                  <select name="instansi" id="instansi" required="required" style="width: 50%; height: 35px;">
                    <?php foreach($instansi as $row_1){ ?>
                      <option value="<?php echo $row_1['nama_instansi'] ?>" <?php echo $row['instansi'] == $row_1['nama_instansi'] ? 'selected="selected"' : '' ?>><?php echo $row_1['nama_instansi']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="jurusan" style="display: inline-block; margin-top: 3px;">Jurusan</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="jurusan" id="jurusan" value="<?php echo $row['jurusan']; ?>" placeholder="cth: teknik informatika" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="tgl_mulai" style="display: inline-block; margin-top: 3px;">Tanggal Mulai</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="date" name="tgl_mulai" id="tgl_mulai" value="<?php echo date('Y-m-d', strtotime($row['tgl_mulai'])) ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="tgl_selesai" style="display: inline-block; margin-top: 3px;">Tanggal Selesai</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="date" name="tgl_selesai" id="tgl_selesai" value="<?php echo date('Y-m-d', strtotime($row['tgl_selesai'])) ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="gender" style="display: inline-block; margin-top: 3px;">Jenis Kelamin</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="radio" name="gender" id="gender" value="L" required="required" <?php echo $row['gender'] == "L" ? "checked" : "" ;?> > Laki - Laki &nbsp;
                  <input type="radio" name="gender" id="gender" value="P" required="required" <?php echo $row['gender'] == "P" ? "checked" : "" ;?> > Perempuan
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="agama" style="display: inline-block; margin-top: 3px;">Agama</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="agama" id="agama" value="<?php echo $row['agama']; ?>" placeholder="cth: islam" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="email" style="display: inline-block; margin-top: 3px;">Email</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="cth: example@gmail.com" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="wa" style="display: inline-block; margin-top: 3px;">No. WA</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="wa" id="wa" value="<?php echo $row['no_wa']; ?>" placeholder="cth: 082389321278" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="status_edit" style="display: inline-block; margin-top: 3px;">Status</label>
                </div>
                <div class="col-8 mb-3">
                  <select name="status_edit" id="status_edit" required="required" style="width: 50%; height: 35px;">
                    <option value="aktif" <?php echo $row['status'] == "aktif" ? 'selected="selected"' : '' ?>>Aktif</option>
                    <option value="alumni" <?php echo $row['status'] == "alumni" ? 'selected="selected"' : '' ?>>Alumni</option>
                  </select>
                </div>
              </div>
              <div class="text-center mt-3 me-5">
                <button class="btn btn-success" name="simpan" value="simpan">Simpan</button>
                <a href="peserta.php" class="btn btn-primary">Batal</a>
              </div>
            </form>
            <?php } ?>
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