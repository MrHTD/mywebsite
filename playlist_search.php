<?php

$title = "Playlists";

include "config.php";

include "header.php";

?>

<head>
    <link href="./css/card.css" rel="stylesheet">
</head>

<body>


    <?php

    if (isset($_GET['search1'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search1']);
    ?>
        <h1 class="mt-4 mb-4 text-center" style="color: #f8002f!important;"><b>Search: <?php echo $search; ?></b></h1>
        <title><?php echo $search; ?></title>

        <div class="cards-list">
            <?php

            $sql = "SELECT * FROM playlists
                    WHERE playlist_name LIKE '%{$search}%'
                    ORDER BY playlist_id DESC";

            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>

                    <div class="card mt-5 my-5">
                        <div class="card_image"> <img src="./images/<?php echo $row['playlist_image']; ?>" /> </div>
                        <div class="card_title">
                            <h5 class="mb-0 fs-5 btn w-100 mx-auto border-0" id="some-element"><b><?php echo $row['playlist_name']; ?></b></h5>
                            <a href="<?php echo $row['playlist_url']; ?>" class="stretched-link"></a>
                        </div>
                    </div>

        <?php
                }
            }
        } else {
            echo "No records";
        }
        ?>

        </div>

</body>
<div class="mt-5"></div>

<div class="text-center p-3" id="copyright"><span>© 2022 Copyright: Games Heaven</span></div>