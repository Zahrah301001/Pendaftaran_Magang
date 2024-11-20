<?php
include "../config.php";
error_reporting(0);

session_start();

if ($_SESSION['username'] == '') {
  header("Location: ../login.php");
}

$notifikasi = mysqli_query($koneksi, "SELECT * FROM notifikasi ORDER BY tgl_input DESC LIMIT 5");

$daftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");
$makalah = mysqli_query($koneksi, "SELECT * FROM makalah");
$kesan = mysqli_query($koneksi, "SELECT * FROM kesan");

function timeago($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>

<div class="header bg-light">
  <div class="d-flex justify-content-between text-dark" style="margin-right: 60px;">
    <div class="d-flex ms-4">
      <i class="bi bi-person me-2 fs-3" style="margin-top: 13px;"></i>
      <p class="fw-bold text-dark" style="margin-top: 22px;">Selamat Datang, <span class="text-warning"><?php echo $_SESSION['nama']; ?></span></p>
    </div>
    <div class="dropdown me-2 mt-4 notifikasi">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-bell-fill me-1"></i>Notifikasi
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach($notifikasi as $row){ ?>
          <?php foreach($daftar as $row_daftar){ ?>
            <?php if($row['tgl_input'] == $row_daftar['tgl_surat_masuk'] && $row['jenis'] == "daftar"){?>
              <li>
                <a class="dropdown-item fw-bold" href="pendaftar.php" style="font-size: 0.8rem;">
                  <span><span class="text-warning">Daftar Baru</span>, dari : <?php echo $row['identity']; ?></span> <br>
                  <span><?php echo timeago($row['tgl_input']); ?></span>
                </a>
              </li>
            <?php } ?> 
          <?php } ?>
          <?php foreach($makalah as $row_makalah){ ?>
            <?php if($row['identity'] == $row_makalah['nim'] && $row['jenis'] == "makalah"){?>
              <li>
                <a class="dropdown-item fw-bold" href="peserta.php" style="font-size: 0.8rem;">
                  <span><span class="text-warning">Makalah Baru</span>, dari : <?php echo $row['identity']; ?></span> <br>
                  <span><?php echo timeago($row['tgl_input']); ?></span>
                </a>
              </li>
            <?php } ?> 
          <?php } ?>
          <?php foreach($kesan as $row_kesan){ ?>
            <?php if($row['tgl_input'] == $row_kesan['tgl_dibuat'] && $row['jenis'] == "kesan"){?>
              <li>
                <a class="dropdown-item fw-bold" href="dashboard.php" style="font-size: 0.8rem;">
                  <span><span class="text-warning">Kesan Baru</span>, dari : <?php echo $row['identity']; ?></span> <br>
                  <span><?php echo timeago($row['tgl_input']); ?></span>
                </a>
            </li>
            <?php } ?> 
          <?php } ?>
        <?php } ?>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-primary" href="notifikasi.php" style="font-size: 0.8rem;">lihat lainnya</a></li>
      </ul>
    </div>
  </div>
</div>