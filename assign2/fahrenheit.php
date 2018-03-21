<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fahrenheit Conversion</title>
    <link rel="stylesheet" href="./styles/main.css">
  </head>
  <?php
    if(isset($_GET['degrees']) == FALSE){
      $answer = "You did not supply a temperature.";
    }else{
      $cTemp = $_GET['degrees'];
      if(is_numeric($cTemp) == FALSE){
        $answer = "Your input is not numeric.";
      }else{
        $answer = $cTemp*9/5+32;
        $answer = "The answer is: ". number_format($answer, 2)." degrees.";
      }
    }
  ?>
  <body>
    <h1>Assignment 2</h1><br>
    <h2>Fahrenheit Conversion</h2>
    <a href="./fahrenheit.html" id="back">Go Back</a><br>
    <span class=answer><?php echo $answer; ?></span>
  </body>
  </html>
<?php echo "<HR>"; highlight_file("fahrenheit.php"); ?>
