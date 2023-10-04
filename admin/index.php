<?php
// check
// include "check.php";

include "../config.php";

if (isset($_SESSION["username"])) {
  session_start();
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
    <div class="p-5 rounded-4 shadow-lg border" style="width: 550px;">

      <h2 class="fw-bold">Admin</h2>
      <!-- Form Start -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal needs-validation" novalidate>
        <div class="form-group my-3">
          <label for="validationCustom02" class="form-label">Username</label>
          <input type="text" name="username" class="form-control form-control-lg" id="validationCustom02"
            placeholder="Username" required>
          <div class="invalid-feedback">
            Please Enter a username.
          </div>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="form-group my-3">
          <label for="validationCustom02" class="form-label">Password</label>
          <input type="password" name="password" class="form-control form-control-lg" id="validationCustom02"
            placeholder="Password" required>
          <div class="invalid-feedback">
            Please Enter a password.
          </div>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="text-center">
          <input type="submit" name="login" class="btn btn-lg btn-login btn-default col-12" value="L O G I N" />
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