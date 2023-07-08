<?php

$title = "Add Post";

include "../config.php";

include "header.php";

?>

<body>

  <div class="container my-5">
    <div class="row">

      <div class="col-md-9 m-auto col-lg-6 shadow-lg px-5 py-5">

        <h2 class="text-center">Add Post</h2>
        <!-- Form Start -->
        <form action="save-post.php" method="POST" enctype="multipart/form-data">
          <div class="form-group my-3">
            <label>Title</label>
            <input type="text" name="posttitle" class="form-control py-2" placeholder="" required>
          </div>
          <div class="form-group my-3">
            <label>Author Name</label>
            <input type="text" name="author" class="form-control py-2" placeholder="" value="Admin" required>
          </div>
          <div class="form-group my-3">
            <label>Description</label>
            <textarea name="postdesc" rows="10" class="form-control" id="tiny"></textarea>
          </div>
          <div class="form-group my-3">
            <label>Category</label>
            <select name="category" class="form-select" aria-label="Default select example">
              <option selected disabled> Select Category</option>
              <?php

              $sql = "SELECT * FROM category";

              $result = mysqli_query($conn, $sql) or die("Query Failed.");

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option class='my-5 mx-5' value='{$row['category_id']}'>{$row['category_name']}</option>";
                }
              }

              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Upload image</label>
            <input type="file" class="form-control mt-2" name="fileToUpload" required>
          </div>
          <div class="my-3 text-center">
            <input type="submit" name="add_post" class="btn btn-login btn-danger btn-default col-12" value="Add Post" />
          </div>
        </form>

      </div>

    </div>
  </div>

  <script>
    tinyMCE.init({
      menubar: false,
      statusbar: false,
      selector: 'textarea#tiny',
      content_style: "*{margin: 0px;}",
    });
  </script>

</body>

</html>