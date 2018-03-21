<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Celsius Conversion</title>
    <link rel="stylesheet" href="./styles/main.css">
  </head>
  <?php
    if(isset($_GET['degrees']) == FALSE){
      $answer = "You did not supply a temperature.";
    }else{
      $fTemp = $_GET['degrees'];
      if(is_numeric($fTemp) == FALSE){
        $answer = "Your input is not numeric.";
      }else{
        $answer = ($fTemp-32)*5/9;
        $answer = "The answer is: ". number_format($answer, 2)." degrees.";
      }
    }
  ?>
  <body>
    <h1>Assignment 2</h1><br>
    <h2>Celsius Conversion</h2>
    <a href="./celsius.html" id="back">Go Back</a><br>
    <span class=answer><?php echo $answer; ?></span>
  </body>
  </html>
<?php echo "<HR>"; highlight_file("celsius.php"); ?>
