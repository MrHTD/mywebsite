<?php

$title = "Add User";

include "../config.php";

include "header.php";

if (isset($_POST["add_user"])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $Password = mysqli_real_escape_string($conn, SHA1($_POST['password']));

    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $sql = "SELECT username FROM admin WHERE username = '{$username}'";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");

    if(mysqli_num_rows($result) > 0){
        echo "<div class='alert alert-danger text-center' role='alert'>Username already exists</div>";
    }else{
        $sql1 = "INSERT INTO `admin`(`username`, `password`, `role`) 
                 VALUES ('$username','$Password','$role')";
        if(mysqli_query($conn, $sql1)){
            header("Location: {$hostname}/admin/user.php");
        }else{
            echo " query Failed";
        }
    }

}

?>

<style>

</style>

<body>

    <div class="container my-5">
        <div class="row">

            <div class="col-md-9 m-auto col-lg-6 shadow-lg px-5 py-5">

                <h2 class="text-center fw-bold">Add User</h2>
                <!-- Form Start -->
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group my-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control py-2" placeholder="" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control py-2 mb-2" id="pass" required>
                        <input class="form-check-input" type="checkbox" onclick="showpass()">
                        <label class="form-check-label">Show Password</label>
                    </div>
                    <div class="form-group my-3">
                        <label>Role</label>
                        <select name="role" class="form-select" aria-label="Default select example">
                            <option selected disabled> Select Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Other</option>
                        </select>
                    </div>
                    <div class="my-3 text-center">
                        <input type="submit" name="add_user" class="btn btn-login btn-danger btn-default col-12" value="Add User" />
                    </div>
                </form>

            </div>

        </div>
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
    <script src="./css/jquery.min.js"></script>
    <script src="./css/owl.carousel.min.js"></script>
</body>

</html>