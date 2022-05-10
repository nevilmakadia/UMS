<?php
include_once './include/config.php';
include_once './include/header.php';
include_once './include/sidebar.php';
include_once './include/styling.php';
?>

<!-- Total Skills -->
<?php
$totalSkillTable = "SELECT * FROM skill_master";
$tableSkillResult = mysqli_query($conn, $totalSkillTable);
if ($tableSkillResult) {
    $totalSkill = mysqli_fetch_row($tableSkillResult);
}
?>
<!-- /Total Skills -->

<!-- All User Data -->
<!-- Total Admin -->
<?php
$selectAdminTable = "SELECT * FROM user_master WHERE roll_id = '1' ";
$adminTableResult = mysqli_query($conn, $selectAdminTable);
if ($adminTableResult) {
    $totalAdmin = mysqli_fetch_row($adminTableResult);
}
?>

<!-- Total User -->
<?php
$selectUserTable = "SELECT * FROM user_master WHERE roll_id = '2' ";
$userTableResult = mysqli_query($conn, $selectUserTable);
if ($userTableResult) {
    $totalAdmin = mysqli_fetch_row($userTableResult);
}
?>

<!-- Total Active Users -->
<?php
$selectActiveUser = "SELECT * FROM user_master WHERE user_status = '1'";
$activeUserResult = mysqli_query($conn, $selectActiveUser);
if ($activeUserResult) {
    $totalActiveUser = mysqli_fetch_row($activeUserResult);
}
?>

<!-- Total Inactive User -->
<?php
$selectInactiveUser = "SELECT * FROM user_master WHERE user_status = '0'";
$InactiveUserResult = mysqli_query($conn, $selectInactiveUser);
if ($InactiveUserResult) {
    $totalActiveUser = mysqli_fetch_row($InactiveUserResult);
}
?>

<!-- Total Logged Usre -->
<?php
$selectCurrentLogged = "SELECT * FROM user_master WHERE is_login = '1'";
$currentLoggedResult = mysqli_query($conn, $selectCurrentLogged);
if ($currentLoggedResult) {
    $totalLoggedUser = mysqli_fetch_row($currentLoggedResult);
}
?>
<!-- /All User Data -->

<!-- Skill Record -->
<?php
$totalSkillList = mysqli_query($conn, "SELECT * FROM skill_master");
?>
<!-- /Skill Record -->

<!-- User Record -->
<!-- Total Admin -->
<?php
$totalAdminTable = mysqli_query($conn, "SELECT * FROM user_master WHERE roll_id = '1'");
?>

<!-- Total Normal User -->
<?php
$totalUserTable = mysqli_query($conn, "SELECT * FROM user_master WHERE roll_id = '2'");
?>

<!-- Total Active User -->
<?php
$totalActiveTable = mysqli_query($conn, "SELECT * FROM user_master WHERE user_status = '1'");
?>

<!-- Total Inactive User -->
<?php
$totalInactiveTable = mysqli_query($conn, "SELECT * FROM user_master WHERE user_status = '0'");
?>

<!-- Total Logged User -->
<?php
$totalLoggedTable = mysqli_query($conn, "SELECT * FROM user_master WHERE is_login = '1'");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMS | Admin</title>
    <style>
        h1:hover {
            color: #007bff;
        }
    </style>
</head>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes -->
            <div class="row">
                <!-- Admin User -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>
                                <?php
                                $totalAdminN = mysqli_num_rows($adminTableResult);
                                echo $totalAdminN;
                                ?>
                            </h3>
                            <p>Total Admin Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
                <!-- Normal Users -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>
                                <?php
                                $totalUserN = mysqli_num_rows($userTableResult);
                                echo $totalUserN;
                                ?>
                            </h3>
                            <p>Normal Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Active Users -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?php
                                $totalActiveUserN = mysqli_num_rows($activeUserResult);
                                echo $totalActiveUserN;
                                ?>
                            </h3>
                            <p>Total Active Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Inactive Users -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?php
                                $totalInactiveUserN = mysqli_num_rows($InactiveUserResult);
                                echo $totalInactiveUserN;
                                ?>
                            </h3>
                            <p>Total Inactive Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-minus"></i>
                        </div>
                    </div>
                </div>
                <!-- Total Logged User -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?php
                                $totalActiveN = mysqli_num_rows($currentLoggedResult);
                                echo $totalActiveN;
                                ?>
                            </h3>
                            <p>Total Logged Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
                <!-- Total Skills -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>
                                <?php
                                $totalActiveN = mysqli_num_rows($tableSkillResult);
                                echo $totalActiveN;
                                ?>
                            </h3>
                            <p>Total Skills</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tools"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Small Box -->

    <div class="content">
        <div class="container-fluid">
            <!-- Currently Logged Users -->
            <div class="row">
                <div class="col-12">
                    <div class="card" style="height: 200px;">
                        <div class="card-header bg-success">
                            <h3 class="card-title">Currently Logged Users</h3>

                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Profile Image</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    while ($rec = mysqli_fetch_array($totalLoggedTable)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $rec['u_name']; ?></td>
                                            <td><?php echo $rec['roll_id']; ?></td>
                                            <td><img src="./images/<?php echo $rec['u_profile_image'] ?>" alt="" style="width: 80px; height: 80px;"></td>
                                            <td><?php echo $rec['user_status']; ?></span></td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Currently Logged User -->

            <!-- Total Admin & Normal User -->
            <div class="row">
                <!-- Total Admin Users -->
                <div class="col-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Total Admin Users</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    while ($rec = mysqli_fetch_array($totalAdminTable)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $rec['u_name']; ?></td>
                                            <td><?php echo $rec['roll_id']; ?></td>
                                            <td><?php echo $rec['user_status']; ?></span></td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Total Normal User -->
                <div class="col-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">Total Normal Users</h3>

                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    while ($rec = mysqli_fetch_array($totalUserTable)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $rec['u_name']; ?></td>
                                            <td><?php echo $rec['roll_id']; ?></td>
                                            <td><?php echo $rec['user_status']; ?></span></td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Active & Inactive User -->
            <div class="row">
                <!-- Current Active Users -->
                <div class="col-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-header bg-success">
                            <h3 class="card-title">Currently Active Users</h3>

                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    while ($rec = mysqli_fetch_array($totalActiveTable)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $rec['u_name']; ?></td>
                                            <td><?php echo $rec['roll_id']; ?></td>
                                            <td><?php echo $rec['user_status']; ?></span></td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Currently Inactive User -->
                <div class="col-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-header bg-danger">
                            <h3 class="card-title">Currently Inctive Users</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    while ($rec = mysqli_fetch_array($totalInactiveTable)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $rec['u_name']; ?></td>
                                            <td><?php echo $rec['roll_id']; ?></td>
                                            <td><?php echo $rec['user_status']; ?></span></td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Currenty Inactive User -->
            </div>
        </div>
    </div>
</div>
</div>

<?php
include_once './include/footer.php';
?>