<?php

    include_once 'includes/db_mysqli.php';


   $conn = mysqli_connect('localhost','syntraweb_loja','H++s_OO5@3P%');

   if(!$conn)
   {
       echo "Niet verbonden met database <br>";
   }
   else
   {
       echo "Verbinding met database gelukt! <br>";
   }

   if(!mysqli_select_db($conn,'syntraweb_loja'))
   {
       echo "database is niet geselecteerd <br>";
   }
    else
   {
       echo "Alle berichten verwijderd! <br>"; 
   }

   $id = $_GET['id'];

   $sql = "DELETE FROM news WHERE id = $id";

    $result = $conn->query($sql);   

    header("refresh:1;url=../index.php");

$con->close();


