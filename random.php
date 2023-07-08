<!-- side bar -->
<?php

include_once "header.php";

?>

<div class="card-group">
    <div class="container mb-2 shadow-lg rounded-3 border">
        <h3 class="mt-3 text-center" style="color: #f8002f!important;"><b>MORE FOR YOU</b></h3>
        <div class="row">
            <?php

            $limit = 8;

            $sql = "SELECT `title`, `description`,`post_date`, `author`, `post_img` FROM `post` ORDER BY post_id DESC LIMIT {$limit}";

            $fetch = mysqli_query($conn, $sql);

            $check_data = mysqli_num_rows($fetch) > 0;

            if ($check_data) {
                while ($row = mysqli_fetch_array($fetch)) {

            ?>
                    <div class="col-lg-3 border-bottom mt-3">
                        <div class="card border-0" style="border-radius: 0!important;">
                            <div class="mx-auto">
                                <img src="./admin/upload/<?php echo $row['post_img']; ?>" class="img-fluid rounded-3" alt="...">
                            </div>
                            <div class="">
                                <div class="card-body">
                                    <h5 class="card-title fs-6"><?php echo $row['title']; ?></h5>
                                    <small class="text-muted"><?php echo $row['author']; ?></small>
                                    <small class="text-muted float-end"><?php echo $row['post_date']; ?></small>
                                </div>
                            </div>

                        </div>
                    </div>

            <?php
                }
            }
            ?>
        </div>
    </div>
</div>


<!-- <div class="card-group">
    <div class="container py-5">
        <div class="row mt-4">
            <?php $sql = "SELECT * FROM post";
            $query_run = mysqli_query($conn, $sql);
            //Check if there is data
            $check_data = mysqli_num_rows($query_run) > 0;

            if ($check_data) {
                while ($row = mysqli_fetch_array($query_run)) {

            ?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="" class="card-img-top" alt="">
                                <h2 class="card-title"><?php echo $row['title']; ?></h2>
                                <h3 class="card-title"><?php echo $row['short_desc']; ?></h3>
                                <p class="card-text">
                                    <?php echo $row['long_desc']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div> -->