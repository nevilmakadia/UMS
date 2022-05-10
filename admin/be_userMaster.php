<?php
include_once './include/config.php';

// Fetch Record
if (isset($_POST['id'])) {
    $user_id = $_POST['id'];
    $selectRecord = "SELECT * FROM user_master WHERE id = '$user_id' ";
    $recordQuery = mysqli_query($conn, $selectRecord);
    $row = mysqli_fetch_assoc($recordQuery);
    $response = array();
    if (mysqli_num_rows($recordQuery) > 0) {
        while ($row = mysqli_fetch_assoc($recordQuery)) {
            $response = $row;
        }
    }
    echo json_encode($response);
}

// Insert Record
elseif (isset($_POST['done'])) {
    $roll_id = $_POST['roll_id'];
    $user_status = $_POST['user_status'];
    $u_name = $_POST['u_name'];

    $u_password = $_POST['u_password'];
    $u_password = md5($u_password);

    $u_email = $_POST['u_email'];
    $u_mobile_no = $_POST['u_mobile_no'];

    $u_profile_image = rand(0, 999) . $_FILES['u_profile_image']['name'];
    $temp_img_upload = $_FILES['u_profile_image']['tmp_name'];
    move_uploaded_file($temp_img_upload, "images/" . $u_profile_image);

    $user_skill = $_POST['user_skill'];
    $user_skill_list = "";
    foreach ($user_skill as $item) {
        $user_skill_list .= $item . ",";
    }

    $u_address = $_POST['u_address'];
    $u_birthdate = $_POST['u_birthdate'];

    $date = date("Y-m-d H:i:s");

    $insert = "INSERT INTO `user_master`(`roll_id`, `user_status`, `u_name`, `u_password`, `u_email`, `u_mobile_no`, `u_profile_image`, `user_skill`, `u_address`, `u_birthdate`, `created_at`) VALUES ('{$roll_id}','{$user_status}','{$u_name}','{$u_password}','{$u_email}','{$u_mobile_no}','{$u_profile_image}','{$user_skill_list}','{$u_address}','{$u_birthdate}','$date')";

    $insertQuery = mysqli_query($conn, $insert);

    if ($insertQuery) {
    } else {
    }
    mysqli_close($conn);
}

// Delete Record
elseif (isset($_POST['delete'])) {
    $user_id = $_POST['id'];
    $qry = mysqli_query($conn, "DELETE FROM user_master WHERE id='$user_id'");
} else {

    // View Record
    $viewRecord = "SELECT * FROM user_master";
    $recordResult = mysqli_query($conn, $viewRecord);

    if ($recordResult->num_rows > 0) {
        while ($row = $recordResult->fetch_assoc()) {
?>
            <tr delete="<?php echo $row['id']; ?>">
                <td><?php echo $row['roll_id']; ?></td>
                <td><?php echo $row['user_status']; ?></td>
                <td><?php echo $row['u_name']; ?></td>
                <td><?php echo $row['u_email']; ?></td>
                <td><?php echo $row['u_mobile_no']; ?></td>
                <td><img src="images/<?php echo $row['u_profile_image']; ?>" style="height: 100px; width: 100px;" alt="Image Not Found!"></td>
                <td>
                    <!-- Edit Button -->
                    <button type="button" class="btn btn-primary editUserMaster" id="editUserMaster" style="margin-right: 5px;"><i class="fas fa-pencil-alt"></i> Edit</button>

                    <!-- Delete Button -->
                    <button type="button" class="btn btn-danger deleteButton" style="margin-right: 5px;" onclick="deleteuser(<?php echo $row['id']; ?>)"><i class="fas fa-trash"></i> Delete</button>
                </td>
            </tr>
<?php
        }
    }
}
mysqli_close($conn);
?>