<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    
    http_response_code(404);
    exit;
}
?>