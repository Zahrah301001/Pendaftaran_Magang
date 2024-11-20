<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$nim_peserta = $_GET['nim_peserta'];

$peserta = mysqli_query($koneksi, "SELECT * FROM peserta WHERE nim='$nim_peserta'");

$instansi = mysqli_query($koneksi, "SELECT * FROM instansi");

$nilai = mysqli_query($koneksi, "SELECT * FROM nilai WHERE nim='$nim_peserta'");

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

  <title>Dashboard | Edit Nilai</title>

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
            <p style="color: #5a5a5a;"><i class="bi bi-person-fill me-1"></i> Edit Nilai</p>
            <hr style="margin-top: -8px;">
            <?php foreach($peserta as $row){ ?>
            <form action="prosesnilai.php" method="POST" class="text-secondary">
              <input type="hidden" name="nim" value="<?php echo $row['nim']; ?>">
              <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="nim" style="display: inline-block; margin-top: 3px;">NIM / NIS</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="nim" id="nim" value="<?php echo $row['nim']; ?>" disabled style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="nama_disabled" style="display: inline-block; margin-top: 3px;">Nama</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="nama_disabled" id="nama_disabled" value="<?php echo $row['nama']; ?>" disabled style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="instansi" style="display: inline-block; margin-top: 3px;">Instansi</label>
                </div>
                <div class="col-8 mb-3">
                  <select name="instansi" id="instansi" disabled style="width: 50%; height: 35px;">
                    <?php foreach($instansi as $row_1){ ?>
                      <option value="<?php echo $row_1['nama_instansi'] ?>" <?php echo $row['instansi'] == $row_1['nama_instansi'] ? 'selected="selected"' : '' ?>><?php echo $row_1['nama_instansi']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <?php foreach($nilai as $row_2){ ?>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="disiplin" style="display: inline-block; margin-top: 3px;">Kedisiplinan</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="disiplin" id="disiplin" placeholder="range: 1 - 100" value="<?php echo $row_2['disiplin']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="tanggungjawab" style="display: inline-block; margin-top: 3px;">Tanggung Jawab</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="tanggungjawab" id="tanggungjawab" placeholder="range: 1 - 100" value="<?php echo $row_2['tanggungjawab']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="loyalitas" style="display: inline-block; margin-top: 3px;">Loyalitas</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="loyalitas" id="loyalitas" placeholder="range: 1 - 100" value="<?php echo $row_2['loyalitas']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="kerjasama" style="display: inline-block; margin-top: 3px;">Kerjasama</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="kerjasama" id="kerjasama" placeholder="range: 1 - 100" value="<?php echo $row_2['kerjasama']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="pemimpin" style="display: inline-block; margin-top: 3px;">Kepemimpinan</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="pemimpin" id="pemimpin" placeholder="range: 1 - 100" value="<?php echo $row_2['pemimpin']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="peduli" style="display: inline-block; margin-top: 3px;">Kepedulian</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="peduli" id="peduli" placeholder="range: 1 - 100" value="<?php echo $row_2['peduli']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="integritas" style="display: inline-block; margin-top: 3px;">Integritas</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="integritas" id="integritas" placeholder="range: 1 - 100" value="<?php echo $row_2['integritas']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="etika" style="display: inline-block; margin-top: 3px;">Etika/Moral</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="etika" id="etika" placeholder="range: 1 - 100" value="<?php echo $row_2['etika']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="rapi" style="display: inline-block; margin-top: 3px;">Kerapian</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="rapi" id="rapi" placeholder="range: 1 - 100" value="<?php echo $row_2['rapi']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="makalah" style="display: inline-block; margin-top: 3px;">Makalah</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="number" name="makalah" id="makalah" placeholder="range: 1 - 100"  value="<?php echo $row_2['makalah']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <?php } ?>
              <div class="text-center mt-3 me-5">
                <button class="btn btn-success" name="simpan" value="simpan">Simpan</button>
                <a href="kelola_nilai.php" class="btn btn-primary">Batal</a>
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