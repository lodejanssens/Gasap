<div class="adminalert">
<?php
        if($_SESSION['editor'] == true) {
        echo '<h4><a href="index.php?id='.$page6.'"> adminmode </a></h4>';
        echo '<p>Welkom'.' '.$admin.'!'.'</p>';
        echo '<a href="backend/logout.php">Logout</a>';
        }
    ?>
</div>
<header>
<figure id="logo">
<a href="index.php"><img src="_img/logovector.svg" alt="Logo  <?php echo $naam; ?> "></a>
</figure>
<div id="slideshow">
<div><img src="_img/slide1.jpg" alt="slide1"></div>
<div><img src="_img/slide2.jpg" alt="slide2"></div>
<div><img src="_img/slide3.jpg" alt="slide3"></div>
</div>
</header>
<hr>
<nav id="stickynav">
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page1) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page1;?>"><?php echo $page1;?></a>
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page2) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page2;?>"><?php echo $page2;?></a>
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page3) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page3;?>"><?php echo $page3;?></a>
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page4) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page4;?>"><?php echo $page4;?></a>
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page5) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page5;?>"><?php echo $page5;?></a>
</nav>
<div id="mobtn"><a href="#" title="menu">☰</a></div>
<div class="m-nav-wrapper">
<nav id="dropdown">
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page1) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page1;?>"><?php echo $page1;?></a>
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page2) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page2;?>"><?php echo $page2;?></a>
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page3) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page3;?>"><?php echo $page3;?></a>
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page4) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page4;?>"><?php echo $page4;?></a>
<a class="<?php if(strpos($_SERVER['REQUEST_URI'], $page5) !== false) {echo "active";}?>" href="index.php?id=<?php echo $page5;?>"><?php echo $page5;?></a>
</nav>
</div>
<script>$(document).ready(function(){var a=$("#stickynav").offset().top;var b=function(){var c=$(window).scrollTop();if(c>a){$("#stickynav").addClass("sticky")}else{$("#stickynav").removeClass("sticky")}};b();$(window).scroll(function(){b()})});</script>