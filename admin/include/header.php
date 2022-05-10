<?php
session_start();
if (!isset($_SESSION['u_email'])) {
  header("location: ./adminLogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="./dist/img/adminLogoCircle.png">
  <title>UMS | Admin</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./changePassword.php" class="nav-link">Change Password</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./adminLogout.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>
  </div>