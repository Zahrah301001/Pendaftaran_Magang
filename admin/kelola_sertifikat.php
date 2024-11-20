<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$sertifikat = mysqli_query($koneksi, "SELECT * FROM sertifikat");

function alert(){
  global $koneksi;
  if(mysqli_affected_rows($koneksi) > 0){
      echo "<script> 
              alert('Data Berhasil Diubah !') ;
              document.location.href = 'kelola_sertifikat.php';            
          </script>";
  } else {
      echo "<script> 
              alert('Data Gagal Diubah !') ;
              document.location.href = 'kelola_sertifikat.php';
          </script>";
  }
}

$id = @$_POST['id'];
$nama = @$_POST['nama'];
$jabatan = @$_POST['jabatan'];
$teks = @$_POST['teks'];
$kota = @$_POST['kota'];

if(isset($_POST['update'])){
  mysqli_query($koneksi, "UPDATE sertifikat SET nama='$nama', jabatan='$jabatan', teks='$teks', kota='$kota' WHERE id_ttd='$id'");
  alert();
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

  <title>Dashboard | Kelola Sertifikat</title>

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
            <p style="color: #5a5a5a;"><i class="bi bi-person-fill me-1"></i> Kelola Sertifikat</p>
            <hr style="margin-top: -8px;">
            <?php foreach($sertifikat as $row){ ?>
            <form action="" method="POST" class="text-secondary">
              <input type="hidden" name="id" value="<?php echo $row['id_ttd']; ?>">
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="nama" style="display: inline-block; margin-top: 3px;">Nama</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="nama" id="nama" placeholder="nama" value="<?php echo $row['nama']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="jabatan" style="display: inline-block; margin-top: 3px;">Jabatan</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="jabatan" id="jabatan" placeholder="jabatan" value="<?php echo $row['jabatan']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="teks" style="display: inline-block; margin-top: 3px;">Teks Sertifikat</label>
                </div>
                <div class="col-8 mb-3">
                  <textarea name="teks" id="teks" placeholder="teks sertifikat" required="required" style="width: 50%; height: 100px;"><?php echo $row['teks']; ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3 text-end">
                  <label for="kota" style="display: inline-block; margin-top: 3px;">Kota</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="text" name="kota" id="kota" placeholder="kota" value="<?php echo $row['kota']; ?>" required="required" style="width: 50%; height: 35px;">
                </div>
              </div>
              <div class="text-center mt-3 me-5">
                <button class="btn btn-success" name="update" value="update">Update</button>
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