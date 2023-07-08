<?php

include "check.php";

include "../config.php";

$sql = "UPDATE `category` SET `category_name`='{$_POST["category_name"]}' WHERE category_id={$_POST["category_id"]}";

$result = mysqli_query($conn, $sql);

if($result){
    header("Location: {$hostname}/admin/admin_category.php?msg");
}else{
    echo "Query Failed";
}

?>