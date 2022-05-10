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
// Delete Record
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $qry = mysqli_query($conn, "DELETE FROM user_master WHERE id='$id'");
}
