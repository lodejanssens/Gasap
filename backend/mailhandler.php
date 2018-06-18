<?php

include_once 'includes/config.php';   // CONFIG

if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = $email;
    $email_subject = $onderwerp;
 
    function died($error) {
        // your error code can go here

        echo "<head>";
        include_once '../includes/head.php'; // HEAD
        echo "</head>";
        echo "<body>";
        echo "<h4>Er zijn fouten gevonden in het verstuurde bericht.</h4>";
        echo "<h4>Errors:</h4><br /><br />";
        echo $error."<br /><br />";
        echo "<a href='../index.php?id=<?php echo $page5;?'><h4>Ga terug en verbeter je fouten.</h4></a>";
        echo "</body>";
        echo "</html>";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['g-recaptcha-response']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('<h4>Er zijn fouten gevonden in het verstuurde bericht.</h4>');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
    $capacha = $_POST['g-recaptcha-response']; //required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= '<h4>Het ingevulde email adres is niet geldig.</h4>';
  }

  if(!$_POST['g-recaptcha-response']) {
    $error_message .= '<h4>Capacha mislukt.</h4>';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= '<h4>De ingevulde voornaam is niet geldig.</h4>';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= '<h4>De ingevulde achternaam is niet geldig.</h4>';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= '<h4>Het ingevulde bericht is niet geldig.</h4><br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Bericht van klant:\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Voornaam: ".clean_string($first_name)."\n";
    $email_message .= "Achternaam: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telefoon: ".clean_string($telephone)."\n";
    $email_message .= "Bericht: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

$headers .= "CC: $email_from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

?>
 
<!-- HTML -->
 <!DOCTYPE html>
 <html lang="en">
    <head>
    <?php include_once '../includes/head.php';?> <!-- HEAD -->
    <link rel="stylesheet" href="../_css/main.css">
    <link rel="stylesheet" href="../_css/normalize.css">
    <style>

        h3 
        {
          text-align: middle;
          margin: 0 auto;
          margin-top: 20%;
        }

        figure 
        {
          text-align: middle;
          margin: 0 auto;
       }

        img
        {
          text-align: middle;
          margin: 0 auto;
        }

        footer 
        {
          display: none;
        }

    </style>
    </head>

<body>

  <h3>Je bericht is verzonden!</h3>  

      <figure id="logo">
            <a href="../index.php"><img src="../_img/logovector.svg" alt="Logo  <?php echo $naam; ?> "></a>
            
    </figure>

  <!-- // -->
<?php include_once 'includes/footer.php';?> <!-- FOOTER -->
  </body>
 </html>

 
<?php header( "Refresh:2; url=../index.php", true, 303);}?>