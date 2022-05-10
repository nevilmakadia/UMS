<?php
include_once './include/config.php';
include_once './include/header.php';
include_once './include/sidebar.php';
include_once './include/styling.php';
?>

<?php

$fetchData = mysqli_query($conn, "SELECT * FROM user_master");

if (isset($_POST['newPassword'])) {

    $u_email = $_SESSION['u_email'];

    $old_password = $_POST['old_password'];
    $old_password = md5($old_password);

    $u_password = $_POST['u_password'];
    $u_password = md5($u_password);

    $passwordQuery = "SELECT u_password FROM user_master WHERE u_email = '$u_email' AND u_password = '$old_password' ";
    $updatePassword = mysqli_query($conn, $passwordQuery);

    $record = mysqli_fetch_array($updatePassword);

    if ($record > 0) {
        $updateQuery = mysqli_query($conn, "UPDATE user_master SET u_password = '$u_password' WHERE u_email = '$u_email' ");
?>
        <script>
            window.onload = function() {
                alert("Password Updated!");
                window.location = "index.php";
            }
        </script>
    <?php
    } else {
    ?>
        <script>
            window.onload = function() {
                alert("Password Not Updated! \n Double chech your Current Password");
                window.location = "changePassword.php";
            }
        </script>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        .card-header a:hover {
            color: #17a2b8
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Change Password</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>
                        <div id="errorMessage">
                            <span id="errorMessage"></span>
                        </div>
                    </div>
                </div>
                <section class="content-body">
                    <div class="container-fluid">
                        <div class="login-box mt-5 ml-5">
                            <!-- <div class="login-logo">
                            <a href="./index.php"><b>UMS</b>Admin</a>
                        </div> -->
                            <!-- /.login-logo -->
                            <div class="card">
                                <div class="card-body login-card-body">
                                    <p class="login-box-msg">
                                        Change Password
                                    </p>
                                    <p>
                                        <?php echo $_SESSION['success'] = ""; ?>
                                        <?php echo $_SESSION['failed'] = ""; ?>
                                    </p>
                                    <form action="" method="POST">

                                        <!-- Old Password -->
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" />
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- New Password -->
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" name="u_password" placeholder="Password" />
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" name="newPassword" value="submit" class="btn btn-primary btn-block">
                                                    Change password
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
    </div>
</body>

</html>

<?php
include_once './include/footer.php';
?>