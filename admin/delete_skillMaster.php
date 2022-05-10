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

if (isset($_POST['delete'])) {
    $d_id = $_POST['id'];
    $qry = mysqli_query($conn, "DELETE FROM skill_master WHERE id='$d_id'");
}
?>