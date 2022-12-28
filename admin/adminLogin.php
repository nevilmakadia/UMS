<?php
include_once './include/config.php';

session_start();
if (isset($_SESSION['u_email'])) {
    echo $_SESSION['u_email'];
    header('location: ./index.php');
}

// Password Compare
if (isset($_POST['adminLogin'])) {
    $u_email = $_POST['u_email'];
    $u_password = $_POST['u_password'];
    $u_password = md5($u_password);

    $logiinQuery = "SELECT * FROM `user_master` WHERE `u_email` = '$u_email' AND `roll_id` = 1 AND `user_status` = 1";
    $loginResult = mysqli_query($conn, $logiinQuery);

    if ($loginResult == true) {
        $updateIsLogin = "UPDATE `user_master` SET `is_login` = 1 WHERE `u_email` = '$u_email' AND `roll_id` = 1";
        $IsLoginResult = mysqli_query($conn, $updateIsLogin);
    }

    if (mysqli_num_rows($loginResult) != 0) {
        $row = mysqli_fetch_assoc($loginResult);
        $db_password = $row['u_password'];
        if ($db_password == $u_password) {
?>
            <script>
                alert("Login Successfull");
                window.location = "index.php";
            </script>

        <?php
            $_SESSION['u_email'] = $u_email;
            $_SESSION['id'] = $row['id'];
        } else {
        ?>
            <script>
                alert("Wrong Password");
                window.location = "adminLogin.php";
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Incorrect credentials!");
            window.location = "adminLogin.php";
        </script>
<?php
    }
}
include_once './include/styling.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMS | Login</title>
    <script src="./dist//js/jquery-3.6.0.min.js"></script>
    <!-- Username & Password Validation -->
    <script>
        $(document).ready(function() {
            // Use keyup on admin_username
            $("#u_email").keyup(function() {
                if (validateUsername()) {
                    // label
                    $("#u_email")
                    $("#usernameMsg").html("<p class='text-success'>Username Validated</p>")
                } else {
                    $("#u_email")
                    $("#usernameMsg").html("<p class='text-danger'>Username Invalid</p>")
                }
            });

            // Use keyup on admin_password
            $("#u_password").keyup(function() {
                if (validatePassword()) {
                    // label
                    $("#u_password")
                    $("#passwordMsg").html("<p class='text-success'>Password Validated</p>")
                } else {
                    $("#admin_username")
                    $("#passwordMsg").html("<p class='text-danger'>Password Invalid</p>")
                }
            });
        });
        // valaidate admin_username
        function validateUsername() {
            // Get input value
            var u_email = $("#u_email").val();
            // regular expression
            var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
            if (reg.test(u_email)) {
                return true;
            } else {
                return false;
            }
        }

        // validate admin_password
        function validatePassword() {
            var u_password = $("#u_password").val();
            // password length
            if (u_password.length >= 8) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <style>
        .card-header a:hover {
            color: #17a2b8
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-info">
            <div class="error"></div>
            <div class="card-header text-center">
                <a href="./adminLogin.php" class="h1"><b>UMS</b>Admin</a>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h1>Sign in</h1>
                </div>
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" method="POST" id="loginForm" name="loginForm">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="u_email" id="u_email" placeholder="Enter Email" autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control" name="u_password" id="u_password" placeholder="Enter Password">
                        <div>
                            <span id="skillnameMsg"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span id="passwordMsg"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12 justify-content-center">
                            <button type="submit" name="adminLogin" id="adminLogin" class="btn btn-outline-info btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="input-group mb-3">
                        <span id="usernameError"></span>
                        <span id="passwordError"></span>
                        <span id="incorrectData"></span>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
</body>

</html>