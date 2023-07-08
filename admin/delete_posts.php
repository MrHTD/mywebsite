<?php 

include "check.php";

include "../config.php";

$delete = mysqli_query($conn,"DELETE FROM `post` WHERE post_id='". $_GET['id']."' ");

unlink("upload/".$row['post_img']);

if($delete){
    echo "<script>alert('Data Deleted')</script>";
    header('Refresh: 0; URL=post.php');
  }else{
    echo "<script>alert('Data Delete Failed')</script>";
  }

?>