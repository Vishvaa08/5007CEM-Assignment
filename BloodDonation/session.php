<?php

$conn = mysqli_connect("localhost", "root", "", "blood_donation");

session_start();

$user_check = $_SESSION['login_user'];

$query = "SELECT uname from user where uname = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['uname'];

?>