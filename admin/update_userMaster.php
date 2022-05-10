<?php
include_once './include/config.php';

// Fetch Record
if (isset($_POST['id'])) {
    $user_id = $_POST['id'];
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

// Update Record
elseif (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

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

    $u_email = $_POST['u_email'];
    $u_mobile_no = $_POST['u_mobile_no'];

    // $u_profile_image = rand(0, 999) . $_FILES['u_profile_image']['name'];
    // $temp_img_upload = $_FILES['u_profile_image']['tmp_name'];
    // move_uploaded_file($temp_img_upload, "images/" . $u_profile_image);

    $user_skill_list = "";
    $user_skill = $_POST['user_skill'];
    foreach ($user_skill as $skill_list) {
        echo $user_skill_list .= $skill_list . ",";
    }

    $u_address = $_POST['u_address'];
    $u_birthdate = $_POST['u_birthdate'];

    $date = date("Y-m-d H:i:s");

    if ($_FILES['u_profile_image']['name'] != '') {
        $fileName = $_FILES['u_profile_image']['name'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        $validExtension = array("jpg", "png", "gif");

        if (in_array($extension, $validExtension)) {
            $newName = $fileName;
            $path = "images/" . $newName;
            if (move_uploaded_file($_FILES['u_profile_image']['tmp_name'], $path)) {
                $update = "UPDATE `user_master` SET `roll_id` = '$roll_id', `user_status` = '$user_status', `u_name` = '$u_name', `u_email` = '$u_email', `u_mobile_no` = '$u_mobile_no', `u_profile_image` = '$newName', `user_skill` = '$user_skill_list', `u_address` = '$u_address', `u_birthdate` = '$u_birthdate', `updated_at` = '$date' WHERE `id` = '$user_id'";

                $updateQuery = mysqli_query($conn, $update);
            }
        }
    }
    $update2 = "UPDATE `user_master` SET `roll_id` = '$roll_id', `user_status` = '$user_status', `u_name` = '$u_name', `u_email` = '$u_email', `u_mobile_no` = '$u_mobile_no', `user_skill` = '$user_skill_list', `u_address` = '$u_address', `u_birthdate` = '$u_birthdate', `updated_at` = '$date' WHERE `id` = '$user_id'";

    $updateQuery2 = mysqli_query($conn, $update2);
}

// Update User Status From userMaster.php
elseif ($_POST['msg'] == "active") {
    $statusid = $_POST['statusid'];
    $query = "UPDATE `user_master` SET `user_status`='1' WHERE id=$statusid";
    $t = mysqli_query($conn, $query);
} elseif ($_POST['msg'] == "inactive") {
    $statusid = $_POST['statusid'];
    $query = "UPDATE `user_master` SET `user_status`='0' WHERE id=$statusid";
    $t = mysqli_query($conn, $query);
}
