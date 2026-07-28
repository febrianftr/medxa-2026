<?php

require 'koneksi/koneksi.php';

session_start();

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  if (empty($username)) {
    echo "<script>alert('Username belum diisi!'); </script>";
  } elseif (empty($password)) {
    echo "<script>alert('Password belum diisi!'); </script>";
  } else {
    // query untuk mendapatkan username
    $stmt = mysqli_prepare($conn, "SELECT * FROM xray_login WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $s = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($s);

    // cek kesesuaian password
    if (password_verify($password, $data['password'])) {
      $_SESSION['last_login_timestamp'] = time();
      //- menyimpan username dan level ke dalam session
      $_SESSION['level'] = $data['level'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['fill'] = $data_temp['fill'];
    }
    echo "<script>alert('username atau password salah silahkan ulangi kembali'); </script>";
  }
}

?>

<?php
@$username = $_SESSION['username'];
$query = "SELECT * FROM xray_login WHERE username = '$username' ";
$hasil = mysqli_query($conn, $query);
$data = mysqli_fetch_array($hasil);

if (!($_SESSION['username'] = $data['username'])) {
?>
  <?php include "bahasa.php"; ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- ketika pencet tombol back akan kembali kehalaman awal -->
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap4.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="styleindex.css" />
    <link rel="stylesheet" href="css/loading.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="icon" type="image/x-icon" href="image/logo/medxa-logo.ico">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style-login-new.css">
    <title>Login</title>
  </head>

  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="margin-left-login">
          <div class="col align-self-start">

            <form class="form" method="post" action="">
              <div class="heading">
                <img src="image/logo/logo-pacs-b.png" style="width: 80%;">

              </div>

              <div class="form-group">
                <i class="fa fa-user fa-lg"></i>
                <input type="text" class="form-control" name="username" placeholder="<?= $lang['input_uname'] ?>" required>
              </div>

              <!-- <div class="form-group">
                <i class="fa fa-lock fa-lg"></i>
                <input type="password" class="form-control" name="password" placeholder="<?= $lang['input_pw'] ?>" required>
              </div> -->

              <div class="form-group">
                <div class="password-wrapper">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="password" class="form-control" name="password" placeholder="<?= $lang['input_pw'] ?>" required>
                  <i class="fas fa-eye" id="togglePassword"></i>
                </div>
              </div>

              <!-- <label for="username">Username</label>
              <input type="text" name="username" placeholder="<?= $lang['input_uname'] ?>" required> -->

              <!-- <label for="password">Password</label>
              <input type="password" name="password" placeholder="<?= $lang['input_pw'] ?>" required> -->

              <button class="button-log" type="submit" name="login" onclick="play()"><?= $lang['login'] ?></button>

            </form>
          </div>
        </div>
      </div>
    </div>



    </div>
    <!-- <div class="footerindex">

      <center><b>Developed by Medical System</b></center>

    </div> -->


    <!-- <div class="content">
  


</div> -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
      $(document).ready(function() {
        $("#togglePassword").click(function() {
          let input = $("#password");
          let icon = $(this);

          if (input.attr("type") === "password") {
            input.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash");
          } else {
            input.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye");
          }
        });
      });
    </script>
  </body>

  </html>
<?php } else {
  if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "superadmin") {
    header("location:admin/administrator.php");
  } else if ($_SESSION['level'] == "superadmin") {
    header("location:admin/administrator.php");
  } else if ($_SESSION['level'] == "radiology") {
    $_GET["to"] ? header("location:radiology/$_GET[to]") : header("location:radiology/dicom.php");
  } else if ($_SESSION['level'] == "radiographer") {
    header("location:radiographer/workload.php");
  }
}
mysqli_close($conn);
?>