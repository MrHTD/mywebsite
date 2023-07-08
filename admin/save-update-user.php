<?php

include "../config.php";

$username = mysqli_real_escape_string($conn, $_POST['username']);

$Password = mysqli_real_escape_string($conn, SHA1($_POST['password']));

    $sql = "UPDATE `admin` SET `username`='{$username}',`password`='{$Password}',`role`='{$_POST['role']}'
            WHERE admin_id = '{$_POST['user_id']}'";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");

    if($result){
        header("Location: {$hostname}/admin/user.php");
    }else{
        echo "Query Failed";
    }

?>