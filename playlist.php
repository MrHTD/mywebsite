<?php

$page = "Playlists";
$title = "Playlists";

include_once "header.php";

?>

<section id="slider" class="pt-5 my-5 border-top">
    <div class="mx-5">
        <h1 class="text-center"><b style="color: #f8002f!important;">PLAYLISTS</b></h1>
        <div class="slider">
            <div class="owl-carousel">

                <?php

                $limit = 100;

                $sql = "SELECT * FROM playlists ORDER BY playlist_date DESC LIMIT {$limit}";

                $fetch = mysqli_query($conn, $sql);
                //Check if there is data
                $check_data = mysqli_num_rows($fetch) > 0;

                if ($check_data) {
                    while ($row = mysqli_fetch_array($fetch)) {

                ?>

                        <div class="slider-card border">
                            <div class="d-flex justify-content-center align-items-center mx-2 mx-md-3 my-3">
                                <img src="./admin/upload/<?php echo $row['playlist_image']; ?>" class="img-fluid" alt="">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="mb-0"><b><?php echo $row['playlist_name']; ?></b></h5>
                                <p class="p-2"><small class="text-muted text-uppercase">Playlist Created: <?php echo $row['playlist_date']; ?></small></p>
                                <a href="<?php echo $row['playlist_url']; ?>" class="btn btn-play mb-4 px-5 stretched-link">View Playlist</a>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>

<script>
    // Owlcarousel
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            center: true,
            navText: [
                "<i class='btn btn-lg fa fa-angle-left mx-3'></i>",
                "<i class='btn btn-lg fa fa-angle-right mx-3'></i>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                991: {
                    items: 4
                },
                1200: {
                    items: 4
                },
                1920: {
                    items: 5
                }
            }
        });
    });
</script>