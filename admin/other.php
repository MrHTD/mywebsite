<?php

$page = "user";
$title = "Admin Users";

include "../config.php";

include "header.php";

?>

<div class="mx-4 mt-5">
    <a href="add_user.php" class="btn float-end btn-login">ADD USER</a>
    <h1 class="my-3 fw-bold">All USER</h1>

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

            $sql = "SELECT * FROM `admin`
            ORDER BY admin_id DESC LIMIT {$offset},{$limit}";

            ?>
            <table class="table text-center table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>ROLE</th>
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
                            <td><?php echo $row['admin_id'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td>
                                <?php 
                                if($row['role'] == 1){
                                    echo 'Admin';
                                }else{
                                    echo 'Other';
                                }
                                 ?>
                            </td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $row['admin_id'] ?>" class="btn btn-login" style="border: none!important;"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="delete_user.php?id=<?php echo $row['admin_id'] ?>" class="btn btn-login" style="border: none!important;"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>

            <!-- pagination start -->
            <?php

            $sql1 = "SELECT * FROM `admin`";

            $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

            if (mysqli_num_rows($result1) > 0) {

                $total_records = mysqli_num_rows($result1);

                $total_page = ceil($total_records / $limit);

                echo '<ul class="pagination justify-content-center">';

                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link border-0 rounded px-4" href="playlist.php?page=' . ($page - 1) . '">Previous</a></li>';
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="page-item ' . $active . '"><a class="page-link border-0 rounded px-4" href="playlist.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($total_page > $page) {
                echo '<li class="page-item"><a class="page-link border-0 rounded px-4" href="playlist.php?page=' . ($page + 1) . '">Next</a></li>';
            }

            echo '</ul>';

            ?>

        </div>
    </div>