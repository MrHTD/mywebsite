<?php

include "../config.php";

session_start();

$username = mysqli_real_escape_string($conn, $_POST['username']);

$Password = SHA1($_POST['password']);

$role = $_POST['role'];

$sql = "INSERT INTO `admin`(`username`, `password`, `role`) VALUES ('$username','$Password','$role')";

if (mysqli_multi_query($conn, $sql)) {
    header("Location: {$hostname}/admin/user.php");
} else {
    echo '<div class="alert alert-danger" role="alert">Query Failed.</div>';
}
