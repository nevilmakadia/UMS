<?php
include_once './include/config.php';

// Fetch Record
if (isset($_POST['id'])) {
    $selectRecord = "SELECT * FROM user_master WHERE id = '$user_id' ";
    $recordQuery = mysqli_query($conn, $selectRecord);
    $response = array();
    if (mysqli_num_rows($recordQuery) > 0) {
        while ($row = mysqli_fetch_assoc($recordQuery)) {
            $response = $row;
        }
    }
    echo json_encode($response);
}

// Insert Record
elseif ((isset($_POST['roll_id']))) {
    if ($_POST['roll_id'] == '1') {
        $roll_id = 1;
    }
    if ($_POST['roll_id'] == '2') {
        $roll_id = 2;
    }
    if ($_POST['user_status'] == '1') {
        $user_status = 1;
    }
    if ($_POST['user_status'] == '0') {
        $user_status = 0;
    }
    $u_name = $_POST['u_name'];

    $u_password = $_POST['u_password'];
    $u_password = md5($u_password);

    $u_email = $_POST['u_email'];
    $u_mobile_no = $_POST['u_mobile_no'];

    $u_profile_image = rand(0, 999) . $_FILES['u_profile_image']['name'];
    $temp_img_upload = $_FILES['u_profile_image']['tmp_name'];
    move_uploaded_file($temp_img_upload, "images/" . $u_profile_image);

    $user_skill_list = "";
    $user_skill = $_POST['user_skill'];
    foreach ($user_skill as $skill_list) {
        echo $user_skill_list .= $skill_list . ",";
    }

    $u_address = $_POST['u_address'];
    $u_birthdate = $_POST['u_birthdate'];

    $date = date("Y-m-d H:i:s");

    $insert = "INSERT INTO `user_master`(`roll_id`, `user_status`, `u_name`, `u_password`, `u_email`, `u_mobile_no`, `u_profile_image`, `user_skill`,  `u_address`, `u_birthdate`, `created_at`) VALUES ('{$roll_id}','{$user_status}','{$u_name}','{$u_password}','{$u_email}','{$u_mobile_no}','{$u_profile_image}','{$user_skill_list}','{$u_address}','{$u_birthdate}','$date')";

    $insertQuery = mysqli_query($conn, $insert);

    $u_id = mysqli_insert_id($conn);
    $skill_id = explode(',', $user_skill_list);
    $date = date('Y-m-d H:i:s');
    foreach ($skill_id as $skill_value) {
        $query1 = "INSERT INTO userskill (uid,sid,created_at) VALUES ('$u_id','$skill_value','$date');";
        $result = mysqli_query($conn, $query1);
    }

    if ($insertQuery) {
    } else {
    }
}
