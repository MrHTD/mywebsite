<?php

include "../config.php";

$title = "Edit-User";

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

    <div class="col-lg-6 col-md-10 offset-3">

        <h2 class="text-center mt-5 fw-bold">EDIT USER</h2>

        <?php

        $user_id = $_GET['id'];

        $sql = "SELECT * FROM `admin` WHERE admin_id={$user_id}";

        $fetch = mysqli_query($conn, $sql) or die("Query Failed");

        if (mysqli_num_rows($fetch)) {
            while ($row = mysqli_fetch_assoc($fetch)) {
        ?>

                <!-- Form Start -->
                <form action="save-update-user.php" method="POST">
                    <div class="form-group my-3">
                        <input type="hidden" name="user_id" value="<?php echo $row['admin_id'] ?>">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control py-2" value="<?php echo $row['username'] ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control py-2 mb-2" id="pass" value="<?php echo $row['username'] ?>" required>
                        <input class="form-check-input" type="checkbox" onclick="showpass()">
                        <label class="form-check-label">Show Password</label>
                    </div>
                    <div class="form-group my-3">
                        <label>Role</label>
                        <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                        <option disabled selected>Select Role</option>
                            <?php
                              if($row['role'] == 1){
                                echo "<option value='1' selected>Admin</option>
                                      <option value='2'>Other</option>";
                              }else{
                                echo "<option value='1'>Admin</option>
                                      <option value='2' selected>Other</option>";
                              }
                            ?>
                          </select>
                    </div>
                    <div class="my-3 text-center">
                        <input type="submit" name="upd_user" class="btn btn-login btn-danger btn-default col-12" value="Update User" />
                    </div>
                </form>

        <?php
            }
        }

        ?>

    </div>

    <script>
        function showpass() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>