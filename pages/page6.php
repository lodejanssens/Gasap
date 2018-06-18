<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>$("#adminpanel").hide();$('.nicEdit-main').attr('contenteditable','false');$('.nicEdit-panel').hide();</script>
<?php

$currentpage = $page6;
$feedback = "";

//login

                if(isset($_POST['submit']))
                {
                   $feedback = "submit";
                    if($_SESSION['editor_login'] == $_POST['username'] && $_SESSION['editor_pass'] == $_POST['password'] && $_POST['g-recaptcha-response']){
                        
                            $feedback = "<p>ingelogd!</p>";
                            $_SESSION['editor']= true;
                            echo "<meta http-equiv='refresh' content='0'>";
                            echo "<script>";
                            echo "$('#ftvb').hide()";
                            echo "</script>";
                            
                            
                        } 
                        else
                        {
                            $feedback = "Verkeerd wachtwoord, username of capacha.";
                            $_SESSION['editor']= false; 
                            session_destroy();
                            header("Location: login.php");

                            
                        }
                }


?>
<main class="flex">
<article class="flex">
<h3>
<?php echo $page6; ?>
</h3>
<div id="adminpanel">
<form class="aankondigingadmin" method="post" action="backend/insert.php" id="aankondigingadmin">
<fieldset>
<h4>Aankondiging</h4>
<label for="titel">Titel</label>
<input placeholder="Titel" type="text" name="titel" maxlength="50" size="30" required>
<label for="bericht">Bericht [max 1000 tekens]</label>
<textarea placeholder="Bericht" style="width:100%" name="bericht" maxlength="3000" cols="25" rows="10"></textarea required>
<label class="hidecon" for="datum">Datum</label>
<input class="hidecon" type="date" name="datum" id="datum" maxlength="50" size="30">
<input class="submit .transparentButton" value="Plaats bericht" type="submit" name="Submit"/>
<br/>
</fieldset>
</form>
<ul>
<li><a href='backend/deleteall.php'>Verwijder alle berichten</a></li>
<li><a href="backend/logout.php">Logout</a></li>
<li><a href='backend/deleteall.php'>Verwijder alle berichten</a></li>
<li><a href="backend/logout.php">Logout</a></li>
</ul>
<script>let today=new Date().toISOString().substr(0,10);document.querySelector("#today").value=today;</script>
</div>
<form class="form" id="adminform" name="loginform" method="post" action="index.php?id=<?php echo $page6;?>">
<label for="username">Username</label>
<input class="fixed-input" type="text" name="username" placeholder="username" maxlength="50" size="30">
<label for="password">Password</label>
<input class="fixed-input" type="password" name="password" placeholder="password" maxlength="50" size="30">
<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
<input id="loginbtn" type="submit" value="Login" name="submit">
</form>
<?php 
    if($_SESSION['editor'] == true)
    {
    ?>
<script>$("#adminform").hide();$("#adminpanel").show();$('.nicEdit-main').attr('contenteditable','true');$('.nicEdit-panel').show();</script>
<?php
    }
    else
    {
    ?>
<script>$("#adminform").show();$("#adminpanel").hide();$('.nicEdit-main').attr('contenteditable','false');$('.nicEdit-panel').hide();</script>
<?php
    }
    ?>
<p>
<?php 
                echo $feedback;
        ?>
</p>
</article>
</main>