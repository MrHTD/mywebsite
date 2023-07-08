<?php

$title = '';

include "config.php";

include "header.php";

?>

<body>

    <div class="container mt-5">

        <div class="row">

            <div class="col-lg-8 me-5 col-md-7 col-sm-auto">

                <?php

                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                ?>
                    <h1 class="mt-4 mb-4" style="color: #f8002f!important;"><b>Search: <?php echo $search; ?></b></h1>
                    <title><?php echo $search; ?></title>
                    <?php

                    /* Calculate Offset Code */
                    $limit = 5;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;

                    $sql = "SELECT * FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN admin ON post.author = admin.admin_id
                    WHERE title LIKE '%{$search}%' OR description LIKE '%{$search}%'
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                            <div class="card mb-4 border-0 rounded-3 shadow-lg p-3 pb-0">
                                <div class="row g-0">
                                    <a href="view.php?id=<?php echo $row['post_id'] ?>" class="stretched-link"></a>
                                    <input type="hidden" name="title" value="<?php echo $row['title'] ?>">
                                    <div class="col-lg-4 col-md-12">
                                        <img src="./admin/upload/<?php echo $row['post_img']; ?>" class="img-fluid img-responsive rounded-3" alt="...">
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="card-body pt-0 pe-0 pb-0">
                                            <h5 class="card-title fw-bold mt-0" style="font-size: 1.3em;">
                                                <?php
                                                echo $row['title']; ?>
                                            </h5>
                                            <p class="card-text">
                                                <?php
                                                $text = $row['description'];
                                                echo substr_replace($text, "...", +250);
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header border-0 bg-white py-2 p-0">
                                    <small class="text-muted"><i class="fa-regular fa-user me-1" style="color: red!important;"></i><?php echo $row['author']; ?></small>
                                    <small class="text-muted float-end"><i class="fa-regular fa-clock me-1"></i><?php echo $row['post_date']; ?></small>
                                </div>
                            </div>

                <?php
                        }
                    }
                } else {
                    echo "<h2>No Record Found.</h2>";
                }

                // pagination
                $sql1 = "SELECT * FROM post
                WHERE post.title LIKE '%{$search}%'";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if (mysqli_num_rows($result1) > 0) {

                    $total_records = mysqli_num_rows($result1);

                    $total_page = ceil($total_records / $limit);

                    echo '<ul class="pagination justify-content-center">';
                    if ($page > 1) {
                        echo '<li class="page-item"><a class="page-link border shadow-lg rounded px-4" href="index.php?search=' . $search . '&page=' . ($page - 1) . '">Next</a></li>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="page-item ' . $active . '"><a class="page-link shadow-lg rounded mx-1 px-4" href="index.php?search.php?search=' . $search . '&page=' . $i . '">' . $i . '</a></li>';
                    }
                    if ($total_page > $page) {
                        echo '<li class="page-item"><a class="page-link border shadow-lg rounded px-4" href="index.php?search=' . $search . '&page=' . ($page + 1) . '">Next</a></li>';
                    }

                    echo '</ul>';
                } else {
                    echo "<h2>No Record Found.</h2>";
                }
                ?>

            </div>
            <?php
            include "sidebar.php";
            ?>

        </div>
    </div>

</body>
<?php

include "playlist.php";

include 'footer.php';

?>