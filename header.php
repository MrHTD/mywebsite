<?php

include "config.php";

$page = $_SERVER['HTTP_HOST'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./admin/upload/icon.png" rel="icon">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-lg">
        <div class="container-fluid">
            <a class="navbar-brand" id="logo" href="<?php echo $hostname; ?>">GAMES <span>HEAVEN</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-danger" style="color: red!important;"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="font-size: 19px;">

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'news') {
                                                echo 'active';
                                            } ?>" aria-current="page" href="./news.php">NEWS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'view_all_playlists') {
                                                echo 'active';
                                            } ?>" aria-current="page" href="view_all_playlist.php">PLAYLISTS</a>
                    </li>

                    <?php

                    if (isset($_GET['cid'])) {
                        $cat_id = $_GET['cid'];
                    }


                    $sql = "SELECT * FROM category WHERE post > 0";

                    $result = mysqli_query($conn, $sql) or die("Query Failed: Category");

                    if (mysqli_num_rows($result) > 0) {

                        $active = "";

                    ?>

                        <!-- dropdown -->
                        <li class="nav-item dropdown p-0">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">CATEGORIES</a>
                            <ul class="dropdown-menu text-center rounded-3 p-0 text-center">
                                <?php
                                while ($row = mysqli_fetch_array($result)) {

                                    if (isset($_GET['cid'])) {

                                        if ($row["category_id"] == $cat_id) {
                                            $active = "active-dropdown";
                                        } else {
                                            $active = "";
                                        }
                                    }

                                    echo "<li><a class='{$active} dropdown-item border-0 py-2 rounded-3' href='category.php?cid={$row["category_id"]}'>{$row["category_name"]}</a></li>";
                                } ?>
                            </ul>
                        </li>

                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'contact') {
                                                echo 'active';
                                            } ?>" href="./contact.php">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'about') {
                                                echo 'active';
                                            } ?>" href="about.php">ABOUT</a>
                    </li>
                    <?php
                    if ($title == 'Playlists') {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link search" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <!-- Search -->
                        <li class="nav-item">
                            <a class="nav-link search" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </li>
                    <?php }
                    ?>

                </ul>

            </div>
        </div>
    </nav>

    <!-- Search -->
    <div class="collapse" id="collapseExample">
        <form class="" action="search.php" method="GET">
            <div class="text-center mt-2 border-0 mx-auto w-50 input-group">
                <input type="search" name="search" class="form-control rounded border-0" placeholder="Search">
                <button type="submit" class="btn ms-2 border-0" id="search_btn">Search</button>
            </div>
        </form>
    </div>

    <!-- playlist Search -->
    <div class="collapse" id="collapseExample1">
        <form action="playlist_search.php" method="GET">
            <div class="text-center mt-2 border-0 mx-auto w-50 input-group">
                <input type="search" name="search1" class="form-control py-3 rounded border-0" placeholder="Search">
                <button type="submit" class="btn rounded-start-0 border-0 px-3" id="search_btn"><i style="color: aliceblue!important;" class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>

    <script src="./css/bootstrap.bundle.min.js"></script>
    <script src="./css/jquery.min.js"></script>
    <script src="./css/owl.carousel.min.js"></script>
</body>

</html>