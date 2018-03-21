<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Temperature Conversion</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php
    $answer = "";
    if(isset($_GET['temp']) == FALSE || empty($_GET['temp'])){
      $answer = "A temperature was not supplied.";
    }elseif(is_numeric($_GET['temp']) == FALSE){
      $answer = "The temperature must be numeric.";
    }else{
      if(isset($_GET['celsius'])){
        $answer = ($_GET['temp']-32)*5/9;
        $answer = "The answer is: ". number_format($answer, 2)." degrees.";
      }else{
        $answer = $_GET['temp']*9/5+32;
        $answer = "The answer is: ". number_format($answer, 2)." degrees.";
      }
    }

  ?>
  <body>
    <h1>Assignment 3</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="./temp.html">Go Back</a><br>
    <span class="answer"><?php echo $answer;?></span>
    <?php echo "<HR>"; highlight_file("temp.php"); ?>
  </body>
</html>
