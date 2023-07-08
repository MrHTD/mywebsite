<?php 

include "../config.php";

if(empty($_FILES['fileToUpload'])){
  }else{
    $errors = array();
  
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));
  
    $extensions = array("jpeg","jpg","png");
  
    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }
  
    if($file_size > 5242880){
      $errors[] = "File size must be 5mb or lower.";
    }
  
    if($file_size > 5242880){
      $errors[] = "File size must be 5mb or lower.";
    }
    $target = "upload/".$file_name;
    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

session_start();

$title = strtoupper(mysqli_real_escape_string($conn, $_POST['playlist_name']));
$yt_url = mysqli_real_escape_string($conn, $_POST['playlist_url']);
$date = $_POST['playlist_date'];

$sql = "INSERT INTO `playlists`(`playlist_name`,`playlist_url`, `playlist_date`,`playlist_image`) VALUES ('{$title}','{$yt_url}','{$date}','{$file_name}');";

echo $sql;

if(mysqli_multi_query($conn, $sql)){
    header("Location: {$hostname}/admin/playlist.php");
}else{
    echo '<div class="alert alert-danger" role="alert">Query Failed.</div>';
}