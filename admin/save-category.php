<?php

include "../config.php";

session_start();

$title = strtoupper(mysqli_real_escape_string($conn, $_POST['category_name']));

$sql = "INSERT INTO `category`(`category_name`) VALUES ('{$title}');";

if (mysqli_multi_query($conn, $sql)) {
  header("Location: {$hostname}/admin/admin_category.php");
} else {
  echo '<div class="alert alert-danger" role="alert">Query Failed.</div>';
}
