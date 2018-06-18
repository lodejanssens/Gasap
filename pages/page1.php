<?php
//Haal gegevens van database
$result = db_read('SELECT * FROM news ORDER BY id DESC LIMIT 0, 5');

$currentpage = $page1;
?>
<main class="flex">
<article class="flex">
<p>Gasap, uw ideale partner om metalen voorwerpen van een sterke, esthetische en milieuvriendelijke coating te voorzien.</p>
<h1 style='font-size:1.4em'>Aankondigingen <?php echo $naam; ?> </h1>
<?php

foreach($result as $value)

{
    print "<div class='newscontainer'>"; 
    print "<section class='newsbox' id='".$value['id'].">";
    print "<h1  value=".$value['id']." name=".$value['id']." id='".$value['id']."'>".$value['titel']."</h1>";
    print "<p>".$value['bericht']."</p>"; 
    print "<h5>".$vh."</h5>";
    if($_SESSION['editor'] == true)
    {
    print   "<h5><a class='del' href='backend/delete.php?id=".$value['id']."'>Verwijder bericht</a></h5>"; 
    } 
    print "<hr>"; 
    print "<br>";
    print "</section>";
    print "</div";
}
?>
</div>
</article>
<aside>
<div class="imagecontainer">
<div class="imgwrapper">
<figure>
<img src="_img/album/IMG_1445.jpg" alt="Ralkleuren Gasap">
<figcaption>Afbeelding</figcaption>
</figure>
</div>
</aside>
</main>