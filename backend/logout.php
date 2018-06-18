<?php 
    session_start();
    $_SESSION['editor'] = false; 
    session_destroy();
    header( "Refresh:0; url=../index.php?id=Admin", true, 303);
    exit;

?>