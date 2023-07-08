<?php 

include "check.php";

include "../config.php";

$delete = mysqli_query($conn,"DELETE FROM `category` WHERE category_id='". $_GET['id']."' ");

if($delete){
    echo "<script>alert('Data Deleted')</script>";
    header('Refresh: 0; URL=admin_category.php');
  }else{
    echo "<script>alert('Data Delete Failed')</script>";
  }

?>