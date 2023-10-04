<?php

$page = "posts";
$title = "Admin Posts";

include "../config.php";

include "header.php";

?>

<div class="mx-4 mt-5">
    <a href="./add_posts.php" class="btn float-end btn-login">ADD POSTS</a>
    <h1 class="my-3 fw-bold">All POSTS</h1>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-auto">

            <?php

            $limit = 10;
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $offset = ($page - 1) * $limit;

            $sql = "SELECT * FROM `post`
            LEFT JOIN category ON post.category = category.category_id
            ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

            ?>

            <table class="table text-center table-responsive table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>S. NO</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>CATEGORY ID</th>
                        <th>DATE</th>
                        <th>AUTHOR ID</th>
                        <th>EDIT</th>
                        <?php
                        if ($_SESSION["user_role"] == 1) {
                        ?>
                        <th>DELETE</th>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $fetch = mysqli_query($conn, $sql);

                    foreach ($fetch as $row) {

                        ?>
                        <tr>
                            <td>
                                <?php echo $row['post_id'] ?>
                            </td>
                            <td>
                                <?php echo $row['title'] ?>
                            </td>
                            <td>
                                <a href="view-description.php?id=<?php echo $row['post_id'] ?>" class="btn btn-login"
                                    style="border: none!important;">View</a>
                            </td>
                            <td>
                                <?php echo $row['category_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['post_date'] ?>
                            </td>
                            <td>
                                <?php echo $row['author'] ?>
                            </td>
                            <td>
                                <a href="edit_posts.php?id=<?php echo $row['post_id'] ?>" class="btn btn-login"
                                    style="border: none!important;"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <?php
                            if ($_SESSION["user_role"] == 1) {
                                ?>
                                <td>
                                    <a href="delete_posts.php?id=<?php echo $row['post_id'] ?>" class="btn btn-login"
                                        style="border: none!important;"><i class="fa-solid fa-trash"></i></a>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>


                </tbody>
            </table>

            <!-- pagination start -->
            <?php

            $sql1 = "SELECT * FROM `post`";

            $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

            if (mysqli_num_rows($result1) > 0) {

                $total_records = mysqli_num_rows($result1);

                $total_page = ceil($total_records / $limit);

                echo '<ul class="pagination justify-content-center">';

                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link border-0 rounded" href="post.php?page=' . ($page - 1) . '">Previous</a></li>';
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="page-item ' . $active . '"><a class="page-link border-0 rounded px-4" href="post.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($total_page > $page) {
                echo '<li class="page-item"><a class="page-link border-0 rounded" href="post.php?page=' . ($page + 1) . '">Next</a></li>';
            }

            echo '</ul>';

            ?>

        </div>
    </div>