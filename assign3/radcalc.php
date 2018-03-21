<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Radio Button Calculation</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php
    $answer = "";
    if(isset($_GET['num1']) == FALSE || empty($_GET['num1']) ||
      isset($_GET['num2']) == FALSE || empty($_GET['num2'])){
      $answer = "Two numbers were not supplied";
    }elseif(isset($_GET['sign']) == FALSE || empty($_GET['sign'])){
      $answer = "An arithmetic operation was not specified";
    }elseif(is_numeric($_GET['num1']) == FALSE || is_numeric($_GET['num2']) == FALSE){
      $answer = "Ensure both numbers are numeric";
    }else{
      if($_GET['sign'] == 'add'){
        $answer = "The answer is: ".($_GET['num1'] + $_GET['num2']);
      }elseif($_GET['sign'] == 'sub'){
        $answer = "The answer is: ".($_GET['num1'] - $_GET['num2']);
      }elseif($_GET['sign'] == 'mul'){
        $answer = "The answer is: ".($_GET['num1'] * $_GET['num2']);
      }elseif($_GET['sign'] == 'div'){
        $answer = "The answer is: ".($_GET['num1'] / $_GET['num2']);
      }elseif($_GET['sign'] == 'mod'){
        $answer = "The answer is: ".($_GET['num1'] % $_GET['num2']);
      }else{
        $answer = "The operation specified is unknown.";
      }
    }
  ?>
  <body>
    <h1>Assignment 3</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="./radcalc.html">Go Back</a><br>
    <span class="answer"><?php echo $answer;?></span>
    <?php echo "<HR>"; highlight_file("radcalc.php"); ?>
  </body>
</html>
