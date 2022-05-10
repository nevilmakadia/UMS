<?php
include_once './include/config.php';

// Fetch Skill Record
if (isset($_POST['id'])) {
    $skill_id  = $_POST['id'];
    $query = "SELECT * FROM skill_master WHERE id = '$skill_id'";
    $result = mysqli_query($conn, $query);
    $response = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    echo json_encode($response);
}

// Insert Record
elseif (isset($_POST['skill_name'])) {
    $skill_name = mysqli_real_escape_string($conn, $_POST['skill_name']);
    $date = date("Y-m-d H:i:s");
    $insert = "INSERT INTO skill_master (skill_name, created_at) VALUES ('$skill_name','$date')";
    $insertQuery = mysqli_query($conn, $insert);

    if ($insertQuery) {
    } else {
    }
}

// Update Record
elseif (isset($_POST['update_skill_name'])) {
    $u_id = $_POST['id'];
    $skill_name = $_POST['update_skill_name'];
    $date = date("Y-m-d H:i:s");

    $updateRecord = "UPDATE `skill_master` SET `skill_name` = '$skill_name', `updated_at` = '$date' WHERE `id` = '$u_id' ";
    $updateQuery = mysqli_query($conn, $updateQuery);
}

// Delete Recoord
elseif (isset($_POST['delete'])) {
    $d_id = $_POST['id'];
    $qry = mysqli_query($conn, "DELETE FROM skill_master WHERE id='$d_id'");
} else {

    // View Record
    $viewRecord = "SELECT * FROM skill_master";
    $recordResult = mysqli_query($conn, $viewRecord);

    if ($recordResult->num_rows > 0) {
        $count = 1;
        while ($row = $recordResult->fetch_assoc()) {
?>
            <tr delete="<?php echo $row['id']; ?>">
                <td><?php echo $count; ?></td>
                <td><?php echo $row['skill_name']; ?></td>
                <td>
                    <!-- Edit Button -->
                    <button type="button" class="btn btn-primary editSkillMaster" id="editSkillMaster" onclick="fetchskill(<?php echo $row['id']; ?>)"><i class="fas fa-pencil-alt"></i> Edit</button>

                    <!-- Delete Button -->
                    <button type="button" class="btn btn-danger deleteButton" style="margin-right: 5px;" onclick="deleteskill(<?php echo $row['id']; ?>)"><i class="fas fa-trash"></i> Delete</button>
                </td>
                <?php
                $count++;
                ?>
            </tr>
<?php
        }
    } else {
        echo "No Data Found!";
    }
    mysqli_close($conn);
}
?>