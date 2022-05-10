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
} else {
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
                    <button type="button" class="btn btn-primary editSkillBtn" id="editSkillBtn" onclick="fetchskill(<?php echo $row['id']; ?>)"><i class="fas fa-pencil-alt"></i> Edit</button>

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