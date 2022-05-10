<?php
include_once 'config.php';
include_once 'styling.php';
?>

<html>

<head>
  <style>
    .nav:hover {
      background-color: #006bff;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
      <img src="dist/img/adminLogo2.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UMS | Admin</span>
    </a>

    <div class="sidebar" style="text-align: center;">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="javascript:void(0)" class="d-block">UMS | Admin Area</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar">
          <div class="mb-1"></div>
          <!-- Skill Master -->
          <li class="nav-item sidebarMenu">
            <a href="skillMaster.php" class="nav-link">
              <span><i class="fas fa-tools"></i></span>
              <p>Manage Skill</p>
              <span><i class="fas fa-tools"></i></span>
            </a>
          </li>
        </ul>
        <hr>
        <ul class="nav nav-pills nav-sidebar">
          <div class="mb-1"></div>
          <!-- Skill Master -->
          <li class="nav-item sidebarMenu">
            <a href="userMaster.php" class="nav-link">
              <span><i class="fas fa-users"></i></span>
              <p>Manage Users</p>
              <span><i class="fas fa-users"></i></span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
</body>

</html>