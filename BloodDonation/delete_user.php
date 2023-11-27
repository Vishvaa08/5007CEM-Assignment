<?php

include 'db_connection.php';

$uid = $_GET['uid'];
$sql = "DELETE FROM user WHERE uid = $uid";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('location: admin_homepage.php?user deleted');
} else {
    echo "Failed: " . mysqli_error($conn);
}
?>