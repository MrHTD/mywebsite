<?php

$page = "about";
$title = "About Us";

include "config.php";

include 'header.php';

?>

<head>
    <title>
        <?php echo $title; ?>
    </title>
    <style>
        body {
            background-color: #FAF7FF;
        }

        h2 {
            color: #f8002f;
        }
    </style>
</head>

<!doctype html>
<html lang="en">

<body>

    <div class="container-fluid mt-4" style="width: 98%;">
        <div class="row">
            <div class="col-12 p-0 m-0 mx-auto rounded-4">

                <div class="my-3 shadow-lg rounded-1 border" style="border: 2px solid #f8002f!important;">
                    <h2 class="text-start fw-bold mt-2 ms-2">About Us</h2>
                    <p class="ms-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti veniam ut et ipsam
                        repellendus, repudiandae, rerum architecto odio fuga dolorem alias culpa nam modi! Explicabo
                        totam asperiores nisi eligendi tempore qui aspernatur ea laboriosam ipsum quisquam. Possimus
                        voluptates veniam dolores odit a doloremque facere fugiat quasi? Nostrum neque quos totam?</p>
                    <p class="ms-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti veniam ut et ipsam
                        repellendus, repudiandae, rerum architecto odio fuga dolorem alias culpa nam modi! Explicabo
                        totam asperiores nisi eligendi tempore qui aspernatur ea laboriosam ipsum quisquam. Possimus
                        voluptates veniam dolores odit a doloremque facere fugiat quasi? Nostrum neque quos totam?</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>