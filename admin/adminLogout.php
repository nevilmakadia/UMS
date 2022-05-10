<?php
include_once './include/config.php';
?>

<?php
session_start();
$u_email=$_SESSION['u_email'];
if(session_unset() == true){
    $updateIsLogin = "UPDATE `user_master` SET `is_login` = 0 WHERE `u_email` = '$u_email'";
        $IsLoginResult = mysqli_query($conn, $updateIsLogin);
}
session_unset();
header("Location: ./adminLogin.php");
?>