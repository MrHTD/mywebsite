<?php

include "../config.php";

if (!isset($_SESSION["username"])) {
  header("Location: {$hostname}/admin/");
}

?>

<footer class="footer mt-auto py-3 bg-light shadow-lg">

  <div class="container text-center">
    <span class="">Place sticky footer content here.</span>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>