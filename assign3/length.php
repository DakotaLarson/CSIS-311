<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Length Conversion</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php
    $answer = "";
    if(isset($_GET['length']) == FALSE || empty($_GET['length'])){
      $answer = "A length was not supplied.";
    }elseif(is_numeric($_GET['length']) == FALSE){
      $answer = "The length must be numeric.";
    }else{
      if(isset($_GET['centimeters'])){
        $answer = $_GET['length']*2.54;
        $answer = "The answer is: ". number_format($answer, 2)." Centimeters.";
      }else{
        $answer = $_GET['length']*0.393701;
        $answer = "The answer is: ". number_format($answer, 2)." Inches.";
      }
    }

  ?>
  <body>
    <h1>Assignment 3</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="./length.html">Go Back</a><br>
    <span class="answer"><?php echo $answer;?></span>
    <?php echo "<HR>"; highlight_file("length.php"); ?>
  </body>
</html>
