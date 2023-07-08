<?php

$title = "Videos";

include "config.php";

include "header.php";

?>

<head>
    <style>
        @media only screen and (min-width: 768px) {
            iframe {
                height: 20em;
                border-radius: 20px;
            }
        }
        div{
            border-radius: 20px!important;
        }
    </style>
</head>

<body>

    <div class="row mx-5 mt-5">

        <div class="col-lg-3 col-md-7 col-sm-auto">
            <div class="card">
                <iframe src="https://www.youtube.com/embed/pWahNIMRxR0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Card title</h5>
                    <a href="" class="stretched-link"></a>
                </div>
            </div>
        </div>

    </div>

</body>