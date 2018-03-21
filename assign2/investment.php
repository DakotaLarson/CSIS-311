<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Investment Value</title>
    <link rel="stylesheet" href="./styles/main.css">
  </head>
  <?php
    if(isset($_POST['principle']) == FALSE || isset($_POST['interest']) == FALSE
  || isset($_POST['compounds']) == FALSE || isset($_POST['years']) == FALSE){
      $answer = "You did not supply all fields.";
    }else{
      $principle = $_POST['principle'];
      $interest = $_POST['interest'];
      $compounds = $_POST['compounds'];
      $years = $_POST['years'];
      if(is_numeric($principle) == FALSE || is_numeric($interest) == FALSE
    || is_numeric($compounds) == FALSE || is_numeric($years) == FALSE){
        $answer = "Your input is not numeric.";
      }elseif($compounds == 0){
        $answer = "Compounds per year must be greater than 0.";
      }elseif($principle < 0 || $intrest < 0 || $compounds < 0 || $years < 0){
        $answer = "All values must be greater than 0.";
      }else{
        $interest /= 100;
        $answer = $principle*pow(1+$interest/$compounds,$compounds*$years);
        $answer = "The answer is: $". number_format($answer, 2).".";
      }
    }
  ?>
  <body>
    <h1>Assignment 2</h1><br>
    <h2>Investment Value</h2>
    <a href="./investment.html" id="back">Go Back</a><br>
    <span class=answer><?php echo $answer; ?></span>
  </body>
  </html>
<?php echo "<HR>"; highlight_file("investment.php"); ?>
