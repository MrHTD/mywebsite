<?php

include "../config.php";

if(empty($_FILES['new_img']['name'])){
    $file_name = $_POST['old_img'];
}else{
    $errors = array();

  $file_name = $_FILES['new_img']['name'];
  $file_size = $_FILES['new_img']['size'];
  $file_tmp = $_FILES['new_img']['tmp_name'];
  $file_type = $_FILES['new_img']['type'];

  $file_ext = (explode('.', $file_name));

  $ext = end($file_ext);

  $extensions = array("jpeg", "jpg", "png");

  if (in_array($ext, $extensions) === false) {
    $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
  }

  $target = "upload/" . $file_name;
  if (empty($errors) == true) {
    move_uploaded_file($file_tmp, $target);
  } else {
    print_r($errors);
    die();
  }
}

$title = strtoupper(mysqli_real_escape_string($conn, $_POST['playlist_name']));

$date = $_POST['playlist_date'];

$sql = "UPDATE `playlists` SET playlist_name='{$title}',`playlist_image`='{$file_name}',`playlist_date` = '{$date}',`playlist_url`='{$_POST["playlist_url"]}'
        WHERE playlist_id={$_POST["playlist_id"]}";

        echo $sql;

$result = mysqli_query($conn, $sql);

if($result){
    header("Location: {$hostname}/admin/playlist.php");
}else{
    echo "Query Failed";
}

?>
