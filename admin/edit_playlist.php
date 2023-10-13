<?php

include "../config.php";

$title = "Edit-Post";

?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo "$title"; ?>
    </title>
    <link href="./css/admin_css.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <script src="../css/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="col-lg-6 col-md-10 offset-3">

        <h2 class="text-center mt-5 fw-bold">EDIT PLAYLIST</h2>
        <?php

        $playlist_id = $_GET['id'];

        $sql = "SELECT * FROM `playlists`
        WHERE playlist_id={$playlist_id}";

        $fetch = mysqli_query($conn, $sql) or die("Query Failed");

        if (mysqli_num_rows($fetch)) {
            while ($row = mysqli_fetch_assoc($fetch)) {
                ?>

                <!-- Form Start -->
                <form action="save-update-playlist.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <input type="hidden" name="playlist_id" value="<?php echo $row['playlist_id'] ?>">
                        <label>Title</label>
                        <input type="text" name="playlist_name" class="form-control py-2"
                            value="<?php echo $row['playlist_name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Upload image</label>
                        <div class="col-4 my-3">
                            <img src="upload/<?php echo $row['playlist_image'] ?>" class="img-fluid rounded">
                        </div>
                        <input type="file" name="new_img">
                        <input type="hidden" name="old_img" value="<?php echo $row['playlist_image'] ?>">
                    </div>
                    <div class="form-group my-3">
                        <label>YouTube Playlist Date</label>
                        <input type="date" name="playlist_date" class="form-control py-2" placeholder="" value="<?php echo $row['playlist_date'] ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>YouTube Playlist URL</label>
                        <input type="url" name="playlist_url" class="form-control py-2" placeholder=""
                            value="<?php echo $row['playlist_url'] ?>" required>
                    </div>
                    <div class="my-3 text-center">
                        <input type="submit" name="upd_playlist" class="btn btn-login btn-danger btn-default col-12"
                            value="Update Playlist" />
                    </div>
                </form>

                <?php
            }
        }

        ?>

    </div>

</body>

</html>