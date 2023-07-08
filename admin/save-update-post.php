<?php

include "check.php";

include "../config.php";

if(empty($_FILES['new_img']['name'])){
    $file_name = $_POST['old_img'];
}else{
    $errors = array();

  $file_name = $_FILES['new_img']['name'];
  $file_size = $_FILES['new_img']['size'];
  $file_tmp = $_FILES['new_img']['tmp_name'];
  $file_type = $_FILES['new_img']['type'];

  $file_ext = end(explode('.', $file_name));

  $extensions = array("jpeg", "jpg", "png");

  if (in_array($file_ext, $extensions) === false) {
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

$date = Date("d M Y");

$sql = "UPDATE `post` SET `title`='{$_POST["posttitle"]}',`description`= '{$_POST["postdesc"]}' ,`category`={$_POST["category"]},`post_date`='{$date}',`author`='{$_POST["author"]}',`post_img`='{$file_name}'
             WHERE post_id={$_POST["post_id"]}";

$result = mysqli_query($conn, $sql) or die("query Failed");

if($result){
    header("Location: {$hostname}/admin/post.php");
}else{
    echo "Query Failed";
}

?>