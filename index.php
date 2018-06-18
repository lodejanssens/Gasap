<?php 

session_set_cookie_params(0, "/"); 
session_start();

$_SESSION['editor'] ?? $_SESSION['editor'] = false;

include_once 'includes/config.php'; // CONFIG

?>
<!DOCTYPE html>
<html lang=nl-BE>
<head>
<?php include_once 'includes/head.php';?>
</head>
<body>
<script type=text/javascript>window.onload=function(){(function(){var a=localStorage.getItem("visited");if(!a){document.getElementById("ftvb").style.visibility="visible";localStorage.setItem("visited",true)}})()};</script>
<div id=ftvb style=visibility:hidden>
<strong class=greeting></strong> Zoekt u de ideale partner voor het (her)lakken van metaalconstructies?<br> Dan bent u bij <?php echo $naam ?> aan het juiste adres! <a href="index.php?id=<?php echo $page5; ?>">Contacteer ons</a>
<span onclick="$(this).parent().hide();return false" id=ftvbc>&times;</span>
</div>
<?php
    if($maintenance == false)
{
    include_once 'includes/header.php'; //HEADER
}
?>
<?php $page = $page1; ?>
<?php

    if($maintenance == true)
{
    include_once('pages/maintenance.php');
}
else
{

    //session editor



        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "page1"; 
        }

                switch($id) 
            {
                default:
                include('pages/page1.php');

                break; case $page2:
                include('pages/page2.php');

                break; case $page3:
                include('pages/page3.php');

                break; case $page4:
                include('pages/page4.php');

                break; case $page5:
                include('pages/page5.php');

                break; case $page6:
                include('pages/page6.php');

                break; case $page7:
                include('pages/page7.php');

                break; case $page8:
                include('pages/page8.php');
            }

}

    if($maintenance == false)
{
    include_once 'includes/footer.php'; //FOOTER
}

?>
</body>
</html>