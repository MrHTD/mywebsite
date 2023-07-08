<!-- pagination start -->
<?php

$sql1 = "SELECT * FROM `post`";

$result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

if (mysqli_num_rows($result1) > 0) {

    $total_records = mysqli_num_rows($result1);

    $total_page = ceil($total_records / $limit);

    echo '<ul class="pagination justify-content-center">';

    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link border-0 rounded-3 px-4" href="index.php?page=' . ($page - 1) . '">Previous</a></li>';
    }

    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo '<li class="page-item ' . $active . '"><a class="page-link border-0 rounded-3 px-4" href="index.php?page=' . $i . '">' . $i . '</a></li>';
    }
}
if ($total_page > $page) {
    echo '<li class="page-item"><a class="page-link border-0 rounded-3 px-4" href="index.php?page=' . ($page + 1) . '">Next</a></li>';
}

echo '</ul>';

?>