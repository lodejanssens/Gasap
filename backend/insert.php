<?php

    include_once 'includes/db_mysqli.php';


   $con = mysqli_connect('localhost','syntraweb_loja','H++s_OO5@3P%');

   if(!$con)
   {
       echo "Niet verbonden met database";
   }

   if(!mysqli_select_db($con,'syntraweb_loja'))
   {
       echo 'database is niet geselecteerd';
   }

   $titel = $_POST['titel'];
   $bericht = $_POST['bericht'];
   $datum = $_POST['datum'];

   $sql = "INSERT news (titel,bericht,datum) VALUES ('$titel','$bericht','$datum')";

   if(!mysqli_query($con,$sql))
   {
       echo "data is niet in database verwerkt";
   }
   else
   {
       echo "data is verwerkt!";
   }

   header("refresh:1;url=../index.php");



?>
