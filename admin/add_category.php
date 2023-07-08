<?php

$title = "Add Category";

include "../config.php";

include "header.php";

?>

<body>

  <div class="container my-5">
    <div class="row">

      <div class="col-md-9 m-auto col-lg-6 shadow-lg px-5 py-5">

        <h2 class="text-center">Add Category</h2>
        <!-- Form Start -->
        <form action="save-category.php" method="POST">

          <div class="form-group my-3">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control py-2" placeholder="" required>
          </div>

          <div class="my-3 text-center">
            <input type="submit" name="addcategory" class="btn btn-login btn-danger btn-default col-12" value="Add Category" />
          </div>
        </form>

      </div>

    </div>
  </div>

</body>

</html>