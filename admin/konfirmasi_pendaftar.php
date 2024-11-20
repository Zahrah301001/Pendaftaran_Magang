<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$id_pendaftar = $_GET['konfirmasi'];

$pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id_pendaftaran='$id_pendaftar'");

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

  <title>Dashboard | Konfirmasi Pendaftar</title>

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
            <p style="color: #5a5a5a;"><i class="bi bi-file-earmark-fill me-1"></i> Surat Balasan</p>
            <hr style="margin-top: -8px;">
            <?php foreach($pendaftar as $row){ ?>
            <form action="prosespendaftar.php" method="POST" class="text-secondary">
              <input type="hidden" name="id_pendaftar" value="<?php echo $id_pendaftar; ?>">
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="no_balasan" style="display: inline-block; margin-top: 3px;">No Surat Balasan</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="no_balasan" id="no_balasan" placeholder="No Surat Konfirmasi" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="penerima" style="display: inline-block; margin-top: 3px;">Kepada</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="penerima" id="penerima" placeholder="Kepada" required="required" style="width: 50%; height: 35px;">
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
                  <label for="tgl_surat_pengirim" style="display: inline-block; margin-top: 3px;">Tanggal Surat Pengirim</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="datetime-local" name="tgl_surat_pengirim" id="tgl_surat_pengirim" value="<?php echo date('Y-m-d H:i:s', strtotime($row['tgl_surat_masuk'])); ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="no_surat_pengirim" style="display: inline-block; margin-top: 3px;">No Surat Pengirim</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="no_surat_pengirim" id="no_surat_pengirim" placeholder="No Surat Pengirim" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="tgl_masuk" style="display: inline-block; margin-top: 3px;">Tanggal Masuk</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="date" name="tgl_masuk" id="tgl_masuk" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="tgl_keluar" style="display: inline-block; margin-top: 3px;">Tanggal Keluar</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="date" name="tgl_keluar" id="tgl_keluar" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="nama_diterima" style="display: inline-block; margin-top: 3px;">Nama Yang Diterima</label>
                </div>
                <div class="col-8 mb-3">
                  <textarea name="nama_diterima" id="nama_diterima" rows="5" placeholder="Nama/NIM, Nama/NIM, dst.." required="required" style="width: 50%;"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="nama_pihak_pln" style="display: inline-block; margin-top: 3px;">Nama Pihak PLN</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="nama_pihak_pln" id="nama_pihak_pln" placeholder="Nama Pihak PLN" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="no_pihak_pln" style="display: inline-block; margin-top: 3px;">No Pihak PLN</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="no_pihak_pln" id="no_pihak_pln" placeholder="No Pihak PLN" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="text-center mt-3 me-5">
                <button class="btn btn-success" name="konfirmasi" value="konfirmasi">Konfirmasi</button>
                <a href="pendaftar.php" class="btn btn-primary">Batal</a>
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