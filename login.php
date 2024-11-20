<?php 
include "config.php";

error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: admin/dashboard.php");
}
 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
 
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        header("Location: admin/dashboard.php");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
        header("Location: login.php");
    }
} elseif(isset($_GET['status'])){
    session_unset();
    session_destroy();
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- FAVICON -->
  <link href="public/img/favicon.png" rel="icon">

  <!-- BOOTSTRAP CSS-->
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="public/css/style.css">

  <title>Login</title>

</head>
<body>
  <div class="bg-login"></div>
  <div class="bg-login-body"></div>
  <div class="login-body">
    <div class="text-center">
      <img src="public/img/logo.png" alt="Logo PLN" style="width: 150px;">
    </div>
    <form action="" method="POST">
      <input type="text" name="username" class="mt-3" placeholder="username" required="required"> <br>
      <input type="password" name="password" class="mt-3" placeholder="password" required="required"> <br>
      <div class="text-center">
        <button class="btn btn-dark mt-3" name="login" value="login">Login</button>
      </div>
    </form>
    <div class="mt-4 text-center">
      <p style="font-size: 0.8rem;">Copyright &copy;2020 </p>
    </div>
  </div>

  <!-- BOOTSTRAP JS -->
  <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>