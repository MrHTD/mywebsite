<?php

$page = "";

$title = '';

include_once "header.php";

?>


<div class="container rounded-3 border my-5 shadow-lg">

    <?php

    $post_id = $_GET['id'];

    $sql = "SELECT * FROM `post`
    WHERE post.post_id = {$post_id}";

    $fetch = mysqli_query($conn, $sql);

    foreach ($fetch as $row) {

    ?>

        <title><?php echo $row['title']; ?></title>

        <h1 class="card-title fs-1 fw-bold pt-3" style="color: #f8002f!important;"><?php echo $row['title']; ?></h1>

    <?php

    }
    ?>

    <div class="gx-0">

        <div class="col-12">

            <?php

            $sql = "SELECT * FROM `post`
            LEFT JOIN category ON post.category = category.category_id
            WHERE post.post_id = {$post_id}";

            $fetch = mysqli_query($conn, $sql);

            foreach ($fetch as $row) {

            ?>

                <div class="card border-0 bg-white">

                    <div class="my-3">
                        <small class="text-muted">
                            <span>
                                <a href="author.php?aid=<?php echo $row['author']; ?>" class="text-decoration-none text-muted">
                                    <i class="fa-solid fa-user me-1"></i><?php echo $row['author']; ?>
                                </a>
                            </span>
                            <span>
                                <i class="fa-solid fa-layer-group mx-1"></i>
                                <a href="category.php?cid=<?php echo $row['category']; ?>" class="text-decoration-none text-muted">
                                    <?php echo $row['category_name']; ?>
                                </a>
                            </span>
                            <span><i class="fa-solid fa-clock mx-1"></i><?php echo $row['post_date']; ?></span>
                        </small>
                    </div>
                    <div class="col-lg-12 col-md-12 mx-auto col-sm-auto"
                            <div class="clearfix"> 
                                <img src="./admin/upload/<?php echo $row['post_img']; ?>." class="img-fluid col-md-6 float-md-start mb-3 me-3 rounded-3" alt="...">
                                <?php echo $row['description']; ?>
                            </div>
                        </div>
                    </div>

                </div>

            <?php
            }
            ?>

        </div>


    </div>
</div>

<?php
include "random.php";
?>
<?php include "footer.php" ?>