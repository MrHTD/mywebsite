<?php 

include "check.php";

include "../config.php";

$delete = mysqli_query($conn,"DELETE FROM `playlists` WHERE playlist_id='". $_GET['id']."' ");

unlink("upload/".$row['playlist_image']);

if($delete){
    echo "<script>alert('Data Deleted')</script>";
    header('Refresh: 0; URL=playlist.php');
  }else{
    echo "<script>alert('Data Delete Failed')</script>";
  }

?>