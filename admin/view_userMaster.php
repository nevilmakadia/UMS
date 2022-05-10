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
} else {

    // View Record
    $viewRecord = "SELECT * FROM user_master";
    $recordResult = mysqli_query($conn, $viewRecord);

    if ($recordResult->num_rows > 0) {
        while ($row = $recordResult->fetch_assoc()) {
?>
            <tr id="<?php echo $row['id']; ?>">
                <td><?php echo $row['roll_id']; ?></td>
                <td><input type="checkbox" name="user_status" class="user_status" id="user_status" value="yes" <?php echo ($row['user_status'] == 1 ? 'checked' : ''); ?>></td>
                <td><?php echo $row['u_name']; ?></td>
                <td><?php echo $row['u_email']; ?></td>
                <td><?php echo $row['u_mobile_no']; ?></td>
                <td><img src="./images/<?php echo $row['u_profile_image'] ?>" alt="" class="userImage" style="width: 50px; height: 50px;"></td>
                <input type="hidden" id="hidden_user_id" value="<?php echo $row['id']; ?>">
                <td>
                    <!-- Edit Button -->
                    <button type="button" class="btn btn-primary editUserBtn" id="editUserBtn" onclick="fetchuser(<?php echo $row['id']; ?>)"><i class="fas fa-pencil-alt"></i></button>

                    <!-- Delete Button -->
                    <button type="button" class="btn btn-danger deleteButton" style="margin-right: 5px;" onclick="deleteuser(<?php echo $row['id']; ?>)"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
<?php
        }
    }
    mysqli_close($conn);
}
?>