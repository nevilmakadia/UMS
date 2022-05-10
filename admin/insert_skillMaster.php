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
?>