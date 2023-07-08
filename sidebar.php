<!-- side bar -->
<?php

include_once "header.php";

?>

<style>
    @media screen and (min-width: 768px) {
        .sidebar {
            margin-left: -0.5em;
        }
    }
</style>

<div class="col-lg-3 col-md-4 col-8 col-sm-8 mb-5 border-0 mx-auto rounded-3 sidebar shadow-lg border bg-white">

    <h3 class="mt-3" style="color: #f8002f!important;"><b>Recent Posts</b></h3>

    <?php

    $limit = 5;

    $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT {$limit}";

    $fetch = mysqli_query($conn, $sql);

    foreach ($fetch as $row) {
    ?>
        <div class="card border-bottom border-0" style="border-radius: 0!important;">

            <div class="col-lg-10 col-md-12 mx-auto mt-4">
                <img src="./admin/upload/<?php echo $row['post_img']; ?>" class="img-fluid rounded-3" alt="...">
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="card-body">
                    <h5 class="card-title fs-6"><?php echo $row['title']; ?></h5>
                    <small class="text-muted"><?php echo $row['author']; ?></small>
                    <small class="text-muted float-end"><?php echo $row['post_date']; ?></small>
                </div>
                <a href="view.php?id=<?php echo $row['post_id']; ?>" class="stretched-link"></a>
            </div>
        </div>
    <?php
    }
    ?>
</div>