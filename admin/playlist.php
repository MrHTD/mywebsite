<?php

$page = "playlist";
$title = "Admin Playlist";

include "../config.php";

include "header.php";

?>

<div class="mx-4 mt-5">
    <a href="./add_playlist.php" class="btn float-end btn-login">ADD PLAYLIST</a>
    <h1 class="my-3 fw-bold">All PLAYLIST</h1>

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

            $sql = "SELECT * FROM `playlists` ORDER BY playlist_date DESC LIMIT {$offset},{$limit}";

            ?>

            <table class="table text-center overflow-scroll table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>S. NO</th>
                        <th>TITLE</th>
                        <th>DATE</th>
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
                            <td><?php echo $row['playlist_id'] ?></td>
                            <td><?php echo $row['playlist_name'] ?></td>
                            <td><?php echo $row['playlist_date'] ?></td>
                            <td>
                                <a href="edit_playlist.php?id=<?php echo $row['playlist_id'] ?>" class="btn btn-login" style="border: none!important;"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="delete_playlist.php?id=<?php echo $row['playlist_id'] ?>" class="btn btn-login" style="border: none!important;"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>

            <!-- pagination start -->
            <?php

            $sql1 = "SELECT * FROM `playlists`";

            $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

            if (mysqli_num_rows($result1) > 0) {

                $total_records = mysqli_num_rows($result1);

                $total_page = ceil($total_records / $limit);

                echo '<ul class="pagination justify-content-center">';

                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link shadow-lg border me-1 rounded-3 px-4" href="playlist.php?page=' . ($page - 1) . '">Previous</a></li>';
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="page-item ' . $active . '"><a class="page-link shadow-lg border me-1 rounded-3 px-4" href="playlist.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($total_page > $page) {
                echo '<li class="page-item"><a class="page-link shadow-lg border me-1 rounded-3 px-4" href="playlist.php?page=' . ($page + 1) . '">Next</a></li>';
            }

            echo '</ul>';

            ?>

        </div>
    </div>