<?php
// check
// include "check.php";

include "../config.php";

session_start();
if (isset($_SESSION["username"])) {
  header("Location: {$hostname}/admin/user.php");
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Login</title>
  <link href="./css/admin_css.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
  <script src="../css/bootstrap.bundle.min.js"></script>
</head>

<body>

  
  <div class="text-center mt-5">
    <img src="./upload/footer.png" class="img-thumbnail border-0 mx-auto" width="150" alt="">
</div>
  <div class="container d-flex justify-content-center align-items-center mt-2">
    <div class="p-5 rounded-4  border" style="width: 550px;">

      <h2 class="fw-bold">Admin</h2>
      <!-- Form Start -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal needs-validation" novalidate>

      <label for="validationCustom02" class="form-label">Username</label>
        <div class="form-group mb-3 shadow-lg rounded-4">
          <input type="text" name="username" class="form-control py-3 px-4 rounded-4" id="validationCustom02"
            placeholder="Username" required>
          <div class="invalid-feedback">
            Please Enter a username.
          </div>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>

        <label for="validationCustom02" class="form-label">Password</label>
        <div class="form-group mb-3 shadow-lg rounded-4">
          <input type="password" name="password" class="form-control py-3 px-4 rounded-4" id="validationCustom02"
            placeholder="Password" required>
          <div class="invalid-feedback">
            Please Enter a password.
          </div>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>

        <div class="text-center align-items-left">
          <input type="submit" name="login" class="btn btn-lg btn-login btn-default w-100 py-3" value="LOGIN" />
        </div>
      </form>

      <?php

      if (isset($_POST['login'])) {
        include "../config.php";

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = sha1($_POST['password']);

        $sql = "SELECT username, role FROM admin WHERE username = '{$username}' AND password = '{$password}'";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION["username"] = $row['username'];
            $_SESSION["user_role"] = $row['role'];
          }

        }

        if ($_SESSION["user_role"] == 1) {

          header("Location: {$hostname}/admin/user.php");

        } else if ($_SESSION["user_role"] == 2) {

          header("Location: {$hostname}/admin/post.php");

        } else {
          echo '<div class="alert alert-danger" role="alert">Username and Password are not matched.</div>';
        }
      }
      ?>

    </div>
  </div>

  <script src="./css/jquery.min.js"></script>
  <script src="./css/owl.carousel.min.js"></script>
  <script>// Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()</script>
</body>

</html>