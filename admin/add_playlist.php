<?php

$title = "Add Playlist";

include "../config.php";

include "header.php";

?>

<body>

  <div class="container my-5">
    <div class="row">

      <div class="col-md-9 m-auto col-lg-6 shadow-lg px-5 py-5">

        <h2 class="text-center">Add Playlist</h2>
        <!-- Form Start -->
        <form action="save-playlist.php" method="POST" enctype="multipart/form-data">

          <div class="form-group my-3">
            <label>Title</label>
            <input type="text" name="playlist_name" class="form-control py-2" placeholder="" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Upload image</label>
            <input type="file" class="form-control mt-2" name="fileToUpload" required>
          </div>

          <div class="form-group my-3">
            <label>YouTube Playlist Date</label>
            <input type="datetime-local" name="playlist_date" class="form-control py-2" placeholder="" required>
          </div>

          <div class="form-group my-3">
            <label>YouTube Playlist URL</label>
            <input type="url" name="playlist_url" class="form-control py-2" placeholder="" required>
          </div>

          <div class="my-3 text-center">
            <input type="submit" name="addplaylist" class="btn btn-login btn-danger btn-default col-12" value="Add Playlist" />
          </div>
        </form>

      </div>

    </div>
  </div>

  <script src="./css/jquery.min.js"></script>

</body>

</html>