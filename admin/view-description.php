<?php

include "../config.php";

$title = "View Description";

include "header.php";

?>

<head>
    <style>
        textarea {
            max-width: 100%;
            resize: none;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="col-lg-10 col-md-10 col-sm-8 col-10 offset-lg-1 offset-md-1 offset-sm-3 offset-1">

        <div class="row">
            <div class="col-2">
                <a href="post.php" class="text-decoration-none">
                    <h2 class="mt-5 fw-bold text-center">◄Go back</h2>
                </a>
            </div>
            <div class="col-8">
                <h2 class="mt-5 fw-bold text-center text-uppercase">View Description</h2>
            </div>
        </div>

        <?php

        $post_id = $_GET['id'];

        $sql = "SELECT * FROM `post` WHERE post_id={$post_id}";

        $fetch = mysqli_query($conn, $sql) or die("Query Failed");

        if (mysqli_num_rows($fetch)) {
            while ($row = mysqli_fetch_assoc($fetch)) {
        ?>

                <div class="form-group my-3">
                    <textarea id="tiny" class="autosize">
                    <?php echo strip_tags($row['description']); ?>
                    </textarea>
                </div>
                
        <?php
            }
        }

        ?>

    </div>

    <script>
        tinymce.init({
            menubar: false,
            statusbar: false,
            toolbar: false,
            height: "480",
            selector: 'textarea#tiny',
            content_style: "*{margin: 0px;}",
        })
    </script>

</body>

</html>