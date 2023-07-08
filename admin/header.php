<?php

include "../config.php";

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: {$hostname}/admin/");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "$title"; ?></title>
    <link href="./css/admin_css.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <script src="../css/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-lg">
        <div class="container-fluid">
            <a class="navbar-brand" id="logo" href="index.php">ADMIN <span>PAGE</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">

                <?php 
                if($_SESSION["user_role"] == 1){
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'user') {
                                                echo 'active';
                                            } ?>" aria-current="page" href="user.php">USERS</a>
                    </li>
                <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'posts') {
                                                echo 'active';
                                            } ?>" aria-current="page" href="post.php">POSTS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'category') {
                                                echo 'active';
                                            } ?>" aria-current="page" href="admin_category.php">CATEGORY</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'playlist') {
                                                echo 'active';
                                            } ?>" aria-current="page" href="playlist.php">PLAYLISTS</a>
                    </li>

                </ul>

                <a href="logout.php" class="btn float-end ms-3" style="background-color: red!important;color: white!important;">LOGOUT</a>
            </div>
        </div>
    </nav>


    <script src="../css/jquery.min.js"></script>

</body>

</html>