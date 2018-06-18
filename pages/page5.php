<?php
//Haal gegevens van database
$result = db_read('SELECT * FROM news');
$currentpage = $page5;
?>
<main class="flex">
<article class="flex">
<form class="form" name="contactform" method="post" action="backend/mailhandler.php">
<label for="first_name">Voornaam *</label>
<input type="text" name="first_name" placeholder="Voornaam" maxlength="50" size="30">
<label for="last_name">Achternaam *</label>
<input type="text" name="last_name" placeholder="Achternaam" maxlength="50" size="30">
<label for="email">Email Adres *</label>
<input type="text" name="email" placeholder="Email" maxlength="80" size="30">
<label for="telephone">Telefoon nummer</label>
<input type="phone" name="telephone" placeholder="Telefoon nummer" maxlength="30" size="30">
<label for="comments">Bericht *</label>
<textarea name="comments" placeholder="Bericht" maxlength="1000" cols="25" rows="15"></textarea>
<div name="capacha" for="capacha" class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
<input type="submit" value="Verstuur">
</form>
</article>
<aside>
<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?origin=place_id:ChIJR1DSfSWFw0cRk43CuUCVxFo&destination=Gasap%2C%20Klipsenstraat%2C%20Lokeren%2C%20Belgi%C3%AB&key=AIzaSyDWKf_LAU6e1sZBH1JgDuEk57Hu8oIb17U" allowfullscreen></iframe>
</aside>
</main>