<div class="sidebar">
  <div class="d-flex flex-column justify-content-between">
    <div class="my-5 text-center logo">
      <img src="../public/img/logo-2.png" alt="" style="width: 100px;">
    </div>
    <div class="fw-bold sidebar-menu">
      <ul class="sidebar-navigation">
        <li class="py-2">   
          <a href="dashboard.php" class="nav-link">
            <i class="bi bi-house-door-fill me-2"></i> Home
          </a>
        </li>
        <li class="py-2">
          <a href="pendaftar.php" class="nav-link">
            <i class="bi bi-check-square-fill me-2"></i> Data Pendaftar
          </a>
        </li>
        <li class="py-2">
          <a href="peserta.php" class="nav-link">
            <i class="bi bi-person-fill me-2"></i> Data Peserta
          </a>
        </li>
        <li class="py-2">
          <a href="alumni.php" class="nav-link">
            <i class="bi bi-people-fill me-2"></i> Alumni Magang
          </a>
        </li>
        <li class="py-2 dropdown-btn">
          <a href="#drpd-sidebar" class="nav-link">
            <i class="bi bi-bookmark-fill me-2"></i> Manajemen <i class="bi bi-chevron-down ms-4" style="font-size: 0.7rem;"></i>
          </a>
        </li>
        <div class="dropdown-body show-hide">
          <ul id="drpd-sidebar">
            <li><a class="nav-link" href="kelola_nilai.php"><i class="bi bi-stack"></i> Kelola Nilai</a></li>
            <li><a class="nav-link" href="kelola_sertifikat.php"><i class="bi bi-pin-angle-fill"></i> Kelola Sertifikat</a></li>
            <li><a class="nav-link" href="kelola_instansi.php"><i class="bi bi-buildings-fill"></i> Kelola Instansi</a></li>
            <li><a class="nav-link" href="kelola_user.php"><i class="bi bi-people-fill"></i> Kelola User</a></li>
          </ul>
        </div>
        <li class="py-2 text-danger">
          <a href="../login.php?status=logout" class="nav-link">
            <i class="bi bi-box-arrow-right me-2"></i> Keluar
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<script>
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      // this.classList.toggle("active-dropdown");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
</script>