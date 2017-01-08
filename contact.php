<?php
if (empty($_POST) === false) {
  // echo '<pre>', print_r($_POST, true), '</pre>';
  $errors = array();

  $name     =   $_POST['name'];
  $email    =   $_POST['email'];
  $message  =   $_POST['message'];

  // echo $name, ' ', $email, ' ', $message;

  if (empty($name) === true || empty($email) === true || empty($message) === true) {
    $errors[] = 'Name, email and message are required';
  } else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $errors[] = 'Please enter a valid email address';
    }
    if (ctype_alpha($name) === false) {
      $errors[] = 'Name can only contain letters';
    }
  }

  if (empty($errors) === true) {
    mail('mattp@yo50.com', 'Message via website form', $message, 'From: ' . $email);
    header('Location: index.php?sent');
    exit();
  }


  // print_r($errors);
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
<!--[if lt IE 9]>
  <script src="js/polyfill/html5-shiv.js"></script>
<![endif]-->
  </head>
  <body>
<!--[if IE]>
  <div class="browserupgrade"><p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p></div>
<![endif]-->
<!-- ********************************* -->
<!-- ******LET THERE BE JUSTICE******* -->
<!-- ********************************* -->

      <!-- <p id="size"></p> -->

<!-- nav -->
<nav>


<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="menu.html">Menu</a></li>
  <li><a href="location.html">Location</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="#">JUST EAT</a></li>
</ul>


</nav>
<!-- /nav -->







<div class="contact-body">
  <div class="contact">

    <div class="contact-section">
      <p>Tel:02089200735</p>
      <p><a href="mailto:reservations@prathai.co.uk">reservations@prathai.co.uk</a></p>
      <p>Agua Clara House</p>
      <p>107 Friern Barnet Rd</p>
      <p>London N11 3EU</p>



      <p>reservation info</p>




      <!-- form -->

      <?php
        if (isset($_GET['sent']) === true) {
          echo '<p>Thanks for contacting us</p>';
        }
        else {
            if (empty($errors) === false) {
                echo '<ul>';
              foreach ($errors as $error) {
                echo '<li>', $error, '</li>';
            }
              echo '</ul>';
        }
      ?>
      <form method="POST">
        <p>
          <label for="name">Name:</label><br>
          <input type="text" name="name" id="name" <?php if (isset($_POST['name']) === true) {
            echo 'value="', strip_tags($_POST['name']), '"';
          } ?>>
        </p>
        <p>
          <label for="email">Email:</label><br>
          <input type="text" name="email" id="email" <?php if (isset($_POST['email']) === true) {
            echo 'value="', strip_tags($_POST['email']), '"';
          } ?>>
        </p>
        <p>
          <label for="message">Message:</label><br>
          <textarea name="message" id="message"><?php
          if (isset($_POST['message']) === true) {
            echo strip_tags($_POST['message']);
          } ?></textarea>
        </p>
        <p>
          <input type="submit">
        </p>
      </form>
      <?php
        }
       ?>

      <!-- /form -->
    </div>

  </div>
</div>









<!-- footer -->

<footer>

  <ul>
    <li><a href="#facebook"><i class="fa fa-facebook fa-3x"></i></a></li>
    <li><a href="#email"><i class="fa fa-envelope fa-3x"></i></a></li>
  </ul>

  <p class="times">OPENING HOURS</p>
  <p class="times">Monday (Closed)</p>
  <p class="times">Tuesday - Thursday 5pm-11pm</p>
  <p class="times">Friday &amp; Saturday 5pm-11.30pm</p>
  <p class="times">Sunday 5pm-11pm</p>
</footer>

<div class="credit"><a href="mailto: work@mattperkins.com">Designed and Built by CodeMattCode</a></div>
<!-- /footer -->



<!-- ********************************* -->
<!-- ******LET THERE BE LIGHT******* -->
<!-- ********************************* -->
<!--[if lt IE 9]>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="js/polyfill/ie-love.js"></script>
<![endif]-->
<!--[if gt IE 8]><!-->
    <script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
    <!--<![endif]-->
    <script src="js/min/app-min.js"></script>
  </body>
</html>
<!-- ********************************* -->
<!-- ****** made by @codemattcode ******* -->
<!-- ********************************* -->
