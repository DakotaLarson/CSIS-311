<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Checkbox Calculation</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php
    $answer = "";
    if(isset($_GET['num1']) == FALSE || empty($_GET['num1']) ||
      isset($_GET['num2']) == FALSE || empty($_GET['num2'])){
      $answer = "Two numbers were not supplied";
    }elseif(is_numeric($_GET['num1']) == FALSE || is_numeric($_GET['num2']) == FALSE){
      $answer = "Ensure both numbers are numeric";
    }else{
      if(isset($_GET['sign1']) && $_GET['sign1'] == 'add'){
        $answer .= "The sum is: ".($_GET['num1'] + $_GET['num2'])."<br>";
      }if(isset($_GET['sign2']) && $_GET['sign2'] == 'sub'){
        $answer .= "The difference answer is: ".($_GET['num1'] - $_GET['num2'])."<br>";
      }if(isset($_GET['sign3']) && $_GET['sign3'] == 'mul'){
        $answer .= "The product answer is: ".($_GET['num1'] * $_GET['num2'])."<br>";
      }if(isset($_GET['sign4']) && $_GET['sign4'] == 'div'){
        $answer .= "The quotient is: ".($_GET['num1'] / $_GET['num2'])."<br>";
      }if(isset($_GET['sign5']) && $_GET['sign5'] == 'mod'){
        $answer .= "The modulus is: ".($_GET['num1'] % $_GET['num2'])."<br>";
      }if(empty($answer)){
        $answer = "The operation specified is unknown or not specified.";
      }
    }
  ?>
  <body>
    <h1>Assignment 3</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="./checkcalc.html">Go Back</a><br>
    <span class="answer"><?php echo $answer;?></span>
    <?php echo "<HR>"; highlight_file("checkcalc.php"); ?>
  </body>
</html>
