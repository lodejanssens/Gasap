<?php 

//Admin config

$admin = "Lode";
$password = "123";
$maintenance = false;

//Webpages

    $page1 = "Home";
    $page2 = "Poederlakken";
    $page3 = "Poederlakinstallaties"; 
    $page4 = "Gasaplicaties"; 
    $page5 = "Contact"; 
    $page6 = "Admin"; 
    $page7 = "Algemene Verkoopsvoorwaarden";
    $page8 = "Privacy";

//Email Form

    $email = "lode.120@hotmail.com";
    $onderwerp = "Gasap - Klant";               //onderwerp email contact

// Bedrijf

    $naam = "Gasap";
    $titel = "- Poederlakkerij 9160 Lokeren";  
    $description = "Gasap, uw ideale partner om metalen voorwerpen van een sterke, esthetische en milieuvriendelijke coating te voorzien.";


//functions 

function url() {

    if($_SERVER['REQUEST_URI'] == '/stn18/loja/Eindwerk/Website/index.php?id=Home')
    {
        echo 'active';
    }

}

//Display images from folder

function randompics() {

    $files = glob("_img/album/*.*");
    for ($i=1; $i<count($files); $i++)
    {
        $num = $files[$i];
        echo '<img src="'.$num.'" alt="Afbeelding van Gasap">'."&nbsp;&nbsp;";
        }
        
}

//Recaptcha

    $siteKey = '6Lf7J1sUAAAAACNpyn5HJolqsK4Rfx5--JGZmLIU';
    $secret = '6Lf7J1sUAAAAAKCqhUBnzF-AkSWOA9l3myshioF0';
    $lang = 'nl';


// Nederlandse datum

$timestamp = time();
setlocale(LC_ALL, 'nl_NL');
strftime('%A, %B %d, %Y', $timestamp);

function dutch_strtotime($datetime) {
    $days = array(
        "maandag"   => "Monday",
        "dinsdag"   => "Tuesday",
        "woensdag"  => "Wednesday",
        "donderdag" => "Thursday",
        "vrijdag"   => "Friday",
        "zaterdag"  => "Saturday",
        "zondag"    => "Sunday"
    );

    $months = array(
        "januari"   => "January",
        "februari"  => "February",
        "maart"     => "March",
        "april"     => "April",
        "mei"       => "May",
        "juni"      => "June",
        "juli"      => "July",
        "augustus"  => "August",
        "september" => "September",
        "oktober"   => "October",
        "november"  => "November",
        "december"  => "December"
    );

    $array = explode(" ", $datetime);
    $array[0] = $days[strtolower($array[0])];
    $array[2] = $months[strtolower($array[2])];
    return strtotime(implode(" ", $array));
}

$sqldate = $value['datum'];
$date = dutch_strtotime($sqldate);

$vh = "[".date('j F Y', $date)."]"; //Haakjes rond datum

//DB Settings

$_SESSION['db_host'] = 'localhost';
$_SESSION['db_user'] = 'syntraweb_loja';
$_SESSION['db_pass'] = 'H++s_OO5@3P%';
$_SESSION['db_name'] = 'syntraweb_loja';
$_SESSION['db_charset'] = 'utf8';


//Login
$_SESSION['editor_login'] = $admin;
$_SESSION['editor_pass'] = $password;

//db_mysqli inladen
    require ("includes/db_mysqli.php"); 


//Toon foutmeldingen

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
?>



