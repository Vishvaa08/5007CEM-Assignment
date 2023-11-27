<?php

include 'db_connection.php';

$id = $_GET['id'];
$sql = "DELETE FROM notification WHERE id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('location: admin_view_notifications.php?noti deleted');
} else {
    echo "Failed: " . mysqli_error($conn);
}
?>