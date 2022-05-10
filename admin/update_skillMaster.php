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

// Update Record
elseif (isset($_POST['skill_id'])) {
    $skill_id = $_POST['skill_id'];
    $skill_name = $_POST['skill_name'];
    echo $skill_name;
    $query2 = " UPDATE `skill_master` SET `skill_name`=' $skill_name' WHERE id = '$skill_id'";
    mysqli_query($conn, $query2);
}