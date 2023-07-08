<?php

$title = "";

include 'header.php';

?>

<body>


    <div class="container mt-5">

        <div class="row">

            <div class="col-lg-10 mx-auto col-md-7 col-sm-auto">

                <?php

                $sql1 = "SELECT * FROM `category` WHERE category_id = {$cat_id}";

                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                $row1 = mysqli_fetch_assoc($result1);

                $title = $row1['category_name'];

                ?>
                
                <title><?php echo $title ?></title>

                <h1 class="mt-4 mb-4" style="color: #f8002f!important;"><b><?php echo $row1['category_name'] ?></b></h1>


                <?php

                if (isset($_GET['cid'])) {
                    $cat_id = $_GET['cid'];
                }

                $limit = 5;

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                $offset = ($page - 1) * $limit;

                $sql = "SELECT * FROM `post`
                LEFT JOIN category ON post.category = category.category_id
                WHERE post.category = {$cat_id}
                ORDER BY post_id DESC LIMIT {$offset},{$limit}";

                $fetch = mysqli_query($conn, $sql);

                $check_data = mysqli_num_rows($fetch) > 0;

                if ($check_data) {
                    while ($row = mysqli_fetch_array($fetch)) {

                ?>

                        <div class="card mb-4 border rounded-3 shadow-lg p-3">
                            <div class="row g-0">
                                <a href="view.php?id=<?php echo $row['post_id'] ?>" class="stretched-link"></a>
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
                            <div class="card-header p-0 py-2 border-border-bottom bg-white">
                                <small class="text-muted"><i class="fa-regular fa-user me-1" style="color: red!important;"></i><?php echo $row['author']; ?></small>
                                <small class="text-muted float-end"><i class="fa-regular fa-clock me-1"></i><?php echo $row['post_date']; ?></small>
                            </div>
                        </div>

                <?php
                    }
                }

                // pagination
                if (mysqli_num_rows($result1) > 0) {

                    $total_records = $row1['post'];

                    $total_page = ceil($total_records / $limit);

                    echo '<ul class="pagination justify-content-center">';

                    if ($page > 1) {
                        echo '<li class="page-item"><a class="page-link border border shadow-lg rounded px-4" href="category.php?cid=' . $cat_id . '&page=' . ($page - 1) . '">Previous</a></li>';
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="page-item ' . $active . '"><a class="page-link shadow-lg rounded mx-1 px-4" href="category.php?cid=' . $cat_id . '&page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                if ($total_page > $page) {
                    echo '<li class="page-item"><a class="page-link border shadow-lg rounded px-4" href="category.php?cid=' . $cat_id . '&page=' . ($page + 1) . '">Next</a></li>';
                }

                echo '</ul>';

                ?>

            </div>

        </div>
    </div>

</body>

<?php

include 'footer.php';

?>