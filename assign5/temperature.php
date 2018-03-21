<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 5</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php
    $text = "";
    $temp = "";
    if(isset($_REQUEST["temperature"])){
      $temp = $_REQUEST["temperature"];
      if(is_numeric($_REQUEST["temperature"]) == FALSE){
        $text = "Please enter a numeric temperatue.";
      }else{
        if(isset($_REQUEST["celsius"])){
          $text = "".$_REQUEST["temperature"]." degrees Fahrenheit is ".toCelsius($_REQUEST["temperature"])." degrees Celsius.";
        }elseif(isset($_REQUEST['fahrenheit'])){
          $text = "".$_REQUEST["temperature"]." degrees Celsius is ".toFahrenheit($_REQUEST["temperature"])." degrees Fahrenheit.";
        }else{
          $text = "Coversion incorrectly submitted.";
        }
      }
    }
    function toCelsius($temperature){
      return number_format(($temperature-32)*5/9);
    }
    function toFahrenheit($temperature){
      return number_format($temperature*9/5+32);
    }
  ?>
  <body>
    <h1>Temperature Conversion</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="./">Go Back</a><a class="source" href="source.php?page=temperature">View Source</a><br>
    <form class="form" method="get">
      <input type="text" name="temperature" placeholder="Temperature" autocomplete="off" autofocus="on" value="<?php echo $temp;?>"><br>
      <h2 id=forminfo>Convert to:</h2>
      <input type="submit" name="celsius" value="Celsius">
      <input type="submit" name="fahrenheit" value="Fahrenheit"><br>
      <a class="clear" href="./temperature.php">Clear</a>
    </form><br>
    <span class="text"><?php echo $text;?></span>
  </body>
</html>
