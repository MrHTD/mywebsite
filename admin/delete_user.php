<?php 

include "../config.php";

$delete = mysqli_query($conn,"DELETE FROM `admin` WHERE admin_id ='". $_GET['id']."' ");

if($delete){
    echo "<script>alert('Data Deleted')</script>";
    header('Refresh: 0; URL=user.php');
  }else{
    echo "<script>alert('Data Delete Failed')</script>";
  }

?>