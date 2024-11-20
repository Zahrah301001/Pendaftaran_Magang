<?php
include "../config.php";
session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$nim = $_GET['nim'];

$nilai = mysqli_query($koneksi, "SELECT * FROM nilai WHERE nim='$nim'");
$peserta = mysqli_query($koneksi, "SELECT * FROM peserta WHERE nim='$nim'");

function predikat($angka){
  if($angka >= 90 && $angka <= 100){
    echo "A";
  } elseif($angka >= 75 && $angka < 90){
    echo "B";
  } elseif($angka >= 60 && $angka < 75){
    echo "C";
  } elseif($angka >= 45 && $angka < 60){
    echo "D";
  } elseif($angka >= 0 && $angka < 45){
    echo "E";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../public/img/favicon.png" rel="icon">

  <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <title>Nilai</title>
</head>
<style>
  .tabel-nilai{
    width: 770px;
  }
  .tabel-nilai tr td{
    border: 1px solid #000;
    padding: 5px 10px;
  }
</style>
<body>
  <h3 class="text-center fw-bold">REKAP NILAI MAGANG SISWA</h3>
  <div class="container" style="padding: 2% 15% 0;">
    <?php foreach($peserta as $row){ ?>
    <table class="fw-bold">
      <tr>
        <td style="width: 120px;">Nama</td>
        <td>: &nbsp; <?php echo $row['nama']; ?></td>
      </tr>
      <tr>
        <td style="width: 110px;">NIM</td>
        <td>: &nbsp; <?php echo $row['nim']; ?></td>
      </tr>
      <?php foreach($peserta as $row_1){ ?>
        <tr>
          <td style="width: 110px;">Program Studi</td>
          <td>: &nbsp; <?php echo $row_1['jurusan']; ?></td>
        </tr>
        <tr>
          <td style="width: 110px;">Instansi</td>
          <td>: &nbsp; <?php echo $row_1['instansi']; ?></td>
        </tr>
        <tr>
          <td style="width: 110px;">Periode</td>
          <td>: &nbsp; <?php echo date('Y', strtotime($row_1['tgl_mulai'])); ?></td>
        </tr>
      <?php } ?>
    </table>
    <?php } ?>
    <table class="text-center fw-bold mt-4 tabel-nilai">
      <tr>
        <td>NO</td>
        <td>UNSUR DINILAI</td>
        <td>NILAI</td>
        <td>PREDIKAT</td>
        <td>KETERANGAN</td>
      </tr>
      <?php foreach($nilai as $row_1){ ?>
      <tr>
        <td>1</td>
        <td>Disiplin</td>
        <td><?php echo $row_1['disiplin']; ?></td>
        <td><?php predikat($row_1['disiplin']); ?></td>
        <td rowspan="11" class="fw-normal text-start" style="font-size: 0.83rem;">
          Keterangan : <br>
          90 - 100 = A <br>
          75 - 89 = B <br>
          60 - 74 = C <br>
          45 - 59 = D <br>
          0 - 44 = E <br>
          <br> <br>
          Predikat : <br>
          A : Baik Sekali <br>
          B : Baik <br>
          C : Cukup <br>
          D : Kurang <br>
          E : Sangat Kurang
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Tanggung Jawab</td>
        <td><?php echo $row_1['tanggungjawab']; ?></td>
        <td><?php predikat($row_1['tanggungjawab']); ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Loyalitas</td>
        <td><?php echo $row_1['loyalitas']; ?></td>
        <td><?php predikat($row_1['loyalitas']); ?></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Kerjasama</td>
        <td><?php echo $row_1['kerjasama']; ?></td>
        <td><?php predikat($row_1['kerjasama']); ?></td>
      </tr>
      <tr>
        <td>5</td>
        <td>Kepemimpinan</td>
        <td><?php echo $row_1['pemimpin']; ?></td>
        <td><?php predikat($row_1['pemimpin']); ?></td>
      </tr>
      <tr>
        <td>6</td>
        <td>Kepedulian</td>
        <td><?php echo $row_1['peduli']; ?></td>
        <td><?php predikat($row_1['peduli']); ?></td>
      </tr>
      <tr>
        <td>7</td>
        <td>Integritas</td>
        <td><?php echo $row_1['integritas']; ?></td>
        <td><?php predikat($row_1['integritas']); ?></td>
      </tr>
      <tr>
        <td>8</td>
        <td>Etika / Moral</td>
        <td><?php echo $row_1['etika']; ?></td>
        <td><?php predikat($row_1['etika']); ?></td>
      </tr>
      <tr>
        <td>9</td>
        <td>Kerapian</td>
        <td><?php echo $row_1['rapi']; ?></td>
        <td><?php predikat($row_1['rapi']); ?></td>
      </tr>
      <tr>
        <td>10</td>
        <td>Makalah</td>
        <td><?php echo $row_1['makalah']; ?></td>
        <td><?php predikat($row_1['makalah']); ?></td>
      </tr>
      <tr>
        <td></td>
        <td>Nilai Rata - Rata</td>
        <td><?php echo $row_1['nilai_rata']; ?></td>
        <td></td>
      </tr>
      <?php } ?>
    </table>
  </div>

  <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>