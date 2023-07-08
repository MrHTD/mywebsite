<?php

$page = "contact";
$title = "Contact";

include "config.php";

include 'header.php';

?>

<head>
    <title><?php echo $title; ?></title>
    <style>
        body {
            background-color: #FAF7FF;
        }

        h2 {
            color: #f8002f;
        }

        input:invalid {
            border-color: blue!important;
        }

        input,
        input:valid {
            border-color: #ccc!important;
        }

        input[type=text],
        input[type=email],
        input[type=number] {
            box-shadow: none !important;
            border: none !important;
            font-weight: 900;
            font-size: 1.1em !important;
            color: #f8002f;
        }

        input[type=text]:focus,
        input[type=email]:focus,
        input[type=number]:focus {
            color: #f8002f;
            border: none !important;
        }

        input::placeholder {
            font-weight: 900;
            opacity: .5 !important;
            font-size: 1.1em;
        }

        textarea {
            box-shadow: none !important;
            border: none !important;
            color: #f8002f !important;
            font-weight: 900 !important;
            font-size: 1.1em !important;
        }

        textarea::placeholder {
            font-weight: 900;
            opacity: .5 !important;
            font-size: 1.1em;
        }
    </style>
</head>

<!doctype html>
<html lang="en">

<body>

    <div class="container mt-4">
        <div class="row">

            <div class="col-lg-5 col-md-6 mx-auto rounded-4">

                <h2 class="text-center fw-bold">SEND US A MESSAGE</h2>
                <!-- Form Start -->
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="">
                    <div class="form-group my-3 shadow-lg rounded-4">
                        <input type="text" name="username" class="form-control py-4 px-4 rounded-4" placeholder="Full Name" required>
                    </div>
                    <div class="form-group my-3 shadow-lg rounded-4">
                        <input type="email" name="username" class="form-control py-4 px-4 rounded-4" placeholder="Email" required>
                    </div>
                    <div class="form-group my-3 shadow-lg rounded-4">
                        <input type="number" name="username" class="form-control py-4 px-4 rounded-4" placeholder="Phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Only Contains Number" required>
                    </div>
                    <div class="form-group my-3 shadow-lg rounded-4">
                        <textarea name="" class="form-control rounded-4 px-4 pt-3" cols="30" rows="7" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="login" class="btn py-3 rounded-4 w-100 fw-bold shadow-lg rounded-4 fs-5" value="S E N D" />
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>