<?php

$page = "category";
$title = "Admin Categorys";

include "../config.php";

include "header.php";

// msg
if(isset($_GET['msg'])) {
    $message = "<div class='alert alert-success text-center' id='mesg' role='alert'>CATEGORY UPDATED SUCCESSFULLY</div>";
    echo $message;
}else{
    echo '';
}

?>

<div class="mx-4 mt-5">
    <a href="add_category.php" class="btn float-end btn-login">ADD CATEGORY</a>
    <h1 class="my-3 fw-bold">All CATEGORY</h1>

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

            $sql = "SELECT * FROM `category`
            ORDER BY category.category_id DESC LIMIT {$offset},{$limit}";

            ?>

            <table class="table text-center table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>CATEGORY ID</th>
                        <th>CATEGORY NAME</th>
                        <th>POSTS COUNT</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $fetch = mysqli_query($conn, $sql);

                    foreach ($fetch as $row) {

                    ?>
                        <tr>
                            <td><?php echo $row['category_id'] ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['post'] ?></td>
                            <td>
                                <a href="edit_category.php?id=<?php echo $row['category_id'] ?>" class="btn btn-login" style="border: none!important;"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="delete_category.php?id=<?php echo $row['category_id'] ?>" class="btn btn-login" style="border: none!important;"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>


                </tbody>
            </table>

            <!-- pagination start -->
            <?php

            $sql1 = "SELECT * FROM `category`";

            $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

            if (mysqli_num_rows($result1) > 0) {

                $total_records = mysqli_num_rows($result1);

                $total_page = ceil($total_records / $limit);

                echo '<ul class="pagination justify-content-center">';

                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link border-0 rounded" href="category.php?page=' . ($page - 1) . '">Previous</a></li>';
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="page-item ' . $active . '"><a class="page-link border-0 rounded px-4" href="category.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($total_page > $page) {
                echo '<li class="page-item"><a class="page-link border-0 rounded" href="category.php?page=' . ($page + 1) . '">Next</a></li>';
            }

            echo '</ul>';

            ?>

        </div>
    </div>

    <script>
        $('#mesg').delay(1000).hide(0);
    </script>