<?php
include 'dbconnection.php';
session_start();

if (isset($_SESSION['username'])) {

  header("location:http://localhost/organi_master");
}

if (isset($_POST['login'])) {
  $user = $_POST["username"];
  $pass = md5($_POST["password"]);
  $sql = "select * from user where username='$user' and password='$pass'";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row  = mysqli_fetch_assoc($result)) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['userid'] = $row['uid'];
      header("location:http://localhost/ogani-master");
    }
  } else {

    echo '<p class="alert alert_danger">"Username or password is incorrect"</p>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Shop  Login Page</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="img/logo.png">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" id="login" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Enter your username" required="true" name="username">
                </div>
                <div class="form-group">

                  <input type="password" class="form-control form-control-lg" placeholder="Enter your password" name="password" required="true">
                </div>
                <div class="mt-3">
                  <button class="btn btn-success btn-block loginbtn" name="login" type="submit">Login</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <a href="forgot-password.php" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div class="mb-2">
                    <a href="register.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Sign up </a>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
</body>

</html>