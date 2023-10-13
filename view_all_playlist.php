<?php

$page = "view_all_playlists";
$title = "Playlists";

include "header.php";

?>

<head>
    <link href="./css/card.css" rel="stylesheet">
    <title><?php echo "$title"; ?></title>
</head>

<div class="container">
    <h1 class="text-center mt-4"><b style="color: #f8002f!important;">ALL PLAYLISTS</b></h1>
</div>

<div class="cards-list">

    <?php

    $sql = "SELECT * FROM playlists ORDER BY playlist_date DESC";

    $fetch = mysqli_query($conn, $sql);
    //Check if there is data
    $check_data = mysqli_num_rows($fetch) > 0;

    if ($check_data) {
        while ($row = mysqli_fetch_array($fetch)) {

    ?>

            <div class="card 1 my-5">
                <div class="card_image"> <img src="./admin/upload/<?php echo $row['playlist_image']; ?>" /> </div>
                <div class="card_title">
                    <h5 class="mb-0 fs-5 btn w-100 mx-auto border-0" id="some-element"><b><?php echo $row['playlist_name']; ?></b></h5>
                    <a href="<?php echo $row['playlist_url']; ?>" class="stretched-link"></a>
                </div>
            </div>

    <?php
        }
    }
    ?>

</div>

<div class="mt-5"></div>

<div class="text-center p-3" id="copyright"><span>© 2022 Copyright: Games Heaven</span></div>