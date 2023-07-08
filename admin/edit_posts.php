<?php

include "../config.php";

$title = "Edit-Post";

include "header.php";

?>

<body>

    <div class="col-md-9 m-auto col-lg-6 shadow-lg px-5 py-5 my-3 rounded-3">

        <h2 class="text-center fw-bold">EDIT POST</h2>

        <?php

        $post_id = $_GET['id'];

        $sql = "SELECT * FROM `post`
        LEFT JOIN category ON post.category = category.category_id
        WHERE post_id={$post_id}";

        $fetch = mysqli_query($conn, $sql) or die("Query Failed");

        if (mysqli_num_rows($fetch)) {
            while ($row = mysqli_fetch_assoc($fetch)) {
                ?>

                <!-- Form Start -->
                <form action="save-update-post.php" method="POST" enctype="multipart/form-data">
                    <div class="row text-center">
                        <div class="col">
                        <input type="hidden" name="post_id" value="<?php echo $row['post_id'] ?>">
                        <label>Title</label>
                        <input type="text" name="posttitle" class="form-control py-2" value="<?php echo $row['title'] ?>"
                            required>
                        </div>
                        <div class="col">
                        <label>Author Name</label>
                        <input type="text" name="author" class="form-control py-2" value="<?php echo $row['author'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <label>Description</label>
                        <textarea name="postdesc" rows="10" class="form-control"
                            id="tiny"><?php echo $row['description'] ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Category</label>
                        <select name="category" class="form-select mx-auto" aria-label="Default select example"
                            value="<?php echo $row['category_name'] ?>">
                            <option selected disabled> Select Category</option>
                            <?php

                            $sql1 = "SELECT * FROM category";

                            $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if ($row['category'] == $row1['category_id']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }

                                    echo "<option {$selected} class='my-5 mx-5' value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Upload image</label>
                        <div class="my-3 col-6">
                            <img src="upload/<?php echo $row['post_img'] ?>" class="img-fluid rounded">
                        </div>
                        <input type="file" name="new_img" class="form-control">
                        <input type="hidden" name="old_img" value="<?php echo $row['post_img'] ?>">
                    </div>
                    <div class="my-3 text-center">
                        <input type="submit" name="upd_post" class="btn btn-login btn-danger btn-default w-100"
                            value="Update Post" />
                    </div>
                </form>

                <?php
            }
        }

        ?>

    </div>

    <script>
        tinymce.init({
            menubar: true,
            statusbar: false,
            selector: 'textarea#tiny',
            content_style: "*{margin: 0px;}",
        })
    </script>

</body>

</html>