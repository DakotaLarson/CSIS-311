<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Find MPG</title>
    <link rel="stylesheet" href="./styles/main.css">
  </head>
  <?php
    if(isset($_GET['miles']) == FALSE || isset($_GET['gallons']) == FALSE){
      $answer = "You did not supply all fields.";
    }else{
      $miles = $_GET['miles'];
      $gallons = $_GET['gallons'];
      if(is_numeric($miles) == FALSE || is_numeric($gallons) == FALSE){
        $answer = "Your input is not numeric.";
      }else{
        $answer = $miles/$gallons;
        $answer = "The answer is: ". number_format($answer, 2)." MPG.";
      }
    }
  ?>
  <body>
    <h1>Assignment 2</h1><br>
    <h2>Find MPG</h2>
    <a href="./mpg.html" id="back">Go Back</a><br>
    <span class=answer><?php echo $answer; ?></span>
  </body>
  </html>
<?php echo "<HR>"; highlight_file("mpg.php"); ?>
