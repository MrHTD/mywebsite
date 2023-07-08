<?php

include "../config.php";

$title = "Edit-Category";

?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "$title"; ?></title>
    <link href="./css/admin_css.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <script src="../css/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="col-lg-4 col-md-10 col-sm-auto mx-auto">

        <h2 class="text-center mt-5 fw-bold">EDIT CATEGORY</h2>
        <?php

        $category_id = $_GET['id'];

        $sql = "SELECT * FROM `category`
        WHERE category_id={$category_id}";

        $fetch = mysqli_query($conn, $sql) or die("Query Failed");

        if (mysqli_num_rows($fetch)) {
            while ($row = mysqli_fetch_assoc($fetch)) {
        ?>

                <!-- Form Start -->
                <form action="save-update-category.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <input type="hidden" name="category_id" value="<?php echo $row['category_id'] ?>">
                        <label>Category Name</label>
                        <input type="text" name="category_name" class="form-control py-3" value="<?php echo $row['category_name'] ?>" required>
                    </div>
                    <div class="my-3 text-center">
                        <input type="submit" name="upd_category" class="btn btn-login btn-danger btn-default w-100 py-3" value="Update Category" />
                    </div>
                </form>

        <?php
            }
        }

        ?>

    </div>

</body>

</html>